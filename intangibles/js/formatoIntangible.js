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
                valorTotal = parseInt(es.children()[3].textContent);
                var valor = parseInt($(es.children()[7].children).val());
                sumaTotal = sumaTotal + valor;
            }
        });

        if (valorTotal !== sumaTotal) {
            contenido = contenido + "| La factura " + elem + "por valor de  "+ valorTotal +
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
                    if ($(this).children("p").text()) {
                        col7 = $(this).children("p").text().trim().replace('^', '').replace('|',
                            '');
                        fila = fila + "^" + col7.trim();
                    } else {
                        fila = fila + "^  ";
                    }

                    break;
                case 7:
                    if ($(this).children("input").val()) {
                        col8 = $(this).children("input").val().trim().replace('^', '').replace(
                            '|',
                            '');
                        fila = fila + "^" + col8.trim();
                    } else {
                        fila = fila + "^  ";
                    }

                    break;
                case 8:
                    if ($(this).children("select").val()) {
                        col9 = $(this).children("select").val().trim().replace('^', '').replace(
                            '|',
                            '');
                        fila = fila + "^" + col9.trim();
                    } else {
                        fila = fila + "^  ";
                    }

                    break;
                case 9:
                    col10 = $(this).text().trim().replace('^', '').replace('|','');
                    fila = fila + "^" + col10.trim();
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
$("#pregunta9").change(function() {
    var pregunta9 = $("#pregunta9").val();
    if (pregunta9 === "si") {
        $("#tabla_facturas").show();
    } else {
        $("#tabla_facturas").hide();
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
    var cantidad = parseInt($("#cantidad").val());
    var factura = $("#factura").val();
    var fecha = $("#fecha").val();
    var valor = $("#valor").val();
    var facturaDeSena = $("#facturaDeSena").val();
    var tieneIVA = $("#IVASelect").val();
    var valorIVA = $("#valorIVA").val();
    var fase = $("#fase").val();

    var resultado = "";
    if ($("#cantidad").val() === "") {
        resultado = "| Debe ingresar la cantidad de items de factura";
    }

    if ($("#factura").val() === "") {
        resultado = resultado + "| Debe ingresar el número de factura";
    }

    if ($("#fecha").val() === "") {
        resultado = resultado + "| Debe ingresar fecha de factura";
    }

    if ($("#valor").val() === "") {
        resultado = resultado + "| Debe ingresar valor de factura";
    }

    if ($("#facturaDeSena").val() === "undefined") {
        resultado = resultado + "| Debe seleccionar si la factura esta al nombre del SENA";
    }

    if(tieneIVA === "si" && valorIVA ==="")
    {
        resultado = resultado + "| Debe ingresar el IVA";
    }

    if (resultado !== "") {
        $.alert(resultado);
        return;
    }

    for (var i = 0; i < cantidad; i++) {

        var tr = document.createElement('tr');
        tr.innerHTML = '<td>' + factura + '</td>' +
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
        $("#detTbl tbody").append(tr);
    }
    $('#mdlCtrl').modal('toggle');
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
    convertirTablaFactura();
    var result = validarEnvioDatos();
    if (result === "") {
        $.confirm({
            title: 'Confirmación de envío',
            content: 'Esta seguro de enviar esta información',
            buttons: {
                confirm: function() {
                    $("#formulario_principal").submit();
                },
                cancel: function() {

                },
            }
        });
    } else {
        $.alert({
            title: 'Error',
            content: result,
        });
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

    var pregunta1 = $("#pregunta1").val();
    var pregunta2 = $("#pregunta2").val();
    var pregunta3 = parseFloat($("#pregunta3").val());
    var pregunta4 = $("#pregunta4").val();
    var pregunta6 = parseInt($("#pregunta6").val());
    var pregunta7 = parseInt($("#pregunta7").val());
    var pregunta8 = parseInt($("#pregunta8").val());
    var pregunta9 = $("#pregunta9").val();


    //VALIDACIONES
    var results = "";


    results = validaTabla(); 
    
    if(results !== "")
    {
        results = results + "-||-";
    }

    if ((pregunta7 + pregunta8) > pregunta6) {
        results = results + " la suma de la pregunta 7 y 8 supera el valor de la pregunta 6";
    }

    if (pregunta1 === '') {
        results = results + " Debe escribir el código del proyecto SGPS - ";
    }

    if (pregunta2 === 'undefined') {
        results = results + " Debe seleccionar una linea programatica para la  pregunta 2 - ";
    }

    if (isNaN(pregunta3)) {
        $("#" + label).text('0' + mag);
        pregunta3 = 0;
    } else {
        if (pregunta3 < 0 || pregunta3 > 100) {
            results = results + " Debe ser un porcentaje positivo y menor o igual a 100% para la pregunta 3 - ";
        }
    }



    return results;
}

function updateMagnitud(value, label, mag) {
    $("#" + label).text(value + mag);
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
    document.getElementById("timeToLife").innerHTML = "Tiene " + minutes + "minutos " + seconds +
        "segundos para completar la encuesta.";

    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("timeToLife").innerHTML = "Session expirada.";
        $(".radicar_proyecto").remove();
    }
}, 1000);