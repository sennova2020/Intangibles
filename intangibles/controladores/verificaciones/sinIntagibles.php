<?php

 function projectWithoutIntagibles ($project)
 {
    $resultado = null;
    $model = new intangible();
    $results = $model -> readProjectWithoutIntagibles ($project);
    //Si determina que un proyecto no tiene intangibles el valor sera verdadeo
    if(isset($results))
    {
        $resultado = false;
    }else{
        $resultado = true;
    }
    
    return $resultado;

 }

 function sinIntangiblesTerminados($project){
    $resultado = null;
    $model = new intangible();
    $results = $model -> readAll ($project);
    //Si determina que un proyecto no tiene intangibles el valor sera verdadeo
    if(isset($results))
    {
        $resultado = false;
    }else{
        $resultado = true;
    }
    
    return $resultado;
 }

?>