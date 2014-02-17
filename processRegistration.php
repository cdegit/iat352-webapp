<?php

session_start();

// put in protected file later
$dbhost = "localhost"; 
$dbuser = "cdegit"; 
$dbpass = "cdegit"; 
$dbname = "cdegit"; 
@$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 

if(mysqli_connect_errno()) {
	echo "Unable to access the database.";
	// move them somewhere else
	// or maybe just have a error page that takes a string to print out? Idk. 
	exit();
}

if (isset($_POST["submit"])) {
	// Loop through all the values in $_POST and add them to a new array
	$userdata = [];

	// just want to store values in new array
	foreach ($_POST as $key => $value) {
		// no point in saving the submit value, so don't include it in the data to be written to the file
		if ($value == "Register") {
			break;
		}

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
		print_r($userR);
		if ($userR['name'] == strtolower($userdata['name'])) {
			$data = array('action' => 'error', 'ermessage' => "A user with this name already exists!");
			$url = 'controller.php' . "?" . http_build_query($data);
			header('Location: ' . $url);
			exit();
		}	
	}

	// TODO: check if this user is already registered. 
	$userdata["email"] = addslashes($userdata["email"]); // do this to all

	// First, should check to make sure email doesn't already exist in database
	// Do password match checking in Javascript

	 $query  = "INSERT INTO users ("; 
		$query .= "  email, name, password, userType";
		$query .= ") VALUES ("; 
		$query .= "  '" . $userdata["email"] . "', '". strtolower($userdata["name"]) . "', '" . sha1($userdata["pass"]) . "', '" . $userdata["userType"] . "'";
		$query .= ")"; 
	
	$result = mysqli_query($connection, $query);

	if ($result) {
		// success! 
	} else {
		echo "couldnt do it";
		exit();
	}

	mysqli_close($connection);

	// should also automatically log in the user
	// already know that they have authenticated; they just created everything
	$_SESSION['valid_user'] = $userdata["name"];
	$_SESSION['user_type'] = $userdata["userType"];

	$url = 'controller.php';
	header('Location: ' . $url);
} else {
	$data = array('action' => 'error', 'ermessage' => "Sorry, you cannot access this file.");
	$url = 'controller.php' . "?" . http_build_query($data);
	header('Location: ' . $url);
	exit();
}

?>		