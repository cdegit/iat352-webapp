<?php

// display users in order determined by the sort type
function displayUsers($sort) {
	$users = [];

	// Read all users in from userdata.txt
	$file = "userdata.txt";
	if ($handle = fopen($file, 'r')) {
		// read each line of userdata into a new element of $users
		while(!feof($handle)) {
			$users[] = fgets($handle);
		}

		fclose($handle);
	} else {
		echo "There are no users registered.";
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
			foreach ($users as $user) {
				$userdata = explode(" | ", $user);
				?>

				<li>
					<a href="controller.php?action=user&name=<?php echo $userdata[0]; ?>" class="userName"><?php echo $userdata[0]; ?></a>
				<p>Writes about: <?php echo $userdata[6]; ?></p> 
				</li>

				<?php
			}
			break;

		// If sorted by topics, display each topic (from the predefined list in topics.txt) and list each user who writes about that topic
		case "topics":
			echo '<ul id="topicSort">';
			$topics = [];

			// Read all topics in from topics.txt
			$fileTopics = "topics.txt";
			if ($handleTopics = fopen($fileTopics, 'r')) {
				// read each line of topics into a new element of $topics
				while(!feof($handleTopics)) {
					$topics[] = fgets($handleTopics);
				}

				fclose($handleTopics);
			} else {
				echo "There are no topics to display.";
			}

			// For each topic, find the users who write about it
			foreach ($topics as $topic) {
				$topicsUsers = array();
				foreach ($users as $user) {
					$userdata = explode(" | ", $user);

					// If the topic is found in their list of topics
					if (strpos($userdata[6], trim($topic)) !== false) {
						// add them to the array of users for this topic
						array_push($topicsUsers, $userdata);
					}
				}

			// Only display the topics that have users writing about them
			if (count($topicsUsers) != 0) {
				?>

			<li><h2 class="topicName"><?php echo $topic; ?></h2>
				<ul>
					<?php
						// Write the names of all the users for this topic
						foreach($topicsUsers as $topicUser) {
							echo '<li><a href="controller.php?action=user&name=' . $topicUser[0] . '">' . $topicUser[0] . '</a></li>';
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