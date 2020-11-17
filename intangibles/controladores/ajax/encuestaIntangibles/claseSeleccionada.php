<?php

require_once '../../../modelo/conexion/conexion.php';
require_once '../../../modelo/claseIntangibleModelo.php';

function claseIntangible()
{
    $result = null;
    $code=trim($_POST['codClass']);
    $typeIntangible=trim($_POST['typeIntangible']);
    
        
        $model = new claseIntangible();
        $consulta = $model -> readTypeIntangible($typeIntangible);

        foreach ($consulta as $key) {
            if ($key['cod_clase']==$code) {
                $result .= '
                    <option value="'.$key['cod_clase'].'" selected>'.$key['denominacion'].'</option>
                ';
            }else{
                $result .= '
                    <option value="'.$key['cod_clase'].'">'.$key['denominacion'].'</option>
                ';
            }
            
        }

    
    return utf8_encode($result);
}

echo claseIntangible();

?>