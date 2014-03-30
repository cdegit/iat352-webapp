// AJAX Controller
// Will take some params for the particular request to be done

function ajaxReq(type, params, container) { 

	var xmlhttp;
	if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	} else { // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}

	switch(type) {

		case 1:
			xmlhttp.open("GET", "ajaxPosts.php?topic=" + encodeURIComponent(params[0]), true); // true for async

			xmlhttp.onreadystatechange=function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					updatePosts(container, xmlhttp, params);
				}
			}
			break;

		case 2:
			xmlhttp.open("GET", "search.php?query=" + params[0], true);
			xmlhttp.onreadystatechange=function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					searchPosts(container, xmlhttp, params);
				}
			}
			break;

		case 3: // tweets
			xmlhttp.open("GET", "ajaxTweets.php?user=" + params[0] + "&time=" + params[1], true);
			xmlhttp.onreadystatechange=function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					updateTweets(container, xmlhttp, params);

				}
			}
			break;

		case 4: // public tweets
			// very very similar to normally getting tweets
			xmlhttp.open("GET", "ajaxPublicTweets.php?topic=" + params[0], true);
			xmlhttp.onreadystatechange=function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					publicTweets(container, xmlhttp, params);
				}
			}
			break;
							
	}

	xmlhttp.send();

}

function updatePosts(container, xmlhttp, params) {
	$("#" + container).fadeOut("fast", function() {
		document.getElementById(container).innerHTML = "";

		// prase XML response here
		
		var xml = xmlhttp.responseText;

		if (window.DOMParser)
		{
			parser=new DOMParser();
			xmlDoc=parser.parseFromString(xml,"text/xml");
		}
		else // Internet Explorer
		{
			xmlDoc=new ActiveXObject("Microsoft.XMLDOM");
			xmlDoc.async=false;
			xmlDoc.loadXML(xml);
		}
		
		var posts = xmlDoc.getElementsByTagName("post");

		for(i = 0; i < posts.length; i++) {
			var post = document.createElement("article");
			post.className = "lesson";

			// images
			var postImg = document.createElement("img");
			postImg.src = "http://placehold.it/275x100";
			postImg.className = "lessonImage";
			postImg.alt = "Placeholder for Lesson Image";
			post.appendChild(postImg);

			var userImg = document.createElement("img");
			userImg.src = "http://placehold.it/60x60";
			userImg.className = "authorImage";
			userImg.alt = "Author Icon";
			post.appendChild(userImg);

			var author = document.createElement("h2");
			author.className = "lessonAuthor";
			post.appendChild(author);

			var authorLink = document.createElement("a");
			authorLink.href = "controller.php?action=user&name=" + posts[i].getAttributeNode("author").nodeValue;
			authorLink.innerHTML = capitaliseFirstLetter(posts[i].getAttributeNode("author").nodeValue);
			author.appendChild(authorLink);

			var title = document.createElement("h1");
			title.className = "lessonTitle";
			post.appendChild(title);

			var titleLink = document.createElement("a");
			titleLink.href = "controller.php?action=lesson&id=" + posts[i].getAttributeNode("id").nodeValue;
			titleLink.innerHTML = posts[i].childNodes[0].textContent;
			title.appendChild(titleLink);

			var excerpt = document.createElement("p");
			excerpt.className = "lessonExcerpt";
			var content = posts[i].childNodes[1].textContent;

			if (content.length > 383) {
				content = content.substring(0, 380);
				content += "...";
			} else {
				content = content.substring(0, 380);
			}
			excerpt.innerHTML = content; // need to make shorter
			post.appendChild(excerpt);

			
			var topics = document.createElement("div");
			topics.className = "lessonTopics";
			post.appendChild(topics);

			var t = posts[i].getElementsByTagName("topic");
			for(var j = 0; j < t.length; j++) {
				var topic = document.createElement("a");
				topic.href = "controller.php?action=displaylessons&topic=" + t[j].textContent;
				topic.innerHTML = capitaliseFirstLetter(t[j].textContent);
				topics.appendChild(topic);

				if (j != t.length - 1 ) {
					topics.innerHTML += " | ";
				}
			}


			document.getElementById(container).appendChild(post);
		}

		document.getElementById("lessonsTagTitle").innerHTML = "Displaying Lessons from: " + capitaliseFirstLetter(params[0]);

		var x = xmlDoc.getElementsByTagName("posts");
		var following = x[0].getAttributeNode("following");
		
		document.getElementById("followSetting").innerHTML = "";

		if (following.nodeValue != -1) {
			var followLink = document.createElement("a");
			if (following.nodeValue == 0) { // display follow message
				followLink.href = "processFollowTopic.php?follow=" + encodeURIComponent(params[0].toLowerCase());
				followLink.innerHTML = "Follow Topic";

			} else if (following.nodeValue == 1) { // display unfollow message
				followLink.href = "processUnfollowTopic.php?unfollow=" + encodeURIComponent(params[0].toLowerCase());
				followLink.innerHTML = "Unfollow Topic";
				
			}
			followLink.id = "followTopicLink";
			document.getElementById("followSetting").appendChild(followLink);
		}

		// if not all, do this and check if we need to display follow
		// have another php script for that??
		// or maybe include that in the XML response??


		$("#" + container).fadeIn("fast");
	});
}

function searchPosts(container, xmlhttp, params) {
	if(params[0] == "") {
		$("#searchResults").hide("fast");
		return;
	}

	document.getElementById(container).innerHTML = "";

	var xml = xmlhttp.responseText;

	if (window.DOMParser)
	{
		parser=new DOMParser();
		xmlDoc=parser.parseFromString(xml,"text/xml");
	}
	else // Internet Explorer
	{
		xmlDoc=new ActiveXObject("Microsoft.XMLDOM");
		xmlDoc.async=false;
		xmlDoc.loadXML(xml);
	}
	
	var posts = xmlDoc.getElementsByTagName("post");
	var list = document.createElement("ul");

	for(i = 0; i < posts.length; i++) {
		var post = document.createElement("li");
		
		var title = document.createElement("a");
		title.className = "searchTitle";
		title.href = "controller.php?action=lesson&id=" + posts[i].getAttributeNode("id").nodeValue;
		title.innerHTML = posts[i].childNodes[0].textContent;
		post.appendChild(title);

		var authorLink = document.createElement("a");
		authorLink.className = "searchAuthor";
		authorLink.href = "controller.php?action=user&name=" + posts[i].getAttributeNode("author").nodeValue;
		authorLink.innerHTML = "By " + capitaliseFirstLetter(posts[i].getAttributeNode("author").nodeValue);
		post.appendChild(authorLink);

		list.appendChild(post);
	}

	if (posts.length == 0) {
		var error = document.createElement("p");
		error.innerHTML = "No Results";
		document.getElementById(container).appendChild(error);
	} else {
		document.getElementById(container).appendChild(list);
	}

	$("#searchResults").show("fast");
}

function updateTweets(container, xmlhttp, params) {
	var xml = xmlhttp.responseText;

	if (window.DOMParser)
	{
		parser=new DOMParser();
		xmlDoc=parser.parseFromString(xml,"text/xml");
	}
	else // Internet Explorer
	{
		xmlDoc=new ActiveXObject("Microsoft.XMLDOM");
		xmlDoc.async=false;
		xmlDoc.loadXML(xml);
	}
	
	var tweets = xmlDoc.getElementsByTagName("tweet");

	for(i = 0; i < tweets.length; i++) {
		var tweet = document.createElement("div");
		tweet.className = "tweet";
		

		var content = document.createElement("p");
		content.innerHTML = tweets[i].childNodes[0].textContent;
		tweet.appendChild(content);

		var t = tweets[i].getElementsByTagName("topic");
		
		if (t.length > 0) {
			var tweetTopics = document.createElement("div");
			tweetTopics.className = "tweetTopics";
			tweet.appendChild(tweetTopics);

			for(var j = 0; j < t.length; j++) {
				var topic = document.createElement("a");
				topic.href = "controller.php?action=displaylessons&topic=" + t[j].textContent;
				topic.innerHTML = capitaliseFirstLetter(t[j].textContent);
				tweetTopics.appendChild(topic);

				if (j != t.length - 1 ) {
					tweetTopics.innerHTML += " | ";
				}
			}
		}

		tweet.className = "tweet newTweet";
		
		var c = document.getElementById(container);
		c.insertBefore(tweet, c.firstChild);
		$(".newTweet").hide();
		$(".newTweet").slideDown("fast");

		$(".newTweet").className = "tweet";


	}	
}

function publicTweets(container, xmlhttp, params) {
	var c = document.getElementById(container);
	c.innerHTML = "";

	var xml = xmlhttp.responseText;

	if (window.DOMParser)
	{
		parser=new DOMParser();
		xmlDoc=parser.parseFromString(xml,"text/xml");
	}
	else // Internet Explorer
	{
		xmlDoc=new ActiveXObject("Microsoft.XMLDOM");
		xmlDoc.async=false;
		xmlDoc.loadXML(xml);
	}
	
	var tweets = xmlDoc.getElementsByTagName("tweet");

	for(i = 0; i < tweets.length; i++) {
		var tweet = document.createElement("div");
		tweet.className = "tweet";

		var authors = document.createElement("h4");

		var author = document.createElement("a");
		author.href = "controller.php?action=user&name=" + tweets[i].getAttributeNode("author").nodeValue;
		author.innerHTML = tweets[i].getAttributeNode("author").nodeValue; 
		authors.appendChild(author);

		authors.innerHTML = authors.innerHTML + " | ";

		var authorTwitter = document.createElement("a");
		authorTwitter.href = "https://twitter.com/" + tweets[i].getAttributeNode("authorTwitter").nodeValue;
		authorTwitter.innerHTML = "@" + tweets[i].getAttributeNode("authorTwitter").nodeValue;
		authors.appendChild(authorTwitter);

		authors.innerHTML = authors.innerHTML + ":";

		tweet.appendChild(authors);
		

		var content = document.createElement("p");
		content.innerHTML = tweets[i].childNodes[0].textContent;
		tweet.appendChild(content);

		var t = tweets[i].getElementsByTagName("topic");
		
		if (t.length > 0) {
			var tweetTopics = document.createElement("div");
			tweetTopics.className = "tweetTopics";
			tweet.appendChild(tweetTopics);

			for(var j = 0; j < t.length; j++) {
				var topic = document.createElement("a");
				topic.href = "controller.php?action=displaylessons&topic=" + t[j].textContent;
				topic.innerHTML = capitaliseFirstLetter(t[j].textContent);
				tweetTopics.appendChild(topic);

				if (j != t.length - 1 ) {
					tweetTopics.innerHTML += " | ";
				}
			}
		}

		
		var c = document.getElementById(container);
		c.appendChild(tweet);

	}	
}

// From: http://stackoverflow.com/questions/1026069/capitalize-the-first-letter-of-string-in-javascript
function capitaliseFirstLetter(string)
{
    return string.charAt(0).toUpperCase() + string.slice(1);
}