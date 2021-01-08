<?php
function routesRol($rol){
    if($rol ==1){
        $ruta = "vista/admin/home.php";
    }else{ 
        if($rol == 2){
            $ruta = 'vista/intangibles.php';
        }


    }
    return $ruta;
};

?>