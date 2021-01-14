<?php

    require_once '../../modelo/conexion/conexion.php';
    require_once '../../modelo/listCheck/listCheckModelo.php';
    require_once '../seguridad/liderSecurity.php';
    liderRol(2);
    
    $residual = trim($_POST['residual']);
    $observationResidual = trim($_POST['observationResidual']);
    $cod = trim($_POST['cod']);

    $errores = '';

    if (($residual == 'si' || $residual == 'no') && strlen($residual) > 0) {
        
        if (strlen($observationResidual) > 0) {

            $modelo = new listCheck();
            $consulta = $modelo->createCheckReValResidual($residual,$observationResidual,$cod);
            
            $errores = $consulta === true ? '' : 'Error';
            
        } else {
            $errores = '2) No digito la observación de la pregunta ¿El bien intangible se utilizará hasta que éste se consuma completamente o de forma significativa?. <br>';
        }
        

    } else {
        $errores = '1) No selecciono una repuesta a la pregunta, ¿El bien intangible se utilizará hasta que éste se consuma completamente o de forma significativa?. <br>';
    }
    
    if ($errores == '') {
        echo $errores;
    } else {
        echo $errores;
    }
    
?>