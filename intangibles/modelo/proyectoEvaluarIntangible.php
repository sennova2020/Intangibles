<?php

class proyectoEvaluarIntangible
{
    public function readCenter($center)
    {
        $resultado= null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql ="SELECT proyecto_consecutivo,proyecto_titulo FROM proyecto_evaluar_intangible WHERE codigo_centro=:center";

        $result = $conexion ->prepare($sql);

        $result -> bindParam(':center',$center);

        $result -> execute();

        while ($f = $result->fetch()){
            $resultado [] = $f;
        }

        return $resultado;
    }

    public function readNameCenter($center)
    {
        $resultado= null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql ="SELECT centro_nombre FROM proyecto_evaluar_intangible WHERE codigo_centro=:center LIMIT 1";

        $result = $conexion ->prepare($sql);

        $result -> bindParam(':center',$center);

        $result -> execute();

        while ($f = $result->fetch()){
            $resultado [] = $f;
        }

        return $resultado;
    }

    public function readProjectCenter($project)
    {
        $resultado= null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql ="SELECT codigo_centro,proyecto_consecutivo,centro_nombre,proyecto_titulo FROM proyecto_evaluar_intangible WHERE proyecto_consecutivo=:project ";

        $result = $conexion ->prepare($sql);

        $result -> bindParam(':project',$project);

        $result -> execute();

        while ($f = $result->fetch()){
            $resultado [] = $f;
        }

        return $resultado;
    }

    
    public function readAll($project)
    {
        $resultado= null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql ="SELECT * FROM proyecto_evaluar_intangible WHERE proyecto_consecutivo=:project ";

        $result = $conexion ->prepare($sql);

        $result -> bindParam(':project',$project);

        $result -> execute();

        while ($f = $result->fetch()){
            $resultado [] = $f;
        }

        return $resultado;
    }

    public function readAllAdmin()
    {
        $projects=null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT * FROM proyecto_evaluar_intangible";
        
        $result = $conexion -> prepare($sql);

        $result->execute();
        while($f=$result->fetch()){
            $projects[]=$f;
        }
        return $projects;
    }
}


?>