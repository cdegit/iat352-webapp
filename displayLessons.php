<?php

// Displays lessons based on a particular tag (or no tag)
// Also displays the sorting menu
// Most of this functionality has yet to be implemented; for now, it's just a placeholder to show how things will work 
function displayLessons($connection, $tag) {

	if ($tag == "all") {
		$query = "SELECT id, author, title, content FROM posts";
	} else {
		$query = "SELECT posts.id, posts.author, posts.title, posts.content, post_topics.postId, post_topics.topicName FROM posts, post_topics WHERE post_topics.postId = posts.id and post_topics.topicName = '" . rawurldecode($tag) . "'";
	}

	$result = mysqli_query($connection, $query);

	$posts = [];

	if ($result) {
		// success! 
		$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	} else {
		echo "couldnt do it";
		exit();
	}

	// Get Columns and Topics and stuff
	$categoryQuery = "SELECT DISTINCT category FROM topics ORDER BY category ASC";
	$categoryResults = mysqli_query($connection, $categoryQuery);

	$t = [];
	if ($categoryResults) {
		$t = mysqli_fetch_all($categoryResults, MYSQLI_ASSOC);
	} else {
		echo "couldnt do it";
		exit();
	}

	$categories = [];
	foreach ($t as $ts) {
		$categories[] = $ts['category'];
	}

	?>
	<article id="displayLessons">
		<div id="lessonSort">
			<ul>
				<?php 
				foreach($categories as $category) {
					echo "<li class='topicCategory'>";
					echo ucwords($category);
					echo "<ul class='dropdownTopics'>";

					$topicsQuery = "SELECT name FROM topics WHERE category = '" . $category . "' ORDER BY name ASC";
					$topicsResults = mysqli_query($connection, $topicsQuery);
					$categoryTopics = mysqli_fetch_all($topicsResults, MYSQLI_ASSOC);

					foreach($categoryTopics as $catTopic) {
						echo "<li>";
						echo "<a href='controller.php?action=displaylessons&topic=" . urlencode($catTopic["name"]) . "'>";
						echo ucwords($catTopic["name"]);
						echo "</a></li>";

					}
					// print out each topic within this category
					echo "</ul>";
					echo "</li>";
				}
				?>				
			</ul>
		</div>
		<?php if($tag != "all") { ?>
			<h2 id="lessonsTagTitle">Displaying Lessons from: <?php echo ucwords($tag); ?></h2>
			<?php if($_SESSION['user_type'] == 'learner') { 
				$testQuery = "SELECT learnerName, topicName FROM following_topics WHERE learnerName = '" . $_SESSION['valid_user'] . "' AND topicName = '" . rawurldecode($tag) . "'";
				$testResult = mysqli_query($connection, $testQuery);
				if($testResult) {
					$testRes = mysqli_fetch_array($testResult, MYSQLI_ASSOC);
					if ($testRes['learnerName'] == $_SESSION['valid_user']) { // if this relation already exists
						echo "<a href='processUnfollowTopic.php?unfollow=" . urlencode($tag) . "' id='followTopicLink'>Unfollow Topic</a>";
					} else {
						echo "<a href='processFollowTopic.php?follow=" . urlencode($tag) . "' id='followTopicLink'>Follow Topic</a>";
					}
				}
				
			 }
		} ?>
		<div id="lessonsSet">
		<?php
		printLesson($connection, $posts);
		?>
		</div>
	</article>

	<?php
}

// Display a particular lesson
// Currently just a placeholder to show how things will work
function displayLesson($connection, $id) {

	$query = "SELECT id, author, title, content, timestamp FROM posts WHERE id = " . $id;
	$result = mysqli_query($connection, $query);

	$post = [];

	if ($result) {
		// success! 
		$post = mysqli_fetch_array($result, MYSQLI_ASSOC);
	} else {
		echo "couldnt do it";
		exit();
	}

	$topicsQuery = "SELECT topicName FROM post_topics WHERE postId = " . $id;
	$topicsResult = mysqli_query($connection, $topicsQuery);

	$topics = [];
	if($topicsResult) {
		$topics = mysqli_fetch_all($topicsResult);
	}


	?>
	<article id="fullLesson">
		<div id="lessonInfo">
			<h1><?php echo $post['title']; ?></h1>
			<h2>By <a href="controller.php?action=user&name=<?php echo $post['author']; ?>"><?php echo ucwords($post['author']); ?></a></h2>
			<?php if ($post['author'] == $_SESSION['valid_user']) {
				echo "<a href='controller.php?action=editpost&id=" . $post['id'] . "' id='editLink'>";
				echo "Edit Post";
				echo "</a>";
			} ?>

			<?php if (count($topics) > 0) { ?>
			<h3>Topics: 
					<?php 
					foreach($topics as $key=>$value) {
						echo '<a href="controller.php?action=displaylessons&topic=' . urlencode($value[0]) . '">';
						echo ucwords($value[0]);
						echo "</a>";
						if ($key < count($topics) - 1) {
							echo " | ";
						}
					}
					?>
			</h3>
			<?php } ?>
		</div>

		<div id="lessonContent">
			<p>
			<?php echo $post['content']; ?>
			</p>
		</div>

	</article>
	<?php
}

?>