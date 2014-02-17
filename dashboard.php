<?php

require_once("lesson.php");

function displayDashboard($connection) {
	// displays the dashboard for the current user
	// get all posts from users that i'm following
	// (later) or topics

	// TODO: display list of things this user is following

	$query = "SELECT author, id, content, title FROM posts WHERE author IN (SELECT contributorName FROM following_users WHERE learnerName = '" . $_SESSION['valid_user'] . "') LIMIT 8";
	$result = mysqli_query($connection, $query);

	if ($result) {
		$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	} else {
		echo "";
	}

	// determine needed number of pages, add links to each
	// assume 8 posts per page? 

	$topicQuery = "SELECT posts.author, posts.id, posts.content, posts.title, post_topics.topicName FROM posts, post_topics WHERE post_topics.postId = posts.id AND post_topics.topicName IN (SELECT topicName FROM following_topics WHERE learnerName = '" . $_SESSION['valid_user'] . "') LIMIT 8";
	$topicResult = mysqli_query($connection, $topicQuery);
	$topics = mysqli_fetch_all($topicResult, MYSQLI_ASSOC);	

	?>
	<article id='dashboard'>
		<!--<div class="paginationNavigation">
		Page:
		</div> -->
		<div class="followList">
			<p>You are following users:
				<?php 
					$authorsQuery = "SELECT contributorName FROM following_users WHERE learnerName = '" . $_SESSION['valid_user'] . "'";
					$authorsResult = mysqli_query($connection, $authorsQuery);
					$authors = mysqli_fetch_all($authorsResult, MYSQLI_ASSOC);
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
		
		<?php printLesson($connection, $posts); ?>
		<?php printLesson($connection, $topics); ?>
		<!--<div class="paginationNavigation">
		Page:
		</div>--> 
	</article>
	<?php

}

?>