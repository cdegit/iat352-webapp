<?php

session_start();

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

	// check if either twitter or flickr has been set
	$twitter = 0;
	$flickr = 0;

	if (isset($userdata['twitter']) && $userdata['twitter'] == 'on') {
		$twitter = 1;
	} 

	if (isset($userdata['flickr']) && $userdata['flickr'] == 'on') {
		$flickr = 1;
	}

	// insert settings if they don't already exist; if they do, just update the existing record
	$query  = "INSERT INTO user_settings (username, twitterActivated, flickrActivated) VALUES ('" . $_SESSION['valid_user'] . "', '" . $twitter . "', '" . $flickr . "')";
	$query .= "ON DUPLICATE KEY UPDATE username = VALUES(username), twitterActivated = VALUES(twitterActivated), flickrActivated = VALUES(flickrActivated)";
	$result = mysqli_query($connection, $query);

	if (!$result) {
		$data = array('action' => 'error', 'ermessage' => "Sorry, we were unable to access our database.");
		$url = 'controller.php' . "?" . http_build_query($data);
		header('Location: ' . $url);
		exit();
	}

	// update flickr and twitter
	$_SESSION['twitter'] = $twitter;
	$_SESSION['flickr'] = $flickr;

	// Redirect to this user's now updated profile
	$url = 'controller.php?action=usersettings';
	header('Location: ' . $url);
} else {
	$data = array('action' => 'error', 'ermessage' => "Sorry, you cannot access this file.");
	$url = 'controller.php' . "?" . http_build_query($data);
	header('Location: ' . $url);
	exit();
}
?>