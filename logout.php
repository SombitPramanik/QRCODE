<?php
session_start();

// Destroy the session token
unset($_SESSION['unique_token']);
session_destroy();

// Redirect to index.php
header("Location: index.php");
exit();
?>
