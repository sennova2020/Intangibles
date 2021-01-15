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
    liderRol(2);
    $model = new consecutiveProject();
    
   
    if (!isset($_SESSION['id'])) {
        header("Location:../../index.php");
    }
    $data = $_GET['id'];
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
      $data = trim($_GET['id']);
      
    ?>
    <div class="caja_formulario">
        <h2 id="timeToLife"></h2>
        <?php
            echo readParameterFormato($data);
        ?>
            <div>
                <p>
                    <strong>Objectivo: </strong> La aplicación de esta lista de chequeo de “Indicios de deterioro”, sirve a la entidad para identificar aquellos elementos bienes intangibles que se puedan encontrar en posibles condiciones de deterioro. En este apartado se aconseja leer el Instructivo de medición posterior de bienes intangibles (GRF-I-009).

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
                            Durante el periodo, han tenido lugar, o va a tener lugar en un futuro inmediato,
                            cambios significativos con una incidencia desfavorable sobre la entidad a largo plazo, 
                            los cuales estan relacionados con el entorno legal, tecnológico o de política gubernamental, 
                            en los que opera la entidad. <span id="changesNote" onclick="descriptionModal(this)" >Nota* </span>
                        </p>
                        <br/>
                        <select name="changes" id="changes" required class="form-control">
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
                        <textarea name="observationChanges" class="form-control" id="observationChanges" required cols="30" rows="8" class="w-100 form-control" placeholder="Justifique su respuesta"  maxlength="1000"></textarea>
                    </li>
                <li class="li_formulario">
                    <p class="etiquetas">
                        Durante el periodo, el valor de mercado del activo
                        ha disminuido significativamente más que lo que se 
                        esperaría como consecuencia del paso del tiempo o de su uso normal.<span id="assetReduction" onclick="descriptionModal(this)" >Nota* </span>
                    </p>
                    <br/>
                    <select name="reduction" id="reduction" required class="form-control">
                        <option value="" selected>Seleccione...</option>
                        <option value="si">Si</option>
                        <option value="no">No</option>
                    </select>
                </li>
                <li class="li_formulario">
                        <p class="etiquetas">
                            Justifique su respuesta si es afirmativa 
                            y adjunte las evidencias del estudio del 
                            mercado que realizó para determinar el valor del mercado. 
                        </p>

                        <p class="etiquetas">
                        Observaci&oacute;n*. 
                        </p>
                    <br>
                    <textarea name="observationReduction" id="observationReduction" required cols="30" rows="8" class="w-100 form-control" placeholder="Justifique su respuesta"  maxlength="1000"></textarea>
                        
                </li>
                <li class="li_formulario">
                            <p class="etiquetas">Adjunte evidencias del estudio realizado</p>
                            <br />
                            <input type="file" class="form-control" required placeholder="Adjunte el documento" name="nameIntangible" id="nameIntangible">
                        </li>

                <li class="li_formulario">
                        <p class="etiquetas">
                            Valor del estudio del mercado (si no se puede estimar el costo
                            del valor del mercado, escribir el costo de reposición)
                        </p>

                        <br/>
                        
                        <input type="number" class="form-control" required placeholder="Digite el valor del estudio del mercado" name="value" id="value"> 
                </li>

                <li class="li_formulario">
                        <p class="etiquetas">
                            Justifique su respuesta si es negativa indicando el costo 
                            de reposición, que es el valor que se incurriría si se 
                            tuviera que reponer el bien que se encuentra evaluando, 
                            en las mismas condiciones en que se encuentra. 
                            Para esto realice la siguiente pregunta, 
                            si tuviera que adquirir este elemento que se encuentra evaluando,
                            ¿cuál sería su costo o valor en el mercado?, ¿ese valor en el que
                            tuviera que incurrir es muy inferior al valor reflejado como VALOR DEL BIEN?.
                        </p>

                        <br/>
                        
                        <input type="number" class="form-control" required placeholder="Digite el costo de reposición" name="reposicion" id="reposicion"> 
                </li>

                <li class="li_formulario">
                        <p class="etiquetas">
                            Valor de reposición del activo intangible.
                        </p>

                        <br/>
                        
                        <input type="number" class="form-control" required placeholder="Digite el valor de reposición del activo " name="reposicionIntangible" id="reposicionIntangible"> 
                </li>

                <li class="li_formulario">
                    <p class="etiquetas">
                        Se dispone de evidencia sobre la obsolescencia o daño del activo. <span id="damagedAsset" onclick="descriptionModal(this)" >Nota* </span>
                    </p>
                    <br/>
                    <select name="evidencia" id="evidencia" required class="form-control">
                        <option value="" selected>Seleccione...</option>
                        <option value="si">Si</option>
                        <option value="no">No</option>
                    </select>
                </li>

                <li class="li_formulario">
                        <p class="etiquetas">
                            Si su respuesta fue afirmativa se debe calcular 
                            el valor de dichas rehabilitaciones.<span id="valueRehabilitations" onclick="descriptionModal(this)" >Nota* </span>
                        </p>

                        <br/>
                        
                        <input type="number" class="form-control" required placeholder="Digite el valor de las rehabilitaciones" name="rehabilitaciones" id="rehabilitaciones"> 
                </li>

        

                <li class="li_formulario">
                    <p class="etiquetas">
                        Durante el periodo, han tenido lugar, o se espera que 
                        tengan lugar en un futuro inmediato, cambios significativos 
                        en el grado de utilización  o la manera como se usa o se 
                        espera usar el activo, los cuales afectaran desfavorablemente 
                        la entidad a largo plazo. Estos cambios incluyen el hecho de 
                        que el activo esté ocioso, los planes de discontinuación o 
                        restructuración de la operación  a la que pertenece el activo, 
                        los planes para disponer el activo antes de la fecha prevista y 
                        el cambio de la vida útil de un activo de indefinida a finita. <span id="activeEvaluation" onclick="descriptionModal(this)" >Nota* </span>
                    </p>
                    <br/>
                    <select name="evaluation" id="evaluation" required class="form-control">
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
                    <textarea name="observationEvaluation" id="observationEvaluation" required cols="30" rows="8" class="w-100 form-control" placeholder="Justifique su respuesta"  maxlength="1000"></textarea>
                </li>

                <li class="li_formulario">
                    <p class="etiquetas">
                        Se decide detener la construcción del activo antes de su finalización
                        o de su puesta en condiciones de funcionamiento, salvo que exista 
                        evidencia objetiva de que se reanudará la construcción en el futuro próximo.<span id="constructionActive" onclick="descriptionModal(this)" >Nota* </span>
                    </p>
                    <br/>
                    <select name="construction" id="construction" required class="form-control">
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
                    <textarea name="observationConstruction" id="observationConstruction" required cols="30" rows="8" class="w-100 form-control" placeholder="Justifique su respuesta"  maxlength="1000"></textarea>
                </li>

                <li class="li_formulario">
                    <p class="etiquetas">
                        Se dispone de información procedente de informes internos que indican
                        que la capacidad del activo para suministrar bienes o servicios ha 
                        disminuido o va a ser inferior a la esperada. <span id="activeInformation" onclick="descriptionModal(this)" >Nota* </span>
                    </p>
                    <br/>
                    <select name="information" id="information" required class="form-control">
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
                    <textarea name="observationInformation" id="observationInformation" required cols="30" rows="8" class="w-100 form-control" placeholder="Justifique su respuesta"  maxlength="1000"></textarea>
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
        <script src="../../js/listCheck/revIndDeterioro.js"></script>
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