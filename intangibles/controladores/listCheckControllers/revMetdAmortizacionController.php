<?php

    require_once '../../modelo/conexion/conexion.php';
    require_once '../../modelo/listCheck/listCheckModelo.php';
    require_once '../seguridad/liderSecurity.php';
    require_once '../verificaciones/fechaLimite.php';
    require_once '../../modelo/fechaLimite.php';
    liderRol(2);
    
    $different = trim($_POST['different']);
    $observationDifferent = trim($_POST['observationDifferent']);
    $datoAmortizacion = trim($_POST['datoAmortizacion']);
    $ruta = '../../documentos/upload/DocumentdRevMetdAmortizacion/';
    $cod = trim($_POST['cod']);
    $document = 'documentos/upload/DocumentdRevMetdAmortizacion/'.$cod;

    $errores = '';
    if (($different == 'si' || $different == 'no') && strlen($different) > 0) {
        
        if (true) {
            if ($different == 'no') {
                $modelo = new listCheck();
                $consulta = $modelo->createRevMetdAmortizacion($different,$observationDifferent,$datoAmortizacion,'',$cod);
                
                $errores = $consulta === true ? '' : 'Error';
            } else {
                if ($different == 'si'  && strlen($datoAmortizacion) > 0) {

                    if(enabledOperations() === false)
                    {
                        echo 'LimitDate';
                    }else{
                        
                        $modelo = new listCheck();
                        $consulta = $modelo->createRevMetdAmortizacion($different,$observationDifferent,$datoAmortizacion,$document,$cod);
                        
                        $errores = $consulta === true ? '' : 'Error';
                    }
                        
                    
                    
                } else {
                    $errores = '3) No digito la observación de como llegó al dato de la amortización y adjunte el documento soporte para para esta determinación. <br>';
                }
            }
            
            
            
        } else {
            $errores = '2) No digito la observación de la aclaración sí para esta pregunta, la respuesta fue SI, entonces identifique el nuevo método de amortización que se debera utilizar de acuerdo al patron de consumo determinado. <br>';
        }
        

    } else {
        $errores = '1) No selecciono una repuesta a la pregunta ¿El activo intangible presenta un patrón de consumo diferente al inicialmente esperado?. <br>';
    }
    
    if ($errores == '') {
        echo $errores;
    } else {
        echo $errores;
    }
    
?>