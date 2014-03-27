<?php

session_start();

require("db.php");
@$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 


$tag = $_GET["topic"];

if ($tag == "all") { // if no topic has been selected, just show everything
	$query = "SELECT id, author, title, content FROM posts ORDER BY timestamp DESC";
} else { // if a topic has been selected, display only posts from that topic
	$query = "SELECT posts.id, posts.author, posts.title, posts.content, post_topics.postId, post_topics.topicName FROM posts, post_topics WHERE post_topics.postId = posts.id and post_topics.topicName = '" . rawurldecode($tag) . "' ORDER BY timestamp DESC";
}
$result = mysqli_query($connection, $query);

$posts = [];

if ($result) {
	// success! 
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
	echo "Sorry, posts could not be fetched at this time.";
	exit();
}

// create the dom document to attach everything else to
$doc = new DOMDocument();
$domposts = $doc->createElement("posts");
$doc->appendChild($domposts);

// for each post, create a new element and add the needed data
foreach ($posts as $post) {
	// create the post
	$dompost = $doc->createElement("post");
	$domposts->appendChild($dompost);

	// add the id attribute
	$id = $doc->createAttribute("id");
	$id->value = $post['id'];
	$dompost->appendChild($id);

	// add the author attribute
	$author = $doc->createAttribute("author");
	$author->value = $post['author'];
	$dompost->appendChild($author);

	// add the title
	$title = $doc->createElement("title", $post['title']);
	$dompost->appendChild($title);

	// add the content
	$content = $doc->createElement("content", $post['content']);
	$dompost->appendChild($content);

	// get topics
	$query = "SELECT topicName FROM post_topics WHERE postID = " . $post['id'];
	$result = mysqli_query($connection, $query);
	if ($result) $topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	// create a new element to store all the topics
	$domtopics = $doc->createElement("topics");
	$dompost->appendChild($domtopics);

	// add all the topics
	foreach($topics as $topic) {
		$domtopic = $doc->createElement("topic", $topic['topicName']);
		$domtopics->appendChild($domtopic);
	}
}

// for tags, we want to determine if the current user is following the tag or not, and display the appropriate link
$follow = $doc->createAttribute("following");
if($tag != "all") { 
	if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'learner') { 
		$testQuery = "SELECT learnerName, topicName FROM following_topics WHERE learnerName = '" . $_SESSION['valid_user'] . "' AND topicName = '" . rawurldecode($tag) . "'";
		$testResult = mysqli_query($connection, $testQuery);
		if($testResult) {
			$testRes = mysqli_fetch_array($testResult, MYSQLI_ASSOC);
			if ($testRes['learnerName'] == $_SESSION['valid_user']) { // if this relation already exists
				$follow->value = "1";
			} else {
				$follow->value = "0";
			}
		}
	}
} else {
	$follow->value = "-1";
}

$domposts->appendChild($follow);


echo $doc->saveXML();

?>