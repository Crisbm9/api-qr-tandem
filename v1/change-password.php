<?php
require '../config/cors.php';
require '../config/database.php';

$input = json_decode(file_get_contents('php://input'), true);

$email = $input['email'];
$password = $input['password'];

$sql = "UPDATE users SET password = ? WHERE email = ?";
$stmt = $pdo->prepare($sql);

if ($stmt->execute([$password, $email])) {
  header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['message' => 'Contraseña cambiada exitosamente']);
} else {
  header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['message' => 'Error al cambiar Contraseña']);
}
?>