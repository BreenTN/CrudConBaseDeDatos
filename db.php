<?php
$host = '127.0.0.1'; // Dirección del servidor
$port = 3307; // Puerto configurado en MySQL
$user = 'root'; // Usuario de MySQL
$password = '1234'; // Contraseña de MySQL
$dbname = 'crud_db'; // Nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($host, $user, $password, $dbname, $port);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>

