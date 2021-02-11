<?php
require_once '../../modelo/listCheck/listCheckModelo.php';
require_once '../../modelo/conexion/conexion.php';
 function lifeIntangible($cod){
    $lifeType=null;
    $modelo = new  listCheck();
    $resultado = $modelo->queryLifeIntangible($cod);
    if (isset($resultado)) {
        foreach($resultado as $key){
            $lifeType=$key['pregunta20'];
        }
    } else {
       $lifeType='unLife';
    }
    return $lifeType;
    
 }

 echo lifeIntangible($_POST['cod']);

?>