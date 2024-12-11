<?php
require 'db.php'; // Incluye la conexión a la base de datos

$sql = "SELECT id, name, password FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['password']}</td>
                </tr>";
    }
} else {
    echo "<tr><td colspan='3'>No hay usuarios registrados.</td></tr>";
}

$conn->close();
?>
