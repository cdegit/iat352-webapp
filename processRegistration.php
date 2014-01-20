<?php
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
			$userdata[] = $value;
		} else {
			$userdata[] = "";
		}
	}

	// For now, we don't have a bio for this user or topics they are interested in. 
	//Just add empty values so the form doesn't break.
	$userdata[] = ''; // Bio
	$userdata[] = ''; // Topics

	// use implode to create string, add " | " between array values 
	$formattedData = implode(" | ", $userdata);

	// TODO: check if this user is already registered. 
	// append this to the file to add the data for the new user

	$file = "userdata.txt";

	$firstEntry = true;
	if (file_exists( "userdata.txt" )) {	// If this is the first user being entered, we don't want the extra new line
		$firstEntry = false;
	}

	if ($handle = fopen($file, 'a')) {
		if (!$firstEntry) {
			fwrite($handle, "\r\n"); 		// Add a line break to indicate that we are entering the data for a new user
		}
		fwrite($handle, $formattedData);	// Write the user's data to the file
		fclose($handle);
	} else {

	}


	// user is redirected to the profile settings page where they can optionally add more information (bio and topics)
	// this is done to avoid confronting the user with a long form which might scare them off
	$url = 'controller.php?action=editprofile&name=' . $userdata[0];
	header('Location: ' . $url);
} else {
	echo "Error";
}

?>		