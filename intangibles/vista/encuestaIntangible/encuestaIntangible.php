<?php 
    require_once '../../modelo/proyectoConsecutivo/proyectoConsecutivoModel.php';
    require_once '../../modelo/proyectoEvaluarIntangible.php';
    require_once '../../controladores/encuestaIntangible/read.php';
    require_once '../../modelo/conexion/conexion.php';
    require_once '../../controladores/verificaciones/fechaLimite.php';
    require_once '../../modelo/intangible/intangibleModelo.php';
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
      $data = $_GET['project'];
      $projects = $model-> readTitle($data);
      
    ?>
    <div class="caja_formulario">
        <h2 id="timeToLife"></h2>
        <?php
         echo projectInformation($data);
        ?>
    </div>

    <form  class="form_formulario" enctype="multipart/form-data" method="post"
        id="formulario_principal">
        <input type="hidden" name="cod_intangible" id="project" value="<?php echo($data)?>">
        <div class=" caja_formulario">
            <div class="titulo">VALIDACIÓN DE PREGUNTAS</div>
            <div class="formulario1 formulario_c">
                <ol class="container info_cent_prop" id="general">
                    <h2 style="color:white">Preguntas aplicables a los intangibles Sennova </h2>
                    <hr /><br />

                    <div class="row">
                        <li class="col-12 col-sm-12 col-md-6 col-lg-6 li_formulario">
                            <p class="etiquetas">Fecha de cierre del proyecto técnicamente en la vigencia 2020</p>
                            <br />
                            <input id="dateFinish" name="dateFinish" type="date" class="w-100 form-control" style="font-size:20px;color:black" step="any">
                        </li>

                        <li class="col-12 col-sm-12 col-md-6 col-lg-6 li_formulario">
                            <p class="etiquetas">Fecha de cierre del proyecto presupuestalmente en la vigencia 2020</p>
                            <br />
                            <input id="dateBudgetClosing" name="dateBudgetClosing" type="date" class="w-100 form-control" style="font-size:20px;color:black" step="any">
                        </li>
                    </div>
                    <br>
                    <div class="row">
                        <li class="col-12 col-sm-12 col-md-6 col-lg-6 li_formulario">
                            <p class="etiquetas">Tipo de intangible</p>
                            <br />
                            <select name="typeIntangible" id="typeIntangible" required class="form-control">
                                <option value="none" selected>Seleccione...</option>
                                <option value="Adquirido">Adquirido</option>
                                <option value="Desarrollado">Desarrollado</option>
                            </select>
                        </li>

                        <li class="col-12 col-sm-12 col-md-6 col-lg-6 li_formulario">
                            <p class="etiquetas">Clase de intangibles</p>
                            <br />
                            <select name="classIntangible" id="classIntangible" required class="form-control"></select>
                        </li>
                    </div>


                    <li class="li_formulario">
                        <p class="etiquetas">
                            Nombre del Intangible. <span id="nameIntangibleNote" onclick="descriptionModal(this)" >Nota* </span>
                        </p>

                        <br/>
                        
                        <input type="text" class="form-control" required placeholder="Digite el nombre del intangible" name="nameIntangible" id="nameIntangible"> 
                    </li>
                    <br>
                    <hr>
                    <br>
                    <li class="li_formulario">
                        <p class="etiquetas">
                            ¿El intangible es un recurso controlado? <span id="resourceControlNote" onclick="descriptionModal(this)" >Nota* </span>
                        </p>
                        <br/>
                        <select name="resourceControl" id="resourceControl" required class="form-control">
                            <option value="" selected>Seleccione...</option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </li>

                    <li class="li_formulario">
                        <p class="etiquetas">
                            Observaci&oacute;n*. <span id="observationResourceNote" onclick="descriptionModal(this)" >Nota* </span> 
                        </p>
                        <br>
                        <textarea name="observationResource" class="form-control" id="observationResource" required cols="30" rows="8" class="w-100 form-control" placeholder="Digite sus observaciones"  maxlength="1000"></textarea>
                    </li>
                <li class="li_formulario">
                    <p class="etiquetas">
                        ¿Del intangible se espera obtener un potencial de servicios? <span id="potencialNote" onclick="descriptionModal(this)" >Nota* </span>
                    </p>
                    <br/>
                    <select name="potencial" id="potencial" required class="form-control">
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
                    <textarea name="observationPotencial" id="observationPotencial" required cols="30" rows="8" class="w-100 form-control" placeholder="Digite sus observaciones"  maxlength="1000"></textarea>
                </li>

                <li class="li_formulario">
                    <p class="etiquetas">
                        ¿El intangible se puede medir fiablemente? <span id="reliablyNote" onclick="descriptionModal(this)" >Nota* </span>
                    </p>
                    <br/>
                    <select name="reliably" id="reliably" required class="form-control">
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
                    <textarea name="observationReliably" id="observationReliably" required cols="30" rows="8" class="w-100 form-control" placeholder="Digite sus observaciones"  maxlength="1000"></textarea>
                </li>

                <li class="li_formulario">
                    <p class="etiquetas">
                        ¿El intangible se puede identificar? <span id="identificationNote" onclick="descriptionModal(this)" >Nota* </span>
                    </p>
                    <br/>
                    <select name="identification" id="identification" required class="form-control">
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
                    <textarea name="observationIdentification" id="observationIdentification" required cols="30" rows="8" class="w-100 form-control" placeholder="Digite sus observaciones"  maxlength="1000"></textarea>
                </li>
                <li class="li_formulario">
                    <p class="etiquetas">
                        ¿El intangible NO es considerado monetario? <span id="isMonetaryNote" onclick="descriptionModal(this)" >Nota* </span>
                    </p>
                    <br/>
                    <select name="isMonetary" id="isMonetary" required class="form-control">
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
                    <textarea name="observationMonetary" id="observationMonetary" required cols="30" rows="8" class="w-100 form-control" placeholder="Digite sus observaciones"  maxlength="1000"></textarea>
                </li>

                <li class="li_formulario">
                    <p class="etiquetas">
                        ¿El intangible es sin apariencia física?  <span id="physicalAppearanceNote" onclick="descriptionModal(this)" >Nota* </span>
                    </p>
                    <br/>
                    <select name="physicalAppearance" id="physicalAppearance" required class="form-control">
                        <option value="" selected>Seleccione...</option>
                        <option value="si">Si</option>
                        <option value="no">No</option>
                    </select>
                </li>

                <li class="li_formulario">
                    <p class="etiquetas">
                        Observaci&oacute;n*. <span id="observationAppearanceNote" onclick="descriptionModal(this)" >Nota* </span> 
                    </p>
                    <br>
                    <textarea name="observationAppearance" id="observationAppearance" required cols="30" rows="8" class="w-100 form-control" placeholder="Digite sus observaciones"  maxlength="1000"></textarea>
                </li>

                <li class="li_formulario">
                    <p class="etiquetas">
                        ¿El intangible se va a utilizar por más de un año?  <span id="durationNote" onclick="descriptionModal(this)" >Nota* </span>
                    </p>
                    <br/>
                    <select name="duration" id="duration" required class="form-control">
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
                    <textarea name="observationDuration" id="observationDuration" required cols="30" rows="8" class="w-100 form-control" placeholder="Digite sus observaciones"  maxlength="1000"></textarea>
                </li>

                <li class="li_formulario">
                    <p class="etiquetas">
                        ¿No se espera vender en el curso de las actividades de la entidad? <span id="buyActivityNote" onclick="descriptionModal(this)" >Nota* </span>
                    </p>
                    <br/>
                    <select name="buyActivity" id="buyActivity" required class="form-control">
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
                    <textarea name="observationBuyActivity" id="observationBuyActivity" required cols="30" rows="8" class="w-100 form-control" placeholder="Digite sus observaciones"  maxlength="1000"></textarea>
                </li>
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
        <script src="../../js/encuestaIntangible.js"></script>
        <?php
            if(enabledOperations() === false)
            {
                deleteIntangibleLimitDate();

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