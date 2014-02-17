<?php
	
// get the user's current data from the database, allow them to edit it (where applicable)
function editProfile($connection, $username) {

	$query = "SELECT name, email, description, twitter, facebook, flickr FROM users WHERE name = '" . $_SESSION['valid_user'] . "'";
	$result = mysqli_query($connection, $query);

	if ($result) {
		$user = mysqli_fetch_array($result, MYSQLI_ASSOC);
	} else {
		$data = array('action' => 'error', 'ermessage' => "Sorry, we were unable to access our database.");
		$url = 'controller.php' . "?" . http_build_query($data);
		header('Location: ' . $url);
		exit();
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
						<td><textarea name="bio" value="" rows=10 cols=32 ><?php echo $user['description']; ?></textarea></td>
					</tr>
			  	</table>
				<br />
				<input type="submit" name="submit" id="updateButton" value="Update" />
			</form>
		</article>
		<?php
	
}

?>