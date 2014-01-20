<?php
// read in data for this user from the file and display it
function displayProfile($username) {
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

	}

	$currentUser;

	// find the user we actually want to display the data for
	foreach ($users as $user) {
		$userdata = explode(" | ", $user);

		// if the name of this user matches the provided username
		if ($userdata[0] == $username) {
			// Now we have this user's data in the currentUser array
			$currentUser = $userdata;
		}
	}

	// Display the user's profile
	?>
	<article id="userProfile">

		<div id="userBio">
			<img src="http://placehold.it/120x120" alt="<?php echo $currentUser[0]; ?>'s profile image"/>
			<div id="userStats">
				<h1><?php echo $currentUser[0]; ?></h1>
				<h2>Writes about: <?php echo $currentUser[6]; ?></h2>
				<p><?php echo $currentUser[5]; ?></p>
			</div>
		</div>

		<div class="usersLessons">
			<h3>Series</h3>
			<p><?php echo $currentUser[0]; ?> has not written any series yet. <!--Suggest a series. --></p>
		</div>

		<div class="usersLessons">
			<h3>Lessons</h3>
			<p><?php echo $currentUser[0]; ?> has not written any lessons yet. <!-- Suggest a lesson. --></p>
		</div>
	
	</article>
	<?php


}

?>