<?php
// Import the basic layout files
require_once("header.php");
require_once("footer.php");

// Import files for specific pages
require_once("displayLessons.php");
require_once("displayUsers.php"); 
require_once("displayProfile.php");
require_once("editProfile.php");
require_once("post.php");
require_once("error.php");
require_once("dashboard.php");
require_once("userSettings.php");
require_once("about.php");
require_once("author.php");

session_start();

require("db.php");
@$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 

if(mysqli_connect_errno()) {
	$data = array('action' => 'error', 'ermessage' => "Sorry, we were unable to access our database.");
	$url = 'controller.php' . "?" . http_build_query($data);
	header('Location: ' . $url);
	exit();
}
	

drawHeader();

echo '<div id = "content">';

// Based on the action in the GET request, serve the appropriate content
if (isset($_GET['action'])) {
	switch($_GET['action']) {
		// Display all users, sort is specificed in the request
		case 'displayusers':
			displayUsers($connection, $_GET['sort']); 
			break;

		// Display the profile of a particular user specified by name
		case 'user':
			displayProfile($connection, $_GET['name']);
			break;

		// Display all lessons. Default is no sort. 
		// Usually sorted by a particular topic, which can be specified in the request
		case 'displaylessons':
			displayLessons($connection, $_GET['topic']);
			break;

		// Display a particular lesson based on its id
		// To be implemented in later assignment 
		case 'lesson':
			displayLesson($connection, $_GET['id']);
			break;

		// Edit the profile of the current user
		case 'editprofile':
			if (isset($_SESSION['valid_user'])) {
				editProfile($connection, $_SESSION['valid_user']);
			}
			break;

		// Display the form to create a new post
		// If the currently logged in user is a contributor
		case 'newpost':
			if (isset($_SESSION['valid_user']) && $_SESSION['user_type'] == "contributor") {
				createNewPost($connection);
			}
			break;

		// Display the form to edit the post given by id
		// If the currently logged in user is a contributor
		case 'editpost':
			if (isset($_SESSION['valid_user']) && $_SESSION['user_type'] == "contributor") {
				editPost($connection, $_GET['id']);
			}
			break;

		// Something went wrong, display a pretty error
		case 'error':
			displayError($_GET['ermessage']);
			break;

		// Display the dashboard of the current user if they're a learner
		case 'dashboard':
			if (isset($_SESSION['valid_user']) && $_SESSION['user_type'] == "learner") {
				displayDashboard($connection);
			}
			break;

		case 'usersettings':
			if (isset($_SESSION['valid_user'])) {
				userSettings($connection);
			}
			break;			

		case 'about':
			aboutPage();
			break;

		case 'author':
			authorPage();
			break;
	}
} else {
	// Default to just showing topics
	displayLessons($connection, 'all');
}

echo '</div>';

drawFooter();

?>