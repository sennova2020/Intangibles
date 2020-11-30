$(document).ready(function() {
    
    
    var classIntangible = $("#classIntangible").val();
   
    var typeIntangible = $("#typeIntangible").val();

    $.ajax({
        type: 'POST',
        url: '../../controladores/ajax/encuestaIntangibles/claseSeleccionada.php',
        data: {'codClass': classIntangible,'typeIntangible':typeIntangible}
    })
    .done(function(listas_rep){
        $('#classIntangible').html(listas_rep)
    })
    .fail(function(){
        alert('Hubo un errror al cargar las clases de los intangibles.')
    })

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


$("#boton_volver").click(function() {
    var project = $("#project").val();
    $.redirect('encuestasSinGuardar.php',
    {'project':project},
    'POST');
});

function envioDatos(z) { 
    
    if (z.id == 'boton_registro') {
        state = 1;
    } 
        if(z.id == 'boton_TEMPORAL'){
        state = 0;
    }

    var result = validarEnvioDatos();
    limite ();
    if (result === '') {
        
        var dateFinish = $("#dateFinish").val();
        var dateBudgetClosing = $("#dateBudgetClosing").val();
        var typeIntangible = $("#typeIntangible").val();
        var classIntangible = $("#classIntangible").val();
        var nameIntangible = $("#nameIntangible").val();
        var resourceControl = $("#resourceControl").val();
        var observationResource = $("#observationResource").val();
        var potencial = $("#potencial").val();
        var observationPotencial = $("#observationPotencial").val();
        var reliably = $("#reliably").val();
        var identification = $("#identification").val();
        var observationReliably = $("#observationReliably").val();
        var observationIdentification = $("#observationIdentification").val();
        var isMonetary = $("#isMonetary").val();
        var physicalAppearance = $("#physicalAppearance").val();
        var duration = $("#duration").val();
        var observationMonetary = $("#observationMonetary").val();
        var observationAppearance = $("#observationAppearance").val();
        var observationDuration = $("#observationDuration").val();
        var buyActivity = $("#buyActivity").val();
        var observationBuyActivity = $("#observationBuyActivity").val();
        var project = $("#project").val();
        var codIntangible = $("#cod_intangible").val();

        var allSelect = resourceControl+potencial+reliably+identification+isMonetary+duration+buyActivity+physicalAppearance;

        if (allSelect.includes('no')==true) {
            var negativo = 0;
        } else {
            var negativo = 1;
        }

        $.confirm({
            title: 'Confirmación de envío',
            content: 'Esta seguro de enviar esta información',
            buttons: {
                confirmar: function() {
                    $.ajax({
                        type: 'POST',
                        url: '../../controladores/encuestaIntangible/update.php',
                        data: {
                            'dateFinish':dateFinish,
                            'dateBudgetClosing':dateBudgetClosing,
                            'typeIntangible':typeIntangible,
                            'classIntangible':classIntangible,
                            'nameIntangible':nameIntangible,
                            'resourceControl':resourceControl,
                            'observationResource':observationResource,
                            'potencial':potencial,
                            'observationPotencial':observationPotencial,
                            'reliably':reliably,
                            'identification':identification,
                            'observationReliably':observationReliably,
                            'observationIdentification':observationIdentification,
                            'isMonetary':isMonetary,
                            'physicalAppearance':physicalAppearance,
                            'duration':duration,
                            'observationMonetary':observationMonetary,
                            'observationAppearance':observationAppearance,
                            'observationDuration':observationDuration,
                            'buyActivity':buyActivity,
                            'observationBuyActivity':observationBuyActivity,
                            'project':project,
                            'state':state,
                            'negativo': negativo,
                            'codIntangible':codIntangible
                        }

                    })

                    .done(function(respuesta) {
                        if (respuesta == true) {

                            if (state == 1 && negativo == 1) {
                                
                                $.confirm({
                                    title: 'Registro exitoso.',
                                    content: '<p>¿Desea continuar?</p><p>Dada las respuestas diligenciadas en el formulario son todas positivas, debe seguir con el proceso al formulario del costo del intangible y diligenciar los formatos seg&uacute;n los procesos de compromiso.</p><p>Continuar: Seguir al formulario de costos del intangible.</p><p>Finalizar: Terminar el registro.</p>',
                                    buttons: {
                                        Continuar: function () {
                                            $.redirect(
                                                '../formatoIntangible.php',
                                                {
                                                    'id':codIntangible,
                                                    'project': project,
                                                    'volver':'seeSave'
                                                }, 
                                                "POST"
                                            );
                                        },
                                        Finalizar: function () {
                                            'encuestasSinGuardar.php',
                                                {'project':project},
                                                'POST'
                                        }
                                    }
                                });

                            } else {
                                
                                if(state == 0)
                                {
                                    titulo='Registro temporal exitoso';
                                    contenido= 'Recuerde que solo podra registrarlo oficialemente hasta la fecha limite';
                                }else{
                                    titulo='Registro exitoso';
                                    contenido =  'Tiene una respuesta con valor "No", por lo tanto el registro no se considera intangible.';
                                }
                                
                                $.confirm({
                                    title: titulo,
                                    content:contenido,
                                    buttons: {
                                        
                                        Finalizar: function () {
                                            $.redirect('../../index.php')
                                        }
                                    }
                                });

                            }
                            
                        } else {
                            if (respuesta == 'false') {
                                $.alert({
                                    title: 'Error',
                                    content: 'Ups ha ocurrido un error!'
                                });
                            }else{
                                if (respuesta === 'Invalid') {
                                    $.alert({
                                        title: 'Error',
                                        content: 'Ups ha ocurrido un error!'
                                    });
                                } else {
                                    
                                    if (respuesta == 'limite') {
                                        
                                        $.confirm({
                                            title: 'Informaci&oacute;n',
                                            content:'Haz alcanzado la fecha limite, por lo tanto no puede hacer mas registros.',
                                            buttons: {
                                                Ok: function () {
                                                    $.redirect('../../index.php')
                                                }
                                            }
                                        });
                                        
                                    } else {
                                        
                                        $.alert({
                                            title: 'Error',
                                            content:'Los siguientes campos no se han diligenciado correctamente: <br> <br> '+respuesta
                                        });

                                    }

                                }
                                
                            }
                        }
                    })

                    .fail(function () {
                        $.alert({
                            title: 'Error',
                            content: 'Ha ocurrido un error'
                        });
                    })

                },
                cancelar: function() {

                },
            }
        });

        
    } else {
        $.alert({
            title: 'Error',
            content:'Los siguientes campos no se han diligenciado correctamente: <br> <br> '+result
        });
    }

}

/* $("#boton_registro").click(function() {
    
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
}); */



function validarEnvioDatos() {

    var dateFinish = $("#dateFinish").val();
    var dateBudgetClosing = $("#dateBudgetClosing").val();
    var typeIntangible = $("#typeIntangible").val();
    var classIntangible = $("#classIntangible").val();
    var nameIntangible = $("#nameIntangible").val();
    var resourceControl = $("#resourceControl").val();
    var observationResource = $("#observationResource").val();
    var potencial = $("#potencial").val();
    var observationPotencial = $("#observationPotencial").val();
    var reliably = $("#reliably").val();
    var identification = $("#identification").val();
    var observationReliably = $("#observationReliably").val();
    var observationIdentification = $("#observationIdentification").val();
    var isMonetary = $("#isMonetary").val();
    var physicalAppearance = $("#physicalAppearance").val();
    var duration = $("#duration").val();
    var observationMonetary = $("#observationMonetary").val();
    var observationAppearance = $("#observationAppearance").val();
    var observationDuration = $("#observationDuration").val();
    var buyActivity = $("#buyActivity").val();
    var observationBuyActivity = $("#observationBuyActivity").val();
    
    //VALIDACIONES
    var results = '';

    if (dateFinish === '' ) {
        results += '1) No ha definido la fecha de cierre del proyecto técnicamente en la vigencia 2020. <br>';
    }

    if (dateBudgetClosing === '') {
        results += '2) No ha definido la fecha de cierre del proyecto presupuestalmente en la vigencia 2020. <br>';
    }

    if (typeIntangible === 'none' || typeIntangible === '') {
        results += '3) No selecciono el tipo de intangible. <br>';
    }else if (!typeIntangible == 'Adquirido' || !typeIntangible == 'Desarrollado') {
        results += '3) El tipo de intangible que selecciono no corresponde a los estándares. <br>';
    }
    if (classIntangible === '') {
        results += '4) No selecciono la clase de intangible. <br>';
    }else{
        if (validateClassIntangible(typeIntangible, classIntangible) === false) {
            results += '4) La clase de intangible que selecciono no corresponde a los estándares. <br>';
        }
    }
    
    if ( nameIntangible=== '') {
        results += '5) No digito el nombre del intangible. <br>';
    }
    
    if (resourceControl === '') {
        results += '6) No selecciono una repuesta a la pregunta ¿El intangible es un recurso controlado?. <br>';
    }

    if(resourceControl !== 'si' && resourceControl !== 'no'){
        results += '6) La respuesta seleccionada en la pregunta, ¿El intangible es un recurso controlado?, no corresponde a SI o NO. <br>';
    }

    if (observationResource === '') {
        results += '7) No digito la observación de la pregunta, ¿El intangible es un recurso controlado?. <br>';
    }

    if (potencial === '') {
        results += '8) No selecciono una repuesta a la pregunta, ¿Del intangible se espera obtener un potencial de servicios?. <br>';
    } else if(potencial !== 'si' && potencial !== 'no'){
        results += '8) La respuesta seleccionada en la pregunta, ¿Del intangible se espera obtener un potencial de servicios?, no corresponde a SI o NO. <br>';
    }

    if (observationPotencial === '') {
        results += '9) No digito la observación de la pregunta, ¿Del intangible se espera obtener un potencial de servicios?. <br>';
    }

    if (reliably === '') {
        results += '10) No selecciono una repuesta a la pregunta, ¿El intangible se puede medir fiablemente?. <br>';
    } else if(reliably !== 'si' && reliably !== 'no'){
        results += '10) La respuesta seleccionada en la pregunta, ¿El intangible se puede medir fiablemente?, no corresponde a SI o NO. <br>';
    }

    if (observationReliably === '') {
        results += '11) No digito la observación de la pregunta, ¿Del intangible se espera obtener un potencial de servicios?. <br>';
    }

    if (identification === '') {
        results += '12) No selecciono una repuesta a la pregunta, ¿El intangible se puede identificar?. <br>';
    } else if(identification !== 'si' && identification !== 'no'){
        results += '12) La respuesta seleccionada en la pregunta, ¿El intangible se puede identificar?, no corresponde a SI o NO. <br>';
    }

    if (observationIdentification === '') {
        results += '13) No digito la observación de la pregunta, ¿El intangible se puede identificar?. <br>';
    }

    if (isMonetary === '') {
        results += '14) No selecciono una repuesta a la pregunta, ¿El intangible NO es considerado monetario?. <br>';
    } else if(isMonetary !== 'si' && isMonetary !== 'no'){
        results += '14) La respuesta seleccionada en la pregunta, ¿El intangible NO es considerado monetario?, no corresponde a SI o NO. <br>';
    }

    if (observationMonetary === '') {
        results += '15) No digito la observación de la pregunta, ¿El intangible NO es considerado monetario?. <br>';
    }

    if (physicalAppearance === '') {
        results += '16) No selecciono una repuesta a la pregunta, ¿El intangible es sin apariencia física?. <br>';
    } else if(physicalAppearance !== 'si' && physicalAppearance !== 'no'){
        results += '16) La respuesta seleccionada en la pregunta, ¿El intangible es sin apariencia física?, no corresponde a SI o NO. <br>';
    }

    if (observationAppearance === '') {
        results += '17) No digito la observación de la pregunta, ¿El intangible es sin apariencia física?. <br>';
    }

    if (duration === '') {
        results += '18) No selecciono una repuesta a la pregunta, ¿El intangible se va a utilizar por más de un año?. <br>';
    } else if(duration !== 'si' && duration !== 'no'){
        results += '18) La respuesta seleccionada en la pregunta, ¿El intangible se va a utilizar por más de un año?, no corresponde a SI o NO. <br>';
    }

    if (observationDuration === '') {
        results += '19) No digito la observación de la pregunta, ¿El intangible se va a utilizar por más de un año?. <br>';
    }

    if (buyActivity === '') {
        results += '20) No selecciono una repuesta a la pregunta, ¿No se espera vender en el curso de las actividades de la entidad?. <br>';
    } else if(buyActivity !== 'si' && buyActivity !== 'no'){
        results += '20) La respuesta seleccionada en la pregunta, ¿No se espera vender en el curso de las actividades de la entidad?, no corresponde a SI o NO. <br>';
    }

    if (observationBuyActivity === '') {
        results += '21) No digito la observación de la pregunta, ¿No se espera vender en el curso de las actividades de la entidad?. <br>';
    }

    return results;
}

function validateClassIntangible(tipo, classIntangible) {
    
    resultado = false;
    if (tipo === 'Adquirido') {
        for(var i = 1; i<= 13; i++){
            if(classIntangible == i){
                resultado = true;
                break;
            }
        }
    }else if (tipo == 'Desarrollado') {
        for(var i = 14; i<= 24; i++){
            if(classIntangible == i){
                resultado = true;
                break;
            }
        }
    }

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


//Detect change of select with id typeintangible
$('#typeIntangible').change(function(){
    var typeIntangible = $('#typeIntangible').val();
    var classIntangible = $('#classIntangible');

    if (typeIntangible != 'none') {
        $.ajax({
            type: 'POST',
            url: '../../controladores/ajax/encuestaIntangibles/claseIntangible.php',
            data: {'typeIntangible': typeIntangible}
        })
        .done(function(listas_rep){
            $('#classIntangible').html(listas_rep)
        })
        .fail(function(){
            alert('Hubo un errror al cargar las clases de los intangibles.')
        })
    } else {
        classIntangible.html('');
    }
    
});

function descriptionModal(e) {

var object = e.id;
var message = null;

if (object == "resourceControlNote") {
    message = 'Control implica la capacidad del SENA para usar un recurso o definir el uso que un tercero debe darle, para las funciones administrativas o de formación profesional, al igual si se dispone de proceso o procedimiento al cual beneficia la utilización del producto. Al evaluar si existe o no control la entidad debe tener en cuenta, si el derecho de uso lo define un contrato, factura,entrada a almacén, certificado de licenciamiento, convenio o donaciones, igualmente se debe verificar el acceso al recurso o la capacidad de un tercero para negar o restringir el uso. ';
}else if (object == "nameIntangibleNote ") {
    message = 'Cuando el intangible es un software adquirido registrar el nombre como está en la factura; si es un desarrollado indicar el nombre del producto como lo registra en el GrupLac';
} else if(object == "observationResourceNote"){
    message = 'Aclare si el SENA tiene el control del uso del intangible, es decir, en que proceso de la entidad se utiliza.';
}else if(object =='potencialNote'){
    message = 'Potencial de servicio es la capacidad que tiene dicho recurso para prestar servicios que contribuyan a la consecución de los objetivos de la entidad, temas misionales, estratégicos y de apoyo. Para este punto es indispensable que el funcionario responsable de su reconocimiento, demuestre la utilidad que este activo le generará a la entidad. ';
}else if(object == 'reliablyNote'){
    message = 'La medición de un activo es fiable cuando existe evidencia de transacciones para el activo u otros similares, o cuando la estimación del valor depende de variables que se pueden medir en términos monetarios.';
}else if(object == "identificationNote"){
    message = 'Un activo intangible se considera identificable cuando, una de dos:<br><br>1) es susceptible de separarse de la entidad y, en consecuencia, venderse, transferirse, entregarse en explotación, arrendarse o intercambiarse, ya sea individualmente, o junto con otros activos identificables; tenga o no tenga el SENA la intención de dicha separación;<br><br>2) o también se considera identificable si surge de acuerdos vinculantes incluyendo derechos contractuales u otros derechos legales, en donde se estipule la transferencia y le dé a la entidad la capacidad para reclamar legal o contractualmente los recursos. Ejemplo: contrato de licenciamiento';
}else if(object == "isMonetaryNote"){
    message = 'El intangibles es monetario cuando es un CDT, un bono o títulos valores y es no monetario en caso contrario.';
}else if (object == "physicalAppearanceNote") {
    message = 'Algunos intangibles pueden estar contenidos en, o contener, un soporte de naturaleza o apariencia física, como es el caso de un disco compacto (caso programas informáticos), de documentación legal (caso licencia o patente) o de una película; estos casos la "sustancia material" del elemento es de importancia secundaria con respecto a su componente intangible, por lo que el activo será considerado como intangible.';
}else if (object == "observationAppearanceNote") {
    message = 'Por ejemplo el software que se encuentra en un CD, la parte importante es el intangible.';
}else if (object == "durationNote") {
    message = 'Verificar si el contrato permite la utilización del intangible por más de un año, igualmente se debe identificar si el área que generó la necesidad de su adquisición piensa utilizarlo por más de un año. La vida útil de los activos intangibles estará dada por el menor periodo entre el tiempo en que se obtendría el potencial de servicio esperados y el plazo establecido conforme a los términos contractuales, siempre y cuando el activo intangible se encuentre asociado a un derecho contractual o legal. Tenga en cuenta las siguientes consideraciones Marque SI, cuando:- Si el producto dispone de un derecho de uso perpetuo, indefinido o vitalicio.- Si el producto dispone de un derecho de uso superior a un año.';
}else if (object == "buyActivityNote") {
    message = 'Si la intención de la entidad es NO venderlo, la respuesta es SI. Si la intención de la entidad es venderlo, la respuesta a la pregunta es un NO.';
}

$.alert({
        title: 'Nota',
        content:message
});
}

function limite ()
{
    $.ajax({
        url: '../../controladores/ajax/fechaLimite/obtenerFechaLimite.php'
    })

    .done(function(respuesta){
        if(respuesta == false)
        {
            location.reload();
        }
    })
}
//