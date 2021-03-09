<?php

require_once '../../modelo/conexion/conexion.php';
require_once '../../modelo/listCheck/listCheckModelo.php';
require_once '../seguridad/liderSecurity.php';
require_once '../verificaciones/fechaLimite.php';
require_once '../../modelo/fechaLimite.php';
require_once '../verificaciones/fechaLimite.php';
require_once '../../modelo/fechaLimite.php';
liderRol(2);

$changes = trim($_POST['changes']);
$observationChanges = trim($_POST['observationChanges']);
$reduction = trim($_POST['reduction']);
$observationReduction = trim($_POST['observationReduction']);
$nameIntangible = trim($_POST['nameIntangible']);
$value = trim($_POST['value']);
$reposicion = trim($_POST['reposicion']);
$reposicionIntangible = '';
$evidencia = trim($_POST['evidencia']);
$rehabilitaciones = trim($_POST['rehabilitaciones']);
$evaluation = trim($_POST['evaluation']);
$observationEvaluation = trim($_POST['observationEvaluation']);
$construction = trim($_POST['construction']);
$observationConstruction = trim($_POST['observationConstruction']);
$information = trim($_POST['information']);
$observationInformation = trim($_POST['observationInformation']);
$cod = trim($_POST['cod']);
$vidaUtil = trim($_POST['vidaUtil']);


$YesNo = null;

$errores = '';

if (($changes == 'si' || $changes == 'no') && strlen($changes) > 0) {
    
    if (strlen($observationChanges) > 0) {

        if (($reduction == 'si' || $reduction == 'no') && strlen($reduction) > 0) {
            
            if (($reduction == 'si' && strlen($observationReduction) > 0) || ($reduction == 'no')) {
                
                if (strlen($nameIntangible) > 0) {
                        $nameIntangible='documentos/upload/DocumentDeterioro/'.$cod;
                    if ($value > 0 ) {
                
                        if (($reduction == 'no' && $reposicion > 0) || ($reduction == 'si')) {

                            if ($vidaUtil=='indefinida') {
                                $modelo = new listCheck();
                                $consulta = $modelo->createRevIndDeterioro($changes,$observationChanges,$reduction,$observationReduction,$nameIntangible,$value,$reposicion,$reposicionIntangible,$evidencia,$rehabilitaciones,$evaluation,$observationEvaluation,$construction,$observationConstruction,$information,$observationInformation,$cod);
                                
                                $errores = $consulta === true ? '' : 'Error';

                            } else {
                                # code...    
                            
                                if (($evidencia == 'si' || $evidencia == 'no') && strlen($evidencia) > 0) {
                                
                                    if (($evidencia == 'si' && $rehabilitaciones > 0) || ($evidencia == 'no')) {
                                        
                                        if (($evaluation == 'si' || $evaluation == 'no') && strlen($evaluation) > 0) {
                                            
                                            if (strlen($observationEvaluation) > 0) {
                                                
                                                if (($construction == 'si' || $construction == 'no') && strlen($construction) > 0) {
                                                    
                                                    if (strlen($observationConstruction)>0) {
                                                    
                                                        if (($information == 'si' || $information == 'no') && strlen($information) > 0) {
                                                    
                                                            if (strlen($observationInformation)>0) {

                                                                if(enabledOperations() === false)
                                                                {
                                                                    echo 'LimitDate';
                                                                }else{
                                                                
                                                                    $modelo = new listCheck();
                                                                    $consulta = $modelo->createRevIndDeterioro($changes,$observationChanges,$reduction,$observationReduction,$nameIntangible,$value,$reposicion,$reposicionIntangible,$evidencia,$rehabilitaciones,$evaluation,$observationEvaluation,$construction,$observationConstruction,$information,$observationInformation,$cod);
                                                                    
                                                                    $errores = $consulta === true ? '' : 'Error';
                                                                }
                                                                
                                                            } else {
                                                                $errores.='16) No digito la observación de sí se dispone de información procedente de informes internos que indican que la capacidad del activo para suministrar bienes o servicios ha disminuido o va a ser inferior a la esperada. <br>';
                                                            }
                                                            
                                                        } else {
                                                            $errores.='15) No selecciono una repuesta a sí se dispone de información procedente de informes internos que indican que la capacidad del activo para suministrar bienes o servicios ha disminuido o va a ser inferior a la esperada. <br>';
                                                        }
                                                        
                                                    } else {
                                                        $errores.='14) No digito la observación de sí se decide detener la construcción del activo antes de su finalización o de su puesta en condiciones de funcionamiento, salvo que exista evidencia objetiva de que se reanudará la construcción en el futuro próximo. <br>';
                                                    }
                                                    
                                                } else {
                                                    $errores.='13) No selecciono una repuesta a sí se decide detener la construcción del activo antes de su finalización o de su puesta en condiciones de funcionamiento, salvo que exista evidencia objetiva de que se reanudará la construcción en el futuro próximo. <br>';
                                                }
                                                

                                            } else {
                                                $errores .= '12) No digito la observación a sí durante el periodo, han tenido lugar, o se espera que tengan lugar en un futuro inmediato, cambios significativos en el grado de utilización  o la manera como se usa o se espera usar el activo, los cuales afectaran desfavorablemente la entidad a largo plazo. Estos cambios incluyen el hecho de que el activo esté ocioso, los planes de discontinuación o restructuración de la operación  a la que pertenece el activo, los planes para disponer el activo antes de la fecha prevista y el cambio de la vida útil de un activo de indefinida a finita. <br>';
                                            }
                                            

                                        } else {
                                            $errores .= '11) No aclaro sí durante el periodo, han tenido lugar, o se espera que tengan lugar en un futuro inmediato, cambios significativos en el grado de utilización  o la manera como se usa o se espera usar el activo, los cuales afectaran desfavorablemente la entidad a largo plazo. Estos cambios incluyen el hecho de que el activo esté ocioso, los planes de discontinuación o restructuración de la operación  a la que pertenece el activo, los planes para disponer el activo antes de la fecha prevista y el cambio de la vida útil de un activo de indefinida a finita. <br>';
                                        }
                                        
                                    } else {
                                        $errores .= '10) Sí su respuesta fue afirmativa se debe calcular el valor de dichas rehabilitaciones. <br>';
                                    }
                                    

                                } else {
                                    $errores .= '9) No selecciono sí se dispone de evidencia sobre la obsolescencia o daño del activo. <br>';
                                }
                                
                            
                            }

                        
                        } else {
                            $errores .= '7) Su respuesta es negativa, pero no indico el costo de reposición, que es el valor que se incurriría si se tuviera que reponer el bien que se encuentra evaluando, en las mismas condiciones en que se encuentra. Para esto realice la siguiente pregunta, si tuviera que adquirir este elemento que se encuentra evaluando,¿cuál sería su costo o valor en el mercado?, ¿ese valor en el que tuviera que incurrir es muy inferior al valor reflejado como VALOR DEL BIEN?. <br>';
                        }
                        
                        
                    } else {
                        $errores = '6) No digito el valor del estudio del mercado (si no se puede estimar el costo del valor del mercado, escribir el costo de reposición). <br>';
                    }
                    
                } else {
                    $errores = '5) No adjunto evidencias del estudio realizado. <br>';
                }
                
            } else {
                $errores = '4) Su respuesta es afirmativa, pero no adjunto las evidencias del estudio del mercado que realizó para determinar el valor del mercado. <br>';
            }
            
        
        } else {
            $errores = '3) No aclaro sí durante el periodo, el valor de mercado del activo ha disminuido significativamente más que lo que se  esperaría como consecuencia del paso del tiempo o de su uso normal. <br>';
        }
        
    } else {
        $errores = '2) No digito la observación de la aclaración sí durante el periodo, han tenido lugar, o va a tener lugar en un futuro inmediato,cambios significativos con una incidencia desfavorable sobre la entidad a largo plazo, los cuales estan relacionados con el entorno legal, tecnológico o de política gubernamental, en los que opera la entidad. <br>';
    }
    

} else {
    $errores = '1) No aclaro sí, Durante el periodo, han tenido lugar, o va a tener lugar en un futuro inmediato,cambios significativos con una incidencia desfavorable sobre la entidad a largo plazo, los cuales estan relacionados con el entorno legal, tecnológico o de política gubernamental, en los que opera la entidad. <br>';
}

if ($errores == '') {
    echo $errores;
} else {
    echo $errores;
}

        /*$modelo = new listCheck();
        $consulta = $modelo->createCheckReValResidual($residual,$observationResidual,$cod);
        
        $errores = $consulta === true ? '' : 'Error';*/

?>