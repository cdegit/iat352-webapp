<?php

require_once("lesson.php");
require_once("displayFlickr.php");
require_once("displayTwitter.php");

// read in data for this user and display it
function displayProfile($connection, $username) {
	$query = "SELECT name, description, twitter, facebook, flickr, userType, displayTwitter, displayFlickr FROM users, user_settings WHERE users.name = '" . $username . "' AND users.name = user_settings.username";

	$result = mysqli_query($connection, $query);

	$user = [];

	if ($result) {
		// success! 
		$user = mysqli_fetch_array($result, MYSQLI_ASSOC);
	} else {
		$data = array('action' => 'error', 'ermessage' => "Sorry, we were unable to access our database.");
		$url = 'controller.php' . "?" . http_build_query($data);
		header('Location: ' . $url);
		exit();
	}

	if ($user['userType'] == "learner") {
		// can't view this user, display an error
		echo "Sorry, this user does not have a profile.";
	} else {

		// get all posts for this user
		$postsQuery = "SELECT id, author, title, content FROM posts WHERE author='" . $user['name'] . "'";
		$postsResult = mysqli_query($connection, $postsQuery);
		if ($postsResult) {
			$posts = mysqli_fetch_all($postsResult, MYSQLI_ASSOC);
		}

		// get all topics for this user
		$topicsQuery = "SELECT DISTINCT post_topics.topicName FROM posts, post_topics WHERE post_topics.postId = posts.id and posts.author = '" . $user['name'] . "'";
		$topicsResult = mysqli_query($connection, $topicsQuery);
		if($topicsResult) {
			$topics = mysqli_fetch_all($topicsResult, MYSQLI_ASSOC);
		} 

		// Display the user's profile
		?>
		<article id="userProfile">

			<div id="userBio">
				<img src="http://placehold.it/120x120" alt="<?php echo $user['name']; ?>'s profile image"/>
				<div id="userStats">
					<h1><?php echo ucwords($user['name']); ?></h1>
					<h2>Writes about: 
						<?php
						foreach($topics as $key=>$value) {
							echo '<a href="controller.php?action=displaylessons&topic=' . urlencode($value['topicName']) . '">';
							echo ucwords($value['topicName']);
							echo "</a>";
							if ($key < count($topics) - 1) {
								echo " | ";
							}
						} 
						?></h2>
					<p><?php echo $user['description']; ?></p>
					<?php if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == "learner") { 
						// if the current user is already following this user, change the link to unfollow 
						$testQuery = "SELECT learnerName, contributorName FROM following_users WHERE learnerName = '" . $_SESSION['valid_user'] . "' and contributorName = '" . $user['name'] . "'";
						$testResult = mysqli_query($connection, $testQuery);
						$testRes = mysqli_fetch_array($testResult, MYSQLI_ASSOC);
						if ($testRes['learnerName'] == $_SESSION['valid_user']) {
							?>
							<a href="processUnfollow.php?unfollow=<?php echo $user['name']; ?>">Unfollow <?php echo ucwords($user['name']); ?> </a> 
							<?php
						} else { ?>
							<a href="processFollow.php?follow=<?php echo $user['name']; ?>">Follow <?php echo ucwords($user['name']); ?> </a>
						<?php }  
					} ?> 
				</div>
			</div>

			<div id="socialMedia">
				<?php 
				// if this user has their twitter set up and enabled, and the viewing user has tweets activated, display tweets
				if($user['twitter'] != "" && $user['displayTwitter'] == 1 && (!isset($_SESSION['twitter']) || $_SESSION['twitter'] == 1) ) { ?>
				<div id="userTweets">
					<h3>Recent Tweets</h3>
					<a href="https://twitter.com/<?php echo $user['twitter']; ?>"><img src="twitter_logo_small.png" id="twitterLogo"/></a>
					<?php
					displayTweets($connection, $user['twitter']);
					?>
				</div>
				<?php } ?>

				<?php 
				// if this user has their flickr set up and enabled, and the viewing user has photos activated, display flickr
				if($user['flickr'] != "" && $user['displayFlickr'] == 1 && (!isset($_SESSION['flickr']) || $_SESSION['flickr'] == 1 )) { ?>
				<div id="userFlickrPhotos">
					<?php
					displayFlickrPhotos($connection, $user['flickr']);
					?>
				</div>
				<?php } ?>
			</div>

			<div class="usersLessons">
				<h3>Lessons</h3>
				<?php 
				if (count($posts) == 0) { ?>
				<p><?php echo ucwords($user['name']); ?> has not written any lessons yet.</p>
				<?php } else {
					printLesson($connection, $posts); 
				}
				?>
			</div>
		</article>
		<?php
	}

}

?>