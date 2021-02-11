$("#tiempoVida").change(function(){

    var tiempoVida = $("#tiempoVida").val();

    if(tiempoVida == 'finita')
    {
        var contenido = `
    
            <li class="li_formulario">
                <p class="etiquetas">Si el proyecto se desarrolló con un aliado externo, indicar cuál es el
                    Porcentaje de contrapartida del SENA</p>
                <p id="percent3" style="font-size:20px">0%</p>
                <br />
                <input id="pregunta3" name="pregunta3" type="number" style="font-size:20px;color:black"
                    placeholder="0" step="any" onkeyup="updateMagnitud(this.value, 'percent3', '%');">
            </li>
            <input type="hidden" id="pregunta4" value="si">
            <li class="li_formulario">
                <p class="etiquetas">VIDA ÚTIL TOTAL EN MESES, SI ES FINITA. (Tenga en cuenta los términos
                    del contrato o del concepto de quien lo fabricó). Número de meses</p>
                <br />
                <input id="pregunta6" name="pregunta6" type="number" style="font-size:20px;color:black"
                    placeholder="0" step="any" onchange="validaPregunta6()">
            </li>

            <li class="li_formulario">
                <p class="etiquetas">VIDA ÚTIL TRANSCURRIDA, SI ES FINITA (con fecha 31/12/2019), Número en
                    meses</p>
                <br />
                <input id="pregunta7" name="pregunta7" type="number" style="font-size:20px;color:black"
                    placeholder="0" step="any" onchange="validaPregunta6()">
            </li>

            <li class="li_formulario">
                <p class="etiquetas">VIDA ÚTIL REMANENTE, SI ES FINITA (resta entre la vida útil total y la
                    transcurrida). Número en meses</p>
                <br />
                <input id="pregunta8" name="pregunta8" type="number" style="font-size:20px;color:black"
                    placeholder="0" step="any" onchange="validaPregunta6()">
            </li>
        
        
        `;

        $("#contenidoFinito").html(contenido);
    }else{

        $("#contenidoFinito").html('');

    }

});




function setSeleccion(object) {
    var seleccion = $(object).val();
    if (seleccion ===
        'Cualquier otro costo directamente atribuible a la preparación del activo para su uso previsto.') {
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
                    action: function() {
                        var name = this.$content.find('.name').val();
                        if (!name) {
                            $.alert('provea un texto válido');
                            return false;
                        }
                        $(object.parentNode.children[1]).text(name);
                    }
                },
                cancelar: function() {
                    $(object).selectedIndex = "0";
                    $(object.parentNode.children[1]).text('undefined');
                },
            },
            onContentReady: function() {
                // bind to events
                var jc = this;
                this.$content.find('form').on('submit', function(e) {
                    // if the user submits the form by pressing enter in the field.
                    e.preventDefault();
                    jc.$$formSubmit.trigger('click'); // reference the button and click it
                });
            }
        });

    } else {
        $(object.parentNode.children[1]).text(seleccion);
    }

}

function cambioVal(obj) {
    var padre = $(obj).parent();
    $(padre).children("input").val($(padre).children("select").val());
}

function cambioValIVA(obj) {
    var padre = $(obj).parent();
    $(padre).children("input").val($(padre).children("select").val());

    var fila = $(obj).parent().parent();
    if ($(padre).children("select").val() === "si")
        $($(fila).children()[5]).children('input').prop('disabled', false)
    else {
        $($(fila).children()[5]).children('input').prop('disabled', true);
        $($(fila).children()[5]).children('input').val('');
    }

}

function validaPregunta6() {
    var pregunta6 = parseInt($("#pregunta6").val());
    var pregunta7 = parseInt($("#pregunta7").val());
    var pregunta8 = parseInt($("#pregunta8").val());

    if ((pregunta7 + pregunta8) > pregunta6) {
        $.alert("La suma de la vida útil transcurrida  y la vida útil remanente supera el valor de la vida útil total");
    }
}

function cambioValInput(obj) {
    var padre = $(obj).parent();
    $(padre).children("input")[0].val($(padre).children("select")[1].val());
}

function validaTabla() {
    var contenido = "";
    var arr = new Array();

    $("#detTbl tbody tr").each(function(index) {
        $(this).children("td").each(function(index2) {
            switch (index2) {
                case 0:
                    arr.push($(this).text());
                    break;
            }
        });
    });

    let s = new Set(arr);
    let it = s.values();
    var facturas = Array.from(it);

    $.each(facturas, function(ind, elem) {
        var valorTotal = 0;
        var sumaTotal = 0;
        $("#detTbl tbody tr").each(function(index) {
            var es = $(this);
            var numero = es.children()[0].textContent;
            if (numero === elem) {
                valorTotal = parseInt(es.children()[4].textContent);
                var valor = parseInt($(es.children()[8].children).val());
                sumaTotal = sumaTotal + valor;
            }
        });

        if (valorTotal !== sumaTotal) {
            contenido = contenido + "| El documento contable" + elem + "por valor de  "+ valorTotal +
                " no coincide con el valor de "+ sumaTotal + "  total de la suma de sus conceptos \r\n";
        }
    });

    return contenido;
}

function convertirTablaFactura() {

    var contenido = "";

    $("#detTbl tbody tr").each(function(index) {
        var col1, col2, col3, col4, col5, col6, col7, col8, col9, col10;
        var fila = "";
        $(this).children("td").each(function(index2) {
            switch (index2) {
                case 0:
                    col1 = $(this).text().trim().replace('^', '').replace('|','');
                    fila = fila + "^" + col1.trim();
                    break;
                case 1:
                    col2 = $(this).text().trim().replace('^', '').replace('|','');
                    fila = fila + "^" + col2.trim();
                    break;
                case 2:
                    col3 = $(this).text().trim().replace('^', '').replace('|','');
                    fila = fila + "^" + col3.trim();
                    break;
                case 3:
                    col4 = $(this).text().trim().replace('^', '').replace('|','');
                    fila = fila + "^" + col4.trim();
                    break;
                case 4:
                    col5 = $(this).text().trim().replace('^', '').replace('|','');
                    fila = fila + "^" + col5.trim();
                    break;
                case 5:
                    col6 = $(this).text().trim().replace('^', '').replace('|','');
                    fila = fila + "^" + col6.trim();
                    break;
                case 6:
                    col7 = $(this).text().trim().replace('^', '').replace('|','');
                    fila = fila + "^" + col7.trim();
                break;
                case 7:
                    if ($(this).children("p").text()) {
                        col8 = $(this).children("p").text().trim().replace('^', '').replace('|',
                            '');
                        fila = fila + "^" + col8.trim();
                    } else {
                        fila = fila + "^  ";
                    }

                    break;
                case 8:
                    if ($(this).children("input").val()) {
                        col9 = $(this).children("input").val().trim().replace('^', '').replace(
                            '|',
                            '');
                        fila = fila + "^" + col9.trim();
                    } else {
                        fila = fila + "^  ";
                    }

                    break;
                case 9:
                    if ($(this).children("select").val()) {
                        col10 = $(this).children("select").val().trim().replace('^', '').replace(
                            '|',
                            '');
                        fila = fila + "^" + col10.trim();
                    } else {
                        fila = fila + "^  ";
                    }

                    break;
                case 10:
                    col11 = $(this).text().trim().replace('^', '').replace('|','');
                    fila = fila + "^" + col11.trim();
                    break;
            }
        });
        contenido = contenido + "|" + fila;
    });
    $("#facturas").val(contenido);
}

function updateMagnitud(value, label, mag) {
    $("#" + label).text(value + mag);
}


//control para seguir contestando
$("#pregunta4").change(function() {
    var pregunta4 = $("#pregunta4").val();
    if (pregunta4 === "si") {
        $("#ocultarPreg").show();
        $("#tabla_facturas").show();
    } else {
        $("#ocultarPreg").hide();
        $("#tabla_facturas").hide();
    }

});


//control de facturacion ver y ocultar
$(document).ready(function() {
    var pregunta9 = $("#pregunta9").val();
    if (pregunta9 === "si") {
        var contenido = `

            <div class="formulario1 formulario_c" style="color:white;width:100%!important">
                <h2>Registrar documentos contables</h2>
                <div style="background-color:white">
                    <table id="detTbl" class="table table-striped table-hover table-bordered"
                        style="font-size:12px!important">
                        <thead>
                            <tr><th style="width: 5%;">Tipo de documento contable</th>
                                <th style="width: 7%;">N&uacute;mero de documento contable</th>
                                <th style="width: 8%;">El documento contable está a nombre del SENA</th>
                                <th style="width: 10%;">Fecha del documento contable, contrato o documento</th>
                                <th style="width: 7%;">Valor total del documento contable</th>
                                <th style="width: 7%;">Tiene IVA?</th>
                                <th style="width: 15%;">IVA</th>
                                <th style="width: 10%;">Concepto relacionado con el activo adquirido</th>
                                <th style="width: 10%;">Valor de concepto</th>
                                <th style="width: 7%;">Es necesario este concepto para poner en funcionamiento el
                                    intangible?</th>
                                <th style="width: 7%;">La documento contable que esta registrando corresponde a la fase de?</th>
                                <th style="width: 10%;">
                                    <div class="btn btn-sm btn-warning" onclick="getClassIntangible()" data-toggle="modal" data-target="#mdlCtrl">
                                        Agregar Documento Contable
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
        
        `;
        $("#tabla_facturas").html(contenido);
    } else {
        $("#tabla_facturas").html('');
        $("#vidaTranscurrida").val(0);
        $("#valorConcep").val(0);
        $("#vidaRemanente").val(0);
    }
});


//control para agregar o eliminar fila de factura
function eliminarFase(object) {
    if (object.parentNode.parentNode.parentNode.childElementCount > 1) {
        var row = object.parentNode.parentNode;
        $(row).remove();
    }
}

function agregarFactura() {
    
    var tipoDocumento = $("#tipoDoc").val();
    var cantidad = parseInt($("#cantidad").val());
    var factura = $("#factura").val();
    var fecha = $("#fecha").val();
    var valor = $("#valor").val();
    var facturaDeSena = $("#facturaDeSena").val();
    var tieneIVA = $("#IVASelect").val();
    var valorIVA = $("#valorIVA").val();
    var fase = $("#fase").val();
    var pregunta9= $("#pregunta9").val();
    
    
    
    var resultado = "";

    if (pregunta9 === '') {
        resultado += '9) No selecciono sí dispone de documentos contables para registrar. <br>';
    } else if(pregunta9!== 'si' && pregunta9 !== 'no'){
        resultado += '9)Sí su respuesta fue afirmativa debe adjuntar  documentos contables . <br>';
    }


    if(fase !== "Adquirido" && fase !== "Desarrollo" && fase !== "Investigación" )
    {
        resultado += "<br> <br> * Debe escoger la fase del documento contable";
    }

    if(tipoDocumento !== "factura" && tipoDocumento !== "contratos" && tipoDocumento !== "resolucion" && tipoDocumento !== "Ordenes de pago"  && tipoDocumento !== "Liquidación de contrato" && tipoDocumento !== "Cuenta de cobro" && tipoDocumento !== "Otros"){
        resultado += "<br> <br> * Debe ingresar el tipo de documento contable";
    }

    if ($("#cantidad").val() === "") {
        resultado += "<br> * Debe ingresar la cantidad de items del documento contable";
    }

    if ($("#factura").val() === "") {
        resultado = resultado + "<br> * Debe ingresar el número del documento contable";
    }

    if ($("#fecha").val() === "") {
        resultado = resultado + "<br> * Debe ingresar fecha del documento contable";
    }

    if ($("#valor").val() === "") {
        resultado = resultado + "<br> * Debe ingresar valor del documento contable";
    }else{
        $("#valorConcep").val(valor)
    }

    if ($("#facturaDeSena").val() === "undefined") {
        resultado = resultado + "<br> * Debe seleccionar si el documento contable esta a nombre del SENA";
    }

    if(tieneIVA === "si" && valorIVA ==="")
    {
        resultado = resultado + "<br> * Debe ingresar el IVA";
    }

    if (resultado !== "") {
        $.alert({
            title: 'Error',
            content: resultado
        });
        return;
    }else{

        for (var i = 0; i < cantidad; i++) {

            if(tipoDocumento == 'factura'){
                tipoDoc= 'Factura';
            }else{
                if(tipoDocumento == 'contratos')
                {
                    tipoDoc = 'Contratos';
                }else{

                    if(tipoDocumento == 'Ordenes de pago')
                    {
                        tipoDoc = 'Ordenes de pago';
                    }else{

                        if(tipoDocumento == 'Cuenta de cobro')
                        {
                            tipoDoc = 'Cuenta de cobro';
                        }else{

                            if(tipoDocumento == 'Otros')
                            {
                                tipoDoc = 'Otros';
                            }

                        }

                    }

                }
            }

           var conte = '';

            var tr = document.createElement('tr');
            if(tipoDocumento == 'resolucion')
            {
                conte += '<td>Resolución de apertura</td>';
            }else{

                if(tipoDocumento == 'Liquidación de contrato')
                {
                    conte += '<td>Liquidación de contrato</td>';
                }else{
                    conte +='<td>' + tipoDoc + '</td>'
                }
            }
            conte += 
                
                
                '<td>' + factura + '</td>' +
                '<td>' + facturaDeSena + '</td>' +
                '<td>' + fecha + '</td>' +
                '<td>' + valor + '</td>' +
                '<td>' + tieneIVA + '</td>' +
                '<td>' + valorIVA + '</td>' +

                '<td class="attrValue">                                                                                            ' +
                '	<select name="col6" id="col6" class="selects" style="width:100%" onchange="setSeleccion(this)">                ' +
                '	<option value="undefined">Seleccione respuesta</option>                                                        ' +
                '	<option value="Transporte">Transporte</option>                                                                 ' +
                '	<option value="Flete">Flete</option>                                                                           ' +
                '	<option value="Honorarios">Honorarios</option>                                                                 ' +
                '	<option value="Capacitación de Personal">Capacitación de Personal</option>                                     ' +
                '	<option value="Adquisición de Servicios de Instalacion de terminación de Acabados entre otros">Adquisición de Servicios de Instalacion de terminación de Acabados entre otros</option>                                     ' +
                '	<option value="Aranceles de importación, si los hay">Aranceles de importación, si                              ' +
                '		los hay</option>                                                                                           ' +
                '	<option value="Mantenimiento de maquinaria, equipo, transporte y software">                                    ' +
                '		Mantenimiento de maquinaria, equipo, transporte y software</option>                                        ' +
                '	<option value="Minerales, Electricidad, Gas y Agua">Minerales, Electricidad, Gas y Agua</option>                                     ' +
                '	<option value="Paquetes de software">Paquetes de software</option>                                             ' +
                '	<option value="Arrendamiento de Equipos">Arrendamiento de Equipos</option>                                                                 ' +
                '	<option value="Cualquier otro costo directamente atribuible a la preparación del activo para su uso previsto.">' +
                '		Cualquier otro costo directamente atribuible a la preparación del activo para su                           ' +
                '		uso previsto.</option>                                                                                     ' +
                '	<option value="Concepto no relacionado con el activo intangible">Concepto no                                   ' +
                '		relacionado con el activo intangible</option>                                                              ' +
                '	</select>                                                                                                      ' +
                '	<p id="preguntaCol6"></p>                                                                                      ' +
                '</td>																											   ' +

                '<td><input type="number"></input></td>' +
                '<td class="attrValue"><input type="hidden" value="si"><select class="selects" style="width:100%" onchange="cambioVal(this);"><option value="si">si</option><option value="no">no</option></select></td>' +

                '<td>' + fase + '</td>' +

                '<td>                                                                  ' +
                '	<button class="btn btn-sm btn-danger" onclick="eliminarFase(this)">' +
                '       <i class="fa fa-eraser"></i>' +
                '	</button>    ' +
                '   <button class="btn btn-sm btn-warning" onclick="duplicarFase(this)">' +
                '       <i class="fa fa-copy"></i>' +
                '	</button>                                                        ' +
                '</td>                                                                 ';
                tr.innerHTML = conte;
            $("#detTbl tbody").append(tr);
        }
        $('#mdlCtrl').modal('toggle');
    }
}

$("#boton_volver").click(function() {
    
    volver = $("#volver").val();
    project = $("#project").val();

    if(volver == 'finish'){

        $.redirect('encuestaIntangible/encuestasSinTerminar.php', {
            'project': project
        }, "POST");

    }else{

        if(volver == 'seeSave'){

            $.redirect('encuestaIntangible/encuestasSinGuardar.php', {
                'project': project
            }, "POST");

        }else{
            $.redirect('intangibles.php', {
                'centro': '<?php echo($info->codigo_centro) ?>'
            }, "POST");
        }

    }
    
});

$("#boton_registro").click(function() {
    limite ();
    var tiempoVida = $("#tiempoVida").val();
    if (tiempoVida == 'indefinida') {

        convertirTablaFactura();

        var result = validarEnvioDatosIndefinidos();
        if (result ==="" && tiempoVida == 'indefinida') {
            if ($("#facturas").val()=='' && $("#pregunta9").val() == 'si') {
                $.alert({
                    title: 'Error',
                    content: 'No agrego la información del documento contable'
                });
            } else {
                $.confirm({
                    title: 'Confirmación de envío',
                    content: '¿Esta seguro de enviar esta información?',
                    buttons: {
                        confirm: function() {
                            $("#formulario_principal").submit();
                        },
                        cancel: function() {
    
                        },
                    }
                }); 
            }
            
        } else {
            $.alert({
                title: 'Error',
                content: result
            });
        }

    } else {
        if(tiempoVida == 'finita')
        {
            convertirTablaFactura();
            //Preguntar de donde sale el valor del concepto
            var vidaTranscurrida = (parseFloat($("#valorConcep").val()) / parseFloat($("#pregunta6").val())) * parseFloat($("#pregunta7").val());
            $("#vidaTranscurrida").val(vidaTranscurrida);
            var vidaRemanente = (parseFloat($("#valorConcep").val()) / parseFloat($("#pregunta6").val())) * parseFloat($("#pregunta8").val());
            $("#vidaRemanente").val(vidaRemanente);
            var result = validarEnvioDatos();
            var errores = validarEnvioDatosFinitos();
            if (result === "" && errores === "") {
                if ($("#facturas").val()=='' && $("#pregunta9").val() == 'si') {
                    $.alert({
                        title: 'Error',
                        content: 'No agrego la información del documento contable'
                    });
                } else {
                    $.confirm({
                        title: 'Confirmación de envío',
                        content: '¿Esta seguro de enviar esta información?',
                        buttons: {
                            confirm: function() {
                            $("#formulario_principal").submit();
                            },
                            cancel: function() {

                            },
                        }
                    });
                }
            } else {
                
                    $.alert({
                        title: 'Error',
                        content: 'Los siguientes campos no se han diligenciado correctamente: <br> <br> '+errores+result
                    });
                
                
            }
        }else{
            $.alert({
                title: 'Error',
                content: 'Los siguientes campos no se han diligenciado correctamente: <br> <br> 2)No ha determinado el tiempo de vida &uacute;til del intangible'
            });
        }

    }
    
});

function duplicarFase(object) {
    console.log("duplicacdor");
    var copia = $(object.parentNode.parentNode);
    var index = object.parentNode.parentNode.rowIndex;
    var count = $('#detalleFactura_tbody').children('tr').length;

    //$('#detalleFactura_tbody > tr').eq(index).after(copia);
    var newRow = $('<tr>' + object.parentNode.parentNode.innerHTML + '</tr>');
    if (index >= count) {
        $('#detalleFactura_tbody tr:last').after(newRow);
    } else {
        //newRow.insertBefore($('#detalleFactura_tbody tr:nth(' + index + ')'));
        newRow.insertBefore($('#detalleFactura_tbody tr:nth(' + index + ')'));
    }

}


function validarEnvioDatos() {

    var pregunta3 = $("#pregunta3").val();
    var pregunta6 = $("#pregunta6").val();
    var pregunta7 = $("#pregunta7").val();
    var pregunta8 = $("#pregunta8").val();
    var pregunta9 = $("#pregunta9").val();
    

    //Estado de validaciones de numeros enteros
    var enteros= true;


    //VALIDACIONES
    var results = "";

    

    results = validaTabla(); 
    
    if(pregunta9 == 'si'){
        var factura= $("#detalleFactura_tbody").html();
        
        if(factura == ''){
            results += "No has registrado el documento contable";
        }
    }

   
    if (pregunta3 === '') {
        results += "4)No determin&oacute; el porcentaje de contrapartida del SENA Debe ser un porcentaje positivo y menor o igual a 100%.<br><br> ";
    } else {
        if (isNaN(pregunta3)) {
            results += "4)No determin&oacute; el porcentaje de contrapartida del SENA Debe ser un porcentaje positivo y menor o igual a 100%.<br><br> ";
        } else {
            pregunta3 = parseFloat(pregunta3)
            if (pregunta3 < 0 || pregunta3 > 100) {
                results += "4)El porcentaje de contrapartida del SENA Debe ser un porcentaje positivo y menor o igual a 100%.<br><br> ";
            }
        }
    }

    

    if (pregunta6 == '') {

        results += "5)No determin&oacute; la vida &uacute;til en meses del intangible.<br><br>";
        enteros = false
        
    } else{

        if (isNaN(pregunta6)) {
            results += "5)No determin&oacute; la vida &uacute;til en meses del intangible.<br><br>";
            enteros = false;
        } else {

            pregunta6 = parseFloat(pregunta6);

            

            if ((!Number.isInteger(pregunta6)) || (pregunta6 < 0) ) {
                results += "5)La vida &uacute;til en meses del intangible, debe ser un n&uacute;mero entero y positivo.<br><br>";
                enteros = false;
            }
          
        }
    } 

    if (pregunta7 == '') {

        results += "6)No determin&oacute; la vida &uacute;til transcurrida en meses del intangible.<br><br>";
        enteros = false
        
    } else{

        if (isNaN(pregunta7)) {
            results += "6)No determin&oacute; la vida &uacute;til transcurrida en meses del intangible.<br><br>";
            enteros = false;
        } else {

            pregunta7 = parseFloat(pregunta7);

            if (!Number.isInteger(pregunta7) || (pregunta7 < 0 )) {
                results += "6)La vida &uacute;til transcurrida en meses del intangible, debe ser un n&uacute;mero entero y positivo.<br><br>";
                enteros = false;
            }
          
        }
        
    } 

    if (pregunta8 == '') {

        results += "7)No determin&oacute; la vida &uacute;til remanente en meses del intangible.<br><br>";
        enteros = false
        
    } else{

        if (isNaN(pregunta8)) {
            results += "7)No determin&oacute; la vida &uacute;til remanente en meses del intangible.<br><br>";
            enteros = false;
        } else {

            pregunta8 = parseFloat(pregunta8);

            if (!Number.isInteger(pregunta8) || (pregunta8 < 0)) {
                results += "7)La vida &uacute;til remanente en meses del intangible, debe ser un n&uacute;mero entero y positivo.<br><br>";
                enteros = false;
            }
          
        }
        
    }
    
    if(pregunta9 !== 'si' && pregunta9 !== 'no')
    {
        results += "9)No eligi&oacute; una opci&oacute;n en la pregunta, ¿Tiene facturas para registrar?.<br><br>";
    }

    return results;
}

function updateMagnitud(value, label, mag) {
   return $("#" + label).text(value + mag);
}

$(document).ready(function() {
    $(window).keydown(function(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

    
});

var now1 = new Date();
now1.setMinutes(now1.getMinutes() + 40);
var countDownDate = new Date(now1).getTime();

// Update the count down every 1 second
function validarEnvioDatosIndefinidos()
{
    var tiempoVida = $("#tiempoVida").val();
    var fechaInicio = $("#fechaInicio").val();
    var errores = '';
    if( fechaInicio === ''){
        errores +='3)No ha diligenciado la fecha de inicio.<br><br>';
    }

    if(tiempoVida != 'finita' && tiempoVida != 'indefinida'){
        errores +='2)No ha determinado el tiempo de vida &uacute;til del intangible.<br><br>';
    }

    return errores;
}

function validarEnvioDatosFinitos()
{
    var tiempoVida = $("#tiempoVida").val();
    var fechaInicio = $("#fechaInicio").val();
    var errores = "";
    if( fechaInicio === ''){
        errores +='3)No ha diligenciado la fecha de inicio.<br><br>';
    }

    if(tiempoVida != 'finita' && tiempoVida != 'indefinida'){
        errores +='2)No ha determinado el tiempo de vida &uacute;til del intangible.<br><br>';
    }

    return errores;
}

function getClassIntangible()
{
    var codeIntangible = $("#cod_intangible").val();

    $.ajax({
        type: 'POST',
        url: '../controladores/ajax/formatoIntangible/classIntangible.php',
        data: {'codeIntangible': codeIntangible}
    })
    .done(function(classIntan){
        
        if (classIntan === 'Error') {
            $.alert({
                title: 'Error',
                content: 'Ups, ha ocurrido un error'
            });
        } else {
            $('#fase').html(classIntan)
        }
        
    })
    .fail(function(){
        $.alert({
            title: 'Error',
            content: 'Ups, ha ocurrido un error'
        });
    })
}

function limite ()
{
    $.ajax({
        url: '../controladores/ajax/fechaLimite/obtenerFechaLimite.php'
    })

    .done(function(respuesta){
        if(respuesta == false)
        {
            location.reload();
        }
    })
}


