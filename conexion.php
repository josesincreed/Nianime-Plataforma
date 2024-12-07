<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "nianime";

// Intentar conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} else {
    echo "Conexión exitosa a la base de datos.";
}

$conn->close();
?>
