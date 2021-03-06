<?php

require_once '../verificaciones/verificacionesEncuestaIntangible.php';
require_once '../../modelo/conexion/conexion.php';
require_once '../../modelo/intangible/intangibleModelo.php';
require_once '../verificaciones/fechaLimite.php';
require_once '../../modelo/fechaLimite.php';


function createIntangible()
{
    //Variable con la respuesta del controlador

    $respuesta = null;

    if (enabledOperations()=== true) {
     
    

        $dateFinish = trim($_POST['dateFinish']);
        $dateBudgetClosing = trim($_POST['dateBudgetClosing']);
        $typeIntangible = trim($_POST['typeIntangible']);
        $classIntangible = trim($_POST['classIntangible']);
        $nameIntangible = utf8_decode(trim($_POST['nameIntangible']));
        $resourceControl = trim($_POST['resourceControl']);
        $observationResource = utf8_decode(trim($_POST['observationResource']));
        $potencial = trim($_POST['potencial']);
        $observationPotencial = utf8_decode(trim($_POST['observationPotencial']));
        $reliably = trim($_POST['reliably']);
        $identification = trim($_POST['identification']);
        $observationReliably = utf8_decode(trim($_POST['observationReliably']));
        $observationIdentification = utf8_decode(trim($_POST['observationIdentification']));
        $isMonetary = trim($_POST['isMonetary']);
        $physicalAppearance = trim($_POST['physicalAppearance']);
        $duration = trim($_POST['duration']);
        $observationMonetary = utf8_decode(trim($_POST['observationMonetary']));
        $observationAppearance = utf8_decode(trim($_POST['observationAppearance']));
        $observationDuration = utf8_decode(trim($_POST['observationDuration']));
        $buyActivity = trim($_POST['buyActivity']);
        $observationBuyActivity = utf8_decode(trim($_POST['observationBuyActivity']));
        $project = trim($_POST['project']);
        $state= trim($_POST['state']);
        $negativo = trim($_POST['negativo']);
        $codeIntangible = trim($_POST['codIntangible']);

        //Variable with all the answers of yes or no7
        $yesNo = $resourceControl.$potencial.$reliably.$identification.$isMonetary.$duration.$buyActivity.$physicalAppearance;

        $acceptValidation = verificationIsNull($dateFinish,$dateBudgetClosing,$typeIntangible,$classIntangible,$nameIntangible,$resourceControl,$observationResource,$potencial,$observationPotencial,$reliably,$identification,$observationReliably,$observationIdentification,$isMonetary,$physicalAppearance,$duration,$observationMonetary,$observationAppearance,$observationDuration,$buyActivity,$observationBuyActivity);

        //Asignación de codigo intangible

        if ($acceptValidation === true) {
            if (isAllYes($yesNo) != false) {
                if (!is_null($project)) {
                    $model = new intangible();
                    $consulta = $model -> update($dateFinish,$dateBudgetClosing,$typeIntangible,$classIntangible,$nameIntangible,$resourceControl,$observationResource,$potencial,$observationPotencial,$reliably,$identification,$observationReliably,$observationIdentification,$isMonetary,$physicalAppearance,$duration,$observationMonetary,$observationAppearance,$observationDuration,$buyActivity,$observationBuyActivity,$state,$codeIntangible,$negativo);

                    $respuesta = $consulta;
                } else {
                    $respuesta = 'Invalid';
                }
                
            } else {
                $respuesta = 'false';
            }
            
            
        }else{
            $respuesta = $acceptValidation;
        }
    
       
    } else {
        $respuesta = 'limite';
    }
    return $respuesta;
}

echo createIntangible();

?>