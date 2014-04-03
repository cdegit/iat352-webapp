<?php
function aboutPage() {
?>

<article id="about">

<h1>{ Tutor } is a tool to help connect people who want to learn programming and those who want to teach it. </h1>

<p>
At { Tutor }, there are two things we love: learning things and sharing that knowledge with others. We love it so much that we made a whole website for it. 
{ Tutor } is a tool for sharing your knowledge about programming or computer science concepts, and learning from what others have shared. 
Sign up as a Contributor and write posts to share what you already know, or sign up as a Learner and follow Contributors and Topics to learn more about something. 
Or, just browse the posts by our current users and learn something new. How you use { Tutor } is up to you!
</p>

<br/>

<h2>Technical Details</h2>

<p>{ Tutor } is a PHP application running on top of an Apache server. It uses a MySQL database for data storage, plus a variety of other tools and techniques that help make it an easy and fun to use tool.</p>

<p>By using PHP's sessions, { Tutor } has a fairly robust user system - users can create accounts of two different types, and can log in and log out easily.</p>

<p>PHP isn't the only language { Tutor } employs; Javascript is also heavily used on the site. Javascript and JQuery are used to improve the appearance of the user's interactions with the site, 
	from the scaling search bar to the pop up login and registration menus. AJAX, or Asynchronous Javascript and XML, is used to get content from the server without refreshing the page, allowing for instant search and
	the automatic updating of tweets. 
</p>

<p>
Both the Twitter and Flickr APIs are used to allow Contributors to customize their profile page and share extra content on { Tutor }. 
REST calls are used to get information from these services, and then the returned XML or JSON is parsed and the content is displayed on the Contributor's profile and across the site. 
</p>


</article>

<?php
}
?>