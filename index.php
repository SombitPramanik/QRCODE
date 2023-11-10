<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/root.css">
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="stylesheet" href="CSS/light_home.css">
    <title>Login Page</title>
    <!-- Include your stylesheets, other meta tags, etc. -->
</head>

<body id="theme-switcher" class="light-theme">

    <!-- Your page content goes here -->
    <script src="JS/theme.js"></script>
    <script>
        // Create a div for the alert
        const alertDiv = document.createElement('div');
        alertDiv.style.position = 'fixed';
        alertDiv.style.top = '50%';
        alertDiv.style.left = '50%';
        alertDiv.style.transform = 'translate(-50%, -50%)';
        alertDiv.style.width = '50vh';
        alertDiv.style.height = '50vh';
        alertDiv.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
        alertDiv.style.color = 'darkgray';
        alertDiv.style.textAlign = 'center';
        alertDiv.style.padding = '20px';
        alertDiv.style.borderRadius = '10px';

        // Display a custom alert message with countdown
        let countdown = 10;
        alertDiv.innerHTML = `You are seeing this because we are building the login page. <b><i>This is the Free to use Limited Functional Page</i></b> Redirecting in ${countdown} seconds...<br> if you want to see Post login page click <a target="_blank" href="http://localhost/qrcode/PostLogIN.php">Hear</a><br>`;

        // Append the alert div to the body
        document.body.appendChild(alertDiv);

        // Countdown and redirect
        const countdownInterval = setInterval(function () {
            countdown--;
            alertDiv.innerHTML = `You are seeing this because we are building the login page. <b><i>This is the Free to use Limited Functional Page</i></b> Redirecting in ${countdown} seconds...<br> if you want to see Post login page click <a target="_blank" href="http://localhost/qrcode/PostLogIN.php">Hear</a><br>`;

            if (countdown === 0) {
                clearInterval(countdownInterval);
                window.location.href = "free.php";
            }
        }, 1000);
    </script>

</body>

</html>