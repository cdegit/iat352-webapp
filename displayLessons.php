<?php

// Displays lessons based on a particular tag (or no tag)
// Also displays the sorting menu
function displayLessons($connection, $tag) {

	if ($tag == "all") { // if no topic has been selected, just show everything
		$query = "SELECT id, author, title, content FROM posts";
	} else { // if a topic has been selected, display only posts from that topic
		$query = "SELECT posts.id, posts.author, posts.title, posts.content, post_topics.postId, post_topics.topicName FROM posts, post_topics WHERE post_topics.postId = posts.id and post_topics.topicName = '" . rawurldecode($tag) . "'";
	}
	$result = mysqli_query($connection, $query);

	$posts = [];

	if ($result) {
		// success! 
		$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	} else {
		$data = array('action' => 'error', 'ermessage' => "Sorry, we were unable to access our database.");
		$url = 'controller.php' . "?" . http_build_query($data);
		header('Location: ' . $url);
		exit();
	}

	// Get categories, we'll get topics for each category afterwards
	$categoryQuery = "SELECT DISTINCT category FROM topics ORDER BY category ASC";
	$categoryResults = mysqli_query($connection, $categoryQuery);

	$categories = [];
	if ($categoryResults) {
		$categories = mysqli_fetch_all($categoryResults, MYSQLI_ASSOC);
	} else {
		$data = array('action' => 'error', 'ermessage' => "Sorry, we were unable to access our database.");
		$url = 'controller.php' . "?" . http_build_query($data);
		header('Location: ' . $url);
		exit();
	}

	?>
	<article id="displayLessons">
		<div id="lessonSort">
			<ul>
				<?php 
				foreach($categories as $category) {
					echo "<li class='topicCategory'>";
					echo ucwords($category['category']);
					echo "<ul class='dropdownTopics'>";

					// get the topics for this category
					$topicsQuery = "SELECT name FROM topics WHERE category = '" . $category['category'] . "' ORDER BY name ASC";
					$topicsResults = mysqli_query($connection, $topicsQuery);
					$categoryTopics = mysqli_fetch_all($topicsResults, MYSQLI_ASSOC);

					// print out each topic within this category
					foreach($categoryTopics as $catTopic) {
						echo "<li>";
						echo "<a href='controller.php?action=displaylessons&topic=" . urlencode($catTopic["name"]) . "'>";
						echo ucwords($catTopic["name"]);
						echo "</a></li>";

					}
					echo "</ul>";
					echo "</li>";
				}
				?>				
			</ul>
		</div>
		<?php if($tag != "all") { ?>
			<h2 id="lessonsTagTitle">Displaying Lessons from: <?php echo ucwords($tag); ?></h2>
			<?php if($_SESSION['user_type'] == 'learner') { 
				// if the current user is a learner, give them the option to follow this topic
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
		// display the lessons
		printLesson($connection, $posts);
		?>
		</div>
	</article>

	<?php
}

// Display a particular lesson
function displayLesson($connection, $id) {
	// get the data for this lesson based on the provided id
	$query = "SELECT id, author, title, content, timestamp FROM posts WHERE id = " . $id;
	$result = mysqli_query($connection, $query);

	$post = [];

	if ($result) {
		// success! 
		$post = mysqli_fetch_array($result, MYSQLI_ASSOC);
	} else {
		$data = array('action' => 'error', 'ermessage' => "Sorry, we were unable to access our database.");
		$url = 'controller.php' . "?" . http_build_query($data);
		header('Location: ' . $url);
		exit();
	}

	// get the topics for this lesson
	$topicsQuery = "SELECT topicName FROM post_topics WHERE postId = " . $id;
	$topicsResult = mysqli_query($connection, $topicsQuery);

	$topics = [];
	if($topicsResult) {
		$topics = mysqli_fetch_all($topicsResult);
	}

	// Print out the lesson
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
						// if there are any, print out links to all the topics
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