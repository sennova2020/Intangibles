function sinTerminar (e) { 
    limite ();
    var id = e.id;

    $.redirect(
        'encuestaIntangible/encuestasSinTerminar.php',
        {
            'project': id
        }, 
        "POST"
    );

}

function sinGuardar (e) { 
    limite ();
    var project = e.id;
    

    $.redirect(
        'encuestaIntangible/encuestasSinGuardar.php',
        {
            'project': project 
        }, 
        "POST"
    );

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