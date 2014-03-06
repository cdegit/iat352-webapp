<?php 

function userSettings($connection) {

	$query = "SELECT twitterActivated, flickrActivated FROM user_settings WHERE username = '" . $_SESSION['valid_user'] . "'";
	$result = mysqli_query($connection, $query);

	$settings = [];

	if (!$result) {
		echo "Sorry, cannot access your settings currently.";
	} else {
	$settings = mysqli_fetch_array($result, MYSQLI_ASSOC);

		?>
		<article id="userSettings">
			<h1>Settings</h1>
			
			<form action="processSettings.php" method="POST">
				<table>
					<tr>
						<td><label for="twitter">Enable Tweets:</label></td>
						<td><input type="checkbox" name="twitter" <?php if ($settings['twitterActivated']) echo "checked"; ?> title="Keep this checked if you want to see Tweets around the site and on users' profile pages. " /></td>
					</tr>
					<tr>
						<td><label for="flickr">Enable Flickr Photos:</label></td>
						<td><input type="checkbox" name="flickr" <?php if ($settings['flickrActivated']) echo "checked"; ?> title="Keep this checked if you want to see Flickr photos on users' profile pages. " /></td>
					</tr>
			  	</table>
				<br />
				<input type="submit" name="submit" id="saveButton" value="Save" />
			</form>
		</article>

		<?php
	}
}

?>