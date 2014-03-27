<?php
session_start();

require("db.php");
@$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 


$q = $_GET["query"];

// get all posts where their name contains the query entered by the user
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

// Build the xml to be returned, one entry for each post
// create the dom document itself
$doc = new DOMDocument();
$domposts = $doc->createElement("posts");
$doc->appendChild($domposts);

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
}

echo $doc->saveXML();

?>