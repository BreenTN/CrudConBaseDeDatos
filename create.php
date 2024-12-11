<?php
require 'db.php'; // Incluye conexión a la base de datos desde db.php

// Verificar datos del formulario
$id = $_POST['id'] ?? '';
$name = $_POST['name'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($id) || empty($name) || empty($password)) {
    echo "Por favor, complete todos los campos.";
    exit;
}

// Insertar datos en la tabla
$sql = "INSERT INTO users (id, name, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $id, $name, $password);

if ($stmt->execute()) {
    echo "Usuario creado exitosamente.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
