<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "vivencias";


$conn = new mysqli($host, $user, $password, $database);


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];


$sql = "INSERT INTO comentarios (nombre, correo, mensaje) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nombre, $correo, $mensaje);

if ($stmt->execute()) {
    header("Location: exito.html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

