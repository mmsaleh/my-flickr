<?php

// Inialize session
session_start();

// Delete certain session
unset($_SESSION['email']);
unset($_SESSION['password']);
// Delete all session variables
// session_destroy();

// Jump to login page
header('Location: login.php');

?>