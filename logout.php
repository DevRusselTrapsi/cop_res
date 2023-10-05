<?php
session_start();

// Unset or clear the session variables
unset($_SESSION["user_id"]);
unset($_SESSION["email"]);
unset($_SESSION["fname"]);
// Destroy the session
session_destroy();

// Redirect to the login page or any other desired page
header("Location: index.php");
exit();
?>
