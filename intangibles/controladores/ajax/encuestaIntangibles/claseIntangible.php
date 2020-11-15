<?php

require_once '../../../modelo/conexion/conexion.php';
require_once '../../../modelo/claseIntangibleModelo.php';

function claseIntangible()
{
    $result = null;
    $typeIntangible=trim($_POST['typeIntangible']);

    if ($typeIntangible === 'Desarrollado' || $typeIntangible == 'Adquirido') {
        
        $model = new claseIntangible();
        $consulta = $model -> readTypeIntangible($typeIntangible);

        $result = '<option selected value="">Seleccione...</option>';
        foreach ($consulta as $key) {
            $result .= '
                <option value="'.$key['cod_clase'].'">'.$key['denominacion'].'</option>
            ';
        }

    } else {
       $result = '
            <script>alert("El valor seleccionado no existe.")</script>
       '; 
    }
    
    return $result;
}

echo claseIntangible();

?>