<?php 
function drawHeader() {
	?>

<!DOCTYPE html>
<html>
	<head>
		<title>{ Tutor }</title>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js?ver=1.9.1"></script><!-- JQuery -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script><!-- JQuery UI -->
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
		<script type="text/javascript" src="script.js"></script>
	</head>
	<body>
		<div id="main">
			<header>

				<div id="logo"><a href="controller.php">{ Tutor }</a></div>

				<nav>
					<ul>
						<li><a href="controller.php?action=displaylessons&topic=all">Lessons</a></li>
						<li><a href="controller.php?action=displayusers&sort=name">Users</a></li>
					</ul>
				</nav>

				<!-- search bar here -->
				<div id="search"></div>
				
				<!-- login/register link -->
				<?php if(!isset($_SESSION['valid_user'])) { ?>
				<a href="#" id="openLoginButton" class="buttonLinks" >Login</a>
				<div id="login" class="authPopup">
					<h2>Login</h2>
					<a href="#" id="closeLoginButton">X</a>
					<div id="loginForm">
						<form name="login" action="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/cdegit/processLogin.php"?>" method="POST"><!-- Make https later -->
							<table>
								<tr>
									<td><label for="name">Username:</label></td>
									<td><input type="text" name="name" value="" required /></td>
								</tr>
								<tr>
									<td><label for="pass">Password:</label></td>
									<td><input type="password" name="pass" value="" required /></td>
								</tr>
						  	</table>
							<br />
							<input type="hidden" name="server" value="<?php echo $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI']; ?>" />
						  	<input type="submit" name="submit" id="loginButton" value="Login" />
						</form>
					</div>
				</div>

				<a href="#" id="openRegistrationButton" class="buttonLinks" >Register</a> <!-- Clicking will bring up registration -->
				<div id="registration" class="authPopup">
					<h2>Register</h2>
					<a href="#" id="closeRegistrationButton">X</a>
					<div id="registrationIntro">
						<p>How will you use { Tutor }?</p>
						<p>Contributors post Lessons about programming concepts, while Learners can read and track those Lessons. </p>
						<div id="registrationLinks"><a href="" id="registerContributor" class="buttonLinks">Contributor</a> <a href="" id="registerLearner" class="buttonLinks">Learner</a></div>
					</div>
					<div id="registrationForm">
						<form name="registration" action="<?php echo "https://" . $_SERVER['SERVER_NAME'] . "/cdegit/processRegistration.php"; ?>" method="POST">
							<table>
								<tr>
									<td><label for="name">Username:</label></td>
									<td><input type="text" name="name" value="" required /></td>
								</tr>
								<tr>
									<td><label for="email">Email:</label></td>
									<td><input type="email" name="email" value="" required /></td>
								</tr>
								<tr>
									<td><label for="pass">Password:</label></td>
									<td><input type="password" name="pass" value="" id="registerPassword" required /></td>
								</tr>
								<tr>
									<td><label for="confirmPass">Confirm Password:</label></td>
									<td><input type="password" name="confirmPass" value="" required /></td>
								</tr>
						  	</table>
						  	<input type="hidden" name="userType" id="userTypeInput" value="contributor" />
						  	<input type="hidden" name="server" value="<?php echo $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI']; ?>" />
							<br />
							<a href="" id="registrationBack" class="buttonLinks">Back</a>
						  	<input type="submit" name="submit" id="registerButton" value="Register" />
						</form>
					</div>
				</div>

				<?php } ?>
			</header>
			<?php 
			} 
			// footer.php will close all remaining open tags
			?>