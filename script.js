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
});