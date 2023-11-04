<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../../modelo/conexion.php';
    $concepto = $_POST["concepto"];
    $debe = $_POST["debe"];
    $haber = $_POST["haber"];
    $saldo = $_POST["saldo"];
    $eMaterial = $_POST["ematerial"];
    $idRecibo = $_POST["idRecibo"];

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $sql = "INSERT INTO recibos (fecha, concepto, debe, haber, saldo, ematerial, idplantrat) VALUES (current_date(), '$concepto', '$debe', '$haber', '$saldo', '$eMaterial', '$idRecibo')";

    if ($conn->query($sql) === TRUE) {
        header("Location: tratamientoPresupuesto.php?id=$idRecibo");
        exit();
    } else {
        echo "Error al insertar el recibo: " . $conn->error;
    }

    $conn->close();
}
?>
