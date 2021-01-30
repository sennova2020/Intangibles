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

function deleteIntangibleLimitDate($number)
{
    $salir = '';
    for($i = 0; $i<$number;$i++){
        $salir.='../';
    }
    if(enabledOperations() === false)
    {
        $model = new intangible();
        $documentDelete = $model-> readDeleteIncompleteIntangible();
        
        if(isset($documentDelete))
        {
            
            foreach ($documentDelete as $key) {
                if (file_exists($salir.$key['pregunta37'])) {
                    //Borrar los documentos de los intagibles sin terminar su registro,  guardados en el servidor
                    deleteDirectory($salir.$key['pregunta37']);
                }
            }
            
        }
        
        $deleteOne = $model -> deleteIncompleteIntangible();
        $deleteTwo = $model -> deleteUnsaveIntangible();
    }
}

//Funcion para borrar archivos y carpetas 
function deleteDirectory($dir) {
    $files = glob($dir.'/'); //obtenemos todos los nombres de los ficheros
    foreach($files as $file){
        if(is_file($file))
        unlink($file); //elimino el fichero
    }
    rmdir($dir);
}

?>