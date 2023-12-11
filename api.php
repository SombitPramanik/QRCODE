<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'config.php';
require 'phpqrcode-2010100721_1.1.4/phpqrcode/qrlib.php';
$response = array(); // Create an array to store the response

function filename($authenticationToken)
{
    $salt = "SPPTechnologies";
    $name = substr(hash('sha256',$authenticationToken.$salt),0,6);    
    return $name;
}
function generateQRCode($data, $filename, $authenticationToken)
{

    $directoryPath = "P_IMG/$authenticationToken";

    if (!is_dir($directoryPath)) {
        mkdir($directoryPath, 0755, true);

        // Change ownership of the directory (www-data:www-data is a common web server user and group)
        chown($directoryPath, 'www-data');
        chgrp($directoryPath, 'www-data');
        $qrCodeFileName = "P_IMG/$authenticationToken/$filename.png";
        QRcode::png($data, $qrCodeFileName, QR_ECLEVEL_L, 10, 2);
        return $qrCodeFileName;
    } else {
        $qrCodeFileName = "P_IMG/$authenticationToken/$filename.png";
        QRcode::png($data, $qrCodeFileName, QR_ECLEVEL_L, 10, 2);
        return $qrCodeFileName;
    }
}


if (isset($_POST['upi'])) {
    $upi_id = $_POST['id'];
    $f_name = $_POST['first_name'];
    $l_name = $_POST['last_name'];
    $amount = $_POST['amount'];
    $authentication_token = $_POST['authentication_token'];
    $user_name = $f_name . $l_name;
    $qr_data = "upi://pay?pa=" . ($upi_id) . "&pn=" . ($f_name) . "%20" . ($l_name) . "&mc=0000&tn=&am=" . ($amount) . "&cu=INR&tn=";
    $filename = filename($authentication_token);

    $qrCodeFileName = generateQRCode($qr_data, $filename, $authentication_token);

    $response['status'] = 'success';
    $response['filename'] = $filename;
    $response['qrCodeFileName'] = $qrCodeFileName;
    echo json_encode($response);
} elseif (isset($_POST['text'])) {
    $qr_data = $_POST['text'];
    $authentication_token = $_POST['authentication_token'];
    $filename = filename($authentication_token);

    $qrCodeFileName = generateQRCode($qr_data, $filename, $authentication_token);

    $response['status'] = 'success';
    $response['filename'] = $filename;
    $response['qrCodeFileName'] = $qrCodeFileName;
    echo json_encode($response);
} elseif (isset($_POST['url'])) {
    $qr_data = $_POST['url'];
    $authentication_token = $_POST['authentication_token'];
    $filename = filename($authentication_token);

    $qrCodeFileName = generateQRCode($qr_data, $filename, $authentication_token);

    $response['status'] = 'success';
    $response['filename'] = $filename;
    $response['qrCodeFileName'] = $qrCodeFileName;
    echo json_encode($response);
} elseif (isset($_POST['wifi'])) {
    $ssid = $_POST['ssid'];
    $password = $_POST['password'];
    $auth_type = $_POST['encrypt'];
    $hidden_ssid = $_POST['net_typ'];
    $authentication_token = $_POST['authentication_token'];
    $qr_data = "WIFI:S:$ssid;T:$auth_type;P:$password;H:$hidden_ssid;;";
    $filename = filename($authentication_token);

    $qrCodeFileName = generateQRCode($qr_data, $filename, $authentication_token);

    $response['status'] = 'success';
    $response['filename'] = $filename;
    $response['qrCodeFileName'] = $qrCodeFileName;
    echo json_encode($response);
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid Request Received, Wrong Formate, Read the Documentation';
    echo json_encode($response);
}
?>