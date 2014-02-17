<?php
	
function editProfile($connection, $username) {

	$query = "SELECT name, email, description, twitter, facebook, flickr FROM users WHERE name = '" . $_SESSION['valid_user'] . "'";
	$result = mysqli_query($connection, $query);

	if ($result) {
		$user = mysqli_fetch_array($result, MYSQLI_ASSOC);
	} else {
		echo ":(";
	}

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


		// print out the form, prefilled with data where it exists
		?>
		<article id="editProfile">
			<h1>Edit Your Profile</h1>
			
			<form action="processUpdate.php" method="POST">
				<table>
					<tr>
						<td><label for="name">Username:</label></td>
						<td><input type="text" name="name" value="<?php echo $user['name']; ?>" required readonly /></td>
					</tr>
					<tr>
						<td><label for="email">Email:</label></td>
						<td><input type="email" name="email" value="<?php echo $user['email']; ?>" required readonly /></td>
					</tr>
					<tr>
						<td><label for="bio">Bio:</label></td>
						<td><textarea name="bio" value="" rows=4 cols=17 ><?php echo $user['description']; ?></textarea></td>
					</tr>
			  	</table>
				<br />
				<input type="submit" name="submit" id="updateButton" value="Update" />
			</form>
		</article>
		<?php
	
}

?>