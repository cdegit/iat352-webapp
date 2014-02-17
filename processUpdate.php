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
		$query .= " SET description='" . $userdata['bio'] . "', twitter='twitter', facebook='fb', flickr='flickr'";
		$query .= " WHERE name='" . $userdata['name'] . "'"; // name is primary key
	$result = mysqli_query($connection, $query);

	if (!$result) {
		$data = array('action' => 'error', 'ermessage' => "Sorry, we were unable to access our database.");
		$url = 'controller.php' . "?" . http_build_query($data);
		header('Location: ' . $url);
		exit();
	}

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