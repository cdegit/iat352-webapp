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

session_start();
// should really move database connection here; don't want to do it on every page. Or do I? 

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

		// Edit the profile of a particular user
		// In the future, a user will only be able to edit their own profile
		// For now, however, as I don't have sessions set up to track the current user
		// Any user's profile can be edited
		case 'editprofile':
			if (isset($_SESSION['valid_user'])) {
				editProfile($connection, $_SESSION['valid_user']);
			}
			break;

		case 'newpost':
			if (isset($_SESSION['valid_user'])) {
				createNewPost($connection);
			}
			break;

		case 'editpost':
			if (isset($_SESSION['valid_user'])) {
				editPost($connection, $_GET['id']);
			}
			break;

		case 'error':
			displayError($_GET['ermessage']);
			break;

		case 'dashboard':
			if (isset($_SESSION['valid_user'])) {
				displayDashboard($connection);
			}
			break;

	}
} else {
	// Default to just showing topics
	displayLessons($connection, 'all');
}

echo '</div>';

drawFooter();

?>