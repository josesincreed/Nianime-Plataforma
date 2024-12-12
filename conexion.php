<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


// Configuración de la base de datos
$servername = "sql108.infinityfree.com";   	
$username = "if0_37901825";
$password = "0yJMTUdLzC";
$database = "if0_37901825_nianime";

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
