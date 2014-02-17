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

// Check to name sure that unfollow refers to an actual user, and that this relation already exists
if (isset($_GET['unfollow'])) {

	// first test: make sure the user you're trying to unfollow actually exists
	$test1 = "SELECT name FROM users WHERE name = '" . $_GET['unfollow'] . "'";
	$result1 = mysqli_query($connection, $test1);

	if ($result1) {
		$res1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
		
		if($res1['name'] == $_GET['unfollow']) { // if the first test has been passed

			// second test: check to make sure this relation already exists
			$test2 = "SELECT learnerName, contributorName FROM following_users WHERE learnerName = '" . $_SESSION['valid_user'] . "' AND contributorName = '" .  $_GET['unfollow'] . "'";
			$result2 = mysqli_query($connection, $test2);

			if ($result2) {
				$res2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);

				if ($res2['learnerName'] == $_SESSION['valid_user']) { // if the second test has been passed

					// delete the record
					$query = "DELETE FROM following_users WHERE learnerName = '" . $_SESSION['valid_user'] . "' and contributorName = '" . $_GET['unfollow'] . "'";
					$result = mysqli_query($connection, $query);
				}
			}
		}
	}	

	// Redirect
	$url = 'controller.php?action=user&name=' . $_GET['unfollow'];
	header('Location: ' . $url);
} else {
	// fail
	$data = array('action' => 'error', 'ermessage' => "Sorry, you cannot access this file.");
	$url = 'controller.php' . "?" . http_build_query($data);
	header('Location: ' . $url);
	exit();
}
?>