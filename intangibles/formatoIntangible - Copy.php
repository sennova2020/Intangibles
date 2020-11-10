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
    <title>SENNOVA | Intangibles </title>
    <link rel="icon" href="images/icon_sena.png">
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="../css/modales.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/loading.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">

</head>
</head>
<body>
    <div class="header">
        <div class="banner">
            <img src="../images/banner1.png" alt="banner" class="img_header" style="width:100%">
        </div>
    </div>
    <?php
      $data = $_GET['id'];
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
            <h2 class="titulo_formulario"><?php echo($info->cod_intangible) ?></h2>
            <p><strong>Centro:</strong>
            <?php echo($info->nombre_centro) ?>
            </p>
            <br/>
            <p><strong>Intangible:</strong>
            <?php echo($info->nombre_intangible) ?>
            </p>
            <br/>
            <p><strong>Tipo Intangible</strong>
            <?php echo($info->tipo_intangible) ?>
            </p>
        </div>
    </div>
                        
    <form action="../funciones/inserta_datos4.php" class="form_formulario" enctype="multipart/form-data" method="post" id="formulario_principal">
        <input type="hidden" name="cod_intangible" value="<?php echo($data)?>">
        <input type="hidden" name="centro" value="<?php echo($info->codigo_centro) ?>">
        <input type="hidden" id="facturas" name="facturas" value="">
        <div class="caja_formulario">
            <div class="titulo">VALIDACIÓN DE PREGUNTAS</div>
            <div class="formulario1 formulario_c">
                <ol class="info_cent_prop" id="general"> 
                    <h2 style="color:white">Preguntas aplicables a los intangibles Sennova </h2><hr/><br/> 
                    
                    
                    <li class="li_formulario">
                        <p class="etiquetas">Código del Proyecto SGPS</p>
                        <br/>
                        <input id="pregunta1" name="pregunta1" type="text" style="font-size:20px;color:black" step="any" >
                    </li>
                    <li class="li_formulario">
                        <p class="etiquetas">Línea Programática</p>
                        <br/>
                        <!-- <input id="pregunta2" name="pregunta2" type="text" style="font-size:20px;color:black"step="any" > -->
                        <select name="pregunta2" id="pregunta2" class="selects">
                        <option value= "undefined">Seleccione una opción </option>
                            <option value="23 - Actualización y modernización tecnológica de los centros de formación (Modernización)">23 - Actualización y modernización tecnológica de los centros de formación (Modernización)</option>
                            <option value="68 - Fortalecimiento de la oferta de servicios tecnológicos para las empresas (Servicios tecnológicos)">68 - Fortalecimiento de la oferta de servicios tecnológicos para las empresas (Servicios tecnológicos)</option>
                            <option value="66 - Investigación aplicada y semillero de investigación en centros de formación (investigación)">68 - Fortalecimiento de la oferta de servicios tecnológicos para las empresas (Servicios tecnológicos)</option>
                            <option value="82 - Fomento de la innovación y desarrollo tecnológico en las empresas (Innovación)">82 - Fomento de la innovación y desarrollo tecnológico en las empresas (Innovación)</option>
                            <option value="66 - Investigación Aplicada">66 - Investigación Aplicada</option>
                            <option value="69 - Parques tecnológicos - Red Tecnoparque Colombia - Vigencia Regular">69 - Parques tecnológicos - Red Tecnoparque Colombia - Vigencia Regular</option>
                            <option value="69 - Parques tecnológicos - Red Tecnoparque Colombia - Modernizacion">69 - Parques tecnológicos - Red Tecnoparque Colombia - Modernizacion</option>
                            <option value="69 - Parques tecnológicos - Red Tecnoparque Colombia - Apropiación">69 - Parques tecnológicos - Red Tecnoparque Colombia - Apropiación</option>
                            <option value="70 - Tecnoacademia - Vigencia Regular">70 - Tecnoacademia - Vigencia Regular</option>
                            <option value="70 - Tecnoacademia - Modernización">70 - Tecnoacademia - Modernización</option>
                            <option value="70 - Tecnoacademia - Apropiación">70 - Tecnoacademia - Apropiación</option>
                        </select>
                    </li>
                    <li class="li_formulario">
                        <p class="etiquetas">Si el proyecto se desarrolló con un aliado externo, indicar cuál es el Porcentaje de contrapartida del SENA</p><p id="percent3" style="font-size:20px">0%</p>
                        <br/>
                        <input id="pregunta3" name="pregunta3" type="number" style="font-size:20px;color:black" value="0.0" step="any"  onkeyup="updateMagnitud(this.value, 'percent3', '%');">
                    </li>
                    <li class="li_formulario">
                        <p class="etiquetas">¿No se espera vender en el curso de las actividades de la entidad? Si la intención de la entidad es NO venderlo, la respuesta es SI. Si la intención de la entidad es venderlo, la respuesta a la pregunta es un NO.</p>
                        <select name="pregunta4" id="pregunta4" class="selects">
                            <option value="si">si</option>
                            <option value="no">no</option>
                        </select>
                    </li>
                    <div id="ocultarPreg">
                                        <li class="li_formulario">
                            <p class="etiquetas">Observaciones a la pregunta ¿No se espera vender en el curso de las actividades de la entidad?</p>
                            <br/>
                            <input id="pregunta5" name="pregunta5" type="text" style="font-size:20px;color:black" step="any" >
                        </li>

                        <li class="li_formulario">
                            <p class="etiquetas">VIDA ÚTIL TOTAL EN MESES, SI ES FINITA. (Tenga en cuenta los términos del contrato o del concepto de quien lo fabricó). Número de meses</p>
                            <br/>
                            <input id="pregunta6" name="pregunta6" type="number" style="font-size:20px;color:black" value="0.0" step="any" onchange="validaPregunta6()">
                        </li>

                        <li class="li_formulario">
                            <p class="etiquetas">VIDA ÚTIL TRANSCURRIDA, SI ES FINITA (con fecha 31/12/2019), Número en meses</p>
                            <br/>
                            <input id="pregunta7" name="pregunta7" type="number" style="font-size:20px;color:black" value="0.0" step="any" onchange="validaPregunta6()">
                        </li>

                        <li class="li_formulario">
                            <p class="etiquetas">VIDA ÚTIL REMANENTE, SI ES FINITA (resta entre la vida útil total y la transcurrida). Número en meses</p>
                            <br/>
                            <input id="pregunta8" name="pregunta8" type="number" style="font-size:20px;color:black" value="0.0" step="any" onchange="validaPregunta6()">
                        </li>
                        <li class="li_formulario">
                            <p class="etiquetas">Vínculo para ingresar todas sus evidencias, facturas, contratos, documentos y todo lo que constituye evidencia para el Intangible.</p>
                            <br/>
                            <a class="btn btn-md btn-warning" href="<?php echo($info->link_sharepoint) ?>" target="_blank">Ingrese Evidencias Aquí</a>
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
    </form>

    <div class="caja_formulario" id="tabla_facturas">
        <div class="formulario1 formulario_c" style="color:white;width:100%!important">
        <h2>Registrar facturas</h2>
        <div style="background-color:white">
            <table id="detTbl"  class="table table-striped table-hover table-bordered" style="font-size:12px!important">
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
                        <th style="width: 7%;">Es necesario este concepto para poner en funcionamiento el intangible?</th>
                        <th style="width: 7%;">La factura que esta registrando corresponde a la fase de?</th>
                        <th style="width: 10%;">
                            <button class="btn btn-sm btn-warning" onclick="agregarFase()">
                                Nuevo concepto Factura
                                <i class="fa fa-plus"></i> 
                            </button>
                        </th>
                    </tr>
                </thead>

                <tbody>
                        <tr>
                            <td class="attrValue">
                                <input type="number" style="width:100%">
                            </td>
                            <td class="attrValue">
                                <input type=hidden value="si"> 
                                <select class="selects" style="width:100%" onchange="cambioVal(this);">
                                    <option value="si">si</option>
                                    <option value='no'>no</option>
                                </select>
                            </td>
                            <td class="attrValue">
                                <input type=hidden value=""> 
                                <input type="date" style="width:100%" onchange="cambioValInput(this);">
                            </td>
                            <td class="attrValue">
                                <input type="number" style="width:100%">
                            </td>
                            <td class="attrValue">
                                <input type=hidden value="si"> 
                                <select class="selects" style="width:100%" onchange="cambioVal(this);">
                                    <option value="si">si</option>
                                    <option value='no'>no</option>
                                </select>
                            </td>
                           
                            <td class="attrValue">
                                <input type="number" style="width:100%">
                            </td>
                            <td class="attrValue">
                                <select name="col6" id="col6" class="selects" style="width:100%" onchange="setSeleccion(this)">
                                    <option value="undefined">Seleccione respuesta</option>
                                    <option value='Transporte'>Transporte</option>
                                    <option value='Flete'>Flete</option>
                                    <option value='Honorarios'>Honorarios</option>
                                    <option value='Arrendamiento de Equipos'>Arrendamiento de Equipos</option>
                                    <option value='Aranceles de importación'>Aranceles de importación</option>
                                    <option value='Capacitación de Personal'>Capacitación de Personal</option>
                                    <option value='Adquisición de Servicios de Instalacion de terminación de Acabados entre otros'>Adquisición de Servicios de Instalacion de terminación de Acabados entre otros</option>
                                    <option value='Mantenimiento de maquinaria, equipo, transporte y software'>Mantenimiento de maquinaria, equipo, transporte y software</option>
                                    <option value='Minerales, Electricidad, Gas y Agua'>Minerales, Electricidad, Gas y Agu</option>
                                    <option value='Paquetes de software'>Paquetes de software</option>
                                    <option value='Cualquier otro costo Relacionado. Ingrese Cual?'>Cualquier otro costo Relacionado. Ingrese Cual?</option>
                                    <option value='Concepto no relacionado con el activo intangible'>Concepto no relacionado con el activo intangible</option>
                                </select>
                                <p id="preguntaCol6"></p>
                            </td>
                            <td class="attrValue">
                                <input type="number" style="width:100%">
                            </td>
                            <td class="attrValue">
                                <input type=hidden value="si"> 
                                <select class="selects" style="width:100%" onchange="cambioVal(this);">
                                    <option value="si">si</option>
                                    <option value='no'>no</option>
                                </select>
                            </td>
                            <td class="attrValue">
                                <input type=hidden value="si"> 
                                <select class="selects" style="width:100%" onchange="cambioVal(this);">
                                    <option value="No Aplica">No Aplica</option>
                                    <option value="Desarrollo">Desarrollo</option>
                                    <option value='Investigación'>Investigación</option>
                                </select>
                            </td>
                            <td>
                                Eliminar factura
                                <button class="btn btn-sm btn-danger" onclick="eliminarFase(this)">
                                    <i class="fa fa-eraser"></i>
                                </button>
                            </td>
                        </tr>
                </tbody>

            </table>
        </div>

        </div>

    </div>
    <div class="radicar_proyecto" id="boton_registro">ENVIAR</div>
    <div class="radicar_proyecto" id="boton_volver">VOLVER</div>
    <script src="../js/jquery.redirect.js"></script>
<script>
    function setSeleccion(object){
        var seleccion = $(object).val();
        if(seleccion === 'Cualquier otro costo Relacionado. Ingrese Cual?')
        {
            $.confirm({
                title: 'Ingrese el otro concepto diferente',
                content: '' +
                '<form action="" class="formName">' +
                '<div class="form-group">' +
                '<input type="text" placeholder="Otro concepto..." class="name form-control" required />' +
                '</div>' +
                '</form>',
                buttons: {
                    formSubmit: {
                        text: 'Establecer',
                        btnClass: 'btn-blue',
                        action: function () {
                            var name = this.$content.find('.name').val();
                            if(!name){
                                $.alert('provea un texto válido');
                                return false;
                            }
                            $(object.parentNode.children[1]).text(name);
                        }
                    },
                    cancelar: function () {
                        $(object).selectedIndex = "0";
                        $(object.parentNode.children[1]).text('undefined');                        
                    },
                },
                onContentReady: function () {
                    // bind to events
                    var jc = this;
                    this.$content.find('form').on('submit', function (e) {
                        // if the user submits the form by pressing enter in the field.
                        e.preventDefault();
                        jc.$$formSubmit.trigger('click'); // reference the button and click it
                    });
                }
            });  

        }
        else
        {
            $(object.parentNode.children[1]).text(seleccion);
        }

    }

    function cambioVal(obj){
        var padre = $(obj).parent();
        $(padre).children("input").val($(padre).children("select").val());
    }
   

    function validaPregunta6(){
        var pregunta6 = parseInt($("#pregunta6").val());
        var pregunta7 = parseInt($("#pregunta7").val());
        var pregunta8 = parseInt($("#pregunta8").val());

        if((pregunta7+pregunta8)> pregunta6)
        {
            $.alert("La suma de la vida útil transcurrida y la vida útil remanente supera el valor de la vida útil total");
        }
    }

    function cambioValInput(obj){
        var padre = $(obj).parent();
        $(padre).children("input")[0].val($(padre).children("select")[1].val());
    }

    function convertirTablaFactura(){
        var contenido = "";
        
        $("#detTbl tbody tr").each(function(index){
            var col1, col2, col3, col4, col5, col6, col7, col8, col9,col10;
            var fila ="";
            $(this).children("td").each(function(index2){
                switch (index2){
                    case 0:
                        if($(this).children("input").val())
                        {
                            col1 = $(this).children("input").val().trim().replace('^', '').replace('|', '');
                            fila = fila + "^"+col1.trim();
                        }
                        else
                        {
                            fila = fila + "^  ";
                        }
                        
                    break;
                    case 1:
                        if($(this).children("select").val())
                        {
                            col2 = $(this).children("select").val().trim().replace('^', '').replace('|', '');
                            fila = fila + "^"+ col2.trim();
                        }
                        else
                        {
                            fila = fila + "^  ";
                        }
                    break;
                    case 2:
                        if($(this).children("input").val())
                        {
                            col3 = $(this).children("input").val().trim().replace('^', '').replace('|', '');
                            fila = fila + "^"+col3.trim();
                        }
                        else
                        {
                            fila = fila + "^  ";
                        }
                        
                    break;
                    case 3:
                        if($(this).children("input").val())
                        {
                            col4 = $(this).children("input").val().trim().replace('^', '').replace('|', '');
                            fila = fila + "^"+col4.trim();
                        }
                        else
                        {
                            fila = fila + "^  ";
                        }
                        
                    break;
                    case 4:
                        if($(this).children("select").val())
                        {
                            col5 = $(this).children("select").val().trim().replace('^', '').replace('|', '');
                            fila = fila + "^"+col5.trim();

                        }
                        else
                        {
                            fila = fila + "^  ";
                        }
                        
                    break;
                    case 5:
                        if($(this).children("input").val())
                        {
                            col6 = $(this).children("input").val().trim().replace('^', '').replace('|', '');
                            fila = fila + "^"+col6.trim();
                        }
                        else
                        {
                            fila = fila + "^  ";
                        }
                       
                    break;
                    case 6:
                        if($(this).children("p").val())
                        {
                            col7 = $(this).children("p").text().trim().replace('^', '').replace('|', '');
                            fila = fila + "^"+col7.trim();
                        }
                        else
                        {
                            fila = fila + "^  ";
                        }
                        
                    break;
                    case 7:                        
                        if($(this).children("input").val())
                        {
                            col8 = $(this).children("input").val().trim().replace('^', '').replace('|', '');
                            fila = fila + "^"+col8.trim();
                        }
                        else
                        {
                            fila = fila + "^  ";
                        }
                        
                    break;
                    case 8:                        
                        if($(this).children("select").val())
                        {
                            col9 = $(this).children("select").val().trim().replace('^', '').replace('|', '');
                            fila = fila + "^"+col9.trim();
                        }
                        else
                        {
                            fila = fila + "^  ";
                        }
                        
                    break;
                    case 9:                        
                        if($(this).children("select").val())
                        {
                            col10 = $(this).children("select").val().trim().replace('^', '').replace('|', '');
                            fila = fila + "^"+col10.trim();
                        }
                        else
                        {
                            fila = fila + "^  ";
                        }
                        
                    break;
                }
            });
            contenido = contenido+"|"+fila;            
        });
        $("#facturas").val(contenido);
    }

    function updateMagnitud(value, label, mag){
         $("#"+label).text(value+mag);
     }

<!--control para seguir contestando-->
$("#pregunta4").change(function(){
    var pregunta4 = $("#pregunta4").val();
        if(pregunta4 === "si")
        {
            $("#ocultarPreg").show();
            $("#tabla_facturas").show();
        }
        else
        {
            $("#ocultarPreg").hide();
            $("#tabla_facturas").hide();
        }

});

    <!--control de facturacion ver y ocultar-->
    $("#pregunta9").change(function(){
        var pregunta9 = $("#pregunta9").val();
        if(pregunta9 === "si")
        {
            $("#tabla_facturas").show();
        }
        else
        {
            $("#tabla_facturas").hide();
        }
    });


    //control para agregar o eliminar fila de factura
    function eliminarFase(object) {
        if(object.parentNode.parentNode.parentNode.childElementCount>1)        
        {
            var row = object.parentNode.parentNode;
            $(row).remove();
        }
    }

    function agregarFase() {
        var rowToAdd = $("#detTbl tbody tr:last").clone();
        $(rowToAdd).find('td:eq(0)');
        $("#detTbl tbody").append(rowToAdd);
        //var col0 = $($("#detTbl tbody tr:last").children()[0].children);
        //$($("#detTbl tbody tr:last").children()[0]).children("input").val(col0);

        var col1 = $($("#detTbl tbody tr:last").children()[1].children).val();
        $($("#detTbl tbody tr:last").children()[1]).children("select").val(col1);

        var col4 = $($("#detTbl tbody tr:last").children()[4].children).val();
        $($("#detTbl tbody tr:last").children()[4]).children("select").val(col4);

        var col8 = $($("#detTbl tbody tr:last").children()[8].children).val();
        $($("#detTbl tbody tr:last").children()[8]).children("select").val(col8);

       $($("#detTbl tbody tr:last").children()[7]).children("input").val("");
;
    }

    $("#boton_volver").click(function(){
        $.redirect('intangibles.php', {'centro': '<?php echo($info->codigo_centro) ?>'}, "POST");
    });

    $("#boton_registro").click(function(){
        convertirTablaFactura();
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


        //VALIDACIONES
        var results ="";

        if((pregunta7+pregunta8)> pregunta6)
        {
            results = results + " la suma de la pregunta 7 y 8 supera el valor de la pregunta 6";
        }

        if(pregunta1 === '')
        {
            results = results + " Debe escribir el código del proyecto SGPS - ";
        }

        if(pregunta2 === 'undefined')
        {
            results = results + " Debe seleccionar una linea programatica para la  pregunta 2 - ";
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

        if(pregunta5 === '')
        {
            results = results + " Debe escribir Justificacion - ";
        }

       
        return results;
     }

     function updateMagnitud(value, label, mag){
         $("#"+label).text(value+mag);
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
</body>
</html>

