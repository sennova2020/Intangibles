function finish(e) {
    id = e.id;
    project = $("#project").val();
    $.redirect(
        '../formatoIntangible.php',
        {
            'id': id,
            'project':project,
            'volver':'finish'
        }, 
        "POST"
    );
}

function finishTwo(e) {
    id = e.id;
    project = $("#project").val();
    $.redirect(
        '../listaCheck/reValResidual.php',
        {
            'id': id,
            'project':project,
            'volver':'finish'
        }, 
        "POST"
    );
}

function finishThree(e) {
    id = e.id;
    project = $("#project").val();
    $.redirect(
        '../listaCheck/revMetdAmortizacion.php',
        {
            'id': id,
            'project':project,
            'volver':'finish'
        }, 
        "POST"
    );
}

function seeSave(e) {
    limite ();
    id = e.id;
    project = $("#project").val();

    $.redirect(
        'actualizar.php',
        {
            'id': id,
            'project' : project
            
        }, 
        "GET"
    );
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