<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Usuario</title>

    <link rel="stylesheet" href="styleRegUsuar.css" type="text/css" media="all">
</head>
<body>
    <div class="login-box">
        <p>Registro Usuario</p>
        <form method="post">
          <?php 
            $aux = $_GET["id"];
            echo"<input type='hidden' name='ci_persona' value='$aux'>"
          ?>
          <div class="user-box">
            <input required="" name="Usuario" type="text">
            <label>Usuario</label>
          </div>
          <div class="user-box">
            <input required="" name="Contrasena" type="password">
            <label>Contraseña</label>
          </div>
          <div class="user-box">
            <input required="" name="Area" type="number">
            <label>Area</label>
          </div>

          <button type="submit"  name="Enviar">
            Enviar
          </button>
        </form>
      </div>
</body>
</html>

<?php
include("../conn.php");

if($conexion){

    //$usuario = ($_POST["Usuario"]);
    $usuario = $_POST['Usuario'] ?? null;
    $contrasena = $_POST['Contrasena'] ?? null;
    $area = $_POST['Area'] ?? null;
   // $contrasena = ($_POST["Contrasena"]);
   // $area = ($_POST["Area"]);
    if($usuario == "" && $contrasena == ""&& $area == ""){
     
    }else{
      $consulta="INSERT INTO usuarios VALUES (DEFAULT,'$aux','$usuario','$contrasena','$area')";
      $conexion -> query($consulta);
    }
    
}
?>