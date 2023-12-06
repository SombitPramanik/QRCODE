<?php
session_start();
require 'config.php';
require 'phpqrcode-2010100721_1.1.4/phpqrcode/qrlib.php';

// Check if the session token is not present
if (!isset($_SESSION['unique_token'])) {
    header('Location: login');
    exit();
} else {
    include 'HTML/PostLogIN.html';
    exit();
}
?>