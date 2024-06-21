<?php
require '../config/cors.php';
require '../config/database.php';

$input = json_decode(file_get_contents('php://input'), true);

$id = $input['id'];

$sql = "DELETE FROM qr_codes WHERE id = ?";
$stmt = $pdo->prepare($sql);

if ($stmt->execute([$id])) {
    echo json_encode(['message' => 'Código QR eliminado exitosamente']);
} else {
    echo json_encode(['message' => 'Error al eliminar código QR']);
}
?>

