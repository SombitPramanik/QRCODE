<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'config.php';
require 'phpqrcode-2010100721_1.1.4/phpqrcode/qrlib.php';

$response = array(); // Create an array to store the response

if (isset($_POST['upi_submit'])) {
    $upi_id = $_POST['upi_id'];
    $f_name = $_POST['upi_first_name'];
    $l_name = $_POST['upi_last_name'];
    $amount = $_POST['upi_amount'];
    $user_name = $f_name . $l_name;

    $qr_data = "upi://pay?pa=" . ($upi_id) . "&pn=" . ($f_name) . "%20" . ($l_name) . "&mc=0000&tn=&am=" . ($amount) . "&cu=INR&tn=";
    $qrCodeFileName = "qr_img/Free/FreeQrcodeBySPP_TechnologiesUPI.png";

    // Generate QR code and display it
    QRcode::png($qr_data, $qrCodeFileName, QR_ECLEVEL_L, 10, 2);

    // Your database or other processing code goes here

    // Set the response status and message
    $response['status'] = 'success';
    $response['message'] = 'Form received successfully. QR code generated.';

    // You may also want to include additional data in the response
    // $response['additional_data'] = 'Some additional information';

    // Encode the response as JSON and print it
    echo json_encode($response);
}elseif (isset($_POST['text_submit'])) {
    $qr_data = $_POST['text'];    
    $qrCodeFileName = "qr_img/Free/FreeQrcodeBySPP_TechnologiesTEXT.png";

    // Generate QR code and display it
    QRcode::png($qr_data, $qrCodeFileName, QR_ECLEVEL_L, 10, 2);
    // Set the response status and message
    $response['status'] = 'success';
    $response['message'] = 'Form received successfully. QR code generated.';
    echo json_encode($response);

}elseif (isset($_POST['url_submit'])) {
    $qr_data = $_POST['url'];    
    $qrCodeFileName = "qr_img/Free/FreeQrcodeBySPP_TechnologiesURL.png";

    // Generate QR code and display it
    QRcode::png($qr_data, $qrCodeFileName, QR_ECLEVEL_L, 10, 2);
    
    // Set the response status and message
    $response['status'] = 'success';
    $response['message'] = 'Form received successfully. QR code generated.';
    echo json_encode($response);

}elseif (isset($_POST['wifi_submit'])) {
    $qr_data = $_POST['ssid'];    
    $qrCodeFileName = "qr_img/Free/FreeQrcodeBySPP_TechnologiesWIFI.png";

    // Generate QR code and display it
    QRcode::png($qr_data, $qrCodeFileName, QR_ECLEVEL_L, 10, 2);
    
    // Set the response status and message
    $response['status'] = 'success';
    $response['message'] = 'Form received successfully. QR code generated.';
    echo json_encode($response);

}else {
    // If the form wasn't submitted correctly
    $response['status'] = 'error';
    $response['message'] = 'Form submission failed.';
    // $response['message'] = $_POST; # This is for the debugging to see the send data over POST Request's

    echo json_encode($response);
}
?>
