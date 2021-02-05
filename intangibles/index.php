<?php
require_once 'controladores/seguridad/rutas.php';
require_once 'modelo/conexion/conexion.php';
require_once 'modelo/intangible/intangibleModelo.php';
require_once 'controladores/verificaciones/fechaLimite.php';
require_once 'modelo/fechaLimite.php';
session_start();
if(enabledOperations() === false)
{
    deleteIntangibleLimitDate(0);
}
if (isset($_SESSION['id'])) {
    $ruta = routesRol($_SESSION["rol"]);
    header("Location:$ruta");
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
            <input type="number" name="cedula"  onkeydown="onKeyDownHandler(event);" id="cedula"><br>

            <label for="">Contraseña: </label><br>
            <input type="password" name="contra" onkeydown="onKeyDownHandler(event);" id="contra"><br>

            <div id="boton_inicio">Iniciar sesión</div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>

        
        function onKeyDownHandler(event) {

            var codigo = event.which || event.keyCode;
            
            if(codigo === 13){
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
                            Swal.fire({
                                icon: 'warning',
                                title: 'Ups...!',
                                text: 'El usuario y/o la contraseña son incorrectas'
                            })
                        } else {
                            $.redirect(data);
                        }
                    });
                }
            }

 
        }
        
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
                            Swal.fire({
                                icon: 'warning',
                                title: 'Ups...!',
                                text: 'El usuario y/o la contraseña son incorrectas'
                            })
                        } else {
                            $.redirect(data);
                        }
                    });
                }
            });
        });
    </script>
</body>
    
</html>
