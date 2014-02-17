<?php

function displayError($message) {
	?>
	<article id="errorDisplay">
		<h1>Error!</h1>
		<h2><?php echo $message; ?></h2>
	</article>
	<?php
}

?>