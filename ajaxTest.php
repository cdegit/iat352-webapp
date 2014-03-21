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

$doc = new DOMDocument();
$domposts = $doc->createElement("posts");
$doc->appendChild($domposts);

foreach ($posts as $post) {
	$dompost = $doc->createElement("post");
	$domposts->appendChild($dompost);

	$id = $doc->createAttribute("id");
	$id->value = $post['id'];
	$dompost->appendChild($id);

	$author = $doc->createAttribute("author");
	$author->value = $post['author'];
	$dompost->appendChild($author);

	$title = $doc->createElement("title", $post['title']);
	$dompost->appendChild($title);

	$content = $doc->createElement("content", $post['content']);
	$dompost->appendChild($content);

	// get topics
	$query = "SELECT topicName FROM post_topics WHERE postID = " . $post['id'];
	$result = mysqli_query($connection, $query);
	if ($result) $topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
	

	$domtopics = $doc->createElement("topics");
	$dompost->appendChild($domtopics);

	foreach($topics as $topic) {
		$domtopic = $doc->createElement("topic", $topic['topicName']);
		$domtopics->appendChild($domtopic);
	}
}

echo $doc->saveXML();

?>