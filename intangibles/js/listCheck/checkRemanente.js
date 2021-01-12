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
    $.redirect('reValResidual.php', {
        'id': $("#project").val()
    }, "POST");
}

    $("#boton_volver").click(function() {
        $.redirect('../../intangibles.php', {
            'centro': '<?php echo($info->codigo_centro) ?>'
        }, "POST");
    });