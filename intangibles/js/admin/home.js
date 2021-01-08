$(document).ready(function() {
    
    $.ajax({
        type: 'POST',
        url: '../../controladores/adminControllers/proyectos.php'
    })

    .done(function(respuesta){
        $("#contenTable").html(respuesta);
        $('#myTable').DataTable();
    })
});