<?php 
include("conn.php");

if($conexion){

    $id_TP=trim($_POST["id_Ptratamiento"]);
    $usuarios=3;
    $fecha=trim($_POST["Fecha"]);
    $area=trim($_POST["Area"]);
    $diagnostico=trim($_POST["Diagnostico"]);
    $pieza=trim($_POST["Pieza"]);
    $recomendacion=trim($_POST["Recomendacion"]);
    $evaluacion=trim($_POST["Evaluacion"]);
    $proximacita=trim($_POST["Proximacita"]);
    $aproDoc = trim($_POST["Doc"]);


    $consulta="INSERT INTO ficha_clinica VALUES (DEFAULT, $id_TP, '$fecha', '$area', $usuarios ,'$diagnostico','$pieza','$recomendacion','$evaluacion','$proximacita','$aproDoc')";
    $conexion -> query($consulta);
}
header("Location: ./ficha_clinica");
die();
?>


