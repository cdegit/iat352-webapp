<?php

session_start();

$dbhost = "localhost"; 
$dbuser = "cdegit"; 
$dbpass = "cdegit"; 
$dbname = "cdegit"; 
@$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 

if(mysqli_connect_errno()) {
	echo "Unable to access the database.";
	exit();
}



// authenticate the user 
if (!isset($_SESSION['valid_user'])) {
	if (isset($_POST['name']) && isset($_POST['pass'])) {
		$name = strtolower(trim($_POST['name']));
		$pass = trim($_POST['pass']);

		$query = "SELECT name, userType FROM users WHERE name = '" . $name . "' and password = '" . sha1($pass) . "'";
		$result = mysqli_query($connection, $query);

		if($result) {
			$user = mysqli_fetch_array($result, MYSQLI_ASSOC);
		} else {
			echo "oh";
		}

		if($user['name'] == $name) {
			// visitor's name and password combination are correct
			// do whatever matching is necessary - against the DB here
			$_SESSION['valid_user'] = $name;
			$_SESSION['user_type'] = $user['userType'];

			// Redirect back to homepage if contributor
			// redirect learner users straight to their dashboard
			if ($_SESSION['user_type'] == 'learner') {
				$url = 'controller.php?action=dashboard';
			} else {
				$url = 'controller.php';
			}
			header('Location: ' . $url);

		} else {
			//login failed, let them try again
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
} else {
	$data = array('action' => 'error', 'ermessage' => "You are already logged in!");
	$url = 'controller.php' . "?" . http_build_query($data);
	header('Location: ' . $url);
	exit();
}

?>