<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

header("Content-Type: application/json");
require "config.php";

$headers = getallheaders();

if (!isset($headers['Authorization'])) {
    http_response_code(401);
    echo json_encode([
        "success" => false,
        "message" => "Token requerido"
    ]);
    exit();
}

$authHeader = $headers['Authorization'];
$arr = explode(" ", $authHeader);
$jwt = $arr[1];

try {
    $decoded = JWT::decode($jwt, new Key($secret_key, 'HS256'));

    echo json_encode([
        "success" => true,
        "message" => "Acceso autorizado",
        "user" => $decoded->data
    ]);

} catch (Exception $e) {
    http_response_code(403);
    echo json_encode([
        "success" => false,
        "message" => "Token inválido o expirado"
    ]);
}