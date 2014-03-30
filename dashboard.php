<?php

require_once("lesson.php");
require_once("displayTwitter.php");

// displays the dashboard for the currenly logged in user
// gets posts from users and topics they follow
function displayDashboard($connection) {

	// get the posts from users they follow
	$query = "SELECT author, id, content, title, timestamp FROM posts WHERE author IN (SELECT contributorName FROM following_users WHERE learnerName = '" . $_SESSION['valid_user'] . "') ORDER BY timestamp DESC";
	$result = mysqli_query($connection, $query);
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// get posts from topics they follow
	$topicQuery = "SELECT posts.author, posts.id, posts.content, posts.title, posts.timestamp FROM posts, post_topics WHERE post_topics.postId = posts.id AND post_topics.topicName IN (SELECT topicName FROM following_topics WHERE learnerName = '" . $_SESSION['valid_user'] . "') ORDER BY timestamp DESC";
	$topicResult = mysqli_query($connection, $topicQuery);
	$topics = mysqli_fetch_all($topicResult, MYSQLI_ASSOC);	

	$all = timestampMerge($posts, $topics);



	?>
	<article id='dashboard'>
		<div class="followList">
			<p>You are following users:
				<?php 
					$authorsQuery = "SELECT contributorName FROM following_users WHERE learnerName = '" . $_SESSION['valid_user'] . "'";
					$authorsResult = mysqli_query($connection, $authorsQuery);
					$authors = mysqli_fetch_all($authorsResult, MYSQLI_ASSOC);
					// print out a link to each user followed
					foreach($authors as $key=>$value) {
						echo "<a href='controller.php?action=user&name=" . $value['contributorName'] . "'>";
						echo ucwords($value['contributorName']);
						echo "</a>";
						if ($key < count($authors) - 1) {
							echo " | ";
						}
					}

				?>
			</p>

			<p>You are following topics:
				<?php 
					$topicsQuery2 = "SELECT topicName FROM following_topics WHERE learnerName = '" . $_SESSION['valid_user'] . "'";
					$topicsResult2 = mysqli_query($connection, $topicsQuery2);
					$followedTopics = mysqli_fetch_all($topicsResult2, MYSQLI_ASSOC);
					// print out a link to each topic followed
					foreach($followedTopics as $key=>$value) {
						echo "<a href='controller.php?action=displaylessons&topic=" . urlencode($value['topicName']) . "'>";
						echo ucwords($value['topicName']);
						echo "</a>";
						if ($key < count($followedTopics) - 1) {
							echo " | ";
						}
					}

				?>
			</p>
		</div>
		<div id="lessonSet">
		<?php printLesson($connection, $all); ?>
		</div>
		
		<?php 
		// currently, just displaying tweets from followed users, not followed topics
		if($_SESSION['twitter'] == 1) { ?>
		<div id="tweetSet">
			<?php
			$query = "SELECT tweets.id, tweets.text, tweets.authorTwitter, users.name FROM tweets, users WHERE users.twitter = tweets.authorTwitter AND tutorTweet = 1 AND users.name IN (SELECT contributorName FROM following_users WHERE learnerName = '" . $_SESSION['valid_user'] . "') ORDER BY id DESC LIMIT 10";
			$result = mysqli_query($connection, $query);

			// if users that this user follows have tweets, display them
			if ($result) {
				$tweets = mysqli_fetch_all($result, MYSQLI_ASSOC);
				if (count($tweets) > 0) {
					echo "<div id='dashboardTweets'>";
					echo "<h3>Recent Tweets</h3>";
					drawTweets($connection, $tweets);
					echo "</div>";
				}
			}
			?>
		</div>
		<?php } ?>
	</article>
	<?php

}

// added to allow the dashboard to actually appear in the correct order without duplicates
function timestampMerge($arr1, $arr2) {
	$newLength = count($arr1) + count($arr2); // may not actually be the final new length
	$arr3 = array();

	$arr1pos = 0;
	$arr2pos = 0;

	for($i = 0; $i < $newLength; $i++) {
		if($arr1pos < count($arr1) && $arr2pos >= count($arr2)) { // if you have finished array 2, but not array 1
			$arr3 = array_merge($arr3, $arr1);
			break;
		} elseif($arr1pos >= count($arr1) && $arr2pos < count($arr2)) { // if you have finished array 1, but not array 2
			$arr3 = array_merge($arr3, $arr2);
			break;
		}elseif ($arr1pos >= count($arr1) && $arr2pos >= count($arr2)) {
			// issue introduced when you handle duplicates; if you're done both arrays, just break
			break;
		}elseif(strtotime($arr1[$arr1pos]['timestamp']) > strtotime($arr2[$arr2pos]['timestamp'])) { // if the timestamp of array1's element is greater than the timestamp of array2's element
			$arr3[$i] = $arr1[$arr1pos];
			$arr1pos++;
		} elseif ($arr1[$arr1pos]['id'] == $arr2[$arr2pos]['id'] ) { // if they are the same post (duplicates are introduced by following an author and tags they post in)
			$arr3[$i] = $arr1[$arr1pos];
			$arr1pos++;
			$arr2pos++;
		} else { // if the timestamp of array1's element is less than than the timestamp of array2's element
			$arr3[$i] = $arr2[$arr2pos]; 
			$arr2pos++;
		}
	}
	return $arr3;
}
?>