<?php
require 'db.php'; // Incluye la conexión a la base de datos

$id = $_POST['id'] ?? '';

if (empty($id)) {
    echo "Por favor, proporcione un ID.";
    exit;
}

$sql = "DELETE FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Usuario eliminado exitosamente.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
