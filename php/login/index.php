<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/login.css">
    <title>Inicio de Sesion: Clinica Univalle</title>
</head>
<?php
$status = isset($_GET['status']) ? $_GET['status'] : null;
    if ($status=='false') {
        ?>
    <div class="alert alert-warning">
    <strong>Advertencia:</strong> las credenciales que introdujo no son correctas
    </div>    
<?php    
} 
?>
<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form>
                <h1>Crear Cuenta</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>Use su correo para registrarse</span>
                <input type="text" placeholder="Name">
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
                <button>Registrarse</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="POST" action="login.php">
                <h1>Iniciar Sesion</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>Use la contraseña de su correo</span>
                <input name="correo" type="email" placeholder="Correo Electronico">
                <input name="contrasenia" type="password" placeholder="Contraseña">
                <a href="#">¿Olvido su contraseña?</a>
                <button type="submit">Comencemos</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Bienvenido!</h1>
                    <p>Ingrese sus datos personales para acceder a los servicios del sitio web</p>
                    <button class="hidden" id="login">Comencemos</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Bienvenido!</h1>
                    <p>Verifique sus credenciales para ingresar</p>
                    <button class="hidden" id="register">Registrarse</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../../js/login.js
</body>

</html>