<?php

session_start();

/*if (!isset($_SESSION['usuario_id'])) {
    // Redirigir a la página de inicio de sesión si no está autenticado
    header("Location: login.php");
    exit();
}*/
echo($_SESSION['usuario_id']);

?>