<?php

function createNewPost($connection) {
	// draw form for writing post
	// post is added to database with an author of valid_user
	?>
	<article id="createPost">
		<form action="createPost.php" method="POST">
					<label for="title"><h1>Title</h1></label>
					<input type="text" id="createPostTitle" name="title" value="" required />

					<label for="content"><h2>Content</h2></label>
					<textarea name="content" id="createPostContent" value="" rows=21 cols=65 ></textarea>

					<label for="topic"><h2>Topics</h2></label>
					<?php
					$categoryQuery = "SELECT DISTINCT category FROM topics ORDER BY category ASC";
					$categoryResults = mysqli_query($connection, $categoryQuery);

					if($categoryResults) {
						$categories = mysqli_fetch_all($categoryResults, MYSQLI_ASSOC);
						foreach($categories as $category) {
							echo "<h3>" . ucwords($category['category']) . "</h3>";

							$topicsQuery = "SELECT name FROM topics WHERE category = '" . $category['category'] . "' ORDER BY name ASC";
							$topicsResults = mysqli_query($connection, $topicsQuery);
							$categoryTopics = mysqli_fetch_all($topicsResults, MYSQLI_ASSOC);

							foreach($categoryTopics as $catTopic) {
								echo "<label for='topic[]'>" . ucwords($catTopic["name"]) . "</label>";
								echo "<input type='checkbox' name='topic[]' value='" . $catTopic['name'] . "' />";
								echo "<br/>";
							}
						}
					}
					?>

			<br />
		  	<input type="submit" name="submit" id="createPostButton" value="Create Post" />
		</form>
	</article>
	<?php
}

// users can edit posts they have written
function editPost($connection, $postId) {
	// check if current valid_user matches author of post
	$query = "SELECT id, author, title, content FROM posts WHERE id=" . $postId;
	$result = mysqli_query($connection, $query);
	if ($result) {
		$post = mysqli_fetch_array($result);
	}

	if ($post['author'] != $_SESSION['valid_user']) {
		// fail
		echo "Sorry, you can only edit your own posts!";
	} else {
		?>
		<article id="createPost">
			<form action="updatePost.php" method="POST">
						<label for="title"><h1>Title</h1></label>
						<input type="text" id="createPostTitle" name="title" value="<?php echo $post['title']; ?>" required />

						<label for="content"><h2>Content</h2></label>
						<textarea name="content" id="createPostContent" value="" rows=21 cols=65 ><?php echo $post['content']; ?></textarea>

						<!-- Topics -->
						<label for="topic"><h2>Topics</h2></label>
						<?php
						$categoryQuery = "SELECT DISTINCT category FROM topics ORDER BY category ASC";
						$categoryResults = mysqli_query($connection, $categoryQuery);

						if($categoryResults) {
							$categories = mysqli_fetch_all($categoryResults, MYSQLI_ASSOC);
							foreach($categories as $category) {
								echo "<h3>" . ucwords($category['category']) . "</h3>";

								$topicsQuery = "SELECT name FROM topics WHERE category = '" . $category['category'] . "' ORDER BY name ASC";
								$topicsResults = mysqli_query($connection, $topicsQuery);
								$categoryTopics = mysqli_fetch_all($topicsResults, MYSQLI_ASSOC);

								foreach($categoryTopics as $catTopic) {
									echo "<label for='topic[]'>" . ucwords($catTopic["name"]) . "</label>";
									// check if this topic is currently assigned to this post - if so, display the checkbox as checked
									$tQuery = "SELECT postId, topicName FROM post_topics WHERE postId = " . $postId . " AND topicName = '" . $catTopic['name'] . "'";
									$tResult = mysqli_query($connection, $tQuery);
									$t = mysqli_fetch_array($tResult, MYSQLI_ASSOC);

									if ($t['topicName'] == $catTopic['name']) {
										echo "<input type='checkbox' name='topic[]' value='" . $catTopic['name'] . "' checked=checked />";
									} else {
										echo "<input type='checkbox' name='topic[]' value='" . $catTopic['name'] . "' />";
									}
									echo "<br/>";
								}
							}
						}
						?>

				<br />
				<input type="hidden" name="id" value="<?php echo $postId; ?>" />
			  	<input type="submit" name="submit" id="createPostButton" value="Edit Post" />
			</form>
		</article>
		<?php

	}
}

?>