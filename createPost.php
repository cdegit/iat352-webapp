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
	$data = array('action' => 'error', 'ermessage' => "Something went wrong! Unable to create your post.");
	$url = 'controller.php' . "?" . http_build_query($data);
	header('Location: ' . $url);
	exit();
}

$lessonData = [];
$topics = [];

// get post information from POST
foreach ($_POST as $key => $value) {
	// for each value in $_POST, if set, add to data to store. Otherwise, add an empty string. 
	if (isset($value)) {
		$lessonData[$key] = $value;
	} else {
		$lessonData[$key] = "";
	}
}

// get the topics for this post
if (isset($_POST['topic'])) {
	$topics = $_POST['topic'];
}

// add with author from SESSION
$author = $_SESSION['valid_user'];

// insert into the database. Id is auto incremented and the timestamp is added automatically
$query = "INSERT INTO posts (author, title, content) ";
$query .= "VALUES ('" . $_SESSION['valid_user'] . "', '" . $lessonData['title'] . "', '" . $lessonData['content'] . "')";
$result = mysqli_query($connection, $query);

$postId = mysqli_insert_id($connection);

// for each topic given to this post, create a record in post_topics to cature it
foreach ($topics as $topic) {
	$topicQuery = "INSERT INTO post_topics (postId, topicName) ";
	$topicQuery .= "VALUES (" . $postId . ", '" . $topic .  "')";
	$topicResult = mysqli_query($connection, $topicQuery);
}

$url = 'controller.php?action=lesson&id=' . $postId; 
header('Location: ' . $url);

?>