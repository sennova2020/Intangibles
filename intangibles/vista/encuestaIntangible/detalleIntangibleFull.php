<?php 
    require_once '../../controladores/encuestaIntangible/read.php';
    require_once '../../modelo/conexion/conexion.php';
    require_once '../../modelo/proyectoEvaluarIntangible.php';
    require_once '../../modelo/intangible/intangibleModelo.php';
    require_once '../../modelo/claseIntangibleModelo.php';
    require_once '../../modelo/facturaModelo.php';
    require_once '../../controladores/seguridad/liderSecurity.php';
    liderRol(2);
    session_start();
    if (!isset($_SESSION['id'])) {
        header("Location:../../index.php");
    }

?>

<!------------------INCLUIR FUNCIONES------------------>
<?php include('../../../funciones/funciones.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SENNOVA | Intangibles </title>
    <link rel="icon" href="../../images/icon_sena.png">
    <link rel="stylesheet" href="../../../css/css.css">
    <link rel="stylesheet" href="../../../css/modales.css">
    <link rel="stylesheet" href="../../../css/responsive.css">
    <link rel="stylesheet" href="../../../css/loading.css">
    <script src="../../../js/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
</head>
<body>
    <div class="header">
        <div class="banner">
            <img src="../../../images/banner1.png" alt="banner" class="img_header" style="width:100%">
        </div>
    </div>
  
    <?php
      $data = $_POST['codeIntangible'];
      $centro = $_SESSION['centro'];

      
    ?>
    <div class="caja_formulario">
        <?php
            echo readIntangibleInfo($data);
        ?>
        
    </div>
    <?php
        echo readFactura($data);
    ?>
          
    <div class="radicar_proyecto" id="boton_volver">VOLVER</div>
    <script src="../../../js/jquery.redirect.js"></script>

<script>

     $(document).ready(function() {
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
            event.preventDefault();
            return false;
            }
        });
      });
      
      $("#boton_volver").click(function(){
        $.redirect('../intangibles.php', {'centro': '<?php $_SESSION['centro']?>'}, "POST");
    });
</script>

</body>
</html>

