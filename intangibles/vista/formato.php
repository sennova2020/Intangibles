<?php 
    session_start();
    if (!isset($_SESSION['id'])) {
        header("Location:index.php");
    }

?>

<!------------------INCLUIR FUNCIONES------------------>
<?php include('../funciones/funciones.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SENNOVA | Banco de Proyectos</title>
    <link rel="icon" href="images/icon_sena.png">
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="../css/modales.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/loading.css">
    <script src="../js/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

</head>
</head>
<body>
    <div class="header">
        <div class="banner">
            <img src="../images/banner.png" alt="" class="img_banner">
        </div>
    </div>
    <datalist id="tickmarks">
        <option value="0" label="0%">
        <option value="10">
        <option value="20">
        <option value="30">
        <option value="40">
        <option value="50" label="50%">
        <option value="60">
        <option value="70">
        <option value="80">
        <option value="90">
        <option value="100" label="100%">
    </datalist>
    <?php
      $data = $_GET['id'];
      $centro = $_GET['centro'];
      $linea = $_GET['cod_linea'];
      $results = getDataProyecto($data); 
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
        <div class="titulo"><?php echo($info->proyecto_consecutivo) ?></div>
        <div class="formulario1 formulario_c" style="color:white">
            <h2 class="titulo_formulario"><?php echo($info->proyecto_consecutivo) ?></h2>
            <p><strong>Centro:</strong>
            <?php echo($info->centro_nombre) ?>
            </p>
            <br/>
            <p><strong>Proyecto:</strong>
            <?php echo($info->proyecto_titulo) ?>
            </p>
            <br/>
            <p><strong>Línea programática</strong>
            <?php echo($info->linea_programatica_descripcion) ?>
            </p>
        </div>
    </div>
                        
    <form action="../funciones/inserta_datos3.php" class="form_formulario" enctype="multipart/form-data" method="post" id="formulario_principal">
        <input type="hidden" name="id_proyecto" value="<?php echo($data)?>">
        <input type="hidden" name="centro" value="<?php echo($centro)?>">
        <div class="caja_formulario">
            <div class="titulo">VALIDACIÓN DE PREGUNTAS</div>
            <div class="formulario1 formulario_c">
                <ol class="info_cent_prop" id="general"> 
                    <h2 style="color:white">Preguntas aplicables a los proyectos de todas las líneas programáticas Sennova </h2><hr/><br/> 
                    <li class="li_formulario">
                        <p class="etiquetas">De acuerdo con el análisis de viabilidad consignado en el acta, ¿es viable la ejecución del proyecto? </p>
                        <select name="pregunta1" id="pregunta1" class="selects">
                            <option value="undefined">Seleccione respuesta</option>
                            <option value="si">si</option>
                            <option value="no">no</option>
                        </select>
                    </li>
                    <li class="li_formulario">
                        <p class="etiquetas">De acuerdo con el análisis de viabilidad consignado en el acta, ¿es viable la ejecución técnica del proyecto sin la ejecución de recursos en términos presupuestales? </p>
                        <select name="pregunta2" id="pregunta2" class="selects">
                            <option value="undefined">Seleccione respuesta</option>
                            <option value="si">si</option>
                            <option value="no">no</option>
                        </select>
                    </li>
                    <li class="li_formulario">
                        <p class="etiquetas">De acuerdo con el seguimiento a la ejecución del proyecto, ¿cuál es el porcentaje de ejecución técnica a la fecha?</p><p id="percent3" style="font-size:20px">0%</p>
                        <br/>
                        <input id="pregunta3" name="pregunta3" type="number" style="font-size:20px;color:black" value="0.0" step="any"  onkeyup="updateMagnitud4(this.value, 'percent3', '%');">
                    </li>
                    <li class="li_formulario">
                        <p class="etiquetas">De acuerdo a la formulación del proyecto, ¿cuántos objetivos específicos se formularon para el proyecto?</p>
                        <p id="cant4" style="font-size:20px">0 Objetivos especificos</p>
                        <br/>
                        <input id="pregunta4" name="pregunta4" type="range" min="0" max="30" style="font-size:20px;color:white" value="0"  onchange="updateMagnitud(this.value, 'cant4', ' Objetivos especificos');">
                    </li>
                    <li class="li_formulario">
                        <p class="etiquetas">De acuerdo con el seguimiento a la ejecución del proyecto, ¿cuántos objetivos específicos presentan avance a la fecha?</p>
                        <p id="cant5" style="font-size:20px">0 Objetivos especificos</p>
                        <br/>
                        <input id="pregunta5" name="pregunta5" type="range" min="0" max="30" style="font-size:20px;color:white" value="0"  onchange="updateMagnitud1('pregunta5', 'cant5', 'El número indicado en la pregunta 5, no debe ser mayor al total de objetivos específicos referido en la pregunta 4',' Objetivos especificos', 'pregunta4');">
                    </li>
                    <li class="li_formulario">
                        <p class="etiquetas">De acuerdo con el seguimiento a la ejecución técnica del proyecto, ¿se presentan retrasos respecto del cronograma propuesto para su ejecución?</p>
                        <select name="pregunta6" id="pregunta6" class="selects">
                            <option value="undefined">Seleccione respuesta</option>
                            <option value="si">si</option>
                            <option value="no">no</option>
                        </select>
                    </li>
                    <li class="li_formulario">
                        <p class="etiquetas">Si la respuesta anterior es positiva, ¿en qué rango se ubica la desviación respecto del cronograma propuesto para la ejecución del proyecto?</p>
                        <select name="pregunta7" id="pregunta7" class="selects" disabled>
                            <option value="undefined">Seleccione respuesta</option>
                            <option value="1">Menor o igual a 30 días</option>
                            <option value="2">Entre 31 y 60 días</option>
                            <option value="3">Mayor o igual a 61 días</option>
                        </select>
                    </li>
                    <li class="li_formulario">
                        <p class="etiquetas">¿El presupuesto del proyecto ha sido objeto de disminución/centralización?</p>
                        <br/>
                        <select name="pregunta8" id="pregunta8" class="selects">
                            <option value="undefined">Seleccione respuesta</option>
                            <option value="si">si</option>
                            <option value="no">no</option>
                        </select>
                    </li>
                    <li class="li_formulario">
                        <p class="etiquetas">Si la respuesta anterior es positiva ¿en qué rango se ubica la disminución/centralización de recursos a la fecha, respecto del valor total asignado al proyecto?</p>
                        <select name="pregunta9" id="pregunta9" class="selects">
                            <option value="undefined">Seleccione respuesta</option>
                            <option value="1">Menor o igual a 10,9%.</option>
                            <option value="2">Entre 11% y 20,9%. </option>
                            <option value="3">Mayor o igual a 21%.</option>
                        </select>
                    </li>
                    <li class="li_formulario">
                        <p class="etiquetas">De acuerdo con el seguimiento a la ejecución del proyecto, ¿cuál es el porcentaje de ejecución presupuestal a la fecha? </p>
                        <p id="percent10" style="font-size:20px">0 %</p>
                        <br/>
                        <input id="pregunta10" name="pregunta10" type="number" style="font-size:20px;color:black" value="0.0" step="any"  onkeyup="updateMagnitud4(this.value, 'percent10', '%');">                        
                    </li>
                    <li class="li_formulario">
                        <p class="etiquetas">De acuerdo con la formulación del proyecto, ¿cuántos bienes (diferentes de materiales de formación) se requieren para la ejecución del proyecto?</p>
                        <p class="etiquetas">“Nota: se entiende por bienes los objetos o mercancías tangibles o intangibles, que responden a la categoría de bienes devolutivos acorde con la Guía para la Administración y Control de Bienes (GIL-G-003). Su adquisición se efectúa a través de los rubros Maquinaria y Equipos y Otros Activos Fijos”.</p>
                        <p id="cant11" style="font-size:20px">0 Bienes</p>
                        <br/>
                        <input id="pregunta11" name="pregunta11" type="range" min="0" max="50" style="font-size:20px;color:white" value="0"  onchange="updateMagnitud5();">
                    </li>

                    <li class="li_formulario">
                        <p class="etiquetas">De acuerdo con el seguimiento a la ejecución del proyecto, ¿cuántos bienes (diferentes de materiales de formación) de los que se requieren para la ejecución del proyecto se han adquirido a la fecha?</p>
                        <p id="cant12" style="font-size:20px">0 Bienes</p>
                        <br/>
                        <input id="pregunta12" name="pregunta12" type="range" min="0" max="50" style="font-size:20px;color:white" value="0"  onchange="updateMagnitud7();">
                    </li>

                    <li class="li_formulario">
                        <p class="etiquetas">De acuerdo con el análisis de viabilidad consignado en el acta, ¿cuántos bienes de los que se requieren para la ejecución del proyecto (diferentes de materiales de formación) no es posible adquirir en las actuales circunstancias?</p>
                        <p id="cant13" style="font-size:20px">0 Bienes</p>
                        <br/>
                        <input id="pregunta13" name="pregunta13" type="range" min="0" max="50" style="font-size:20px;color:white" value="0"  onchange="updateMagnitud5();">
                    </li>

                    <li class="li_formulario">
                        <p class="etiquetas"> De acuerdo con la formulación del proyecto o aprobaciones posteriores realizadas a través de resolución, ¿cuántos servicios, cuya contratación se propuso con personas naturales, se requieren para la ejecución del proyecto?</p>
                        <p class="etiquetas">“Nota: se entiende por servicios para las preguntas <strong>14, 15 y 16</strong> los autorizados bajo el rubro Servicios Prestados a las Empresas y Servicios de Producción, cuya contratación se haga con <strong>persona natural</strong>.”</p>
                        <p id="cant14" style="font-size:20px">0 Servicios</p>
                        <br/>
                        <input id="pregunta14" name="pregunta14" type="range" min="0" max="50" style="font-size:20px;color:white" value="0"  onchange="updateMagnitud2();">
                    </li>
                    <li class="li_formulario">
                        <p class="etiquetas">De acuerdo con el seguimiento a la ejecución del proyecto, ¿cuántos servicios con personas naturales se han contratado a la fecha?</p>
                        <p id="cant15" style="font-size:20px">0 Servicios</p>
                        <br/>
                        <input id="pregunta15" name="pregunta15" type="range" min="0" max="50" style="font-size:20px;color:white" value="0"  onchange="updateMagnitud8()">
                    </li>
                    <li class="li_formulario">
                        <p class="etiquetas">De acuerdo con el análisis de viabilidad consignado en el acta, de los servicios cuya contratación se propuso con personas naturales, que aún no se han contratado, ¿para cuántos es viable la contratación y ejecución en las actuales circunstancias?</p>
                        <p id="cant16" style="font-size:20px">0 Servicios</p>
                        <br/>
                        <input id="pregunta16" name="pregunta16" type="range" min="0" max="50" style="font-size:20px;color:white" value="0"  onchange="updateMagnitud2();">
                    </li>

                    <li class="li_formulario">
                        <p class="etiquetas">De acuerdo con la formulación del proyecto, ¿cuántos servicios, cuya contratación se propuso con personas jurídicas, se requieren para la ejecución del proyecto?</p>
                        <p class="etiquetas">“Nota: se entiende por servicios para las preguntas <strong>17, 18, 19 y 20</strong> los autorizados bajo los rubros Servicios Prestados a las Empresas y Servicios de Producción, Servicios de la Construcción y Servicios de Alojamiento; Servicios de Suministro de Comidas y Bebidas; Servicios de Transporte; y Servicios de Distribución de Electricidad, Gas y Agua, siempre que su contratación se haga con <strong>personas jurídicas</strong>.”</p>
                        <p id="cant17" style="font-size:20px">0 Servicios</p>
                        <br/>
                        <input id="pregunta17" name="pregunta17" type="range" min="0" max="50" style="font-size:20px;color:white" value="0"  onchange="updateMagnitud6();">
                    </li>
                    <li class="li_formulario">
                        <p class="etiquetas">De acuerdo con el seguimiento a la ejecución del proyecto, ¿cuántos servicios de los que se requieren para la ejecución del proyecto se han contratado a la fecha?</p>                        
                        <p id="cant18" style="font-size:20px">0 Servicios</p>
                        <br/>
                        <input id="pregunta18" name="pregunta18" type="range" min="0" max="50" style="font-size:20px;color:white" value="0"  onchange="updateMagnitud9();">
                    </li>
                    <li class="li_formulario">
                        <p class="etiquetas">De acuerdo con el análisis de viabilidad consignado en el acta, de los servicios contratados, ¿cuántos se encuentran suspendidos o es inviable continuar con su prestación?</p>
                        <p id="cant19" style="font-size:20px">0 Servicios</p>
                        <br/>
                        <input id="pregunta19" name="pregunta19" type="range" min="0" max="50" style="font-size:20px;color:white" value="0"  onchange="updateMagnitud10();">
                    </li>
                    <li class="li_formulario">
                        <p class="etiquetas">De acuerdo con el análisis de viabilidad consignado en el acta, de los servicios que aún no se han contratado, ¿para cuántos es viable su contratación y ejecución en las actuales circunstancias?</p>
                        <p id="cant20" style="font-size:20px">0 Servicios</p>
                        <br/>
                        <input id="pregunta20" name="pregunta20" type="range" min="0" max="50" style="font-size:20px;color:white" value="0"  onchange="updateMagnitud6();">
                    </li>

                    <li class="li_formulario">
                        <p class="etiquetas">De acuerdo con la formulación del proyecto ¿su ejecución apunta exclusivamente a la realización de eventos de divulgación?</p>
                        <br/>
                        <select name="pregunta21" id="pregunta21" class="selects">
                            <option value="undefined">Seleccione respuesta</option>
                            <option value="NA">No aplica</option>
                            <option value="si">si</option>
                            <option value="no">no</option>
                        </select>
                    </li>

                    <li class="li_formulario">
                        <p class="etiquetas">De acuerdo con la formulación del proyecto, ¿se contempla la elaboración de una producción académica independientemente de la realización de eventos de divulgación presenciales?</p>
                        <br/>
                        <select name="pregunta22" id="pregunta22" class="selects">
                            <option value="undefined">Seleccione respuesta</option>
                            <option value="NA">No aplica</option>
                            <option value="si">si</option>
                            <option value="no">no</option>
                        </select>
                    </li>
                    <li class="li_formulario">
                        <p class="etiquetas">De acuerdo con la formulación del proyecto, ¿se contemplan la realización de actividades de apropiación del conocimiento independientes de los eventos de divulgación?</p>
                        <br/>
                        <select name="pregunta23" id="pregunta23" class="selects">
                            <option value="undefined">Seleccione respuesta</option>
                            <option value="NA">No aplica</option>
                            <option value="si">si</option>
                            <option value="no">no</option>
                        </select>
                    </li>
                </ol>
                <br/>


                <ol class="info_cent_prop invisible" id="68">  
                    <h2 style="color:white">Preguntas aplicables a la Línea Servicios Tecnológicos – Línea 68</h2><hr/><br/>              
                    <li class="li_formulario">
                        <p class="etiquetas">De acuerdo con la formulación del proyecto ¿su ejecución apunta a mantener la acreditación, habilitación o certificación de laboratorio?</p>
                        <br/>
                        <select name="pregunta24" id="pregunta24" class="selects">
                            <option value="undefined">Seleccione respuesta</option>
                            <option value="si">si</option>
                            <option value="no">no</option>
                        </select>
                    </li>
                    <li class="li_formulario">
                        <p class="etiquetas">De acuerdo con el seguimiento a la ejecución del proyecto, ¿cuál es el avance documental del proyecto según el cumplimiento de los requisitos contemplados en los numerales de la norma criterio (ISO/IEC 17025:2017, ISO 2119, ISO 9001, ISO 55001, ISO 22000, etc.)?</p>
                        <p class="etiquetas">NOTA: Tenga en cuenta que para  calcular el porcentaje de avance documental, deberá acreditar el cumplimiento de los requisitos de la norma criterio que aplica, con el (los) documentos que dan respuesta a cada requisito. El cálculo se realizará sobre la totalidad de numerales de la norma, ejemplo:</p>
                        <p class="etiquetas">Norma ISO/IEC 17025:2017: 35 numerales (4.1, 4.2, 5.1, 5.2…6.6, 6.2…7.1, 7.2, 7.3… 8.1 ,8.2…, etc.) equivale a 100%. 
                                            Avance documental del proyecto: evidencia 4 numerales (4.1, 4.2, 5.1, 5.2) acreditados con ## documentos (procedimientos, formatos, etc.) que dan respuesta a cada requisito de los numerales mencionados, lo que corresponde respecto del total de numerales de la norma criterio, al 11%.
                                            </p>
                        <p id="cant25" style="font-size:20px">0 %</p>
                        <br/>
                        <input id="pregunta25" name="pregunta25" type="range" min="0" max="100" style="font-size:20px;color:white" value="0"  onchange="updateMagnitud(this.value, 'cant25', ' %');">
                    </li>
                    <li class="li_formulario">
                        <p class="etiquetas">De acuerdo con el seguimiento a la ejecución del proyecto, ¿entre los servicios requeridos para su ejecución, que aún no se han contratado, se encuentra alguno de los siguientes: auditoria interna, ensayos de aptitud o programa de calibración de equipos?</p>
                        <br/>
                        <select name="pregunta26" id="pregunta26" class="selects">
                            <option value="undefined">Seleccione respuesta</option>
                            <option value="si">si</option>
                            <option value="no">no</option>
                        </select>
                    </li>
                </ol>
                <div class="radicar_proyecto" id="boton_registro">ENVIAR</div>
                <div class="radicar_proyecto" id="boton_volver">VOLVER</div>
            </div>
        </div>
    </form>
    <script src="../js/jquery.redirect.js"></script>

<script>
    var now1 = new Date();
    now1.setMinutes(now1.getMinutes() + 24);
    var countDownDate = new Date(now1).getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.getElementById("timeToLife").innerHTML = "Tiene "+ minutes + "minutos " + seconds + "segundos para completar la encuesta.";

    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("timeToLife").innerHTML = "Session expirada.";
        $(".radicar_proyecto").remove();
    }
    }, 1000);
</script>

<script>

    $("#pregunta6").change(function(e)
    {
        var respuesta = $("#pregunta6").val();
        if(respuesta === 'si'){
            $('#pregunta7').prop('disabled', false);
        }
        else{
            $('#pregunta7').prop('disabled', true);
            $('#pregunta7').val('undefined').change();
        }
    });

    $("#pregunta8").change(function(e)
    {
        var respuesta = $("#pregunta8").val();
        if(respuesta === 'si'){
            $('#pregunta9').prop('disabled', false);
        }
        else{
            $('#pregunta9').prop('disabled', true);
            $('#pregunta9').val('undefined').change();
        }
    });

    $("#boton_volver").click(function(){
        $.redirect('proyectos.php', {'centro': '<?php echo($info->codigo_centro) ?>'}, "POST");
    });

    $("#boton_registro").click(function(){
        var result = validarEnvioDatos(); 
        if(result === "")
        {
            $.confirm({
                title: 'Confirmación de envío',
                content: 'Esta seguro de enviar esta información',
                buttons: {
                    confirm: function () {
                        $("#formulario_principal").submit();
                    },
                    cancel: function () {

                    },
                }
            });
        }
        else{
            $.alert({
                title: 'Error',
                content: result,
            });
        }
    });

    $(document).ready(function(){
        setVisibilidad();
    });

    function setVisibilidad(){
        //23   68	66	82	65	69	70
        var tipo = '<?php echo($linea) ?>'
        switch (tipo) 
        {
            case '23':
                $("#23").removeClass('invisible');
            break;
            case '68':
                $("#68").removeClass('invisible');
            break;
            case '66':
                $("#66").removeClass('invisible');
            break;
            case '82':
                $("#82").removeClass('invisible');
            break;
            case '65':
                $("#65").removeClass('invisible');
            break;
            case '69':
                $("#69").removeClass('invisible');
            break;
            case '70':
                $("#70").removeClass('invisible');
            break;
        }
    }


    function validarEnvioDatos(){

        var pregunta1 = $("#pregunta1").val();
        var pregunta2 = $("#pregunta2").val();
        var pregunta3 = parseFloat($("#pregunta3").val());
        var pregunta4 = parseInt($("#pregunta4").val());
        var pregunta5 = parseInt($("#pregunta5").val());
        var pregunta6 = $("#pregunta6").val();
        var pregunta7 = $("#pregunta7").val();
        var pregunta8 = $("#pregunta8").val();
        var pregunta9 = $("#pregunta9").val();
        var pregunta10 = parseFloat($("#pregunta10").val());
        var pregunta11 = parseInt($("#pregunta11").val());
        var pregunta12 = parseInt($("#pregunta12").val());
        var pregunta13 = parseInt($("#pregunta13").val());
        var pregunta14 = parseInt($("#pregunta14").val());
        var pregunta15 = parseInt($("#pregunta15").val());
        var pregunta16 = parseInt($("#pregunta16").val());
        var pregunta17 = parseInt($("#pregunta17").val());
        var pregunta18 = parseInt($("#pregunta18").val());
        var pregunta19 = parseInt($("#pregunta19").val());
        var pregunta20 = parseInt($("#pregunta20").val());
        var pregunta21 = $("#pregunta21").val();
        var pregunta22 = $("#pregunta22").val();
        var pregunta23 = $("#pregunta23").val();
        var pregunta24 = $("#pregunta24").val();
        var pregunta25 = $("#pregunta25").val();
        var pregunta26 = $("#pregunta26").val();
        

        //VALIDACIONES
        var results ="";

        if(pregunta1 === 'undefined')
        {
            results = results + " Debe seleccionar si o no para la pregunta 1 - ";
        }

        if(isNaN(pregunta3))
         {
            $("#"+label).text('0'+mag);
            pregunta3 =0;
         }
         else{
            if(pregunta3 < 0 || pregunta3 > 100)
            {
                results = results + " Debe ser un porcentaje positivo y menor o igual a 100% para la pregunta 3 - ";
            }
         }

         if(isNaN(pregunta10))
         {
            $("#"+label).text('0'+mag);
            pregunta10 =0;
         }
         else{
            if(pregunta10 < 0 || pregunta10 > 100)
            {
                results = results + " Debe ser un porcentaje positivo y menor o igual a 100% para la pregunta 10 - ";
            }
         }

        if(pregunta2 === 'undefined')
        {
            results = results + " Debe seleccionar si o no para la pregunta 2 - ";
        }

        if(pregunta4 < pregunta5){
            results = results + " La pregunta 4 debe ser mayor o igual a la pregunta 5, ajuste la pregunta 4 y 5. - ";
        }

        if(pregunta6 === 'undefined')
        {
            results = results + "Debe seleccionar si o no para la pregunta 6 - ";
        }

        if(pregunta8 === 'undefined')
        {
            results = results + "Debe seleccionar si o no para la pregunta 8 - ";
        }

        if(pregunta8 === 'si' && pregunta9 === 'undefined')
        {
            results = results + "Debe seleccionar una opción en la pregunta 9, ya que la pregunta 8 fue afirmativa - ";
        }

        if(pregunta11-pregunta12 < pregunta13){
            results = results + "El número de bienes indicado no debe ser mayor al número de bienes pendientes por adquirir.";
        }

        if(pregunta11 < pregunta12)
        {
            results = results + "El número indicado en la pregunta 12 no debe ser mayor al número de bienes referido en la pregunta 11. - ";
        }

        if(pregunta14-pregunta15 < pregunta16){
            results = results + "El número de servicios indicado no debe ser mayor al número de servicios pendientes por contratar. - ";
        }
        if(pregunta14 < pregunta15)
        {
            results = results + "El número indicado en la pregunta 15 no debe ser mayor al número de servicios referido en la pregunta 14. - ";
        }
        
        if(pregunta17 < pregunta18){
            results = results + "El número indicado en la pregunta 18 no debe ser mayor al total de servicios referido en la pregunta 17  - ";
        }

        if(pregunta18 < pregunta19){
            results = results + "El número indicado en la pregunta 19 no debe ser mayor a los servicios referidos en la pregunta 18. - ";
        }

        if(pregunta17-pregunta18 < pregunta20){
            results = results +  "La respuesta de la pregunta 20 no puede ser mayor a la diferencia entre la pregunta 17 y 18.";
        }

        if(pregunta21 === 'undefined')
        {
            results = results + "Debe seleccionar si o no para la pregunta 21 - ";
        }

        if(pregunta22 === 'undefined')
        {
            results = results + "Debe seleccionar si o no para la pregunta 22 - ";
        }
        if(pregunta23 === 'undefined')
        {
            results = results + "Debe seleccionar si o no para la pregunta 23 - ";
        }

        var tipo = '<?php echo($linea) ?>'
        if(tipo ==='68')
        {
            if(pregunta24 === 'undefined')
            {
                results = results + "Debe seleccionar si o no para la pregunta 1 de esta sección -  ";
            }
            if(pregunta26 === 'undefined')
            {
                results = results + "Debe seleccionar si o no para la pregunta 3 de esta sección - ";
            }

        }

        return results;
     }



     function updateMagnitud4(value, label, mag){
         var number = parseInt(value);
         if(number >= 0 && number < 100)
         {
            $("#"+label).text(value+mag);
         }
         else if(isNaN(number))
         {
            $("#"+label).text('0'+mag);
         }
         else{
            $("#"+label).text("Valor no permitido.");
            $.alert({
                title: 'Error',
                content: " Debe ser un porcentaje positivo y menor o igual a 100%.",
            });
         }
     }

     

     function updateMagnitud(value, label, mag){
         $("#"+label).text(value+mag);
     }

     function updateMagnitud1(objeto, aviso, mensaje, magnitud, referencia)
     {
        if(validaPrecondicionesNumerica(referencia,objeto, mensaje))
        {
            var previaVal = $("#"+objeto).val();
            updateMagnitud(previaVal, aviso, magnitud);
        }
     }

     function updateMagnitud2(){
        var pregunta14 = parseInt($("#pregunta14").val());
        var pregunta15 = parseInt($("#pregunta15").val());
        var pregunta16 = parseInt($("#pregunta16").val());

        if(pregunta14-pregunta15 < pregunta16){
            $.alert({
                title: 'Error',
                content: "El número de servicios indicado no debe ser mayor al número de servicios pendientes por contratar.",
            });
        }
        $("#cant14").text(pregunta14+" Servicios");
        $("#cant15").text(pregunta15+" Servicios");
        $("#cant16").text(pregunta16+" Servicios");

     }

     function updateMagnitud5(){
        var pregunta11 = parseInt($("#pregunta11").val());
        var pregunta12 = parseInt($("#pregunta12").val());
        var pregunta13 = parseInt($("#pregunta13").val());

        if(pregunta11-pregunta12 < pregunta13){
            $.alert({
                title: 'Error',
                content: "El número de bienes indicado no debe ser mayor al número de bienes pendientes por adquirir.",
            });
        }
        $("#cant11").text(pregunta11+" Bienes");
        $("#cant12").text(pregunta12+" Bienes");
        $("#cant13").text(pregunta13+" Bienes");

     }


     function updateMagnitud6(){
        var pregunta17 = parseInt($("#pregunta17").val());
        var pregunta18 = parseInt($("#pregunta18").val());
        var pregunta20 = parseInt($("#pregunta20").val());

        if(pregunta17-pregunta18 < pregunta20){
            $.alert({
                title: 'Error',
                content: "La respuesta de la pregunta 20 no puede ser mayor a la diferencia entre la pregunta 17 y 18.",
            });
        }
        $("#cant17").text(pregunta17+" Servicios");
        $("#cant18").text(pregunta18+" Servicios");
        $("#cant20").text(pregunta20+" Servicios");

     }

     function updateMagnitud7(){
        var pregunta11 = parseInt($("#pregunta11").val());
        var pregunta12 = parseInt($("#pregunta12").val());
        var pregunta13 = parseInt($("#pregunta13").val());

        if(pregunta11-pregunta12 < pregunta13){
            $.alert({
                title: 'Error',
                content: "La respuesta de la pregunta 13 no puede ser mayor a la diferencia entre la pregunta 11 y 12.",
            });
        }

        if(pregunta11 < pregunta12)
        {
            $.alert({
                title: 'Error',
                content: "El número indicado en la pregunta 12 no debe ser mayor al número de bienes referido en la pregunta 11.",
            });
        }

        $("#cant11").text(pregunta11+" Bienes");
        $("#cant12").text(pregunta12+" Bienes");
        $("#cant13").text(pregunta13+" Bienes");

     }


     function updateMagnitud8(){
        var pregunta14 = parseInt($("#pregunta14").val());
        var pregunta15 = parseInt($("#pregunta15").val());
        var pregunta16 = parseInt($("#pregunta16").val());

        if(pregunta14-pregunta15 < pregunta16){
            $.alert({
                title: 'Error',
                content: "La respuesta de la pregunta 16 no puede ser mayor a la diferencia entre la pregunta 14 y 15.",
            });
        }

        if(pregunta14 < pregunta15)
        {
            $.alert({
                title: 'Error',
                content: "El número indicado de la pregunta 15 no debe ser mayor al total de servicios referido en la pregunta 14.",
            });
        }

        $("#cant14").text(pregunta14+" Servicios");
        $("#cant15").text(pregunta15+" Servicios");
        $("#cant16").text(pregunta16+" Servicios");

     }

     function updateMagnitud9(){
        var pregunta17 = parseInt($("#pregunta17").val());
        var pregunta18 = parseInt($("#pregunta18").val());
        var pregunta20 = parseInt($("#pregunta20").val());

        if(pregunta17-pregunta18 < pregunta20){
            $.alert({
                title: 'Error',
                content: "El número de servicios indicado no debe ser mayor al número de servicios pendientes por contratar.",
            });
        }

        if(pregunta17 < pregunta18)
        {
            $.alert({
                title: 'Error',
                content: "El número indicado en la pregunta 18 no debe ser mayor al número de servicios referidos en la pregunta 17.",
            });
        }
        $("#cant17").text(pregunta17+" Servicios");
        $("#cant18").text(pregunta18+" Servicios");
        $("#cant20").text(pregunta20+" Servicios");

     }

     function updateMagnitud10(){
        var pregunta17 = parseInt($("#pregunta17").val());
        var pregunta18 = parseInt($("#pregunta18").val());
        var pregunta19 = parseInt($("#pregunta19").val());
        var pregunta20 = parseInt($("#pregunta20").val());

        if(pregunta17-pregunta18 < pregunta20){
            $.alert({
                title: 'Error',
                content: "El número de servicios indicado no debe ser mayor al número de servicios pendientes por contratar.",
            });
        }

        if(pregunta18 < pregunta19)
        {
            $.alert({
                title: 'Error',
                content: "El número indicado en la pregunta 19 no debe ser mayor a los servicios referidos en la pregunta 18.",
            });
        }
        $("#cant17").text(pregunta17+" Servicios");
        $("#cant18").text(pregunta18+" Servicios");
        $("#cant19").text(pregunta19+" Servicios");
        $("#cant20").text(pregunta20+" Servicios");

     }

    
    function validaPrecondicionesNumerica(previa, posterior, mensaje){
        var previaVal = parseInt($("#"+previa).val());
        var posteriorVal = parseInt($("#"+posterior).val());

        if(previaVal < posteriorVal){
            $.alert({
                title: 'Error',
                content: mensaje,
            });
            return false;
        }
        return true;
     }

     $(document).ready(function() {
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
            event.preventDefault();
            return false;
            }
        });
      });
</script>

</body>
</html>

