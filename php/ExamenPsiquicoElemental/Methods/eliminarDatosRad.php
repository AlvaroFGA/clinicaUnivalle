<?php 
    include("../../conn.php");
    $id_rad = $_GET["id"];
    $query = "DELETE FROM ex_co_radiograficos where idex_c_tejidos = ?";
    if($stmt = $conexion -> prepare($query)) 
    {
        $stmt->bind_param("i",$id_rad);
        $stmt->execute();
        $stmt->close();
        header("Location: ../../indexExamen");
    }
?>