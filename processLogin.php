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

// authenticate the user 
if (!isset($_SESSION['valid_user'])) {
	if (isset($_POST['name']) && isset($_POST['pass'])) { // if a name and password have been submitted
		$name = strtolower(trim($_POST['name'])); // user may enter their name in any case, name should be case insensitive 
		$pass = trim($_POST['pass']);

		$query = "SELECT name, userType FROM users WHERE name = '" . $name . "' and password = '" . sha1($pass) . "'";
		$result = mysqli_query($connection, $query);

		if($result) {
			$user = mysqli_fetch_array($result, MYSQLI_ASSOC);
		} else { 
			$data = array('action' => 'error', 'ermessage' => "Sorry, we were unable to access our database.");
			$url = 'controller.php' . "?" . http_build_query($data);
			header('Location: ' . $url);
			exit();
		}

		// here we basically just want to check that the query didn't return an empty set
		if($user['name'] == $name) {
			// visitor's name and password combination are correct
			// do whatever matching is necessary - against the DB here
			$_SESSION['valid_user'] = $name;
			$_SESSION['user_type'] = $user['userType'];

			// To get back to http rather than https, we stored the original url we were at when we logged in
			// This was needed to ensure that if a port was specified, such as 8080, that we would return to that port.
			$url = "http://" . $_POST['server'];
			header('Location: ' . $url);

		} else {
			// login failed, let them try again
			$data = array('action' => 'error', 'ermessage' => "The username and password you have provided do not match a record in our database.");
			$url = 'controller.php' . "?" . http_build_query($data);
			header('Location: ' . $url);
			exit();
		}
	} else {
		//login info missing - signing in first time
		$data = array('action' => 'error', 'ermessage' => "Please log in.");
		$url = 'controller.php' . "?" . http_build_query($data);
		header('Location: ' . $url);
		exit();
	}
} else { // if valid_user is already set
	$data = array('action' => 'error', 'ermessage' => "You are already logged in!");
	$url = 'controller.php' . "?" . http_build_query($data);
	header('Location: ' . $url);
	exit();
}

?>