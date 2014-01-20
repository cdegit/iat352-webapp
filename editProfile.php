<?php
	
function editProfile($username) {
	$users = [];

	// Read all users in from userdata.txt
	$file = "userdata.txt";
	if ($handle = fopen($file, 'r')) {
		// read each line of userdata into a new element of $contents
		while(!feof($handle)) {
			$users[] = fgets($handle);
		}

		fclose($handle);
	} else {

	}

	$currentUser = 0; // use to make sure we actually get the user

	// find the user we actually want to display the data for
	foreach ($users as $key=>$value) {
		$userdata = explode(" | ", $value);

		if ($userdata[0] == $username) {
			$currentUser = $userdata;
			$userIndex = $key;
		}
	}

	if ($currentUser == 0) {
		echo '<p>Sorry, this user does not exist</p>';
	} else {
		// print out the form, prefilled with data where it exists
		?>
		<article id="editProfile">
			<h1>Edit Your Profile</h1>
			
			<form action="processUpdate.php" method="POST">
				<table>
					<tr>
						<td><label for="name">Username:</label></td>
						<td><input type="text" name="name" value="<?php echo rtrim($currentUser[0]); ?>" required readonly /></td>
					</tr>
					<tr>
						<td><label for="email">Email:</label></td>
						<td><input type="email" name="email" value="<?php echo rtrim($currentUser[1]); ?>" required readonly /></td>
					</tr>
					<tr>
						<td><label for="bio">Bio:</label></td>
						<td><textarea name="bio" value="" rows=4 cols=17 ><?php echo rtrim($currentUser[5]); ?></textarea></td>
					</tr>
					<tr>
						<td><label for="topics">Topics:</label></td>
						<td><input type="text" name="topics" value="<?php echo rtrim($currentUser[6]); ?>" /></td><!-- Probably just use a bunch of checkboxes instead -->
					</tr>
			  	</table>
				<br />
				<input type="submit" name="submit" id="updateButton" value="Update" />
			</form>
		</article>
		<?php
	}
}

?>