<?php

require_once '../verificaciones/verificacionesEncuestaIntangible.php';
require_once '../../modelo/conexion/conexion.php';
require_once '../../modelo/intangible/intangibleModelo.php';


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

    return $respuesta;
}

echo createIntangible();

?>