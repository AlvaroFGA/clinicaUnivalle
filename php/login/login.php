<?php

require_once '../modelo/database.php';

class Sesion {
    public function verificacion($correo, $contrasenia) {
        $db = Database::getInstance();
        $connection = $db->getConnection();

        $stmt = $connection->prepare("SELECT * FROM usuarios WHERE usuario = ? AND contrasena = ?");
        $stmt->execute([$correo, $contrasenia]);
        $usuario = $stmt->fetch();

        if ($usuario) {
            session_start();
            $_SESSION['usuario_id'] = $usuario['id'];
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

// Ejemplo de uso
$loguearse = new Sesion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contrasenia = $_POST['contrasenia'];

    if ($loguearse->verificacion($correo, $contrasenia)) {
        header("Location: home.php");
    } else {
        $error = "Credenciales inválidas";
    }
}


?>