// AJAX Controller
// Will take some params for the particular request to be done

function ajaxReq(type, params, container) { // params is the rest of the request "&action=etc..."

	var xmlhttp;
	if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	} else { // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}

	// could also do switching on the php end but it's probably better to do it here
	switch(type) {

		case 1:
			// something something
			xmlhttp.open("GET", "ajaxTest.php?topic=" + params[0], true); // true for async
			break;

	}

	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
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
				document.getElementById("lessonsTagTitle").innerHTML = "Displaying Lessons from: " + capitaliseFirstLetter(params[0]);

				// doesn't give follow link if you don't go to actual page - fix this!!
			}

	    }	
	}

	//xmlhttp.open("GET", "file.name", true); // true for async
	xmlhttp.send();

	//return xmlhttp.responseText;

}

// From: http://stackoverflow.com/questions/1026069/capitalize-the-first-letter-of-string-in-javascript
function capitaliseFirstLetter(string)
{
    return string.charAt(0).toUpperCase() + string.slice(1);
}