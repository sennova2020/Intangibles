<?php

require_once '../verificaciones/verificacionesEncuestaIntangible.php';


function createIntangible()
{
    //Variable con la respuesta del controlador

    $respuesta = null;


	$dateFinish = trim($_POST['dateFinish']);
	$dateBudgetClosing = trim($_POST['dateBudgetClosing']);
	$typeIntangible = trim($_POST['typeIntangible']);
	$classIntangible = trim($_POST['classIntangible']);
	$nameIntangible = trim($_POST['nameIntangible']);
	$resourceControl = trim($_POST['resourceControl']);
	$observationResource = trim($_POST['observationResource']);
	$potencial = trim($_POST['potencial']);
	$observationPotencial = trim($_POST['observationPotencial']);
	$reliably = trim($_POST['reliably']);
    $identification = trim($_POST['identification']);
    $observationReliably = trim($_POST['observationReliably']);
    $observationIdentification = trim($_POST['observationIdentification']);
    $isMonetary = trim($_POST['isMonetary']);
    $physicalAppearance = trim($_POST['physicalAppearance']);
    $duration = trim($_POST['duration']);
    $observationMonetary = trim($_POST['observationMonetary']);
    $observationAppearance = trim($_POST['observationAppearance']);
    $observationDuration = trim($_POST['observationDuration']);
    $buyActivity = trim($_POST['buyActivity']);
    $observationBuyActivity = trim($_POST['observationBuyActivity']);
    $project = trim($_POST['project']);
    $state= trim($_POST['state']);

    //Variable with all the answers of yes or no7
    $yesNo = $resourceControl.$potencial.$reliably.$identification.$isMonetary.$duration.$buyActivity.$physicalAppearance;

    $acceptValidation = verificationIsNull($dateFinish,$dateBudgetClosing,$typeIntangible,$classIntangible,$nameIntangible,$resourceControl,$observationResource,$potencial,$observationPotencial,$reliably,$identification,$observationReliably,$observationIdentification,$isMonetary,$physicalAppearance,$duration,$observationMonetary,$observationAppearance,$observationDuration,$buyActivity,$observationBuyActivity);

    if ($acceptValidation === true) {
    	if (isAllYes($yesNo) != false) {
    		if (!is_null($project)) {
    			$respuesta = true;
    		} else {
    			$respuesta = 'Invalid';
    		}
    		
    	} else {
    		$respuesta = 'false';
    	}
    	
    	
    }else{
        $respuesta = $acceptValidation;
    }

    return $respuesta;
}

echo createIntangible();

?>