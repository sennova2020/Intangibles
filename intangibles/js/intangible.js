function sinTerminar (e) { 

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

    var project = e.id;
    

    $.redirect(
        'encuestaIntangible/encuestasSinGuardar.php',
        {
            'project': project 
        }, 
        "POST"
    );

}