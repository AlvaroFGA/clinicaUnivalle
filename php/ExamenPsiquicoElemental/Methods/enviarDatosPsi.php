<?php
include("../../conn.php");
//variable general
$fecha_selec = $_POST["fecha"];
//variables de ex_psiquico
$conciencia = $_POST["conciencia"];
$percepcion = $_POST["percepcion"];
$memoria = $_POST["memoria"];
$altCon = $_POST["altConductuales"];
//variables para ex radiograficos
$periapical = isset($_POST["Periapical"]) ? "S" :null;
$mordida = isset($_POST["mordida"]) ? "S" :null;
$Oclusal = isset($_POST["Oclusal"]) ? "S" :null;
$panoramica = isset($_POST["panoramica"]) ? "S" :null;
$valor_opcion = isset($_POST["Rad"]);
$paciente_id = $_POST['id_paciente'];
//variables para plan de tratamientos
if (isset($_POST['trata'])) {
    $tratamiento = $_POST['trata'];
}
$descripcion = $_POST['descripcion'];


//si esta tickeado el checkbox de de otros
if($valor_opcion == 1){
    //verificamos si el texto insertado esta vacio
    if($_POST["otros_text_rad"] != ""){
        $valor_opcion = $_POST["otros_text_rad"];
        echo $valor_opcion;
    }else{
        //caso que no este lleno se pone por defecto NULL
        $valor_opcion = null;
    }
    //echo $valor_opcion;
}else{
    $valor_opcion = null;
}

//variables para  examenes de tejidos blancos
$biopsia = isset($_POST['Biopsia']) ? "S" : null;
$citaexfoliatica = isset($_POST['CitExfoliatica']) ? "S" : null;
$otras_opciones = isset($_POST['Tej']);

if($otras_opciones == 1){
    //verificamos si el texto insertado esta vacio
    if($_POST["otros_text_tej"] != ""){
        $otras_opciones = $_POST["otros_text_tej"];
        //echo $valor_opcion;
    }else{
        //caso que no este lleno se pone por defecto NULL
        $otras_opciones = null;
    }
    //echo $valor_opcion;
}else{
    $otras_opciones = null;
}
//variables para el plan de tratamiento
if($conexion){
    $ex_psi = $conexion -> query("INSERT INTO ex_psiquico VALUES(DEFAULT,'$paciente_id','$conciencia','$percepcion','$memoria','$altCon', '$fecha_selec');");
    $ex_radio = $conexion -> query("INSERT INTO ex_co_radiograficos values(DEFAULT, '$paciente_id', '$periapical', '$mordida', '$Oclusal','$panoramica', '$text','$fecha_selec');");
    $ex_tej = $conexion -> query("INSERT INTO ex_co_tejidos values(DEFAULT, '$paciente_id', '$biopsia', '$citaexfoliatica', '$otras_opciones', '$fecha_selec');");
    $plan_t =  $conexion -> query("INSERT INTO plan_tratamientos values(DEFAULT, '$tratamiento','$descripcion','$fecha_selec', $paciente_id)" );
    header('Location: ../../indexExamen.php');
    die();
}else{
    die("error de conexion");
}
?>