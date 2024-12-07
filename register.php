<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "nianime";

// Conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Procesar datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    // Cifrar la contraseña
    $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

    // Preparar la consulta para evitar inyección SQL
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, contrasena) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $correo, $hashed_password);

    if ($stmt->execute()) {
        header("Location: index.html");
        exit(); // Finalizar el script para evitar que se ejecuten más instrucciones
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
