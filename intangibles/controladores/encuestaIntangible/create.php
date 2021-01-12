<?php

require_once '../verificaciones/verificacionesEncuestaIntangible.php';
require_once '../../modelo/conexion/conexion.php';
require_once '../../modelo/intangible/intangibleModelo.php';
require_once '../verificaciones/fechaLimite.php';


function createIntangible()
{
    //Variable con la respuesta del controlador

    $respuesta = null;

    if (enabledOperations() === true) {
        
        $dateFinish = trim($_POST['dateFinish']);
        $dateBudgetClosing = trim($_POST['dateBudgetClosing']);
        $typeIntangible = trim($_POST['typeIntangible']);
        $classIntangible = trim($_POST['classIntangible']);
        $nameIntangible = utf8_encode(trim($_POST['nameIntangible']));
        $resourceControl = trim($_POST['resourceControl']);
        $observationResource = utf8_encode(trim($_POST['observationResource']));
        $potencial = trim($_POST['potencial']);
        $observationPotencial = utf8_encode(trim($_POST['observationPotencial']));
        $reliably = trim($_POST['reliably']);
        $identification = trim($_POST['identification']);
        $observationReliably = utf8_encode(trim($_POST['observationReliably']));
        $observationIdentification = utf8_encode(trim($_POST['observationIdentification']));
        $isMonetary = trim($_POST['isMonetary']);
        $physicalAppearance = trim($_POST['physicalAppearance']);
        $duration = trim($_POST['duration']);
        $observationMonetary = utf8_encode(trim($_POST['observationMonetary']));
        $observationAppearance = utf8_encode(trim($_POST['observationAppearance']));
        $observationDuration = utf8_encode(trim($_POST['observationDuration']));
        $buyActivity = trim($_POST['buyActivity']);
        $observationBuyActivity = utf8_encode(trim($_POST['observationBuyActivity']));
        $project = trim($_POST['project']);
        $state= trim($_POST['state']);
        $negativo = trim($_POST['negativo']);

        //Variable with all the answers of yes or no7
        $yesNo = $resourceControl.$potencial.$reliably.$identification.$isMonetary.$duration.$buyActivity.$physicalAppearance;

        $acceptValidation = verificationIsNull($dateFinish,$dateBudgetClosing,$typeIntangible,$classIntangible,$nameIntangible,$resourceControl,$observationResource,$potencial,$observationPotencial,$reliably,$identification,$observationReliably,$observationIdentification,$isMonetary,$physicalAppearance,$duration,$observationMonetary,$observationAppearance,$observationDuration,$buyActivity,$observationBuyActivity);

        //Asignación de codigo intangible
        $codeIntangible = newCodIntangible();
        if ($acceptValidation === true) {
            if (isAllYes($yesNo) != false) {
                if (!is_null($project)) {
                    $model = new intangible();
                    $consulta = $model -> create($dateFinish,$dateBudgetClosing,$typeIntangible,$classIntangible,$nameIntangible,$resourceControl,$observationResource,$potencial,$observationPotencial,$reliably,$identification,$observationReliably,$observationIdentification,$isMonetary,$physicalAppearance,$duration,$observationMonetary,$observationAppearance,$observationDuration,$buyActivity,$observationBuyActivity,$state,$project,$codeIntangible,$negativo);

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