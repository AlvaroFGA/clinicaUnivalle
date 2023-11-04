<?php 
    include("../../conn.php");
    $id_tejidos = $_GET["id"];
    $query = "DELETE FROM ex_co_tejidos where idex_c_radiograficos = ?";

    if($stmt  = $conexion -> prepare($query)){
        $stmt -> bind_param("i", $id_tejidos);
        $stmt -> execute();
        $stmt -> close();
        header("Location: ../../indexExamen.php");
    }
?>