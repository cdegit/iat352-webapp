<?php

function printLesson($connection, $posts) {

	foreach ($posts as $post) {
		// get topics
		$query = "SELECT topicName FROM post_topics WHERE postID = " . $post['id'];
		$result = mysqli_query($connection, $query);
		if ($result) $topics = mysqli_fetch_all($result);
	?>

	<article class="lesson">
		<img src="http://placehold.it/275x100" alt="Placeholder for Lesson Image" class="lessonImage" />
		<img src="http://placehold.it/60x60" alt="Author Icon" class="authorImage" />
		<h2 class="lessonAuthor"><a href="controller.php?action=user&name=<?php echo $post['author']; ?>"><?php echo ucwords($post['author']); ?></a></h2>
		<h1 class="lessonTitle"><a href="controller.php?action=lesson&id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h1>
		<p class="lessonExcerpt">
			<?php 
			$excerpt = (strlen(trim($post['content'])) > 383) ? substr($post['content'],0,380).'...' : $post['content']; 
			echo $excerpt; 
			?>
		</p>
		<?php if (count($topics) > 0) { ?>
		<div class="lessonTopics">
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
		</div>
		<?php } ?>
	</article>
	<?php 
	} 
}

?>