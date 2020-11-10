<?php
session_start();
if (isset($_SESSION['id'])) {
    header("Location:intangibles.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../images/icon_sena.png">
    <title>Acceso a módulo de intagibles</title>

    <link rel="stylesheet" href="../css/index.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery.redirect.js"></script>
    <script>
        $(document).ready(function() {
            $("#aviso").hide();

            $("#boton_inicio").click(function() {
                var cedula = $("#cedula").val();
                var contra = $("#contra").val();

                if (cedula.length == 0 || contra.length == 0) {
                    alert("No es posible dejar campos vacios");
                } else {
                    $.post("session/comprueba_login.php", {
                        cedula: cedula,
                        contra: contra
                    },
                    function(data, status) {
                        if (data == "-1") {
                            alert("Documento o contraseña incorrectos, por favor revisar nuevamente");
                        } else {
                            $.redirect('intangibles.php', {'centro': data}, "POST");
                        }
                    });
                }
            });
        });
    </script>
</head>

<body>
    <div id="contenido">
        <div id="header">
            <img src="../images/banner1.png" alt="" class="img_header">
        </div>
        <div action="session/comprueba_login.php" method="post" id="formulario_inicio_evaluador">
            <h2>Bienvenido</h2>
            <p>Por favor inicie sesión para continuar</p>
            <label for="">Documento de identidad: </label> <br>
            <input type="text" name="cedula" id="cedula"><br>

            <label for="">Contraseña: </label><br>
            <input type="password" name="contra" id="contra"><br>

            <div id="boton_inicio">Iniciar sesión</div>
        </div>
    </div>
</body>

</html>
