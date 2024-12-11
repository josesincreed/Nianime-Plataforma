<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "nianime";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el término de búsqueda
$titulo = isset($_GET['titulo']) ? $_GET['titulo'] : '';

// Consultar la base de datos
$sql = "SELECT * FROM animes WHERE titulo LIKE ?";
$stmt = $conn->prepare($sql);
$busqueda = "%$titulo%";
$stmt->bind_param("s", $busqueda);
$stmt->execute();
$result = $stmt->get_result();

// Mostrar resultados
if ($result->num_rows > 0) {
    echo "<h2>Resultados de búsqueda:</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li><strong>" . htmlspecialchars($row['titulo']) . "</strong><br>";
        echo "Género: " . htmlspecialchars($row['genero']) . "<br>";
        echo "Sinopsis: " . htmlspecialchars($row['sinopsis']) . "<br>";
        echo "Fecha de Estreno: " . htmlspecialchars($row['fecha_estreno']) . "<br>";
        echo "Calificación: " . htmlspecialchars($row['calificacion']) . "</li><hr>";
    }
    echo "</ul>";
} else {
    echo "<p>No se encontraron resultados para '$titulo'.</p>";
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
