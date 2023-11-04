<?php
    include("../../conn.php");

    $id = $_POST['id_tej'];
    $biopsia = !empty($_POST["biopsia"])? "S":null;
    $citolo = !empty($_POST["Cito"])? "S":null;
    $otros = $_POST['otros_tej'];
    $fecha = $_POST['fecha'];
    if($otros == 1){
        //verificamos si el texto insertado esta vacio
        if($_POST["Tej_text"] != ""){
            $otros = $_POST["Tej_text"];
        }else{
            
            $otros = null;
        }
    }else{
        $otros = null;
    }
    $query = "UPDATE ex_co_tejidos set biopsia = ?, citologia_exfoliativa = ?, otros = ?, fecha = ? where idex_c_radiograficos = ?;";

    if($stmt = $conexion -> prepare($query)){
        $stmt -> bind_param("ssssi",$biopsia,$citolo,$otros,$fecha,$id);
        $stmt -> execute();
        $stmt -> close();
        header("Location: ../../indexExamen.php");
    }
?>