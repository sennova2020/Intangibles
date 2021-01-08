<?php

class intangible
{
    public function create($dateFinish,$dateBudgetClosing,$typeIntangible,$classIntangible,$nameIntangible,$resourceControl,$observationResource,$potencial,$observationPotencial,$reliably,$identification,$observationReliably,$observationIdentification,$isMonetary,$physicalAppearance,$duration,$observationMonetary,$observationAppearance,$observationDuration,$buyActivity,$observationBuyActivity,$state,$project,$codeIntangible,$negativo)
    {
        $resultado = null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "INSERT INTO x_intangibles_preguntas (proyecto_consecutivo,pregunta1,pregunta2,pregunta3,pregunta4,pregunta5,pregunta6,pregunta7,pregunta8,pregunta9,pregunta10,pregunta11,pregunta12,pregunta13,pregunta14,pregunta15,pregunta16,pregunta17,pregunta18,pregunta19,cod_intangible,fecha_cierre,estado,fecha_vigencia,negativo) VALUES (:project,:typeIntangible,:classIntangible,:nameIntangible,:resourceControl,:observationResource,:potencial,:observationPotencial,:reliably,:observationReliably,:identification,:observationIdentification,:isMonetary,:observationMonetary,:physicalAppearance,:observationAppearance,:duration,:observationDuration,:buyActivity,:observationBuyActivity,:codeIntangible,:dateFinish,:state,:dateBudgetClosing,:negativo)";

        $result = $conexion -> prepare($sql);
        $result -> bindParam(':project',$project);
        $result -> bindParam(':typeIntangible',$typeIntangible);
        $result -> bindParam(':classIntangible',$classIntangible);
        $result -> bindParam(':nameIntangible',$nameIntangible);
        $result -> bindParam(':resourceControl',$resourceControl);
        $result -> bindParam(':observationResource',$observationResource);
        $result -> bindParam(':potencial',$potencial);
        $result -> bindParam(':observationPotencial',$observationPotencial);
        $result -> bindParam(':reliably',$reliably);
        $result -> bindParam(':observationReliably',$observationReliably);
        $result -> bindParam(':identification',$identification);
        $result -> bindParam(':observationIdentification',$observationIdentification);
        $result -> bindParam(':isMonetary',$isMonetary);
        $result -> bindParam(':observationMonetary',$observationMonetary);
        $result -> bindParam(':physicalAppearance',$physicalAppearance);
        $result -> bindParam(':observationAppearance',$observationAppearance);
        $result -> bindParam(':duration',$duration);
        $result -> bindParam(':observationDuration',$observationDuration);
        $result -> bindParam(':buyActivity',$buyActivity);
        $result -> bindParam(':observationBuyActivity',$observationBuyActivity);
        $result -> bindParam(':dateFinish',$dateFinish);
        $result -> bindParam(':dateBudgetClosing',$dateBudgetClosing);
        $result -> bindParam(':state',$state);
        $result -> bindParam(':codeIntangible',$codeIntangible);
        $result -> bindParam(':negativo',$negativo);
        if (!$result) {
            $resultado = 'Invalid';
        } else {
            $result -> execute();
            $resultado = $codeIntangible ;
        }
        
        return $resultado;
    }

    public function newCodeIntangible()
    {
       

       $model = new Conexion();
       $conexion = $model -> conectarse();

       $sql = 'SELECT cod_intangible FROM x_intangibles_preguntas ORDER BY cod_intangible DESC LIMIT 1';

       $result = $conexion -> prepare($sql);
       $result -> execute();
       
       while($f=$result->fetch())
       {
           $resultado [] = $f;
       }

       return $resultado;
        

    }
    
    public function countUnfinished($project)
    {
        $negativo = 1;
        $estado = 1;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT id FROM x_intangibles_preguntas WHERE proyecto_consecutivo=:project AND estado=:estado AND negativo=:negativo AND pregunta20 IS NULL";

        $result = $conexion -> prepare($sql);

        $result -> bindParam(':project',$project);
        $result -> bindParam(':estado',$estado);
        $result -> bindParam(':negativo',$negativo);

        $result -> execute();

        return $result -> rowCount();
    }

    public function countNotSave($project)
    {
        $estado = 0;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT id FROM x_intangibles_preguntas WHERE proyecto_consecutivo=:project AND estado=:estado AND pregunta20 IS NULL";

        $result = $conexion -> prepare($sql);

        $result -> bindParam(':project',$project);
        $result -> bindParam(':estado',$estado);

        $result -> execute();

        return $result -> rowCount();
    }

    public function readUnfinished($project)
    {
        $negativo = 1;
        $estado = 1;
        $resultado = null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT cod_intangible,pregunta3,pregunta2,pregunta1 FROM x_intangibles_preguntas WHERE proyecto_consecutivo=:project AND estado=:estado AND negativo=:negativo AND pregunta20 IS NULL";

        $result = $conexion -> prepare($sql);

        $result -> bindParam(':project',$project);
        $result -> bindParam(':estado',$estado);
        $result -> bindParam(':negativo',$negativo);

        if ($result) {
            $result->execute();

            while ($f=$result->fetch()) {
                $resultado [] = $f;
            }
        }else{
            $resultado = false;
        }

        return $resultado;
    }

    public function readNotSave($project)
    {
        $estado = 0;
        $resultado = null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT cod_intangible,pregunta3,pregunta2,pregunta1 FROM x_intangibles_preguntas WHERE proyecto_consecutivo=:project AND estado=:estado AND pregunta20 IS NULL";

        $result = $conexion -> prepare($sql);

        $result -> bindParam(':project',$project);
        $result -> bindParam(':estado',$estado);

        if ($result) {
            $result->execute();

            while ($f=$result->fetch()) {
                $resultado [] = $f;
            }
        }else{
            $resultado = false;
        }

        return $resultado;
    }

    public function readInformationIn($codeIntangible)
    {
        $estado = 0;
        $resultado = null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT * FROM x_intangibles_preguntas WHERE cod_intangible=:codeIntangible ";

        $result = $conexion -> prepare($sql);

        $result -> bindParam(':codeIntangible',$codeIntangible);

        if ($result) {
            $result->execute();

            while ($f=$result->fetch()) {
                $resultado [] = $f;
            }
        }else{
            $resultado = false;
        }

        return $resultado;
    }

    public function update($dateFinish,$dateBudgetClosing,$typeIntangible,$classIntangible,$nameIntangible,$resourceControl,$observationResource,$potencial,$observationPotencial,$reliably,$identification,$observationReliably,$observationIdentification,$isMonetary,$physicalAppearance,$duration,$observationMonetary,$observationAppearance,$observationDuration,$buyActivity,$observationBuyActivity,$state,$codeIntangible,$negativo)
    {
        $resultado = null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "UPDATE x_intangibles_preguntas SET pregunta1=:typeIntangible,pregunta2=:classIntangible,pregunta3=:nameIntangible,pregunta4=:resourceControl,pregunta5=:observationResource,pregunta6=:potencial,pregunta7=:observationPotencial,pregunta8=:reliably,pregunta9=:observationReliably,pregunta10=:identification,pregunta11=:observationIdentification,pregunta12=:isMonetary,pregunta13=:observationMonetary,pregunta14=:physicalAppearance,pregunta15=:observationAppearance,pregunta16=:duration,pregunta17=:observationDuration,pregunta18=:buyActivity,pregunta19=:observationBuyActivity,fecha_cierre=:dateFinish,estado=:state,fecha_vigencia=:dateBudgetClosing,negativo=:negativo WHERE cod_intangible=:codeIntangible";

        $result = $conexion -> prepare($sql);
        $result -> bindParam(':typeIntangible',$typeIntangible);
        $result -> bindParam(':classIntangible',$classIntangible);
        $result -> bindParam(':nameIntangible',$nameIntangible);
        $result -> bindParam(':resourceControl',$resourceControl);
        $result -> bindParam(':observationResource',$observationResource);
        $result -> bindParam(':potencial',$potencial);
        $result -> bindParam(':observationPotencial',$observationPotencial);
        $result -> bindParam(':reliably',$reliably);
        $result -> bindParam(':observationReliably',$observationReliably);
        $result -> bindParam(':identification',$identification);
        $result -> bindParam(':observationIdentification',$observationIdentification);
        $result -> bindParam(':isMonetary',$isMonetary);
        $result -> bindParam(':observationMonetary',$observationMonetary);
        $result -> bindParam(':physicalAppearance',$physicalAppearance);
        $result -> bindParam(':observationAppearance',$observationAppearance);
        $result -> bindParam(':duration',$duration);
        $result -> bindParam(':observationDuration',$observationDuration);
        $result -> bindParam(':buyActivity',$buyActivity);
        $result -> bindParam(':observationBuyActivity',$observationBuyActivity);
        $result -> bindParam(':dateFinish',$dateFinish);
        $result -> bindParam(':dateBudgetClosing',$dateBudgetClosing);
        $result -> bindParam(':state',$state);
        $result -> bindParam(':codeIntangible',$codeIntangible);
        $result -> bindParam(':negativo',$negativo);
        if (!$result) {
            $resultado = 'Invalid';
        } else {
            $result -> execute();
            $resultado = true;
        }
        
        return $resultado;
    }

    public function readIntangibleFormato($codeIntangible)
    {
        $resultado= null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql ="SELECT pregunta1,pregunta3 FROM x_intangibles_preguntas WHERE cod_intangible=:codeIntangible";

        $result = $conexion ->prepare($sql);

        $result -> bindParam(':codeIntangible',$codeIntangible);

        $result -> execute();

        while ($f = $result->fetch()){
            $resultado [] = $f;
        }

        return $resultado;
    }

    public function readFinished($project)
    {
        $negativo = 1;
        $estado = 1;
        $resultado = null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT cod_intangible,pregunta3,pregunta2,pregunta1 FROM x_intangibles_preguntas WHERE proyecto_consecutivo=:project AND estado=:estado AND negativo IS NOT NULL";
        
        $result = $conexion -> prepare($sql);

        $result -> bindParam(':project',$project);
        $result -> bindParam(':estado',$estado);

        if ($result) {
            $result->execute();

            while ($f=$result->fetch()) {
                $resultado [] = $f;
            }
        }else{
            $resultado = false;
        }

        return $resultado;
    }

    public function readFinishedDetails($codeIntangible)
    {
        $negativo = 1;
        $estado = 1;
        $resultado = null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT * FROM x_intangibles_preguntas WHERE cod_intangible=:codeIntangible AND estado=:estado AND negativo IS NOT NULL";
        
        $result = $conexion -> prepare($sql);

        $result -> bindParam(':codeIntangible',$codeIntangible);
        $result -> bindParam(':estado',$estado);

        if ($result) {
            $result->execute();

            while ($f=$result->fetch()) {
                $resultado [] = $f;
            }
        }else{
            $resultado = false;
        }

        return $resultado;
    }

    public function deleteIncompleteIntangible()
    {
        $estado = 1;
        $negativo = 1;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql="DELETE FROM x_intangibles_preguntas WHERE estado=:estado AND negativo=:negativo AND pregunta20 IS NULL ";

        $result = $conexion -> prepare($sql);
        $result -> bindParam(':estado',$estado);
        $result -> bindParam(':negativo',$negativo);
        $result -> execute();
    }

    public function deleteUnsaveIntangible()
    {
        $estado = 0;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql="DELETE FROM x_intangibles_preguntas WHERE estado=:estado ";

        $result = $conexion -> prepare($sql);
        $result -> bindParam(':estado',$estado);
        $result -> execute();
    }
    
    public function readProjectWithoutIntagibles ($project)
    {
        $num = 1;
        $resultado = null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT sin_intangible FROM x_intangibles_preguntas WHERE proyecto_consecutivo =:project AND sin_intangible=:num";
        
        $result = $conexion -> prepare($sql);

        $result -> bindParam(':project',$project);
        $result -> bindParam(':num',$num);

        if ($result) {
            $result->execute();

            while ($f=$result->fetch()) {
                $resultado [] = $f;
            }
        }else{
            $resultado = false;
        }

        return $resultado;
    }

    public function readAll($project){
        $resultado = null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT * FROM x_intangibles_preguntas WHERE proyecto_consecutivo =:project AND sin_intangible IS NULL";
        
        $result = $conexion -> prepare($sql);

        $result -> bindParam(':project',$project);

        if ($result) {
            $result->execute();

            while ($f=$result->fetch()) {
                $resultado [] = $f;
            }
        }else{
            $resultado = false;
        }

        return $resultado;
    }

    public function createSinIntagible($project,$justificacion,$sinJ,$estado,$negativo)
    {
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "INSERT INTO x_intangibles_preguntas (proyecto_consecutivo,fecha,estado,negativo,sin_intangible,justificacion) VALUES (:project,now(),:estado,:negativo,:sinJ,:justificacion)";
        
        $result = $conexion -> prepare($sql);

        $result -> bindParam(':project',$project);
        $result -> bindParam(':justificacion',$justificacion);
        $result -> bindParam(':sinJ',$sinJ);
        
        $result -> bindParam(':estado',$estado);
        $result -> bindParam(':negativo',$negativo);

        $result->execute();

    }

   
}


?>