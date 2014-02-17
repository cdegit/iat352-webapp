<?php
// display users in order determined by the sort type
function displayUsers($connection, $sort) {
	// get all users who are contributors
	$query  = "SELECT name FROM users WHERE userType = 'contributor'"; 
	$result = mysqli_query($connection, $query);

	$users = [];

	if ($result) {
		// success! 
		$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
	} else {
		$data = array('action' => 'error', 'ermessage' => "Sorry, we were unable to access our database.");
		$url = 'controller.php' . "?" . http_build_query($data);
		header('Location: ' . $url);
		exit();
	}

	// Sort the array. This will be in alphabetical order based on the username.
	sort($users);

	?> 
	<article id="userlist">
		<form action="controller.php" method="GET">
			<label for="sort">Sort by:</label>
			<input type="hidden" name="action" value="displayusers" />
			<select name="sort" onchange="this.form.submit()">
				<option value="name" <?php if ($sort == 'name') echo 'selected'; ?> >Name</option>
	 			<option value="topics" <?php if ($sort == 'topics') echo 'selected'; ?> >Topics</option>
			</select>
		</form>

	<?php

	// Display the users different depending on how we are sorting them
	switch ($sort) {
		// If sorting by name, just display the users' data in the order of the array, which was already sorted. 
		case "name":
			echo '<ul id="nameSort">';
			foreach ($users as $user) { ?>

				<li>
					<a href="controller.php?action=user&name=<?php echo $user["name"]; ?>" class="userName"><?php echo ucwords($user["name"]); ?></a>
				<?php 
				// get the topics each user writes about
				// these are obtained from the posts they have written
				$topicsQuery = "SELECT DISTINCT post_topics.topicName FROM posts, post_topics WHERE post_topics.postId = posts.id and posts.author = '" . $user['name'] . "'";
				$topicsResult = mysqli_query($connection, $topicsQuery);
				if($topicsResult) {
					$topics = mysqli_fetch_all($topicsResult, MYSQLI_ASSOC);
				}

				// display the topics
				if (count($topics) > 0) {
					echo "<p>Writes about: ";
				
				foreach($topics as $key=>$value) {
						echo "<a href='controller.php?action=displaylessons&topic=" . urlencode($value['topicName']) . "' class='userTopics'>";
						echo ucwords($value['topicName']);
						echo "</a>";
						if ($key < count($topics) - 1) {
							echo " | ";
						}
					} 

				
				echo "</p>"; 
				}
				?>
				</li>

				<?php
			}
			break;

		// If sorted by topics, display each topic and list each user who writes about that topic
		case "topics":
			// TODO: break up into categories

			// get all topics
			$query2  = "SELECT name FROM topics"; 
			$result2 = mysqli_query($connection, $query2);

			$topics = [];

			if ($result2) {
				// success! 
				$topics = mysqli_fetch_all($result2, MYSQLI_ASSOC);
			} else {
				$data = array('action' => 'error', 'ermessage' => "Sorry, we were unable to access our database.");
				$url = 'controller.php' . "?" . http_build_query($data);
				header('Location: ' . $url);
				exit();
			}

			echo '<ul id="topicSort">';

			// for each topic, get all user users that write about it
			foreach($topics as $topic) {
				$q = "SELECT DISTINCT posts.author FROM posts, post_topics WHERE post_topics.topicName ='" . $topic['name'] . "' AND posts.id = post_topics.postId";
				$r = mysqli_query($connection, $q);
				if($r) {
					$topicUsers = mysqli_fetch_all($r, MYSQLI_ASSOC);
				} else {
					$data = array('action' => 'error', 'ermessage' => "Sorry, we were unable to access our database.");
					$url = 'controller.php' . "?" . http_build_query($data);
					header('Location: ' . $url);
					exit();
				}

			// Only display the topics that have users writing about them
			if (count($topicUsers) != 0) {
				?>

			<li><h2 class="topicName"><?php echo ucwords($topic['name']); ?></h2>
				<ul>
					<?php
						// Write the names of all the users for this topic
						foreach($topicUsers as $topicUser) {
							echo '<li><a href="controller.php?action=user&name=' . $topicUser['author'] . '">' . ucwords($topicUser['author']) . '</a></li>';
						}
					?>
				</ul>
			</li>

				<?php
				}
			}

			break;
	}

	echo '</ul>';
	echo '</article>';
}

?>