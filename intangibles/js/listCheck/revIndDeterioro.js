$(document).ready(function(){
    var cod = $("#project").val();
    $.ajax({
        type: 'POST',
        url: '../../controladores/listCheckControllers/queryLifeIntangible.php',
        data: {
            'cod':cod
        }

    })
    .done(function(respuesta) {
       
        if (respuesta=='unLife') {
            $.alert({
                title: 'Error',
                content: 'El intangible no tiene vida útil definida'
            });
        } else {
            if(respuesta=='finita'){
                $("#dependencia").attr("style","display:block"); 
            } 
            $('#vidaUtil').val(respuesta);  
        }

    })
    .fail(function () {
        $.alert({
            title: 'Error',
            content: 'Ha ocurrido un error'
        });
    })
})

function descriptionModal(e) {
        
    var object = e.id;
    var message = null;

    if (object == "changesNote") {
        message = 'Tenga en cuenta aquellos factores que puedan imposibilitar la utilización del bien. ';
    }else if (object == "assetReduction") {
        message = 'El valor del mercado es el valor por el cual el bien intangible puede ser intercambiado entre partes interesadas y debidamente informadas, en una transacción realizada en condiciones de independencia mutua (valor del intangible en el mercado, si se pusiera en venta); el mercado debe presentar condiciones de ser abierto, activo y ordenado.<br>Si se cuenta con evidencia objetiva de algunas de las siguientes situaciones se debe marcar “SI”.<br> A continuación, se enumeran algunos ejemplos:<br><br>1)Un intangible que ha disminuido su “valor de mercado” como consecuencia de la disminución de la materia prima y/o mano de obra con que se elabora el intangible.<br><br>2)Un intangible que ha disminuido su “valor de mercado” como consecuencia del ingreso al mercado de otras tecnologías que desarrollan las mismas actividades, pero con mejor definición, velocidad, capacidad, etc.<br><br>3)Sale al mercado una nueva versión o un nuevo modelo del intangible que vuelve obsoleto más de lo normal a la versión anterior.<br><br>4)Cualquier otra situación que represente una disminución del "valor de mercado" de este elemento intangible';
    } else if(object == "damagedAsset"){
        message = 'Con esta pregunta se pretende identificar de qué manera la obsolescencia o el daño en un bien intangible puede alterar sifnificativamente la forma como se usa, es decir, que el servicio que presta el bien se ha disminuido en un porcentaje MAYOR AL 80% como consecuencia del daño sufrido y por ende se requiere de la salida de recursos por parte de la entidad para rehabilitar el servicio normal del bien. ';
    }else if(object =='valueRehabilitations'){
        message = 'Un bien intangible que ha recibido ataque cibernético, robo de información, secuestro de información o algún hecho que imposibiliten el normal funcionamiento del activo.<br><br>1)Un intangible que no se puede utilizar debido a que no cuenta con infraestructura para su utilización.<br><br>20GRF-G-010 V 05<br><br>2)Un intangible que presenta pérdida o daño de alguno de sus componentes para su correcto funcionamiento.<br><br>3)Un intangible que presenta alteración en su diseño estructural, que no permite su utilización.<br><br>4)Un intangible que ha sido manipulado incorrectamente y su arreglo requiere un compromiso de desembolso de efectivo por un valor muy superior al valor del activo en el mercado.';
    }else if(object == 'activeEvaluation'){
        message = 'Con esta pregunta se pretende identificar si el activo que se encuentra en evaluación, se dejó de utilizar o se piensa dejar de utilizar, inclusive si se cuenta con un plan para reemplazar el elemento o no utilizarlo hasta la fecha contemplada inicialmente por circunstancias diferentes al daño físico del elemento.<br>A continuación, se enumeran algunos ejemplos de circunstancias: <br><br>1)Si un bien intangible no se está utilizando en el mismo grado que cuando se puso en funcionamiento, o si la vida útil estimada del activo es menor que la que originalmente se estimó; es decir se planteó inicialmente su uso en un determinado tiempo y ahora se prevé su uso en un tiempo menor.<br><br>2)Un bien intangible creado con un fin específico y se encuentra en uso en un tema muy diferente al original. Un ejemplo de esto es un software con fines de formación profesional en un tema específico y el SENA deja de ofrecer dicha formación profesional.<br><br>3)Un intangible que no cuenta con la capacidad, la velocidad, definición que se requiere para su utilización.';
    }else if(object == "constructionActive"){
        message = 'Esta pregunta se tendrá en cuenta para aquellos bienes intangibles generados internamente, por la Entidad, producto de una fase de desarrollo, si no se construye o ya se terminó su construcción, la respuesta es NO.';
    }else if(object == "activeInformation"){
        message = 'Ejemplo, un bien intangible fue construido para atender una población estimada de aprendices sin embargo, su utilización es considerablemente menor debido por ejemplo a la baja demanda de la oferta educativa del Centro de Formación.<br> Para esta pregunta tenga en cuenta informes emitidos por la Entidad, sino cuenta con ellos la respuesta es NO. ';
    }

    $.alert({
            title: 'Nota',
            content:message
    });
}
function envioDatos(){
    var validarDatos=validarEnvioDatos();
    if (validarDatos=='') {
        var changes = $("#changes").val();
        var observationChanges = $("#observationChanges").val();
        var reduction = $("#reduction").val();
        var observationReduction = $("#observationReduction").val();
        var nameIntangible = $("#nameIntangible").val();
        var value = $("#value").val();
        var reposicion = $("#reposicion").val();
        var evidencia = $("#evidencia").val();
        var rehabilitaciones = $("#rehabilitaciones").val();
        var evaluation = $("#evaluation").val();
        var observationEvaluation = $("#observationEvaluation").val();
        var construction = $("#construction").val();
        var observationConstruction = $("#observationConstruction").val();
        var information = $("#information").val();
        var observationInformation = $("#observationInformation").val();
        var cod = $("#project").val();
        var vidaUtil = $("#vidaUtil").val();
        
        $.confirm({
            title: 'Confirmación de envío',
            content: '¿Esta seguro de enviar esta información?',
            buttons: {
                confirmar: function() {
                    $.ajax({
                        type: 'POST',
                        url: '../../controladores/listCheckControllers/revIndDeterioroController.php',
                        data: {
                            'changes':changes,
                            'observationChanges':observationChanges,
                            'reduction':reduction,
                            'observationReduction':observationReduction,
                            'nameIntangible':nameIntangible,
                            'value':value,
                            'reposicion':reposicion,
                            'evidencia':evidencia,
                            'rehabilitaciones':rehabilitaciones,
                            'evaluation':evaluation,
                            'observationEvaluation':observationEvaluation,
                            'construction':construction,
                            'observationConstruction':observationConstruction,
                            'information':information,
                            'observationInformation':observationInformation,
                            'cod':cod,
                            'vidaUtil':vidaUtil
                        }

                    })
                    .done(function(respuesta) {
                        if (respuesta == '') {
                            $("#miForm").submit();

                        } else {
                            if (respuesta == 'Error') {
                                 
                                $.alert({
                                    title: 'Error',
                                    content:'Ha ocurrido un error en el servidor o no hay conexion internet'
                                });

                            } else {
                               
                                if (respuesta == 'LimitDate') {
                                    $.confirm({
                                        title: 'Informaci&oacute;n',
                                        content:'Haz alcanzado la fecha limite, por lo tanto no puede hacer mas registros.',
                                        buttons: {
                                            Ok: function () {
                                                $.redirect('../../index.php')
                                            }
                                        }
                                    });
                                } else {
                                     
                                    $.alert({
                                        title: 'Error',
                                        content:'Los siguientes campos no se han diligenciado correctamente: <br> <br> '+respuesta
                                    });
                                }

                            }
                        }

                    })
                    .fail(function () {
                        $.alert({
                            title: 'Error',
                            content: 'Ha ocurrido un error'
                        });
                    })

                },
                cancelar: function() {

                },
            }

        });
     
        
    } else {
        $.alert({
            title: 'Error',
            content:'Los siguientes campos no se han diligenciado correctamente: <br> <br> '+validarDatos
        });
    }
   
}

    $("#boton_volver").click(function() {
        $.redirect('../intangibles.php', {
            'centro': '<?php echo($info->codigo_centro) ?>'
        }, "POST");
    });

    function validarEnvioDatos() {

        var changes = $("#changes").val();
        var observationChanges = $("#observationChanges").val();
        var reduction = $("#reduction").val();
        var observationReduction = $("#observationReduction").val();
        var nameIntangible = $("#nameIntangible").val();
        var value = $("#value").val();
        var reposicion = $("#reposicion").val();
        var evidencia = $("#evidencia").val();
        var rehabilitaciones = $("#rehabilitaciones").val();
        var evaluation = $("#evaluation").val();
        var observationEvaluation = $("#observationEvaluation").val();
        var construction = $("#construction").val();
        var observationConstruction = $("#observationConstruction").val();
        var information = $("#information").val();
        var observationInformation = $("#observationInformation").val();
        var vidaUtil = $("#vidaUtil").val();
        
        
        
        //VALIDACIONES
        var results = '';

        if (changes === '') {
            results += '1) No aclaro sí, Durante el periodo, han tenido lugar, o va a tener lugar en un futuro inmediato,cambios significativos con una incidencia desfavorable sobre la entidad a largo plazo, los cuales estan relacionados con el entorno legal, tecnológico o de política gubernamental, en los que opera la entidad. <br>';
        } else if(changes !== 'si' && changes !== 'no'){
            results += '1) La respuesta seleccionada a durante el periodo, han tenido lugar, o va a tener lugar en un futuro inmediato,cambios significativos con una incidencia desfavorable sobre la entidad a largo plazo, los cuales estan relacionados con el entorno legal, tecnológico o de política gubernamental, en los que opera la entidad., no corresponde a SI o NO. <br>';
        }

        if (observationChanges === '') {
            results += '2) No digito la observación a sí durante el periodo, han tenido lugar, o va a tener lugar en un futuro inmediato,cambios significativos con una incidencia desfavorable sobre la entidad a largo plazo, los cuales estan relacionados con el entorno legal, tecnológico o de política gubernamental, en los que opera la entidad. <br>';
        }

        if (reduction === '') {
            results += '3) No aclaro sí durante el periodo, el valor de mercado del activo ha disminuido significativamente más que lo que se  esperaría como consecuencia del paso del tiempo o de su uso normal. <br>';
        } else if(reduction !== 'si' && reduction !== 'no'){
            results += '3) La respuesta seleccionada a durante el periodo, el valor de mercado del activo ha disminuido significativamente más que lo que se esperaría como consecuencia del paso del tiempo o de su uso normal, no corresponde a SI o NO. <br>';
        }
        if (reduction == 'si') {
            if (observationReduction === '') {
                results += '4) Su respuesta es afirmativa, pero no adjunto las evidencias del estudio del mercado que realizó para determinar el valor del mercado. <br>';
            }
        }
        

        if (nameIntangible=== '') {
            results += '5) No adjunto evidencias del estudio realizado. <br>';
        }

        if (value=== '') {
            results += '6) No digito el valor del estudio del mercado. <br>';
        }else {
            value = parseFloat(value);
    
            if (!Number.isInteger(value) || (value < 0)) {
                results += "6) El valor del estudio del mercado, debe ser un n&uacute;mero entero y positivo.<br><br>";
            
            }
        }

        if (reposicion === '') {
            results += '7) No digito el costo de reposición del activo intangible. <br>';
            
        }else {
            reposicion = parseFloat(reposicion);
    
                if (!Number.isInteger(reposicion) || (reposicion < 0)) {
                    results += "7) El costo de reposición del activo intangible, debe ser un n&uacute;mero entero y positivo.<br><br>";
                    
                }
        }


        
    
        if(vidaUtil=='finita'){

            

            if (evidencia === '') {
                results += '8) No selecciono sí dispone de evidencia sobre la obsolescencia o daño del activo. <br>';
            } else if(evidencia !== 'si' && evidencia !== 'no'){
                results += '8) La respuesta seleccionada a sí se dispone de evidencia sobre la obsolescencia o daño del activo, no corresponde a SI o NO. <br>';
            }

            if (evidencia == 'si') {
            
                if ( rehabilitaciones=== '') {
                    results += '9) Sí su respuesta fue afirmativa se debe calcular el valor de dichas rehabilitaciones. <br>';
                
                }else {
                    rehabilitaciones = parseFloat(rehabilitaciones);
            
                        if (!Number.isInteger(rehabilitaciones) || (rehabilitaciones < 0)) {
                            results += "9)No digito, el valor de las rehabilitaciones, debe ser un n&uacute;mero entero y positivo.<br><br>";
                            
                        }
                }
                
            }
            

            if (evaluation === '') {
                results += '10) No aclaro sí durante el periodo, han tenido lugar, o se espera que tengan lugar en un futuro inmediato, cambios significativos en el grado de utilización  o la manera como se usa o se espera usar el activo, los cuales afectaran desfavorablemente la entidad a largo plazo. Estos cambios incluyen el hecho de que el activo esté ocioso, los planes de discontinuación o restructuración de la operación  a la que pertenece el activo, los planes para disponer el activo antes de la fecha prevista y el cambio de la vida útil de un activo de indefinida a finita. <br>';
            } else if(evaluation !== 'si' && evaluation !== 'no'){
                results += '10) La respuesta seleccionada a sí durante el periodo, han tenido lugar, o se espera que tengan lugar en un futuro inmediato, cambios significativos en el grado de utilización  o la manera como se usa o se espera usar el activo, los cuales afectaran desfavorablemente la entidad a largo plazo. Estos cambios incluyen el hecho de que el activo esté ocioso, los planes de discontinuación o restructuración de la operación  a la que pertenece el activo, los planes para disponer el activo antes de la fecha prevista y el cambio de la vida útil de un activo de indefinida a finita., no corresponde a SI o NO. <br>';
            }

            if (observationEvaluation === '') {
                results += '11) No digito la observación, a sí durante el periodo, han tenido lugar, o se espera que tengan lugar en un futuro inmediato, cambios significativos en el grado de utilización  o la manera como se usa o se espera usar el activo, los cuales afectaran desfavorablemente la entidad a largo plazo. Estos cambios incluyen el hecho de que el activo esté ocioso, los planes de discontinuación o restructuración de la operación  a la que pertenece el activo, los planes para disponer el activo antes de la fecha prevista y el cambio de la vida útil de un activo de indefinida a finita. <br>';
            }

            if (construction === '') {
                results += '12) No selecciono una repuesta, a sí se decide detener la construcción del activo antes de su finalización o de su puesta en condiciones de funcionamiento, salvo que exista evidencia objetiva de que se reanudará la construcción en el futuro próximo. <br>';
            } else if(construction !== 'si' && construction !== 'no'){
                results += '12) La respuesta seleccionada, a sí se decide detener la construcción del activo antes de su finalización o de su puesta en condiciones de funcionamiento, salvo que exista evidencia objetiva de que se reanudará la construcción en el futuro próximo., no corresponde a SI o NO. <br>';
            }

            if (observationConstruction === '') {
                results += '13) No digito la observación, de sí se decide detener la construcción del activo antes de su finalización o de su puesta en condiciones de funcionamiento, salvo que exista evidencia objetiva de que se reanudará la construcción en el futuro próximo. <br>';
            }

            if (information === '') {
                results += '14) No selecciono una repuesta, a sí se dispone de información procedente de informes internos que indican que la capacidad del activo para suministrar bienes o servicios ha disminuido o va a ser inferior a la esperada. <br>';
            } else if(information !== 'si' && information !== 'no'){
                results += '14) La respuesta seleccionada, a sí se dispone de información procedente de informes internos que indican que la capacidad del activo para suministrar bienes o servicios ha disminuido o va a ser inferior a la esperada, no corresponde a SI o NO. <br>';
            }

            if (observationInformation === '') {
                results += '15) No digito la observación, de sí se dispone de información procedente de informes internos que indican que la capacidad del activo para suministrar bienes o servicios ha disminuido o va a ser inferior a la esperada. <br>';
            }
        }
        return results;
    }
