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
    $.redirect('revIndDeterioro.php', {
        'id': $("#project").val()
    }, "POST");
}

    $("#boton_volver").click(function() {
        $.redirect('../../intangibles.php', {
            'centro': '<?php echo($info->codigo_centro) ?>'
        }, "POST");
    });