<?php
require_once '../../controladores/seguridad/liderSecurity.php';
liderRol(2);
?>
<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SENNOVA | Banco de Proyectos</title>
    <link rel="icon" href="images/icon_sena.png">
    <link rel="stylesheet" href="../../../css/css.css">
    <link rel="stylesheet" href="../../../css/modales.css">
    <link rel="stylesheet" href="../../../css/responsive.css">
    <link rel="stylesheet" href="../../../css/loading.css">
    <script src="../../../js/jquery.js"></script>

</head>
<body>
  <div class="header">
      <div class="banner">
        <img src="../../../images/banner1.png" alt="banner" class="img_header" style="width:100%">
      </div>
  </div>

  <div class="caja_formulario">
        <div class="titulo"><?php echo(/*$_POST["cod_intangible"] .*/ "Registrado correctamente.") ?></div>
        <div class="formulario1 formulario_c" style="color:white">
            <h2 class="titulo_formulario"><?php echo($_POST["id"] . "Registrado correctamente.") ?></h2>
            <p><strong>Centro:</strong>
            <?php echo($_SESSION["centro"]) ?>
            </p>
            <div class="radicar_proyecto" id="boton_volver">VOLVER A LISTA</div>
        </div>
    </div>
</body>



<script src="../../../js/jquery.redirect.js"></script>
  
  <script>

    $("#boton_volver").click(function(){
      $.redirect('../intangibles.php', "POST");
    });

   </script>
