<?php 
    require_once '../../modelo/proyectoConsecutivo/proyectoConsecutivoModel.php';
    require_once '../../modelo/proyectoEvaluarIntangible.php';
    require_once '../../controladores/encuestaIntangible/read.php';
    require_once '../../modelo/conexion/conexion.php';
    require_once '../../controladores/verificaciones/fechaLimite.php';
    require_once '../../modelo/intangible/intangibleModelo.php';
    require_once '../../controladores/verificaciones/sinIntagibles.php';
    require_once '../../controladores/formatoIntangible/read.php';
    require_once '../../controladores/seguridad/liderSecurity.php';
    require_once '../../modelo/fechaLimite.php';
    liderRol(2);
    $model = new consecutiveProject();
    
    
    if (!isset($_SESSION['id'])) {
        header("Location:../../index.php");
    }
    $data = $_POST['id'];
    /*if(projectWithoutIntagibles($data) === false)
    {
        header("Location:../../index.php");
    }*/

   

?>

<!------------------INCLUIR FUNCIONES ADICIONALES------------------>
<?php include('../../../funciones/funciones.php'); 
?>


<!DOCTYPE html>
<html lang="es">

<head>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
      $data = trim($_POST['id']);
      
    ?>
    <div class="caja_formulario">
        <h2 id="timeToLife"></h2>
        <?php
        $titulo = 'LISTA DE CHEQUEO REVISION VALOR RESIDUAL.';
            echo readParameterFormato($data,$titulo);
        ?>
            <div>
                <p>
                    <strong>Objectivo: </strong> Al aplicar la siguiente lista de chequeo, se verificará si ha cambiado o se piensa cambiar, el periodo durante el cual se va utilizar el bien intangible.

                </p>
                <p>
                    <strong>Medición inicial:</strong>   Se realiza la medición del costo del intangible. Los intangibles que fueron adquiridos, el costo corresponde al valor que se pagó por su adquisición en los términos establecidos. El valor de los intangibles desarrollados y que están en fase de desarrollo, corresponde a la sumatoria de todos los desembolsos, pagos, contratos, facturas y demás acciones que se hayan realizado para su obtención, es así que los activos intangibles se medirán al costo, el cual dependerá de si estos son adquiridos o desarrollados. 
                </p>
            </div>
            <!-- Importante no borrar este div de cierre-->
        </div>
    </div>
    

    <form  class="form_formulario" enctype="multipart/form-data" method="post"
        id="formulario_principal">
        <input type="hidden" name="cod_intangible" id="project" value="<?php echo($data)?>">
        <div class=" caja_formulario">
            <div class="titulo">VALIDACIÓN DE PREGUNTAS</div>
            <div class="formulario1 formulario_c">
                <ol class="container info_cent_prop" id="general">
                    
                    <hr /><br />

                    <li class="li_formulario">
                        <p class="etiquetas">
                        ¿El bien intangible se utilizará hasta que éste se 
                        consuma completamente o de forma significativa?<span id="residualValue" onclick="descriptionModal(this)" >Nota* </span>
                        </p>
                        <br/>
                        <select name="residual" id="residual" required class="form-control">
                            <option value="" selected>Seleccione...</option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </li>

                    <li class="li_formulario">
                        <p class="etiquetas">
                            Observaci&oacute;n*. 
                        </p>
                        <br>
                        <textarea name="observationResidual" class="form-control" id="observationResidual" required cols="30" rows="8" class="w-100 form-control" placeholder="Justifique su respuesta"  maxlength="1000"></textarea>
                    </li>
            </div>
        </div>
    </form>

    
    <div class="radicar_proyecto" onclick="envioDatos()" id="boton_registro">ENVIAR</div>
   
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
        <script src="../../js/listCheck/reValResidual.js"></script>
        <?php
            if(enabledOperations() === false)
            {
                deleteIntangibleLimitDate(2);

                echo "<script>
                $.confirm({
                    title: 'Informaci&oacute;n',
                    content:'Haz alcanzado la fecha limite, por lo tanto no puede hacer mas registros.',
                    buttons: {
                        Ok: function () {
                            $.redirect('../../index.php')
                        }
                    }
                });
                    </script>";
            }
        ?>
    
</body>

</html>