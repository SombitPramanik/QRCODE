<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'config.php';


function generateRandomString($length) {
    $characters = '${Ac@R*0nzABCD21#E49FGU}H^I!bc78\de4fg6KT0LM60N0ep4wPQk7l3m7n5RSxlVLij2JXY?G6aZ39"3)Bd%Z]SQ^d/SP4{tWTPqr9stu2vW1xy0z4';
    $randomString = '';

    for($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}

if(isset($_POST["submit"])) {
    $first_name = $_POST["f_name"];
    $last_name = $_POST["l_name"];
    $email = $_POST["email"];
    $mobile = $_POST["m_num"];
    $password = $_POST["password"];
    $c_password = $_POST["c_password"];
    $ac_type = $_POST["ac_type"];

    // Check if the email is already taken
    $duplicate = mysqli_query($conn, "SELECT * FROM normal_user WHERE email = '$email'");

    if(mysqli_num_rows($duplicate) > 0) {
        $error_message = "Email and User Name is Already Taken\nUse Another One";
        echo "<script>alert(".json_encode($error_message).");</script>";
    } else {
        if($password == $c_password) {
            $total_request = 0;
            $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
            $rawString = $email;
            $salt = "SPPTechnologies";
            $hashedString = md5($rawString.$salt);
            $random_key = generateRandomString(40);
            $key = hash('sha256', $hashedString.$rawString.$random_key);
            $secure_key = substr($key, 0, 15);
            // Insert user data into the database
            $unique_token = substr(hash('sha256', $email.$hashed_password), 0, 30);
            $_SESSION['unique_token'] = $unique_token;
            $invalid_prefixes = array('1234', '3214', '2341', '4321', '0000');

            // Mobile number verification
            if(is_numeric($mobile) && strlen($mobile) === 10 && !in_array(substr($mobile, 0, 4), $invalid_prefixes)) {
                $directoryPath = "P_IMG/$secure_key";
                if($ac_type == 'Stater') {
                    $total_request = 0;
                    $maxRequest = 20;
                } elseif($ac_type == 'Premium') {
                    $total_request = 0;
                    $maxRequest = 200;
                } elseif($ac_type == 'Business') {
                    $total_request = 0;
                    $maxRequest = 1000;
                }

                if(!is_dir($directoryPath)) {
                    mkdir($directoryPath, 0755, true);

                    // Change ownership of the directory (www-data:www-data is a common web server user and group)
                    chown($directoryPath, 'www-data');
                    chgrp($directoryPath, 'www-data');

                    // Execute the query
                    $query = "INSERT INTO normal_user (first_name, last_name, email, password, mobile, account_type, authentication_token, total_request, max_request) VALUES ('$first_name', '$last_name', '$email', '$hashed_password', '$mobile', '$ac_type', '$secure_key', '$total_request', '$maxRequest')";

                    if(mysqli_query($conn, $query)) {
                        $error_message = "Registration successful! Your username is $email. Redirecting in 3 seconds";
                        echo "<script>alert(".json_encode($error_message).");</script>";
                        echo "<script>setTimeout(function() { window.location.href = 'PostLogIN'; }, 3000);</script>";
                        exit();
                    } else {
                        $error_message = "Error inserting data into the database";
                        echo "<script>alert(".json_encode($error_message).");</script>";
                    }
                } else {
                    $error_message = "User already registered";
                    echo "<script>alert(".json_encode($error_message).");</script>";
                }
            } else {
                $error_message = "Invalid mobile number";
                echo "<script>alert(".json_encode($error_message).");</script>";
            }
        } else {
            $error_message = "Password Does Not Match. Please Try again";
            echo "<script>alert(".json_encode($error_message).");</script>";
        }
    }
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
    <meta name="subtitle" content="Create QR Code for free">
    <meta name="description"
        content="QR Code Generator for PDF, URL, WiFi, and more. Add logo, colors, frames, and download in high print quality, Free QR code generator by SPP Technologies">
    <meta name="keywords" content="QR code, generator, free, online, contact, website, URL, business card">
    <meta name="author" content="SPP Technologies">

    <!-- Favicon -->
    <link rel="icon" href="logo/logo.png" type="image/x-icon">

    <!-- Open Graph Meta Tags for Social Sharing -->
    <meta property="og:title" content="QR Code Generator | Create Your Free QR Codes">
    <meta name="og:description"
        content="QR Code Generator for PDF, URL, WiFi, and more. Add logo, colors, frames, and download in high print quality, Free QR code generator by SPP Technologies">
    <meta property="og:type" content="website">
    <meta property="og:image" content="logo/logo.png">
    <meta property="og:url" content="https://theqrcode.site">
    <link rel="stylesheet" href="CSS/root.css">
    <link rel="stylesheet" href="CSS/login.css">
    <!-- <link rel="stylesheet" href="CSS/home.css"> -->
    <title>SPP Technologies Registration System</title>
    <style>
        select {
            border-radius: 10px;
            width: 90%;
            height: 30px;
            padding: 5px 10px;
            text-align: center;

        }
    </style>
</head>

<body id="theme-switcher" class="light-theme">
    <form method="POST" action="">
        <h1>Create an Account</h1><br>
        <label for="f_name">First Name:</label><br>
        <input type="text" id="f_name" placeholder="Enter your First Name" name="f_name" required><br>
        <label for="l_name">Last Name:</label><br>
        <input type="text" id="l_name" placeholder="Enter your Last Name" name="l_name" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" autocomplete="email" placeholder="Enter your Email" name="email" required><br>
        <label for="m_num">Mobile Number:</label><br>
        <input type="tel" id="m_num" placeholder="Enter your Mobile Number" name="m_num" required><br>
        <label for="password">Password:</label><br>
        <input type="password" autocomplete="new-password" id="password" placeholder="Enter your Password"
            name="password" required><br>
        <label for="c_password">Confirm Password:</label><br>
        <input type="password" autocomplete="new-password" id="c_password" placeholder="Confirm your Password"
            name="c_password" required><br>
        <label for="ac_type">Account Type:</label><br>
        <select id="ac_type" name="ac_type" required>
            <option value="Starter">Starter</option>
            <option value="Premium">Premium</option>
            <option value="Business">Business</option>
            <!-- Add more account types if needed -->
        </select><br>

        <input type="submit" name="submit" value="Register" class="submit_btn">
        <p>Already have an account? <a href="login.php">Login here.</a></p>
    </form>

</body>
<script src="JS/theme.js"></script>

</html>