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

// Procesar los datos enviados desde el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    // Consultar la base de datos para obtener la contraseña hasheada
    $sql = "SELECT contrasena FROM usuarios WHERE correo = '$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Usuario encontrado
        $row = $result->fetch_assoc();
        $hashed_password = $row['contrasena'];

        // Verificar la contraseña ingresada
        if (password_verify($contrasena, $hashed_password)) {
            header("Location: inicio.html");
            exit();
        } else {
            header("Location: error.html");
            exit(); // Finalizar el script para evitar que se ejecuten más instrucciones
        }
    } else {
        header("Location: error.html");
        exit(); // Finalizar el script para evitar que se ejecuten más instrucciones
    }
}

$conn->close();
?>
