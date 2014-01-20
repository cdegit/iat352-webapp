<?php 

if (isset($_POST["submit"])) {
	// Loop through all the values in $_POST and add them to a new array
	$userdata = [];

	// just want to store values in new array
	foreach ($_POST as $key => $value) {
		// no point in saving the submit value, so don't include it in the data to be written to the file
		if ($value == "Update") {
			break;
		}

		// for each value in $_POST, if set, add to data to store. Otherwise, add an empty string. 
		if (isset($value)) {
			$userdata[$key] = $value;
		} else {
			$userdata[$key] = "";
		}
	}

	// Add in the password data between email and bio
	$a = array_splice($userdata, 2);

	$newFile = array();

	$file = "userdata.txt";
	$fdata = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); // Get all the data from the file as an array of lines

	foreach ($fdata as $line) {
		$data = explode(" | ", $line);
		if ($data[0] != $userdata['name']) { 	// if this record is not for the user we want to update
			// Just add this user to an array of users to be rewritten, as is, to the file
			$newFile[] = $line;
		} else {
			// If it is the user, add in the data to $userdata, which we are using to build the new record
			$userdata[] = $data[2];
			$userdata[] = $data[3];
			$userdata[] = $data[4];
		}
	}

	// Merge both parts of the userdata back together, adding email and bio back on at the end
	$userdata = array_merge($userdata, $a);

	// use implode to create string, add " | " between array values 
	$formattedData = implode(" | ", $userdata);

	// Write over current version of file
	if ($handle = fopen($file, 'w+')) {
		flock($handle, LOCK_EX);

		// add all of the records that weren't changed
		foreach ($newFile as $newline) {
			fwrite($handle, $newline);
			fwrite($handle, "\r\n"); 
		}

		// write the updated record for this user
		fwrite($handle, $formattedData);

		flock($handle, LOCK_UN);

		fclose($handle);
	}

	// Redirect to this user's now updated profile
	$url = 'controller.php?action=user&name=' . $userdata['name'];
	header('Location: ' . $url);
} else {
	echo "Error";
}

?>