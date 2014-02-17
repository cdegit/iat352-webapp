<?php

session_start();

if (!isset($_SESSION['valid_user'])) {
	$data = array('action' => 'error', 'ermessage' => "You need to be logged in to access this content.");
	$url = 'controller.php' . "?" . http_build_query($data);
	header('Location: ' . $url);
	exit();
}

require("db.php");
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
	// for each value in $_POST, if set, add to data to store. Otherwise, add an empty string. 
	if (isset($value)) {
		$lessonData[$key] = $value;
	} else {
		$lessonData[$key] = "";
	}
}

$topics = [];

// get all the topics for this post
if (isset($_POST['topic'])) {
	$topics = $_POST['topic'];
}

// add with author from SESSION
$author = $_SESSION['valid_user'];

// Update the current record
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

// for each topic, check if it isn't already in the existing topics
foreach($topics as $topic) {
	if (!in_array($topic, $ets)) {
		// add it
		$addTopicQuery = "INSERT INTO post_topics (postId, topicName) ";
		$addTopicQuery .= "VALUES (" . $lessonData['id'] . ", '" . $topic . "')";
		$addTopicResult = mysqli_query($connection, $addTopicQuery);
	}
}

// for each existing topic, check if it is not in the new topics
foreach($ets as $et) {
	if (!in_array($et, $topics)) {
		// remove it
		$removeTopicQuery = "DELETE FROM post_topics WHERE postId = " . $lessonData['id'] . " AND topicName = '" . $et . "'";
		$removeTopicResult = mysqli_query($connection, $removeTopicQuery);
	}
}

$url = 'controller.php?action=lesson&id=' . $lessonData['id']; // change to edit post, it'll be post with this data. Use post id or something. 
header('Location: ' . $url);

?>