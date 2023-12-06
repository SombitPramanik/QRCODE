<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'config.php';
require 'phpqrcode-2010100721_1.1.4/phpqrcode/qrlib.php';

$response = array(); // Create an array to store the response

function generateQRCode($data, $filename, $authenticationToken) {
    $qrCodeFileName = "API_IMG/$authenticationToken/$filename.png";
    QRcode::png($data, $qrCodeFileName, QR_ECLEVEL_L, 10, 2);
    return $qrCodeFileName;
}

if(isset($_POST['p_upi_submit'])) {
    $upi_id = $_POST['upi_id'];
    $f_name = $_POST['upi_first_name'];
    $l_name = $_POST['upi_last_name'];
    $amount = $_POST['upi_amount'];
    $filename = $_POST['filename'];
    $authentication_token = $_POST['authentication_token'];
    $user_name = $f_name.$l_name;
    $qr_data = "upi://pay?pa=".($upi_id)."&pn=".($f_name)."%20".($l_name)."&mc=0000&tn=&am=".($amount)."&cu=INR&tn=";

    $qrCodeFileName = generateQRCode($qr_data, $filename, $authentication_token);

    $response['status'] = 'success';
    $response['filename'] = $filename;
    $response['qrCodeFileName'] = $qrCodeFileName;
    echo json_encode($response);
} elseif(isset($_POST['p_text_submit'])) {
    $qr_data = $_POST['text'];
    $filename = $_POST['filename'];
    $authentication_token = $_POST['authentication_token'];

    $qrCodeFileName = generateQRCode($qr_data, $filename, $authentication_token);

    $response['status'] = 'success';
    $response['filename'] = $filename;
    $response['qrCodeFileName'] = $qrCodeFileName;
    echo json_encode($response);
} elseif(isset($_POST['p_url_submit'])) {
    $qr_data = $_POST['url'];
    $filename = $_POST['filename'];
    $authentication_token = $_POST['authentication_token'];

    $qrCodeFileName = generateQRCode($qr_data, $filename, $authentication_token);

    $response['status'] = 'success';
    $response['filename'] = $filename;
    $response['qrCodeFileName'] = $qrCodeFileName;
    echo json_encode($response);
} elseif(isset($_POST['p_wifi_submit'])) {
    $ssid = $_POST['ssid'];
    $password = $_POST['password'];
    $auth_type = $_POST['encrypt'];
    $hidden_ssid = $_POST['net_typ'];
    $filename = $_POST['filename'];
    $authentication_token = $_POST['authentication_token'];
    $qr_data = "WIFI:S:$ssid;T:$auth_type;P:$password;H:$hidden_ssid;;";

    $qrCodeFileName = generateQRCode($qr_data, $filename, $authentication_token);

    $response['status'] = 'success';
    $response['filename'] = $filename;
    $response['qrCodeFileName'] = $qrCodeFileName;
    echo json_encode($response);
} else {
    $response['status'] = 'error';
    $response['message'] = 'Form submission failed.';
    echo json_encode($response);
}
?>