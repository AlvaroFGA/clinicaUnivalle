<?php
include("../conn.php");

if($conexion){
    $ci=trim($_POST["CI"]);
    $nombres=trim($_POST["Nombres"]);
    $apellidos=trim($_POST["Apellidos"]);
    $direccion=trim($_POST["Direccion"]);
    $telefono=trim($_POST["Telefono"]);
    $fecha_nac=trim($_POST["Fecha"]);
    $procedencia=trim($_POST["Procedencia"]);
    if(isset($_POST["rol"]) ){
        $rolSelect = $_POST["rol"]; 
     }
     $consulta="INSERT INTO personas VALUES ('$ci', '$nombres','$apellidos', '$direccion','$telefono','$fecha_nac','$procedencia')";
     $conexion -> query($consulta);
    // echo $rolSelect;
     if($rolSelect == "paciente"){
        header("Location: registrPaciente.php?id=$ci");
        die();
     }else{
        if($rolSelect == "usuario"){
            header("Location: registrUsuario.php?id=$ci");
            die();
         }
     }

   
    

     
}
?>