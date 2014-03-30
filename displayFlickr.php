<?php

// get the url of the photo itself to display
function photo_url($p, $size='t', $ext='jpg'){  
  return "http://static.flickr.com/" . $p['server'] . "/" . $p['id']."_". $p['secret'] . "_" . $size . "." . $ext;
}

// get the photo's page
function flickr_page_url($p, $uid){
	
	return "http://www.flickr.com/photos/".$uid."/". $p['id'] ."/";	
}

// get photos from the user's flickr, cache them if they have not already been cached
function displayFlickrPhotos($connection, $username) {
		// first, check if this user has any cached photos
		$query = "SELECT timestamp FROM flickr_photos WHERE authorFlickr = '" . $username . "'";
		$result = mysqli_query($connection, $query);
		$tc = mysqli_fetch_all($result, MYSQLI_ASSOC);

		// if they have any photos stored
		if (count($tc) > 0) {
			// check the timestamp
			$currentTime = time();
			$day = 86400; // number of seconds in a day, as we are comparing timestamps
			foreach($tc as $photo) {
				if ($currentTime - strtotime($photo['timestamp']) > $day) { // if this photo is older than a certain threshold
					// get all new photo if this is true for any
					fetchFlickrPhotos($connection, $username);
					break;
				}
			}
		} else {
			// if they have no photos, attempt to get some
			fetchFlickrPhotos($connection, $username);
		}

		// update all timestamps to current time so caching actually works
		//$query = "UPDATE flickr_photos SET timestamp=now() WHERE authorFlickr = '" . $username . "'";
	//	$result = mysqli_query($connection, $query);

		// get all photos for this user
		$query = "SELECT id, url, flickrUrl FROM flickr_photos WHERE authorFlickr = '" . $username . "' ORDER BY id DESC LIMIT 9";
		$result = mysqli_query($connection, $query);
		$flickrs = mysqli_fetch_all($result, MYSQLI_ASSOC);

		// display them, including a link back to the original photo
		echo "<div id='flickr'>";
		echo "<div id='photos'>";

		foreach($flickrs as $flickr) {
			?>
			<div class="flickrPhoto">
				<a href="<?php echo $flickr['flickrUrl']; ?>" target="_blank">
				<img src="<?php echo $flickr['url']; ?>" />
				</a>
			</div>
			<?php
		}

		echo "</div>";
		echo "<div id='flickrLink'>";
		echo "<a href='http://www.flickr.com/photos/" . fetchUid($username) . "'>View Flickr</a>";
		echo "</div>";
		echo "</div>";

}

// get the user id, as it differs from the actual username
function fetchUid($username) {
	$api_key = "4bd28bc802ab6db50eaa5bb426882f0f";

	$user_id = "";
	$flickr = urlencode($username);
	$url ="http://flickr.com/services/rest/?method=flickr.people.findByUsername"."&username=".$flickr."&api_key=".$api_key;
	// update all timestamps to current time so caching actually works
	//	$query = "UPDATE flickr_photos SET timestamp=now() WHERE authorFlickr = '" . $username . "'";
//		$result = mysqli_query($connection, $query);

	
	@$xml = simplexml_load_file($url);

	if (!$xml || !isset($xml)) { // if the connection failed and we couldn't load any images
		return false;
	} else {
		$user_id = $xml->user['nsid'];
		return $user_id;
	}
}

// fetch the photos from Flickr itself
function fetchFlickrPhotos($connection, $username) {
	$api_key = "4bd28bc802ab6db50eaa5bb426882f0f";

	$user_id = fetchUid($username);

	if ($user_id != false) {
		$link_option = 2;

		$url ="http://flickr.com/services/rest/?method=flickr.people.getPublicPhotos"."&user_id=".$user_id."&api_key=".$api_key . "&per_page=10&page=1";
		@$xml = simplexml_load_file($url);
		
		if (!$xml || !isset($xml)) { // if the connection failed and we couldn't load any images
			echo "Could not contact flickr";
			return false;
		} else {	
			cachePhotos($connection, $username, $xml);
			// update all timestamps to current time so caching actually works
		$query = "UPDATE flickr_photos SET timestamp=now() WHERE authorFlickr = '" . $username . "'";
		$result = mysqli_query($connection, $query);

	
		}
	} else {
		
		return false;
	}
}

// put any new photos into the database
function cachePhotos($connection, $username, $xml) {

	$perpage = $xml->photos['perpage'];
	$total = $xml->photos['total'];
	$pages = $xml->photos['pages'];
	$page = $xml->photos['page'];

	$photoNumber = 0;
	foreach($xml->photos->photo as $photo){	
		if ($photoNumber >= 9) { // only want to look at the first 9 photos Flickr gives us
			break;
		}

		// check if this image is not already in the database
		// if so, ignore it
		// if not, add it

		$query = "SELECT COUNT(id) FROM flickr_photos WHERE id = '" . $photo['id'] . "'";
		$result = mysqli_query($connection, $query);
		$photoCount = mysqli_fetch_array($result, MYSQLI_ASSOC);

		if ($photoCount['COUNT(id)'] == 0) { // if it is not yet in the database
			$query = "INSERT INTO flickr_photos (id, authorFlickr, url, flickrUrl) VALUES ('" . $photo['id'] . "', '" . $username . "', '" . photo_url($photo,'s') . "', '" . flickr_page_url($photo, fetchUid($username)) . "')";
			$result = mysqli_query($connection, $query);
		}

		$photoNumber++;
	}

	dropOldPhotos($connection, $username);

}

function dropOldPhotos($connection, $username) {
	$query = "SELECT COUNT(id) FROM flickr_photos WHERE authorFlickr = '" . $username . "'";
	$result = mysqli_query($connection, $query);
	$photoCount = mysqli_fetch_array($result, MYSQLI_ASSOC);

	if ($photoCount['COUNT(id)'] > 9) { // if we have more than can currently be displayed anyways, delete old ones
		$query = "DELETE FROM flickr_photos WHERE authorFlickr = '" . $username . "' AND id NOT IN (SELECT id FROM (SELECT id FROM flickr_photos WHERE authorFlickr = '" . $username . "' ORDER BY id DESC LIMIT 9)sub )";
		$result = mysqli_query($connection, $query);
	}
}

?>