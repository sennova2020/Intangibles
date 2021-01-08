<?php

class consecutiveProject
{
    public function readTitle($project)
    {
        $resultado = null;

        $model = new Conexion();
        $conexion = $model -> conectarse();


        $sql = "SELECT * FROM x_informacion_proyecto WHERE proyecto_consecutivo=:project";

        $result = $conexion -> prepare($sql);
        $result -> bindParam(':project',$project);

        $result->execute();

        while ($f = $result->fetch()) {
            $resultado []= $f;
        }

        return $resultado ;
    }

    
}

?>