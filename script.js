$(document).ready(function() {

	$("#registration").css("left", $( document ).width() / 2 - $( "#registration" ).width() / 2);
	$("#registration").css("top", $( document ).height() / 2 - $( "#registration" ).height());

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

	$(".topicCategory").click(function(event) {
		$(this).children("ul").slideToggle();
	});
});