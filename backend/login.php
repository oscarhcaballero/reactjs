<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");


$users = [
    ['email' => 'test@hotmail.com', 'password' => '12345'],
];

//var_dump($users);

$data = json_decode(file_get_contents('php://input'), true);

//var_dump($data);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $data['email'];
    $password = $data['password'];

    foreach ($users as $user) {
        if ($user['email'] === $email && $user['password'] === $password) {
            echo json_encode(['status' => 'success', 'token' => base64_encode($email)]);
            exit;
        }
    }

    echo json_encode(['status' => 'error', 'message' => 'Invalid email or password']);
}
?>
