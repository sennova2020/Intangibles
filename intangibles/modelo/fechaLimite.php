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
}

?>