<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "vivencias";


$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT nombre, correo, mensaje, fecha FROM comentarios ORDER BY fecha DESC";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentarios - Mis Vivencias Escolares</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Comentarios</h1>
        <nav>
        <a href="index.html">    
        <button>Volver al Inicio</button>
    </a>
        </nav>
    </header>
    <main>
        <section>
            <h2>Comentarios de los Usuarios</h2>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='comentario'>";
                    echo "<h3>" . htmlspecialchars($row['nombre']) . "</h3>";
                    echo "<p>" . htmlspecialchars($row['mensaje']) . "</p>";
                    echo "<small>" . $row['fecha'] . "</small>";
                    echo "</div><hr>";
                }
            } else {
                echo "<p>No hay comentarios aún. ¡Sé el primero en comentar!</p>";
            }
            ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Mis Vivencias Escolares. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
<?php
$conn->close();
?>
