<?php
    include("../../conn.php");
    $id = $_POST["id_psiquico"];
    $conciencia = $_POST["conciencia"];
    $percepcion = $_POST["percepcion"];
    $alteracion = $_POST["altConductuales"];
    $memoria = $_POST["memoria"];
    $fecha = $_POST["fecha"];


    $query = "UPDATE ex_psiquico set conciencia = ?, percepcion =?, memoria = ?, alt_conductual = ?, fecha = ? where idex_psiquico = ?";
    if($stmt = $conexion -> prepare("$query")){
        $stmt->bind_param("sssssi",$conciencia,$percepcion,$memoria,$alteracion,$fecha,$id);
        $stmt->execute();
    }
    $stmt->close();
    header('Location: ../../indexExamen.php');
    die();
?>