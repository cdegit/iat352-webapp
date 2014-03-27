<?php

session_start();

require("db.php");
@$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

require_once("displayTwitter.php");

$user = $_GET['user'];
$time = $_GET['time'];

$query = "SELECT twitter FROM users WHERE name = '" . $user . "'";
$result = mysqli_query($connection, $query);
$userTwitter = mysqli_fetch_array($result, MYSQLI_ASSOC);

fetchTweets($connection, $userTwitter['twitter']);

if($user != "all") {
	$query = "SELECT tweets.id, tweets.text, tweets.authorTwitter, tweets.timestamp FROM tweets, users WHERE tweets.authorTwitter = users.twitter AND users.name = '" . $user . "'";
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

date_default_timezone_set("America/Vancouver");

foreach($tweets as $tweet) {
	if (strtotime($tweet['timestamp']) > intval($time)) {
		$domtweet = $doc->createElement("tweet");
		$domtweets->appendChild($domtweet);

		$authorT = $doc->createAttribute("authorTwitter");
		$authorT->value = $tweet['authorTwitter'];
		$domtweet->appendChild($authorT);

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
}

echo $doc->saveXML();

?>