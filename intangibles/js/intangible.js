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

function descargarFormatos(e){
    var id = e.id;
    var contenido = '';

    if(id == 'GRF-F-078')
    {
        titulo ='GRF-F-078';
        contenido = 'Formato para el reconocimiento de activos intangibles adquiridos de forma separada: Este formato se debe diligenciar una vez se realice el contrato, factura o se suscriba un convenio, para verificar si se cumplen con los requisitos aquí contemplados y poder ser reconocido como activo intangible adquirido.';
        archivo='GRF-F-078_FORMATO_ADQUIRIDOS_V2.xlsx';
    }

    if(id == 'GRF-F-080')
    {
        titulo ='GRF-F-080';
        contenido = 'Formato reconocimiento activos intangibles desarrollados: Este formato se debe diligenciar una vez se culmine la fase de investigación y se tenga la certeza que el activo se puede desarrollar bajo los criterios de uso del área o grupo que generó la necesidad de dicho elemento.';
        archivo='GRF-F-080__FORMATO_RECONOCIMIENTO__ACTIVOS_INTANGIBLES_DESARROLLADOS.xlsx';
    }

    if(id == 'GRF-F-081')
    {
        titulo ='GRF-F-081';
        contenido = 'Formato medición activos intangibles en desarrollo: Este formato se debe diligenciar una vez se establezca el inicio de la fase de desarrollo, una vez surtida la fase de investigación y cumplido la lista de chequeo del reconocimiento del activo intangible desarrollado. Este formato se debe diligenciar cada vez que se genere un pago relacionado con el activo intangible desarrollado y previo aval del grupo que administra la información, de lo contrario NO se diligencia.';
        archivo='GRF-F-081_FORMATO_MEDICION_ACTIVOS_INTANGIBLES_EN_DESARROLLO.xlsx';
    }

    $.alert('dd');
}