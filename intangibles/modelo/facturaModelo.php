<?php

class factura
{
    public function readCodeIntangible($codeIntangible)
    {
        $resultado = null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT * FROM intangible_pregunta_factura WHERE cod_intangible=:codeIntangible";

        $result = $conexion -> prepare($sql);

        $result -> bindParam(':codeIntangible',$codeIntangible);

        $result -> execute();

        while ($f=$result->fetch())
        {
            $resultado [] = $f;
        }

        return $resultado;
    }
}

?>