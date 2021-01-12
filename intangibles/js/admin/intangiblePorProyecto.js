function verInfoIntangible (e)
{
    codeIntangible = e.id;
    
    $.redirect(
        'detalleIntangibleAdmin.php',
        {
            
            'codeIntangible':codeIntangible, 
            'project':$('#project').val()
        }, 
        "POST"
    );
}