<?php 
require_once '../modelo/intangible/intangibleModelo.php';
require_once '../modelo/proyectoEvaluarIntangible.php';
require_once '../modelo/conexion/conexion.php';
require_once '../controladores/formatoIntangible/read.php';
    session_start();
    if (!isset($_SESSION['id'])) {
        header("Location:../index.php");
    }

?>

<!------------------INCLUIR FUNCIONES ADICIONALES------------------>
<?php include('../../funciones/funciones.php'); 
?>


<!DOCTYPE html>
<html lang="es">

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SENNOVA | Intangibles </title>
        <link rel="icon" href="../images/icon_sena.png">
        <link rel="stylesheet" href="../../css/css.css">
        <link rel="stylesheet" href="../../css/modales.css">
        <link rel="stylesheet" href="../../css/responsive.css">
        <link rel="stylesheet" href="../../css/loading.css">
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

    </head>
</head>

<body>
    <div class="header">
        <div class="banner">
            <img src="../../images/banner1.png" alt="banner" class="img_header" style="width:100%">
        </div>
    </div>
    <?php
        $project = trim($_POST['project']);
      $data = trim($_POST['id']);
      
    ?>
    <div class="caja_formulario">
        <h2 id="timeToLife"></h2>
        <?php
            echo readParameterFormato($data);
        ?>
    </div>

    <form action="../../funciones/inserta_datos4.php" class="form_formulario" enctype="multipart/form-data" method="post"
        id="formulario_principal">
        <input type="hidden" name="cod_intangible" value="<?php echo($data)?>">
        <input type="hidden" name="centro" value="<?php echo($_SESSION['centro']) ?>">
        <input type="hidden" id="facturas" name="facturas" value="">
        <div class="caja_formulario">
            <div class="titulo">VALIDACIÓN DE PREGUNTAS</div>
            <div class="formulario1 formulario_c">
                <ol class="info_cent_prop" id="general">
                    <h2 style="color:white">Preguntas aplicables a los intangibles Sennova </h2>
                    <hr /><br />


                    <li class="li_formulario">
                        <p class="etiquetas">Código del Proyecto SGPS</p>
                        <br />
                        <?php
                            echo '<input id="pregunta1"  type="text" value="'.$project.'" disabled style="font-size:20px;color:black"
                            step="any">';
                        ?>
                        
                    </li>
                    
                    <li class="li_formulario">
                        <p class="etiquetas">Si el proyecto se desarrolló con un aliado externo, indicar cuál es el
                            Porcentaje de contrapartida del SENA</p>
                        <p id="percent3" style="font-size:20px">0%</p>
                        <br />
                        <input id="pregunta3" name="pregunta3" type="number" style="font-size:20px;color:black"
                            value="0.0" step="any" onkeyup="updateMagnitud(this.value, 'percent3', '%');">
                    </li>
                            <input type="hidden" id="pregunta4" value="si">
                    
                    <div id="ocultarPreg">
                        

                        <li class="li_formulario">
                            <p class="etiquetas">VIDA ÚTIL TOTAL EN MESES, SI ES FINITA. (Tenga en cuenta los términos
                                del contrato o del concepto de quien lo fabricó). Número de meses</p>
                            <br />
                            <input id="pregunta6" name="pregunta6" type="number" style="font-size:20px;color:black"
                                value="0.0" step="any" onchange="validaPregunta6()">
                        </li>

                        <li class="li_formulario">
                            <p class="etiquetas">VIDA ÚTIL TRANSCURRIDA, SI ES FINITA (con fecha 31/12/2019), Número en
                                meses</p>
                            <br />
                            <input id="pregunta7" name="pregunta7" type="number" style="font-size:20px;color:black"
                                value="0.0" step="any" onchange="validaPregunta6()">
                        </li>

                        <li class="li_formulario">
                            <p class="etiquetas">VIDA ÚTIL REMANENTE, SI ES FINITA (resta entre la vida útil total y la
                                transcurrida). Número en meses</p>
                            <br />
                            <input id="pregunta8" name="pregunta8" type="number" style="font-size:20px;color:black"
                                value="0.0" step="any" onchange="validaPregunta6()">
                        </li>
                        <li class="li_formulario">
                            <p class="etiquetas">Vínculo para ingresar todas sus evidencias, facturas, contratos,
                                documentos y todo lo que constituye evidencia para el Intangible.</p>
                            <br />
                            <?php
                                echo linkSharepoint($project);
                            ?>
                        </li>
                        <li class="li_formulario">
                            <p class="etiquetas">¿Tiene facturas para registrar?</p>
                            <select name="pregunta9" id="pregunta9" class="selects">
                                <option value="si">si</option>
                                <option value="no">no</option>
                            </select>
                        </li>
                    </div>

                </ol>
            </div>
        </div>
    

        <div class="caja_formulario" id="tabla_facturas">
            <div class="formulario1 formulario_c" style="color:white;width:100%!important">
                <h2>Registrar facturas</h2>
                <div style="background-color:white">
                    <table id="detTbl" class="table table-striped table-hover table-bordered"
                        style="font-size:12px!important">
                        <thead>
                            <tr>
                                <th style="width: 7%;">Número de factura</th>
                                <th style="width: 8%;">La factura está a nombre del SENA</th>
                                <th style="width: 10%;">Fecha de la factura, contrato o documento</th>
                                <th style="width: 7%;">Valor total de la factura</th>
                                <th style="width: 7%;">Tiene IVA?</th>
                                <th style="width: 10%;">IVA</th>
                                <th style="width: 20%;">Concepto relacionado con el activo adquirido</th>
                                <th style="width: 10%;">Valor de concepto</th>
                                <th style="width: 7%;">Es necesario este concepto para poner en funcionamiento el
                                    intangible?</th>
                                <th style="width: 7%;">La factura que esta registrando corresponde a la fase de?</th>
                                <th style="width: 10%;">
                                    <div class="btn btn-sm btn-warning" data-toggle="modal" data-target="#mdlCtrl">
                                        Agregar Factura
                                        <i class="fa fa-plus"></i>
                                    </div>
                                </th>
                            </tr>
                        </thead>

                        <tbody id="detalleFactura_tbody">

                        </tbody>

                    </table>
                </div>

            </div>

        </div>
    
    
        <div class="radicar_proyecto" id="boton_registro">ENVIAR</div>
        <div class="radicar_proyecto" id="boton_volver">VOLVER</div>

        <!-- Modal -->
        <div class="modal fade" id="mdlCtrl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog   modal-lg" role="document">
            <div class="modal-content">
                <div class="box box-warning" style="padding:14px">
                    <div id="dvcontent">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Agrega factura</h3>
                            </div>
                            <div class="col-md-6">
                                <div class="btn btn-lg btn-warning" id="btnAgregadoFactura"
                                    onclick="agregarFactura();"><i class="fa fa-check"
                                        style="font-size:40px"></i>Agregar factura</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <strong>Numero de factura:</strong>
                                <input type="text" id="factura" placeholder="Número de factura" class="form-control" />
                            </div>
                            <div class="col-md-4">
                                <strong>Fecha de facturación:</strong>
                                <input type="date" id="fecha" class="form-control" />
                            </div>
                            <div class="col-md-4">
                                <strong>Valor total:</strong>
                                <input type="number" id="valor" placeholder="$" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Número de items de factura:</strong>
                                <select class="form-control" id="cantidad">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <strong>La factura está a nombre del SENA:</strong>
                                <select class="form-control" id="facturaDeSena">
                                    <option value="undefined">Seleccionar</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <p><strong>Tiene IVA?:</strong></p> 
                            <input type="hidden" value="si"><select id="IVASelect" class="form-control"
                                    style="width:100%" onchange="cambioValIVA(this);">
                                    <option value="si">si</option>
                                    <option value="no">no</option>
                                </select></div>
                            <div class="col-md-6">
                               <p><strong>IVA:</strong></p> 
                                <input class="form-control" type="number" id="valorIVA"></input></td>                               
                            </div>
                            <div class="col-md-12">
                                    <p><strong>La factura que esta registrando corresponde a la fase de?</strong></p>     
                                    <input type="hidden" value="No Aplica">
                                    <select class="form-control" style="width:100%" onchange="cambioVal(this);" id="fase">
                                        <option value="Adquirido">Adquirido</option>
                                        <option value="Desarrollo">Desarrollo</option>
                                        <option value="Investigación">Investigación</option>
                                    </select>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
      <?php
        echo '<input type="hidden" id="volver" value="'.trim($_POST['volver']).'">';
        echo '<input type="hidden" id="project" value="'.trim($_POST['project']).'">';
      ?>
        <script src="../../js/jquery.redirect.js"></script>
        <script src="../js/formatoIntangible.js"></script>
</body>

</html>