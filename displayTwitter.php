<?php

// Require codebird
require_once('codebird-php/src/codebird.php');

// fetch and display the 5 most recent tweets for this user
function displayTweets($connection, $username) {
	// first, check if this user has any cached tweets
	$query = "SELECT timestamp FROM tweets WHERE authorTwitter = '" . $username . "' ORDER BY id DESC LIMIT 5";
	$result = mysqli_query($connection, $query);
	$tc = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// if they have any tweets stored
	if (count($tc) > 0) {
		// check the timestamp
		$currentTime = time();
		$hour = 3600;
		foreach($tc as $tweet) {
			if ($currentTime - strtotime($tweet['timestamp']) > $hour) { // if this tweet is older than a certain threshold
				// get all new tweets if this is true for any
				fetchTweets($connection, $username);
				break;
			}
		}
	} else {
		fetchTweets($connection, $username);
	}

	// get all the tweets for this user
	$query = "SELECT id, text FROM tweets WHERE authorTwitter = '" . $username . "' ORDER BY id DESC LIMIT 5";
	$result = mysqli_query($connection, $query);
	$tweets = mysqli_fetch_all($result, MYSQLI_ASSOC);

	foreach($tweets as $tweet) {
		// get all topics for this tweet
		$query = "SELECT DISTINCT topicName FROM tweet_topics WHERE tweetId = '" . $tweet['id'] . "'";
		$result = mysqli_query($connection, $query);
		$tweetTopics = mysqli_fetch_all($result, MYSQLI_ASSOC);
		?>
		<div class="tweet">
			<p><?php echo $tweet['text']; ?></p>
			<?php if (count($tweetTopics) > 0) {?>
			<div class="tweetTopics">
				<?php
				foreach($tweetTopics as $key=>$value) {
					// if there are any, print out links to all the topics
					echo '<a href="controller.php?action=displaylessons&topic=' . urlencode($value['topicName']) . '">';
					echo ucwords($value['topicName']);
					echo "</a>";
					if ($key < count($tweetTopics) - 1) {
						echo " | ";
					}
				}
				?>
			</div>
			<?php } ?>
		</div>
		<?php
	}	

}

// gets tweets from the user's timeline
function fetchTweets($connection, $username) {
	// Require authentication parameters
	require_once('twitter_config.php');	

	// Set connection parameters and instantiate Codebird	
	\Codebird\Codebird::setConsumerKey($consumer_key, $consumer_secret);
	$cb = \Codebird\Codebird::getInstance();
	$cb->setToken($access_token, $access_token_secret);
	
	$reply = $cb->oauth2_token();
	$bearer_token = $reply->access_token;
	
	// App authentication
	\Codebird\Codebird::setBearerToken($bearer_token);

	// Create query
	$params = array(
		'screen_name' => $username,	
		'count' => 5
	);	
		
	// Make the REST call
	$res = (array) $cb->statuses_userTimeline($params);
	// Convert results to an associative array
	$data = json_decode(json_encode($res), true);	

	$data = array_reverse($data);

	cacheTweets($connection, $username, $data);
}

// adds the tweets to the database, if they aren't there already
function cacheTweets($connection, $username, $data) {
	foreach($data as $item) {
		if (isset($item['text']) && $item['text'] != "") {
			// check if this tweet is in the database		
			$query = "SELECT COUNT(id) FROM tweets WHERE id = '" . $item['id_str'] . "'";
			$result = mysqli_query($connection, $query);
			$tweetCount = mysqli_fetch_array($result, MYSQLI_ASSOC);

			// escape special characters in the tweet (URLs are a common cause)
			$text = addslashes($item['text']);

			if ($tweetCount['COUNT(id)'] == 0) {
				// add it to the database
				// but first, check if it is marked as a tutortweet 
				$tutortweet = 0;
				if (strpos($item['text'], "#tutortweet") !== false) {
					$tutortweet = 1; 
				}

				$query = "INSERT INTO tweets (id, authorTwitter, text, tutorTweet) VALUES ('" . $item['id_str'] . "', '" . $username . "', '" . $text . "', " . $tutortweet . ") ";
				$result = mysqli_query($connection, $query);

				// check if this tweet has any of the topics in it
				// get all topics
				$query = "SELECT name FROM topics";
				$result = mysqli_query($connection, $query);
				$topics = mysqli_fetch_all($result, MYSQLI_ASSOC);

				// for each topic, check if this topic is in the string
				foreach($topics as $topic) {
					$t = "#" . $topic['name'];
					if (strpos($item['text'],$t) !== false) {
					    // add to the topics
					    $query = "INSERT INTO tweet_topics (tweetId, topicName) VALUES ('" . $item['id_str'] . "', '" . $topic['name'] . "')";
						$result = mysqli_query($connection, $query);
					}
				}
			}
		}
	}
}

// draw the tweets with their username and twitter username displayed and linked
function drawTweets($connection, $tweets) {
	foreach($tweets as $tweet) {
		// get all topics for this tweet
		$query = "SELECT DISTINCT topicName FROM tweet_topics WHERE tweetId = '" . $tweet['id'] . "'";
		$result = mysqli_query($connection, $query);
		$tweetTopics = mysqli_fetch_all($result, MYSQLI_ASSOC);
		?>
		<div class="tweet">
			<h4><a href="<?php echo "controller.php?action=user&name=" . $tweet['name']; ?>"><?php echo $tweet['name']; ?></a> 
				| <a href="https://twitter.com/<?php echo $tweet['authorTwitter']; ?>">@<?php echo $tweet['authorTwitter']; ?></a>:</h4>
			<p><?php echo $tweet['text']; ?></p>
			<?php if (count($tweetTopics) > 0) {?>
			<div class="tweetTopics">
				<?php
				foreach($tweetTopics as $key=>$value) {
					// if there are any, print out links to all the topics
					echo '<a href="controller.php?action=displaylessons&topic=' . urlencode($value['topicName']) . '">';
					echo ucwords($value['topicName']);
					echo "</a>";
					if ($key < count($tweetTopics) - 1) {
						echo " | ";
					}
				}
				?>
			</div>
			<?php } ?>
		</div>
		<?php
	}	
}

?>