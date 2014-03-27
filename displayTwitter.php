<?php

// Require codebird
require_once('codebird-php/src/codebird.php');

// fetch and display the 5 most recent tweets for this user
function displayTweets($connection, $username) {
	// first, check if this user has any cached tweets
	$query = "SELECT timestamp FROM tweets WHERE authorTwitter = '" . $username . "' ORDER BY id DESC LIMIT 1";
	$result = mysqli_query($connection, $query);
	$tc = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// if they have any tweets stored
	if (count($tc) > 0) {
		// check the timestamp
		$currentTime = time();
		$minute = 60;
		foreach($tc as $tweet) {
			if ($currentTime - strtotime($tweet['timestamp']) > $minute) { // if this tweet is older than a certain threshold
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
			$text = addslashes(utf8_decode($item['text']));

			// check if tweet contains a url
			$ent = $item['entities'];
			if ($ent['urls']) { 
				// add the text occuring before any url
				$newtext = substr($text, 0, $ent['urls'][0]['indices'][0]);

				// for each url in the tweet, add the link to the url
				foreach($ent['urls'] as $key => $value) {
					$newtext .= "<a href='" . $value['expanded_url'] . "'>";
					$newtext .= $value['url'];
					$newtext .= "</a>";

					// add text up to next link
					// if not last
					if ($key != count($ent['urls']) - 1) {
						$key2 = $key + 1;
						$newLinkLoc = $ent['urls'][$key2]['indices'][0];
						$newLinkDist = $ent['urls'][$key2]['indices'][0] - $ent['urls'][$key]['indices'][1];
						$newtext .= substr($text, $ent['urls'][$key]['indices'][1], $newLinkDist);
					}
				}
				// add the text after all urls
				$newtext .= substr($text, $ent['urls'][count( $ent['urls']) - 1]['indices'][1]);

				$text = addslashes($newtext);
			}

			// check if tweet contains any media
			if(isset($ent['media'])) {
				$newtext = substr($text, 0, $ent['media'][0]['indices'][0]);

				// for each media link in the tweet, add the actual link
				foreach($ent['media'] as $key => $value) {
					$newtext .= "<a href='" . $value['expanded_url'] . "'>";
					$newtext .= $value['url'];
					$newtext .= "</a>";

					// add text up to next media url
					// if not last
					if ($key != count($ent['media']) - 1) {
						$key2 = $key + 1;
						$newLinkLoc = $ent['media'][$key2]['indices'][0];
						$newLinkDist = $ent['media'][$key2]['indices'][0] - $ent['media'][$key]['indices'][1];
						$newtext .= substr($text, $ent['media'][$key]['indices'][1], $newLinkDist);
					}
				}
				// add the text after all media
				if ($ent['media'][count( $ent['media']) - 1]['indices'][1] != strlen($text) - 1) {
					$newtext .= substr($text, $ent['media'][count( $ent['media']) - 1]['indices'][1]);
				}

				$text = addslashes($newtext);
			}

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
					$t = " #" . $topic['name'] . " ";
					if (strpos($item['text'],$t) !== false) {
					    // add to the topics
					    $query = "INSERT INTO tweet_topics (tweetId, topicName) VALUES ('" . $item['id_str'] . "', '" . $topic['name'] . "')";
						$result = mysqli_query($connection, $query);
					}
				}
			}
		}
	}
	dropOldTweets($connection, $username);
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

function dropOldTweets($connection, $username) {
	$query = "SELECT COUNT(id) FROM tweets WHERE authorTwitter = '" . $username . "'";
	$result = mysqli_query($connection, $query);
	$photoCount = mysqli_fetch_array($result, MYSQLI_ASSOC);

	if ($photoCount['COUNT(id)'] > 5) { // if we have more than can currently be displayed anyways, delete old ones
		$query = "DELETE FROM tweets WHERE authorTwitter = '" . $username . "' AND id NOT IN (SELECT id FROM (SELECT id FROM tweets WHERE authorTwitter = '" . $username . "' ORDER BY id DESC LIMIT 5)sub )";
		$result = mysqli_query($connection, $query);
	}
}

?>