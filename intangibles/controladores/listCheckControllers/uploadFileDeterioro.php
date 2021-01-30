<?php
error_reporting(0);
require_once '../seguridad/liderSecurity.php';
require_once '../verificaciones/fechaLimite.php';
require_once '../../modelo/fechaLimite.php';
//require_once '../verificaciones/uploadFile.php';
require_once '../../library/class.upload.php';
liderRol(2);
$document = $_FILES['nameIntangible'];
$ruta = 'documentos/upload/DocumentDeterioro/';
$cod = $_POST['cod_intangible'];

if(isset($_FILES['nameIntangible'])){


    //cargar el archivo en la pagina web

    $up = new Upload($_FILES['nameIntangible']);

        //verificar que el archivo si se halla cargado en la pagina web
    if($up->uploaded){

        mkdir($ruta.$cod.'/', 0700);

            //guardar el archivo en una carpeta predeterminada
        $up->Process('../../'.$ruta.$cod.'/');
        
            //di fue procesada con exito la reubicación iniciar la lectura del excel
        
    }else{
        echo ('Debe seleccionar el archivo a importar'); 
    } 
}else{
echo ('Debe seleccionar el archivo a importar'); 
}

    echo '
        <script>location.href="../../vista/listaCheck/fin.php?id='.$cod.'"</script>
    ';



?>