<?php

function getLimitDate()
{
    return $limitDate= '2020/12/17';
}

 function enabledOperations()
 {
    $result= false;
    date_default_timezone_set("America/Bogota");
    $limitDate= getLimitDate();
    $nowDate =  date("Y/m/d");
    
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