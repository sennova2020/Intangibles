<?php 
require_once '../modelo/intangible/intangibleModelo.php';
require_once '../modelo/proyectoEvaluarIntangible.php';
require_once '../modelo/conexion/conexion.php';
require_once '../controladores/formatoIntangible/read.php';
require_once '../controladores/verificaciones/fechaLimite.php';
require_once '../controladores/seguridad/liderSecurity.php';
    liderRol(1);    

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
            echo readParameterFormato($data,'COSTOS DEL INTANGIBLE.');
        ?>
    </div>

    <form action="../../funciones/inserta_datos4.php" class="form_formulario" enctype="multipart/form-data" method="post"
        id="formulario_principal">
        
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

                        <div class="container">
                            <div class="row">
                                <li class="li_formulario col-lg-6">
                                    <p class="etiquetas">¿La vida &uacute;til es finita o indefinida?</p>
                                    <select name="tiempoVida" id="tiempoVida" class="selects" required>
                                        <option value="" selected>Seleccione...</option>
                                        <option value="finita">Finita</option>
                                        <option value="indefinida">Indefinida</option>
                                    </select>
                                </li>

                                <li class="li_formulario col-lg-6">
                                    <p class="etiquetas">Fecha de inicio.</p>
                                    <input type="date" name="fechaInicio" id="fechaInicio" required>
                                </li>
                                
                            </div>
                        </div>

                        <div id="contenidoFinito"></div>
                    
                        <li class="li_formulario">
                            <p class="etiquetas">Vínculo para ingresar todas sus evidencias, facturas, contratos,
                                documentos y todo lo que constituye evidencia para el Intangible.</p>
                            <br />

                            
                            <?php
                                echo linkSharepoint($project);
                            ?>
                            
                        </li>
                            
                
                        
                        <li class="li_formulario">
                            <p class="etiquetas">¿Tiene documentos contables para registrar?</p>
                            <select name="pregunta9" id="pregunta9" class="selects">
                                <option value="" selected>Seleccione...</option>
                                <option value="si">Si</option>
                                <option value="no">No</option>
                            </select>
                        </li>

                </ol>
            </div>
        </div>
    
        
        
        
        <div class="caja_formulario" id="tabla_facturas" >
            

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
                                        style="font-size:40px"></i>Agregar documento Contable</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Tipo de documento contable:</strong>
                                <select  id="tipoDoc" required class="form-control" >
                                    <option value="" selected>Seleccione...</option>
                                    <option value="factura">Factura</option>
                                    <option value="contratos">Contratos</option>
                                    <option value="resolucion">Resoluci&oacute;n de apertura</option>
                                    <option value="Ordenes de pago">Ordenes de pago</option>
                                    <option value="Liquidación de contrato">Liquidaci&oacute;n de contrato</option>
                                    <option value="Cuenta de cobro">Cuenta de cobro</option>
                                    <option value="Otros">Otros</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <strong>Numero de documento contable:</strong>
                                <input type="text" id="factura" placeholder="Número del documento contable" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <strong>Fecha de facturación:</strong>
                                <input type="date" id="fecha" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <strong>Valor total:</strong>
                                <input type="number" id="valor" placeholder="$" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>N&uacute;mero de items del documento contable:</strong>
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
                                <strong>El documento contable está a nombre del SENA:</strong>
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
                                    <p><strong>El documento contable que esta registrando corresponde a la fase de?</strong></p>     
                                    <input type="hidden" value="No Aplica">
                                    <select class="form-control" style="width:100%" onchange="cambioVal(this);" id="fase">
                                        
                                    </select>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="cod_intangible" name="cod_intangible" value="<?php echo($data)?>">
        <input type="hidden" name="centro" value="<?php echo($_SESSION['centro']) ?>">
        <input type="hidden" id="facturas" name="facturas" value="">
    </form>
      <?php
        echo '<input type="hidden" id="volver" value="'.trim($_POST['volver']).'">';
        echo '<input type="hidden" id="project" value="'.trim($_POST['project']).'">';
      ?>
        <script src="../../js/jquery.redirect.js"></script>
        <script src="../js/formatoIntangible.js"></script>
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
                            $.redirect('../index.php')
                        }
                    }
                });
                    </script>";
            }
        ?>
</body>

</html>