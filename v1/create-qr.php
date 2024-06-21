<?php
require '../config/cors.php';
require '../config/database.php';

$input = json_decode(file_get_contents('php://input'), true);

$data = $input['data'];
$description = $input['description'];
$created_by = $input['created_by'];
$nombre_ref = $input['nombre_ref'];

$sql = "INSERT INTO qr_codes (data, description, created_by,nombre_ref) VALUES (?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);

if ($stmt->execute([$data, $description, $created_by,$nombre_ref])) {   
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['message' => 'Código QR creado exitosamente']);
} else {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['message' => 'Error al crear código QR']);
}
?>

