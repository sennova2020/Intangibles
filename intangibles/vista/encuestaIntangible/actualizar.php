<?php 
    require_once '../../modelo/proyectoConsecutivo/proyectoConsecutivoModel.php';
    require_once '../../modelo/conexion/conexion.php';
    require_once '../../modelo/intangible/intangibleModelo.php';
    require_once '../../controladores/encuestaIntangible/read.php';
    $model = new consecutiveProject();
    
    session_start();
    if (!isset($_SESSION['id'])) {
        header("Location:index.php");
    }

?>

<!------------------INCLUIR FUNCIONES ADICIONALES------------------>
<?php include('../../../funciones/funciones.php'); 
?>


<!DOCTYPE html>
<html lang="es">

<head>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SENNOVA | Intangibles </title>
        <link rel="icon" href="../../images/icon_sena.png">
        <link rel="stylesheet" href="../../../css/css.css">
        <link rel="stylesheet" href="../../../css/modales.css">
        <link rel="stylesheet" href="../../../css/responsive.css">
        <link rel="stylesheet" href="../../../css/loading.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
        <!-- CSS only -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
            integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <!-- JS, Popper.js, and jQuery -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
        </script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
            crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/encuestaIntangible.css">

    </head>
</head>

<body>
    <div class="header">
        <div class="banner">
            <img src="../../../images/banner1.png" alt="banner" class="img_header" style="width:100%">
        </div>
    </div>
    <?php
      $data = $_GET['project'];
      $projects = $model-> readTitle($data);
      $results = getDataIntangible($data); 
      if($results != false)
      {
        $info = $results->fetch_object();
      }
      else
      {
        $info = "no encontrado";
      }
    ?>
    <div class="caja_formulario">
        <h2 id="timeToLife"></h2>
        <div class="titulo"><?php echo($info->nombre_intangible) ?></div>
        <div class="formulario1 formulario_c" style="color:white">
            <h2 class="titulo_formulario">Nuevo intangible</h2>
            <p><strong>Centro:</strong>
                <?php echo($_SESSION['centro']) ?>
            </p>
            <br />
            <p><strong>Código del proyecto:</strong>
                <?php echo($data) ?>
            </p>
            <br />
            <p><strong>T&iacute;itulo del proyecto:</strong>
                <?php
                
                foreach ($projects as $project ) {
                    echo utf8_encode($project['proyecto_titulo']);
                }
                
                ?>
            </p>
        </div>
    </div>

    <form  class="form_formulario" enctype="multipart/form-data" method="post"
        id="formulario_principal">
        <input type="hidden" name="project" id="project" value="<?php echo($data)?>">
        <input type="hidden" name="cod_intangible" id="cod_intangible" value="<?php echo($_GET['id'])?>">
        <div class=" caja_formulario">
            <div class="titulo">VALIDACIÓN DE PREGUNTAS</div>
            <div class="formulario1 formulario_c">
                <ol class="container info_cent_prop" id="general">
                    <h2 style="color:white">Preguntas aplicables a los intangibles Sennova </h2>
                    <hr /><br />

                    <?php
                        echo readInformationIntagible(trim($_GET['id']));
                    ?>
                    
            </div>
        </div>
    </form>

    
    <div class="radicar_proyecto" onclick="envioDatos(this)" id="boton_registro">ENVIAR</div>
    <div class="radicar_proyecto" onclick="envioDatos(this)" id="boton_TEMPORAL">REGISTRO TEMPORAL</div>
    <div class="radicar_proyecto" id="boton_volver">VOLVER</div>

    <!-- Modal -->
    

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content" id="contentModal">
              ...
            </div>
          </div>
        </div>
        <script src="../../../js/jquery.redirect.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="../../js/encuestaIntangible/update.js"></script>
</body>

</html>