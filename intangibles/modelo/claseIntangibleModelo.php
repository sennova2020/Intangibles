<?php

class claseIntangible
{
    public function readTypeIntangible($typeIntangible)
    {
        $info = null;

        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT cod_clase, denominacion FROM clase_intangible WHERE tipo_intangible=:typeIntangible";

        $result = $conexion->prepare($sql);
        $result -> bindParam(':typeIntangible',$typeIntangible);

        if (!$result) {
            $info = false;
        } else {
            $result-> execute();

            while($f=$result->fetch()){
                $info [] = $f;
            }
        }
        
        return $info;
    }

    public function readDenomination($cod)
    {
        $info = null;

        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT denominacion FROM clase_intangible WHERE cod_clase=:cod";

        $result = $conexion->prepare($sql);
        $result -> bindParam(':cod',$cod);

        if (!$result) {
            $info = false;
        } else {
            $result-> execute();

            while($f=$result->fetch()){
                $info [] = $f;
            }
        }
        
        return $info;
    }

    public function readAllCode($cod)
    {
        $info = null;

        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT * FROM clase_intangible WHERE cod_clase=:cod";

        $result = $conexion->prepare($sql);
        $result -> bindParam(':cod',$cod);

        if (!$result) {
            $info = false;
        } else {
            $result-> execute();

            while($f=$result->fetch()){
                $info [] = $f;
            }
        }
        
        return $info;
    }
    
}


?>