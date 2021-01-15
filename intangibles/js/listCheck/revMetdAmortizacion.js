function descriptionModal(e) {
        
    var object = e.id;
    var message = null;

    if (object == "differentAssets") {
        message = 'Para esta pregunta, tenga en cuenta los factores que puedan afectar el consumo normal del bien; el patrón  de consumo es lineal cuando durante todos los periodos el bien intangible sufre un desgaste normal uniformemente. ';
    }

    $.alert({
            title: 'Nota',
            content:message
    });
}
function envioDatos(){
    var validarDatos=validarEnvioDatos();
    
    if (validarDatos==''){

        var different = $("#different").val();
        var observationDifferent = $("#observationDifferent").val();
        var datoAmortizacion = $("#datoAmortizacion").val();
        var document = $("#document").val();
        var cod = $("#project").val();
        

        $.confirm({
            title: 'Confirmación de envío',
            content: '¿Esta seguro de enviar esta información?',
            buttons: {
                confirmar: function() {
                    $.ajax({
                        type: 'POST',
                        url: '../../controladores/listCheckControllers/revMetdAmortizacionController.php',
                        data: {
                            'different':different,
                            'observationDifferent':observationDifferent,
                            'datoAmortizacion':datoAmortizacion,
                            'cod':cod
                        }

                    })
                    .done(function(respuesta) {
                        if (respuesta == '') {
                            
                            $("#miForm").submit();

                        } else {
                            if (repuesta == 'Error') {
                                 
                                $.alert({
                                    title: 'Error',
                                    content:'Ha ocurrido un error en el servidor o no hay conexion internet'
                                });

                            } else {
                               
                                $.alert({
                                    title: 'Error',
                                    content:'Los siguientes campos no se han diligenciado correctamente: <br> <br> '+respuesta
                                });

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
            content:'Los siguientes campos no se han diligenciado correctamente: <br> <br> '+validarDatos
        });
    }
       
    
   
}

    $("#boton_volver").click(function() {
        $.redirect('../../intangibles.php', {
            'centro': '<?php echo($info->codigo_centro) ?>'
        }, "POST");
    });

    function validarEnvioDatos() {

        var different = $("#different").val();
        var observationDifferent = $("#observationDifferent").val();
        var datoAmortizacion = $("#datoAmortizacion").val();
        var document = $("#document").val();
        
        
        
        //VALIDACIONES
        var results = '';
    
        if (different === '') {
            results += '1) No selecciono una repuesta a la pregunta ¿El activo intangible presenta un patrón de consumo diferente al inicialmente esperado?. <br>';
        } else if(different !== 'si' && different !== 'no'){
            results += '1) La respuesta seleccionada en la pregunta ¿El activo intangible presenta un patrón de consumo diferente al inicialmente esperado?, no corresponde a SI o NO. <br>';
        }

        if (different == 'si') {
            
            if (observationDifferent === '') {
                results += '2) No digito la observación de la aclaración sí para esta pregunta, la respuesta fue SI, entonces identifique el nuevo método de amortización que se debera utilizar de acuerdo al patron de consumo determinado. <br>';
            }
            
        }
    
        if (datoAmortizacion === '') {
            results += '3) No digito la observación de como llegó al dato de la amortización y adjunte el documento soporte para para esta determinación. <br>';
        }

        if (document === '') {
            results += '4) No adjunto el documento <br>';
        }
    
        return results;
    }
    
    

