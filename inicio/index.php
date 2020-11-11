<?php
session_start();
if (isset($_SESSION['id'])) {
    header("Location:evaluador.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/icon_sena.png">
    <title>Acceso a módulo de evalución</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="js/jquery.js"></script>
    <script src="js/inicio.js"></script>
</head>

<body>
    <div id="contenido">
        <div id="header">
            <img src="images/banner.png" alt="" class="img_header">
        </div>
        <div action="session/comprueba_login.php" method="post" id="formulario_inicio_evaluador">
            <h2>Bienvenido</h2>
            <p>Por favor inicie sesión para continuar</p>
            <label for="">Usuario: </label> <br>
            <input type="text" name="cedula" id="cedula"><br>

            <label for="">Contraseña: </label><br>
            <input type="password" name="contra" id="contra"><br>

            <div id="boton_inicio">Iniciar sesión</div>
        </div>
    </div>
</body>

</html>
