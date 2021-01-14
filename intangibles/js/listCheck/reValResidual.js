function descriptionModal(e) {
        
    var object = e.id;
    var message = null;

    if (object == "residualValue") {
        message = 'Siempre que el bien se utilice en casi la totalidad o la totalidad de su vida útil y su uso sea hasta que el bien ya no se pueda utilizar más, se considera que el valor residual es cero; si dicha situación cambia, se debe indicar un SI para esta pregunta. Si para esta pregunta la respuesta es SI, identifique el valor  residual del activo. En observaciones, indique como llego a este dato o indique el documento soporte para esta determinación';
    }

    $.alert({
            title: 'Nota',
            content:message
    });
}
function envioDatos(){
    var validarDatos=validarEnvioDatos();
    if (validarDatos==''){
    $.redirect('revMetdAmortizacion.php', {
        'id': $("#project").val()
    }, "POST");
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

        var residual= $("#residual").val();
        var observationResidual = $("#observationResidual").val();
        
        
        
        //VALIDACIONES
        var results = '';
    
        if (residual === '') {
            results += '1)  No selecciono una repuesta a la pregunta, ¿El bien intangible se utilizará hasta que éste se consuma completamente o de forma significativa?. <br>';
        } else if(residual !== 'si' && residual !== 'no'){
            results += '1) La respuesta seleccionada a ¿El bien intangible se utilizará hasta que éste se consuma completamente o de forma significativa? , no corresponde a SI o NO. <br>';
        }
    
        if (observationResidual === '') {
            results += '2) No digito la observación de la pregunta ¿El bien intangible se utilizará hasta que éste se consuma completamente o de forma significativa?. <br>';
        }
    
        return results;
    }
    