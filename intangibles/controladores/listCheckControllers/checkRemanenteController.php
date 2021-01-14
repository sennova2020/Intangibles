<?php

    require_once '../../modelo/conexion/conexion.php';
    require_once '../../modelo/listCheck/listCheckModelo.php';
    require_once '../seguridad/liderSecurity.php';
    liderRol(2);
    
    $rule = trim($_POST['rule']);
    $observationRule = trim($_POST['observationRule']);
    $condition = trim($_POST['condition']);
    $observationCondition = trim($_POST['observationCondition']);
    $settingLife = trim($_POST['settingLife']);
    $cod = trim($_POST['cod']);

    $errores = '';

    if (($rule == 'si' || $rule == 'no') && strlen($rule) > 0) {
        
        if (strlen($observationRule) > 0) {

            if (($condition == 'si' || $condition == 'no') && strlen($condition) > 0) {

                if (strlen($observationRule) > 0) {
                    
                    if (strlen($settingLife) > 0) {
                        
                        $modelo =  new listCheck();
                        $consulta = $modelo->createCheckRemanente($rule,$observationRule,$condition,$observationCondition,$settingLife,$cod);

                        $errores = $consulta === true ? '' : 'Error';

                    } else {
                        $errores = '5) No digito la observación de la pregunta, ¿El intangible se puede identificar?. <br>';
                    }
                    

                } else {
                    $errores = '4) No digito la observación de la aclaración de que sí se espera reemplazar el activo intangible por uno con mejores condiciones como son capacidad, velocidad, definición, etc.. <br>';
                }
                
                
            } else {
                $errores = '3) No aclaro sí se espera reemplazar el activo intangible por uno con mejores condiciones como son capacidad, velocidad, definición, etc. <br>';
            }
            
            
        } else {
            $errores = '2) No digito la observación de la aclaración sí surgió una nueva ley, norma, acuerdo, decreto o normativa interna que hace verificar la utilización del bien intangible . <br>';
        }
        

    } else {
        $errores = '1) No aclaro sí surgió una nueva ley, norma, acuerdo, decreto o normativa interna que hace verificar la utilización del bien intangible . <br>';
    }
    
    if ($errores == '') {
        echo $errores;
    } else {
        echo $errores;
    }
    
?>