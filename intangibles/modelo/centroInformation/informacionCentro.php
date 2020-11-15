<?php

class centerInformation
{
    public function readProject($centerId)
    {
        $resultado = null;

        $model =  new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT proyecto_consecutivo FROM x_informacion_centro WHERE centro_id=:centerId";

        $result = $conexion->prepare($sql);
        $result -> bindParam(':centerId',$centerId);

        $result -> execute();

        while ($f = $result->fetch()) {
            $resultado []= $f;
        }

        return $resultado ;
    }
}

?>