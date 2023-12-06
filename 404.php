<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <link rel="icon" href="logo/logo.png" type="image/x-icon">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            padding: 50px;
            background-color: #f8f9fa;
            color: #495057;
        }

        h1 {
            color: #dc3545;
            font-size: 3rem;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.25rem;
            margin-bottom: 30px;
        }

        a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        form {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .thank-you-container {
            display: none;
            background-color: #4caf50;
            color: #fff;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            margin-top: 20px;
        }

        @media (max-width: 600px) {
            form {
                width: 80%;
            }
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            p {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <h1>404 Not Found</h1>
    <p>Sorry :( We are Not Able to Serve your Requested URL at this point. <br> we will Happy to Help you if you have
        any Questions, Let us Know <br></p>
    <form id="contactForm">
        <label for="question">Tell us What is your Problem</label>
        <input type="text" id="question" name="question" autofocus><br>
        <label for="email">Email</label>
        <input type="email" id="email" name="email"><br>
        <button type="button" onclick="submitForm()">Help ME</button>
    </form>
    <div class="thank-you-container" id="thankYouContainer">
        <h2>Thank You for Contacting Us!</h2>
        <p>We appreciate your message and will get back to you shortly.</p>
    </div>
    <p>Return to <a href="/">Home</a>.</p>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        function submitForm() {
            document.getElementById('contactForm').style.display = 'none';
            document.getElementById('thankYouContainer').style.display = 'block';
            var question = $('#question').val();
            var email = $('#email').val();

            // Perform Ajax request using jQuery
            $.ajax({
                url: 'not_found.php',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({ question: question, email: email }),
                success: function (data) {
                    // Handle the response, you can update UI or show a thank-you message
                    console.log(data);
                    $('#contactForm').hide();
                    $('#thankYouContainer').show();
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });

        }
    </script>

</body>

</html>