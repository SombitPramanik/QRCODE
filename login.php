<?php
session_start();

// Check if the session token is not present
if (!isset($_SESSION['SPWSTestSession'])) {
    if (isset($_POST["submit"])) {
        // Retrieve user input from $_POST
        $username = $_POST["username"];
        $email = $_POST["email"];
        $token = 'SPWSTestSession';
        $_SESSION['SPWSTestSession'] = $token;
        header("Location: PostLogIN.php");
        exit();
    }
} else {
    header("Location: PostLogIN.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono&display=swap" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono&display=swap">
    </noscript>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/root.css">
    <link rel="stylesheet" href="CSS/login.css">
    <title>SPP Technologies Login System</title>
</head>

<body id="theme-switcher" class="light-theme">
    <form method="POST" action="">
        <h1>Sorry :( we don't Found any Session Token in your System</h1><br>
        <p>Please Provide Some Information to Load the Beauties</p><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" autocomplete="email" placeholder="Just write your email" name="email" required><br>
        <label for="password">password:</label><br>
        <input type="password" autocomplete="new-password" id="password" placeholder="Just write your Password" name="username" required><br>


        <input type="submit" name="submit" value="Login" class="submit_btn">
        <p></p>Don't Have an Account :( Just <a target="_blank" href="signup.php">Create One.</a> <br><br>
    </form>

</body>
<script src="JS/theme.js"></script>

</html>