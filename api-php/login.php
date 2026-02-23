<?php

use Firebase\JWT\JWT;

header("Content-Type: application/json");
require "config.php";

$data = json_decode(file_get_contents("php://input"));

if (!isset($data->username) || !isset($data->password)) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "Usuario y contraseña requeridos"
    ]);
    exit();
}

if ($data->username === "admin" && $data->password === "1234") {

    $payload = [
        "iat" => time(),
        "exp" => time() + 3600,
        "data" => [
            "username" => $data->username
        ]
    ];

    $jwt = JWT::encode($payload, $secret_key, 'HS256');

    echo json_encode([
        "success" => true,
        "token" => $jwt
    ]);

} else {
    http_response_code(401);
    echo json_encode([
        "success" => false,
        "message" => "Credenciales inválidas"
    ]);
}