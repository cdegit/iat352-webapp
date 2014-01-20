<?php
// Import the basic layout files
require_once("header.php");
require_once("footer.php");

// Import files for specific pages
require_once("displayLessons.php");
require_once("displayUsers.php"); 
require_once("displayProfile.php");
require_once("editProfile.php");

drawHeader();

echo '<div id = "content">';

// Based on the action in the GET request, serve the appropriate content
if (isset($_GET['action'])) {
	switch($_GET['action']) {
		// Display all users, sort is specificed in the request
		case 'displayusers':
			displayUsers($_GET['sort']); 
			break;

		// Display the profile of a particular user specified by name
		case 'user':
			displayProfile($_GET['name']);
			break;

		// Display all lessons. Default is no sort. 
		// Usually sorted by a particular topic, which can be specified in the request
		case 'displaylessons':
			displayLessons($_GET['sort']);
			break;

		// Display a particular lesson based on its id
		// To be implemented in later assignment 
		case 'lesson':
			displayLesson($_GET['id']);
			break;

		// Edit the profile of a particular user
		// In the future, a user will only be able to edit their own profile
		// For now, however, as I don't have sessions set up to track the current user
		// Any user's profile can be edited
		case 'editprofile':
			editProfile($_GET['name']);
			break;
	}
} else {
	// Default to just showing topics
	displayLessons('topics');
}

echo '</div>';

drawFooter();

?>