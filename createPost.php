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
	$data = array('action' => 'error', 'ermessage' => "Something went wrong! Unable to create your post.");
	$url = 'controller.php' . "?" . http_build_query($data);
	header('Location: ' . $url);
	exit();
}

$lessonData = [];
$topics = [];

// get post information from POST
foreach ($_POST as $key => $value) {
	if ($value == "Create Post") {
		break;
	}

	// for each value in $_POST, if set, add to data to store. Otherwise, add an empty string. 
	if (isset($value)) {
		$lessonData[$key] = $value;
	} else {
		$lessonData[$key] = "";
	}
}

if (isset($_POST['topic'])) {
	$topics = $_POST['topic'];
}

$date = new DateTime();
$ts = $date->getTimestamp();

// add with author from SESSION
$author = $_SESSION['valid_user'];

$query = "INSERT INTO posts (author, title, content) ";
$query .= "VALUES ('" . $_SESSION['valid_user'] . "', '" . $lessonData['title'] . "', '" . $lessonData['content'] . "')";
$result = mysqli_query($connection, $query);

$postId = mysqli_insert_id($connection);

foreach ($topics as $topic) {
	$topicQuery = "INSERT INTO post_topics (postId, topicName) ";
	$topicQuery .= "VALUES (" . $postId . ", '" . $topic .  "')";
	$topicResult = mysqli_query($connection, $topicQuery);
}

if($result) {
	// success
}

$url = 'controller.php?action=lesson&id=' . $postId; // change to edit post, it'll be post with this data. Use post id or something. 
header('Location: ' . $url);

?>