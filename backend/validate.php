<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

$data = json_decode(file_get_contents('php://input'), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $data['token'];

    if (base64_decode($token)) {
        echo json_encode(['status' => 'success', 'message' => 'Token is valid']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid token']);
    }
}
?>
