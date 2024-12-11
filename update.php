<?php
require 'db.php'; // Incluye la conexión a la base de datos

$id = $_POST['id'] ?? '';
$name = $_POST['name'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($id) || empty($name) || empty($password)) {
    echo "Por favor, complete todos los campos.";
    exit;
}

$sql = "UPDATE users SET name = ?, password = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $name, $password, $id);

if ($stmt->execute()) {
    echo "Usuario actualizado exitosamente.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
