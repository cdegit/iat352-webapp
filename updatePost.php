<?php

session_start();

if (!isset($_SESSION['valid_user'])) {
	echo "no valid user";
	exit();
}

$dbhost = "localhost"; 
$dbuser = "cdegit"; 
$dbpass = "cdegit"; 
$dbname = "cdegit"; 
@$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 

if(mysqli_connect_errno()) {
	$data = array('action' => 'error', 'ermessage' => "Something went wrong! Unable to update your post.");
	$url = 'controller.php' . "?" . http_build_query($data);
	header('Location: ' . $url);
	exit();
}

$lessonData = [];

// get post information from POST
foreach ($_POST as $key => $value) {
	// no point in saving the submit value, so don't include it in the data to be written to the file
	if ($value == "Edit Post") {
		break;
	}

	// for each value in $_POST, if set, add to data to store. Otherwise, add an empty string. 
	if (isset($value)) {
		$lessonData[$key] = $value;
	} else {
		$lessonData[$key] = "";
	}
}

$topics = [];

if (isset($_POST['topic'])) {
	$topics = $_POST['topic'];
}

$date = new DateTime();
$ts = $date->getTimestamp();

// add with author from SESSION
$author = $_SESSION['valid_user'];

// Change to UPDATE
$query = "UPDATE posts ";
$query .= "SET author='" . $author . "', title='" . $lessonData['title'] . "', content='" . $lessonData['content'] . "' WHERE id=" . $lessonData['id'];
$result = mysqli_query($connection, $query);

// for each topic, want to check if that relation already exists yet
// if a realtion existed and it no longer does, drop it from the table
$existingTopicsQuery = "SELECT topicName FROM post_topics WHERE postId = " . $lessonData['id'];
$existingTopicsResult = mysqli_query($connection, $existingTopicsQuery);
$existingTopics = mysqli_fetch_all($existingTopicsResult, MYSQLI_ASSOC);

$ets = [];
foreach($existingTopics as $existingTopic) {
	$ets[] = $existingTopic['topicName'];
}

foreach($topics as $topic) {
	if (!in_array($topic, $ets)) {
		// add it
		$addTopicQuery = "INSERT INTO post_topics (postId, topicName) ";
		$addTopicQuery .= "VALUES (" . $lessonData['id'] . ", '" . $topic . "')";
		$addTopicResult = mysqli_query($connection, $addTopicQuery);
	}
}

foreach($ets as $et) {
	if (!in_array($et, $topics)) {
		// remove it
		$removeTopicQuery = "DELETE FROM post_topics WHERE postId = " . $lessonData['id'] . " AND topicName = '" . $et . "'";
		$removeTopicResult = mysqli_query($connection, $removeTopicQuery);
	}
}

if($result) {
	// success
}

$url = 'controller.php?action=lesson&id=' . $lessonData['id']; // change to edit post, it'll be post with this data. Use post id or something. 
header('Location: ' . $url);

?>