<?php

function getLimitDate()
{
    $model = new fechaLimite();
    $fechas = $model->read();
    $fechaLimte = null;

    if (isset($fechas)) {
        foreach($fechas as $fecha){
            $fechaLimte = $fecha['fechaLimite'] ;
        }
        return $fechaLimte;
    }
    
}

function enabledOperations()
{
    $result= false;
    date_default_timezone_set("America/Bogota");
    $limitDate= getLimitDate();
    $nowDate =  date("Y-m-d");

    if ($nowDate <= $limitDate) {
        $result = true;
    
    }

    return $result;

}

 function deleteIntangibleLimitDate()
 {
     if(enabledOperations() === false)
     {
         $model = new intangible();
         $deleteOne = $model -> deleteIncompleteIntangible();
         $deleteTwo = $model -> deleteUnsaveIntangible();
     }
 }

?>