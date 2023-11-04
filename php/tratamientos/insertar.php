<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../../modelo/conexion.php';
    $nombre = $_POST["nombre"];

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $sql = "INSERT INTO tratamientos VALUES (default, '$nombre')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al insertar el tratamiento: " . $conn->error;
    }

    $conn->close();
}
?>