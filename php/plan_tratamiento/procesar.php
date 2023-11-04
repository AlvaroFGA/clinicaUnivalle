<?php
include '../../modelo/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paciente = $_POST['paciente'];
    $tratamiento = $_POST['tratamiento'];
    $descripcion = $_POST['desc'];

    // Realiza las operaciones que desees con los datos recibidos, por ejemplo, insertar en la base de datos.
    
    $sql = "CALL InsertarPlanTratamiento('$tratamiento','$descripcion', '$paciente');";
    
    if ($conn->query($sql) === TRUE) {
        // La inserción se realizó con éxito, puedes redirigir a otra página si es necesario.
        header("Location: planTratamientos.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
