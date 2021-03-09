<?php

function iploadFile($document,$ruta,$cod)
{
    

    if(isset($document)){


            //cargar el archivo en la pagina web

        $up = new Upload($document);

            //verificar que el archivo si se halla cargado en la pagina web
        if($up->uploaded){

            mkdir($ruta.'/'.$cod, 0700);

                //guardar el archivo en una carpeta predeterminada
            $up->Process($ruta.$cod.'/');
            return true;
                //di fue procesada con exito la reubicación iniciar la lectura del excel
            
        }else{
           // modalAlert('Debe seleccionar el archivo a importar',$url,'info',3); 
        } 
    }else{
       // modalAlert('Debe seleccionar el archivo a importar',$url,'info',3); 
    }

    

}

?>