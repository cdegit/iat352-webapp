<?php

session_start();

require("db.php");
@$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

require_once("displayTwitter.php");

$tag = $_GET['topic'];

if ($tag == "all") { // if no topic has been selected, just show everything
	$query = "SELECT tweets.id, tweets.text, tweets.authorTwitter, users.name FROM tweets, users, user_settings WHERE users.twitter = tweets.authorTwitter AND tutorTweet = 1 AND user_settings.username = users.name AND user_settings.displayTwitter = 1 ORDER BY id DESC LIMIT 10";
} else { // if a topic has been selected, display only posts from that topic
	$query = "SELECT tweets.id, tweets.text, tweets.authorTwitter, users.name FROM tweets, tweet_topics, users, user_settings WHERE users.twitter = tweets.authorTwitter AND tweet_topics.tweetId = tweets.id AND tweet_topics.topicName = '" . rawurldecode($tag) . "' AND tweets.tutorTweet = 1 AND user_settings.username = users.name AND user_settings.displayTwitter = 1 ORDER BY tweets.id DESC LIMIT 10";
}

$result = mysqli_query($connection, $query);

$tweets = [];

if ($result) {
	// success! 
	$tweets = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
	echo "Sorry, tweets could not be fetched at this time.";
	exit();
}

$doc = new DOMDocument();
$domtweets = $doc->createElement("tweets");
$doc->appendChild($domtweets);

foreach($tweets as $tweet) {
	$domtweet = $doc->createElement("tweet");
	$domtweets->appendChild($domtweet);

	$authorT = $doc->createAttribute("authorTwitter");
	$authorT->value = $tweet['authorTwitter'];
	$domtweet->appendChild($authorT);

	$author = $doc->createAttribute("author");
	$author->value = $tweet['name'];
	$domtweet->appendChild($author);

	$content = $doc->createElement("content", $tweet['text']);
	$domtweet->appendChild($content);

	$query = "SELECT DISTINCT topicName FROM tweet_topics WHERE tweetId = '" . $tweet['id'] . "'";
	$result = mysqli_query($connection, $query);
	$tweetTopics = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// create a new element to store all the topics
	$domtopics = $doc->createElement("topics");
	$domtweet->appendChild($domtopics);

	// add all the topics
	foreach($tweetTopics as $topic) {
		$domtopic = $doc->createElement("topic", $topic['topicName']);
		$domtopics->appendChild($domtopic);
	}
}

echo $doc->saveXML();

?>