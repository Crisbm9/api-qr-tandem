<?php
require '../config/database.php';
require '../config/cors.php';

$input = json_decode(file_get_contents('php://input'), true);

$id = $input['id'];
$data = $input['data'];
$nombre_ref = $input['nombre_ref'];
$description = $input['description'];

$sql = "UPDATE qr_codes SET data = ?, description = ?, nombre_ref = ? WHERE id = ?";
$stmt = $pdo->prepare($sql);

if ($stmt->execute([$data, $description, $id, $nombre_ref])) {
    echo json_encode(['message' => 'Código QR actualizado exitosamente']);
    header('Content-Type: application/json; charset=utf-8');
} else {
    echo json_encode(['message' => 'Error al actualizar código QR']);
    header('Content-Type: application/json; charset=utf-8');
}
?>

