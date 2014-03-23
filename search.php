<?php
session_start();

require("db.php");
@$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 


$q = $_GET["query"];

$query = "SELECT id, title, author FROM posts WHERE title LIKE '%" . $q . "%'";

$result = mysqli_query($connection, $query);

$posts = [];

if ($result) {
	// success! 
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
	echo "Sorry, search is not working at this time.";
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
}

echo $doc->saveXML();

?>