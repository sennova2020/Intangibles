function verInfoIntangible (e)
{
    codeIntangible = e.id;
    
    $.redirect(
        'detalleIntangibleFull.php',
        {
            
            'codeIntangible':codeIntangible
        }, 
        "POST"
    );
}