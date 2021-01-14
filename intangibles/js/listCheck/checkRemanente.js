function descriptionModal(e) {
        
    var object = e.id;
    var message = null;

    if (object == "ruleNote") {
        message = 'Para esta pregunta, tenga en cuenta los casos en que una nueva normativa podrían producir el cambio de tiempo de uso inicialmente definido por el activo al cual le está haciendo la evaluación; por ejemplo, nueva normativa de seguridad informática. Para los casos de contratos de arrendamiento, puede ser un cambio en la fecha de utilización del bien intangible ';
    }else if (object == "conditionNote") {
        message = 'Para esta pregunta, tenga en cuenta las proyecciones de compras y el presupuesto de la entidad con miras a reemplazar elementos que todavía cuentan con vida útil, pero que se pretende cambiar por elementos con mejores condiciones como son capacidad, velocidad, definicion, etc. Y este reemplazo se planea realizar antes de que termine su vida útil. (tiempo inicialmente esperado de uso)';
    }else if (object == "usefulLife") {
        message = 'AJUSTE DE LA VIDA UTIL: Si alguno de los criterios establecidos en la lista de chequeo se respondió "SI", determine el nuevo periodo durante el cual se espera que el activo intangible sea utilizable por parte de los usuarios. En observaciones, indique como llego a este dato o indique el documento soporte para esta determinación. (indicar la nueva vida útil del intangible de lo contrario escribir NO APLICA)';
    } 

    $.alert({
            title: 'Nota',
            content:message
    });
}

function envioDatos(){
    var validarDatos=validarEnvioDatos();
    if (validarDatos=='') {
        $.redirect('reValResidual.php', {
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

    var rule = $("#rule").val();
    var observationRule = $("#observationRule").val();
    var condition = $("#condition").val();
    var observationCondition = $("#observationCondition").val();
    var settingLife = $("#settingLife").val();
    
    
    //VALIDACIONES
    var results = '';

    if (rule === '') {
        results += '1) No aclaro sí surgió una nueva ley, norma, acuerdo, decreto o normativa interna que hace verificar la utilización del bien intangible . <br>';
    } else if(rule !== 'si' && rule !== 'no'){
        results += '1) La respuesta seleccionada a surgió una nueva ley, norma, acuerdo, decreto o normativa interna que hace verificar la utilización del bien intangible , no corresponde a SI o NO. <br>';
    }

    if (observationRule === '') {
        results += '2) No digito la observación de la aclaración sí surgió una nueva ley, norma, acuerdo, decreto o normativa interna que hace verificar la utilización del bien intangible . <br>';
    }

    if (condition === '') {
        results += '3) No aclaro sí se espera reemplazar el activo intangible por uno con mejores condiciones como son capacidad, velocidad, definición, etc. <br>';
    } else if(condition !== 'si' && condition !== 'no'){
        results += '3) La respuesta seleccionada a sí se espera reemplazar el activo intangible por uno con mejores condiciones como son capacidad, velocidad, definición, etc., no corresponde a SI o NO. <br>';
    }

    if (observationCondition === '') {
        results += '4) No digito la observación de la aclaración de que sí se espera reemplazar el activo intangible por uno con mejores condiciones como son capacidad, velocidad, definición, etc.. <br>';
    }

    /*if (settingLife === '') {
        results += '5) No digito la observación de la pregunta, ¿El intangible se puede identificar?. <br>';
    }*/

    return results;
}

