$(document).ready(function() {

	$("#registration").css("left", $( window ).width() / 2 - $( "#registration" ).width() / 2);
	$("#registration").css("top", $( window ).height() / 2 - $( "#registration" ).height());

	$("#login").css("left", $( window ).width() / 2 - $( "#login" ).width() / 2);
	$("#login").css("top", $( window ).height() / 2 - $( "#login" ).height());

	// Add click handlers for registration links
	$("#registerContributor").click(function(event) {
		event.preventDefault();
		
		// show registration form and hide previous text
		$("#registrationForm").show();
		$("#registrationIntro").hide();

		$("#registration h2").html("Register as Contributor");
		$("#userTypeInput").attr("value", "contributor");
	});

	$("#registerLearner").click(function(event) {
		event.preventDefault();
		
		// show registration form and hide previous text
		$("#registrationForm").show();
		$("#registrationIntro").hide();

		$("#registration h2").html("Register as Learner");
		$("#userTypeInput").attr("value", "learner");
	});

	$("#registrationBack").click(function(event) {
		event.preventDefault();
		
		// go back to preregistration text so user can change their type
		$("#registrationIntro").show();
		$("#registrationForm").hide();

		$("#registration h2").html("Register");
	});

	$("#openRegistrationButton").click(function(event) {
		event.preventDefault();
		$("#registration").show();
	});

	$("#closeRegistrationButton").click(function(event) {
		event.preventDefault();
		$("#registration").hide();
	});

	$("#openLoginButton").click(function(event) {
		event.preventDefault();
		$("#login").show();
	});	

	$("#closeLoginButton").click(function(event) {
		event.preventDefault();
		$("#login").hide();
	});

	$(".topicCategory").click(function(event) {
		$(this).children("ul").slideToggle();
	});


	// animate expansion and collapsing of the search bar
	$("#search input").focus(function() {
		$(this).animate({width: "150px"}, 500);
	});

	$("#search input").focusout(function() {
		$(this).animate({width: "20px"}, 500);
	})

	// check to make sure that the two passwords match before allowing the form to be processed
	$("#registerButton").click(function(event) {
		var pass1 = document.forms["registration"]["pass"].value;
		var pass2 = document.forms["registration"]["confirmPass"].value;

		var password = document.getElementById("registerPassword");
		if (pass1 != pass2) {
			password.setCustomValidity("The passwords you have provided do not match.");
		} else {
			password.setCustomValidity('');
		}
	});

	// display tooltips for form elements, if there
	$( document ).tooltip();




	// AJAX Callers

	// Switch topic when viewing posts
	$(".dropdownTopics li a").click(function(event) {
		event.preventDefault();
		var params = new Array();
		params[0] = $(this).html();
		ajaxReq(1, params, "lessonsSet");
		ajaxReq(4, params, "tweetSet");
	});

	// Search
	$("#search input").bind("change paste keyup", function() {
		var params = new Array();
		params[0] = $(this).val();
		ajaxReq(2, params, "searchResults");
	});

	// get new tweets if on a user's profile
	var time = Math.round(Date.now() / 1000);

	if ($("#userBio").length) {
		// if we're on a user's bio
		if ($("#userTweets").length) { // if this user actually has tweets enabled
			window.setInterval(function(){
		  		var params = new Array();
		  		var name = $("#userStats h1").html();
				params[0] = name.toLowerCase();
				params[1] = time;
				ajaxReq(3, params, "tweetContainer");
				time = Math.round(Date.now() / 1000);
			}, 30000); // check every 30 seconds. This is fairly frequent, but doesn't exceed Twitter's API limits. 
		}
	}

});