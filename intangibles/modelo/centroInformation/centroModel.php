<?php

    class center
    {
        public function readCenterId($centerCode)
        {
            $resultado = null;
            $model = new Conexion();
            $conexion = $model -> conectarse();

            $sql = "SELECT centro_id FROM centro WHERE codigo_centro=:centerCode";

            $result = $conexion->prepare($sql);
            $result -> bindParam(':centerCode',$centerCode);

            $result -> execute();

            while ($f=$result->fetch()) {
                $resultado [] = $f;
            }
            
            return $resultado;
        }
    }






?>