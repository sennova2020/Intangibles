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

function seeSave(e) {
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