<?php

session_start();

require("db.php");
@$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 

// If there is an error when attempting to connect to the database, redirect the user to an error page
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

	$userdata['name'] = strtolower($userdata['name']);

	// Check to make sure that this user doesn't already exist
	$userQuery = "SELECT name FROM users WHERE name = '" . strtolower($userdata['name']) . "'";
	$userResult = mysqli_query($connection, $userQuery);
	
	if ($userResult) { 
		$userR = mysqli_fetch_array($userResult, MYSQLI_ASSOC);
		if ($userR['name'] == strtolower($userdata['name'])) { // if the query didn't return an empty set
			$data = array('action' => 'error', 'ermessage' => "A user with this name already exists!");
			$url = 'controller.php' . "?" . http_build_query($data);
			header('Location: ' . $url);
			exit();
		}	
	}

	$userdata["name"] = addslashes(strtolower($userdata["name"]));
	$userdata["email"] = addslashes($userdata["email"]);

	 $query  = "INSERT INTO users ("; 
		$query .= "  email, name, password, userType";
		$query .= ") VALUES ("; 
		$query .= "  '" . $userdata["email"] . "', '". $userdata["name"] . "', '" . sha1($userdata["pass"]) . "', '" . $userdata["userType"] . "'";
		$query .= ")"; 
	
	$result = mysqli_query($connection, $query);

	if (!$result) {
		$data = array('action' => 'error', 'ermessage' => "Sorry, we weren't able to register you.");
		$url = 'controller.php' . "?" . http_build_query($data);
		header('Location: ' . $url);
		exit();
	}

	mysqli_close($connection);

	// should also automatically log in the user
	// already know that they have authenticated; they just created everything
	$_SESSION['valid_user'] = $userdata["name"];
	$_SESSION['user_type'] = $userdata["userType"];

	// To get back to http rather than https, we stored the original url we were at when we logged in
	// This was needed to ensure that if a port was specified, such as 8080, that we would return to that port.
	$url = "http://" . $_POST['server'];
	header('Location: ' . $url);
	
} else { // if there was nothing in $_POST
	$data = array('action' => 'error', 'ermessage' => "Sorry, you cannot access this file.");
	$url = 'controller.php' . "?" . http_build_query($data);
	header('Location: ' . $url);
	exit();
}

?>		