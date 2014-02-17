<?php 
session_start();
session_destroy();

// Redirect back to homepage
$url = 'controller.php';
header('Location: ' . $url);
?>