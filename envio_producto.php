<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root"; // Cambiar si es necesario
$password = ""; // Cambiar si es necesario
$dbname = "nianime"; // Reemplaza con el nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre_cliente = $_POST['nombre_cliente'];
$direccion_cliente = $_POST['direccion_cliente'];
$ciudad_cliente = $_POST['ciudad_cliente'];
$pais_cliente = $_POST['pais_cliente'];
$telefono_cliente = $_POST['telefono_cliente'];
$correo_cliente = $_POST['correo_cliente'];
$fecha_envio = $_POST['fecha_envio'];
$producto = $_POST['producto'];  // Captura el producto seleccionado

// Insertar datos en la base de datos
$sql = "INSERT INTO datos_envio (nombre_cliente, direccion_cliente, ciudad_cliente, pais_cliente, telefono_cliente, correo_cliente, fecha_envio, producto)
        VALUES ('$nombre_cliente', '$direccion_cliente', '$ciudad_cliente', '$pais_cliente', '$telefono_cliente', '$correo_cliente', '$fecha_envio', '$producto')";

if ($conn->query($sql) === TRUE) {
    header("Location: pago.html");
            exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
