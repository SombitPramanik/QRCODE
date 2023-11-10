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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/root.css">
    <title>Log in to Gain Access</title>
    <style>
        /* body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        } */

        form {
            text-align: center;
            /* background-color: #fff; */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 50vw;
            height: 60vh;
            border: 2px dashed green;
            margin: 5% 50%;
            transform: translate(-50%);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
        }

        p {
            text-transform: capitalize;
        }
    </style>
</head>

<body id="theme-switcher" class="light-theme">
    <form method="POST" action="">
        <h1>Log IN to Gain Access</h1><br>
        <p>this is a basis from to validate the login system we working heard to make it better</p><br>
        <p>you don't need to create an account it is a test page just write your name and email</p><br><br>
        <label for="username">Username:</label>
        <input type="text" id="username" placeholder="Just write your name" name="username" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" placeholder="Just write your email" name="email" required><br>

        <input type="submit" name="submit" value="Submit">
    </form>

</body>
<script src="JS/theme.js"></script>

</html>