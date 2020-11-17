<?php

 function verificationIsNull($dateFinish,$dateBudgetClosing,$typeIntangible,$classIntangible,$nameIntangible,$resourceControl,$observationResource,$potencial,$observationPotencial,$reliably,$identification,$observationReliably,$observationIdentification,$isMonetary,$physicalAppearance,$duration,$observationMonetary,$observationAppearance,$observationDuration,$buyActivity,$observationBuyActivity)
 {
 	$results = true;

    if ($dateFinish === '' ) {
        $results .= '1) No ha definido la fecha de cierre del proyecto técnicamente en la vigencia 2020. <br>';
    }

    if ($dateBudgetClosing === '') {
        $results .= '2) No ha definido la fecha de cierre del proyecto presupuestalmente en la vigencia 2020. <br>';
    }

    if ($typeIntangible === 'none' || $typeIntangible === '') {
        $results .= '3) No selecciono el tipo de intangible. <br>';
    }else if (!$typeIntangible == 'Adquirido' || !$typeIntangible == 'Desarrollado') {
        $results .= '3) El tipo de intangible que selecciono no corresponde a los estándares. <br>';
    }
    if ($classIntangible === '') {
        $results .= '4) No selecciono la clase de intangible. <br>';
    }else{
        if (validateClassIntangible($typeIntangible, $classIntangible) === false) {
            $results .= '4) La clase de intangible que selecciono no corresponde a los estándares. <br>';
        }
    }
    
    if ($nameIntangible=== '') {
        $results .= '5) No digito el nombre del intangible. <br>';
    }
    
    if ($resourceControl === '') {
        $results .= '6) No selecciono una repuesta a la pregunta ¿El intangible es un recurso controlado?. <br>';
    }

    if($resourceControl !== 'si' && $resourceControl !== 'no'){
        $results .= '6) La respuesta seleccionada en la pregunta, ¿El intangible es un recurso controlado?, no corresponde a SI o NO. <br>';
    }

    if ($observationResource === '') {
        $results .= '7) No digito la observación de la pregunta, ¿El intangible es un recurso controlado?. <br>';
    }

    if ($potencial === '') {
        $results .= '8) No selecciono una repuesta a la pregunta, ¿Del intangible se espera obtener un potencial de servicios?. <br>';
    } else if($potencial !== 'si' && $potencial !== 'no'){
        $results .= '8) La respuesta seleccionada en la pregunta, ¿Del intangible se espera obtener un potencial de servicios?, no corresponde a SI o NO. <br>';
    }

    if ($observationPotencial === '') {
        $results .= '9) No digito la observación de la pregunta, ¿Del intangible se espera obtener un potencial de servicios?. <br>';
    }

    if ($reliably === '') {
        $results .= '10) No selecciono una repuesta a la pregunta, ¿El intangible se puede medir fiablemente?. <br>';
    } else if($reliably !== 'si' && $reliably !== 'no'){
        $results .= '10) La respuesta seleccionada en la pregunta, ¿El intangible se puede medir fiablemente?, no corresponde a SI o NO. <br>';
    }

    if ($observationReliably === '') {
        $results .= '11) No digito la observación de la pregunta, ¿Del intangible se espera obtener un potencial de servicios?. <br>';
    }

    if ($identification === '') {
        $results .= '12) No selecciono una repuesta a la pregunta, ¿El intangible se puede identificar?. <br>';
    } else if($identification !== 'si' && $identification !== 'no'){
        $results .= '12) La respuesta seleccionada en la pregunta, ¿El intangible se puede identificar?, no corresponde a SI o NO. <br>';
    }

    if ($observationIdentification === '') {
        $results .= '13) No digito la observación de la pregunta, ¿El intangible se puede identificar?. <br>';
    }

    if ($isMonetary === '') {
        $results .= '14) No selecciono una repuesta a la pregunta, ¿El intangible NO es considerado monetario?. <br>';
    } else if($isMonetary !== 'si' && $isMonetary !== 'no'){
        $results .= '14) La respuesta seleccionada en la pregunta, ¿El intangible NO es considerado monetario?, no corresponde a SI o NO. <br>';
    }

    if ($observationMonetary === '') {
        $results .= '15) No digito la observación de la pregunta, ¿El intangible NO es considerado monetario?. <br>';
    }

    if ($physicalAppearance === '') {
        $results .= '16) No selecciono una repuesta a la pregunta, ¿El intangible es sin apariencia física?. <br>';
    } else if($physicalAppearance !== 'si' && $physicalAppearance !== 'no'){
        $results .= '16) La respuesta seleccionada en la pregunta, ¿El intangible es sin apariencia física?, no corresponde a SI o NO. <br>';
    }

    if ($observationAppearance === '') {
        $results .= '17) No digito la observación de la pregunta, ¿El intangible es sin apariencia física?. <br>';
    }

    if ($duration === '') {
        $results .= '18) No selecciono una repuesta a la pregunta, ¿El intangible se va a utilizar por más de un año?. <br>';
    } else if($duration !== 'si' && $duration !== 'no'){
        $results .= '18) La respuesta seleccionada en la pregunta, ¿El intangible se va a utilizar por más de un año?, no corresponde a SI o NO. <br>';
    }

    if ($observationDuration === '') {
        $results .= '19) No digito la observación de la pregunta, ¿El intangible se va a utilizar por más de un año?. <br>';
    }

    if ($buyActivity === '') {
        $results .= '20) No selecciono una repuesta a la pregunta, ¿No se espera vender en el curso de las actividades de la entidad?. <br>';
    } else if($buyActivity !== 'si' && $buyActivity !== 'no'){
        $results .= '20) La respuesta seleccionada en la pregunta, ¿No se espera vender en el curso de las actividades de la entidad?, no corresponde a SI o NO. <br>';
    }

    if ($observationBuyActivity === '') {
        $results .= '21) No digito la observación de la pregunta, ¿No se espera vender en el curso de las actividades de la entidad?. <br>';
    }

    return $results;
 }

function validateClassIntangible($tipo, $classIntangible) 
{
	$resultado = false;
    if ($tipo === 'Adquirido') {
        for($i = 1; $i<= 13; $i++){
            if($classIntangible == $i){
                $resultado = true;
                break;
            }
        }
    }else if ($tipo == 'Desarrollado') {
        for($i = 14; $i<= 24;$i++){
            if($classIntangible == $i){
                $resultado = true;
                break;
            }
        }
    }
}

function isAllYes($value)
{
	return (false !== strpos($value, "no") || false !== strpos($value,"si")); 
}

function newCodIntangible()
{
    $resultado = null;
    $model = new intangible();
    $result = $model -> newCodeIntangible();

    foreach ($result as $key) {
        $number =intval(substr( $key['cod_intangible'],4,7));
    }

    if($number < 100){
        $resultado = 'INT-0100';
    }else{

        if ($number < 999) {
            $number++;
            $resultado ='INT-0'.$number;
        } else {
            
            if ($number == 999) {
                $resultado ='INT-1000';
            }else{
                if ($number >=1000) {
                    $number++;
                    $resultado = 'INT-'.$number;
                }
            }
            
            
        }
        

    }

    return $resultado;
}










?>