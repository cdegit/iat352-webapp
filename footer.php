<?php

// Draws the userbar if a user is currently logged in
// The contents of the userbar differ depending on user type
// Closes the tags opened in header.php
function drawFooter() {
	?>

		</div><!-- main -->

		<?php if (isset($_SESSION['valid_user'])) { ?>
		<div id = "userbar">
			<div id = "userbarInfo">
				<img src="http://placehold.it/120x120" alt="user's icon" />
				<h2>
					<?php if ($_SESSION['user_type'] == "contributor") { ?>
						<a href="controller.php?action=user&name=<?php echo $_SESSION['valid_user']; ?>"><?php echo ucwords($_SESSION['valid_user']); ?></a>
					<?php } else { ?>
						<?php echo ucwords($_SESSION['valid_user']); ?>
					<?php } ?>
				</h2>
			</div>
			<div id = "userbarLinks">
				<?php if ($_SESSION['user_type'] == "learner") { ?>
					<h3><a href="controller.php?action=dashboard">Dashboard</a></h3>
				<?php } ?>
				<?php if ($_SESSION['user_type'] == "contributor") { ?>
					<h3><a href="controller.php?action=editprofile">Edit Profile</a></h3>
					<h3><a href="controller.php?action=newpost">Create New Lesson</a></h3>
				<?php } ?>
				<h3><a href="controller.php?action=usersettings">Settings</a></h3>
				<h3><a href="processLogout.php">Logout</a></h3>
			</div>
		</div>
		<?php } ?>
	</body>
</html>
<?php } ?>