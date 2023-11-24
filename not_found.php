<?php
require 'config.php';

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON data from the request body
    $json_data = file_get_contents('php://input');

    // Decode the JSON data
    $data = json_decode($json_data, true);

    // Check if the 'question' key exists in the decoded data
    if (isset($data['question'])) {
        // Ensure that the variables are strings
        $question = is_string($data['question']) ? mysqli_real_escape_string($conn, $data['question']) : '';
        // Check if the 'email' key exists in the decoded data
        $email = isset($data['email']) && is_string($data['email']) ? mysqli_real_escape_string($conn, $data['email']) : '';

        // Insert the question and email into the database
        $sql = "INSERT INTO probleam (question, email) VALUES ('$question', '$email')";

        if (mysqli_query($conn, $sql)) {
            // If the insertion is successful, send a JSON response
            $response = [
                'status' => 'success',
                'message' => 'Question and email stored in the database successfully.'
            ];
            echo json_encode($response);
        } else {
            // If there's an error in the insertion, send an error JSON response
            $response = [
                'status' => 'error',
                'message' => 'Error storing question and email in the database: ' . mysqli_error($conn)
            ];
            echo json_encode($response);
        }
    } else {
        // If the 'question' key is not present in the JSON data, send an error JSON response
        $response = [
            'status' => 'error',
            'message' => 'Invalid JSON data. Missing question key.'
        ];
        echo json_encode($response);
    }
} else {
    // If the request is not a POST request, send an error JSON response
    $response = [
        'status' => 'error',
        'message' => 'Invalid request method. Expected POST request.'
    ];
    echo json_encode($response);
}

// Close the database connection
mysqli_close($conn);
?>
