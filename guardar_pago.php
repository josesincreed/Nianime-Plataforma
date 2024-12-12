<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


// Conexión a la base de datos
$servername = "sql108.infinityfree.com";
$username = "if0_37901825";
$password = "0yJMTUdLzC";     // Cambia si tienes contraseña
$database = "if0_37901825_nianime"; // Cambia por el nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si los datos fueron enviados
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $medio = $conn->real_escape_string($_POST['medio']);
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $numero = $conn->real_escape_string($_POST['numero']);
    $fecha = $conn->real_escape_string($_POST['fecha']);
    $cvv = $conn->real_escape_string($_POST['cvv']);

    // Ajustar el formato de la fecha de expiración
    $fecha .= "-01"; // Agregar el día como '01' para cumplir el formato DATE (YYYY-MM-DD)

    // Insertar datos en la tabla Medio_pago
    $sql = "INSERT INTO medio_pago (medio, nombre, numero, fecha_expiracion, cvv)
            VALUES ('$medio', '$nombre', '$numero', '$fecha', '$cvv')";

    if ($conn->query($sql) === TRUE) {
        header("Location: pagoexitoso.html");
            exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
