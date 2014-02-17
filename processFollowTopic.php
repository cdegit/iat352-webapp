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

// Check to make sure that the topic actually exists, and that this relation does not already exist
if (isset($_GET['follow'])) {

	$test1 = "SELECT name FROM topics WHERE name = '" . rawurldecode($_GET['follow']) . "'";
	$result1 = mysqli_query($connection, $test1);
	if ($result1) {
		$res1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
		if($res1['name'] == rawurldecode($_GET['follow'])) {

			$test2 = "SELECT learnerName, topicName FROM following_topics WHERE learnerName = '" . $_SESSION['valid_user'] . "' AND topicName = '" .  rawurldecode($_GET['follow']) . "'";
			$result2 = mysqli_query($connection, $test2);

			if ($result2) {
				$res2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);

				if ($res2['learnerName'] != $_SESSION['valid_user']) { // empty set
					$query = "INSERT INTO following_topics (learnerName, topicName) ";
					$query .= "VALUES ('" . $_SESSION['valid_user'] . "', '" . rawurldecode($_GET['follow']) . "')";
					$result = mysqli_query($connection, $query);
				}
			} 
			

			// Redirect
			$url = 'controller.php?action=displaylessons&topic=' . urlencode($_GET['follow']);
			header('Location: ' . $url);
		}
	}

} else {
	// fail
	$data = array('action' => 'error', 'ermessage' => "Sorry, you cannot access this file.");
	$url = 'controller.php' . "?" . http_build_query($data);
	header('Location: ' . $url);
	exit();	
}
?>