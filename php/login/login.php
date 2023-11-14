<?php

require_once '../../modelo/database.php';

class Sesion {
    public function verificacion($correo, $contrasenia) {
        $db = Database::getInstance();
        $connection = $db->getConnection();
        echo 'si';
        $stmt = $connection->prepare("SELECT * FROM usuarios WHERE usuario = '$correo' AND contrasena = '$contrasenia';");
        $stmt->execute();
        $usuario = $stmt->fetch();

        if ($usuario) {
            echo 'si';
            session_start();
            $_SESSION['usuario_id'] = $usuario['idusuario'];
            $timeout = 1800; // 30 minutos
            session_set_cookie_params($timeout);
            return true;
        } else {
            return false;
        }
    }
    public function cerrar_sesion() {
        session_start();
        session_unset();
        session_destroy();
    }
}
$logueo = new Sesion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contrasenia = $_POST['contrasenia'];
    echo $correo;
    echo $contrasenia;
    if ($logueo->verificacion($correo, $contrasenia)) {
       header("Location: ../../index.html");
       exit();
    } else {
        header("Location: index.php?status=false");
        exit();    }
}


?>