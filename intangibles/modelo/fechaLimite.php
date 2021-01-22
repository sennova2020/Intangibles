<?php

class fechaLimite
{
    public function create($fecha,$motivo,$user,$create)
    {
        $resultado= null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql ="INSERT INTO fechalimite (fechaLimite,motivo,usuario,created_at) VALUES (:fecha,:motivo,:user,now())";

        $result = $conexion ->prepare($sql);

        $result -> bindParam(':fecha',$fecha);
        $result -> bindParam(':motivo',$motivo);
        $result -> bindParam(':user',$user);
        
        
        if (!$result) {
            $resultado = 'Invalid';
        } else {
            $result -> execute();
            $resultado = true;
        }
        
        return $resultado;
    }

    public function read()
    {
        $resultado = null;
        $model = new Conexion();
        $conexion = $model -> conectarse();
        $sql ="SELECT * FROM fechalimite ORDER BY id DESC LIMIT 1";

        $result = $conexion ->prepare($sql);
        $result -> execute();

        while ($f=$result->fetch()) {
            $resultado [] =$f;
        }
        return $resultado;
    }
}

?>