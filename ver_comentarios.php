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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <h1>Comentarios</h1>
        <nav>
            <a href="index.html">
                <button class="btn-home">Volver al Inicio</button>
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
                    echo "<h3><i class='fas fa-user-circle'></i> " . htmlspecialchars($row['nombre']) . "</h3>";
                    echo "<p>" . htmlspecialchars($row['mensaje']) . "</p>";
                    echo "<small><i class='fas fa-calendar-alt'></i> " . $row['fecha'] . "</small>";
                    echo "</div>";
                }
            } else {
                echo "<p class='no-comments'>No hay comentarios aún. ¡Sé el primero en comentar!</p>";
            }
            ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Lautaro Montes. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
<?php
$conn->close();
?>