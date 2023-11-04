<?php

    include("../../conn.php");

    $id_psiquico = $_GET["id"];
    $delete = "DELETE FROM ex_psiquico where idex_psiquico = ?";
    if($stmt = $conexion -> prepare($delete)){
        $stmt -> bind_param('i',$id_psiquico);
        $stmt -> execute();
    }
    $stmt -> close();
    header('Locaciont: ../../indexExamen.php');
    die();
?>