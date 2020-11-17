function finish(e) {
    id = e.id;

    $.redirect(
        '../formatoIntangible.php',
        {
            'id': id
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