<?php 
require("db.php");
@$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 

if(mysqli_connect_errno()) {
	$data = array('action' => 'error', 'ermessage' => "Sorry, we were unable to access our database.");
	$url = 'controller.php' . "?" . http_build_query($data);
	header('Location: ' . $url);
	exit();
}

if (isset($_POST["submit"])) {
	// Loop through all the values in $_POST and add them to a new array
	$userdata = [];

	// just want to store values in new array
	foreach ($_POST as $key => $value) {

		// for each value in $_POST, if set, add to data to store. Otherwise, add an empty string. 
		if (isset($value)) {
			$userdata[$key] = $value;
		} else {
			$userdata[$key] = "";
		}
	}

	// name and email can't change
	$query  = "UPDATE users"; 
		$query .= " SET description='" . $userdata['bio'] . "', twitter='" . $userdata['twitter'] . "', facebook='', flickr='" . $userdata['flickr'] . "'";
		$query .= " WHERE name='" . $userdata['name'] . "'"; // name is primary key
	$result = mysqli_query($connection, $query);

	if (!$result) {
		$data = array('action' => 'error', 'ermessage' => "Sorry, we were unable to access our database.");
		$url = 'controller.php' . "?" . http_build_query($data);
		header('Location: ' . $url);
		exit();
	}

	// if twitter or flickr have been enabled, update the database with that info
	$twitter = 0;
	$flickr = 0;

	if (isset($userdata['enableTwitter']) && $userdata['enableTwitter'] == 'on') {
		$twitter = 1;
	} 

	if (isset($userdata['enableFlickr']) && $userdata['enableFlickr'] == 'on') {
		$flickr = 1;
	}

	// insert into settings if it does not already exist, or update the existing record
	$query  = "INSERT INTO user_settings (username, displayTwitter, displayFlickr) VALUES ('" . $userdata['name'] . "', '" . $twitter . "', '" . $flickr . "')";
	$query .= "ON DUPLICATE KEY UPDATE username = VALUES(username), displayTwitter = VALUES(displayTwitter), displayFlickr = VALUES(displayFlickr)";
	$result = mysqli_query($connection, $query);

	// Redirect to this user's now updated profile
	$url = 'controller.php?action=user&name=' . $userdata['name'];
	header('Location: ' . $url);
} else {
	$data = array('action' => 'error', 'ermessage' => "Sorry, you cannot access this file.");
	$url = 'controller.php' . "?" . http_build_query($data);
	header('Location: ' . $url);
	exit();
}

?>