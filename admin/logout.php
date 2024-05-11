<?php
// Start the session
session_start();

// Unset the session variable for username
unset($_SESSION["username"]);

// Redirect to login.php
header("Location: login.php");

// Exit the script
exit;
?>
