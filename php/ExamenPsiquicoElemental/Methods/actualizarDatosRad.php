<?php
    include("../../conn.php");

    $id = $_POST['id_rad'];
    $periapical = !empty($_POST["Periapical"])? "S":null;
    $oclusal = !empty($_POST["Oclusal"])? "S":null;
    $ex_tejidos = !empty($_POST["ex_tejidos"])? "S":null;
    $panoramica = !empty($_POST["Panoramica"])? "S":null;
    $otros = $_POST['otros_rad'];
    $fecha = $_POST['fecha'];
    if($otros == 1){
        //verificamos si el texto insertado esta vacio
        if($_POST["rad_text"] != ""){
            $otros = $_POST["rad_text"];
        }else{
            
            $otros = null;
        }
    }else{
        $otros = null;
    }
    $query = "UPDATE ex_co_radiograficos set periapical = ?, panoramica = ?, ex_c_tejidoscol = ?, oclusal = ?, otros = ?, fecha = ? where idex_c_tejidos = ?;";

    if($stmt = $conexion -> prepare($query)){
        $stmt -> bind_param("ssssssi",$periapical,$panoramica,$ex_tejidos,$oclusal,$otros,$fecha, $id);
        $stmt -> execute();
        $stmt -> close();
        header("Location: ../../indexExamen.php");
    }
?>