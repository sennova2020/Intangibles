<?php

    class listCheck
    {
        public function createCheckRemanente($rule,$observationRule,$condition,$observationCondition,$settingLife,$cod)
        {
            $modelo =  new Conexion();
            $conexion = $modelo->conectarse();

            $sql = "UPDATE x_intangibles_preguntas SET pregunta27=:rule,pregunta28=:observationRule,pregunta29=:condition,pregunta30=:observationCondition,pregunta31=:settingLife WHERE 	cod_intangible=:cod";

            $result = $conexion->prepare($sql);

            $result -> bindParam(':rule',$rule);
            $result -> bindParam(':observationRule',$observationRule);
            $result -> bindParam(':condition',$condition);
            $result -> bindParam(':observationCondition',$observationCondition);
            $result -> bindParam(':settingLife',$settingLife);
            $result -> bindParam(':cod',$cod);

            if (!$result) {
                $info = false;
            } else {
                $result-> execute();
                $info = true;
            }

            return $info;
        }

        public function createCheckReValResidual($residual,$observationResidual,$cod)
        {
            $modelo =  new Conexion();
            $conexion = $modelo->conectarse();

            $sql = "UPDATE x_intangibles_preguntas SET pregunta32=:residual,pregunta33=:observationResidual WHERE 	cod_intangible=:cod";

            $result = $conexion->prepare($sql);

            $result -> bindParam(':residual',$residual);
            $result -> bindParam(':observationResidual',$observationResidual);
            $result -> bindParam(':cod',$cod);

            if (!$result) {
                $info = false;
            } else {
                $result-> execute();
                $info = true;
            }

            return $info;
        }

        public function createRevMetdAmortizacion($different,$observationDifferent,$datoAmortizacion,$document,$cod)
        {
            $modelo =  new Conexion();
            $conexion = $modelo->conectarse();

            $sql = "UPDATE x_intangibles_preguntas SET pregunta34=:different,pregunta35=:observationDifferent,pregunta36=:datoAmortizacion,pregunta37=:document WHERE 	cod_intangible=:cod";

            $result = $conexion->prepare($sql);

            $result -> bindParam(':different',$different);
            $result -> bindParam(':observationDifferent',$observationDifferent);
            $result -> bindParam(':datoAmortizacion',$datoAmortizacion);
            $result -> bindParam(':document',$document);
            $result -> bindParam(':cod',$cod);

            if (!$result) {
                $info = false;
            } else {
                $result-> execute();
                $info = true;
            }

            return $info;
        }

        public function createRevIndDeterioro($changes,$observationChanges,$reduction,$observationReduction,$nameIntangible,$value,$reposicion,$reposicionIntangible,$evidencia,$rehabilitaciones,$evaluation,$observationEvaluation,$construction,$observationConstruction,$information,$observationInformation,$cod)
        {
            $finish = 1;
            $modelo =  new Conexion();
            $conexion = $modelo->conectarse();

            $sql = "UPDATE x_intangibles_preguntas SET pregunta38=:changess,pregunta39=:observationChanges,pregunta40=:reduction,pregunta41=:observationReduction,pregunta42=:nameIntangible,pregunta43=:value,pregunta44=:reposicion,pregunta45=:reposicionIntangible,pregunta46=:evidencia,pregunta47=:rehabilitaciones,pregunta48=:evaluation,pregunta49=:observationEvaluation,pregunta50=:construction,pregunta51=:observationConstruction,pregunta52=:information,pregunta53=:observationInformation,finished=:finish WHERE cod_intangible=:cod";

            $result = $conexion->prepare($sql);

            $result -> bindParam(':changess',$changes);
            $result -> bindParam(':observationChanges',$observationChanges);
            $result -> bindParam(':reduction',$reduction);
            $result -> bindParam(':observationReduction',$observationReduction);
            $result -> bindParam(':nameIntangible',$nameIntangible);
            $result -> bindParam(':value',$value);
            $result -> bindParam(':reposicion',$reposicion);
            $result -> bindParam(':reposicionIntangible',$reposicionIntangible);
            $result -> bindParam(':evidencia',$evidencia);
            $result -> bindParam(':rehabilitaciones',$rehabilitaciones);
            $result -> bindParam(':evaluation',$evaluation);
            $result -> bindParam(':observationEvaluation',$observationEvaluation);
            $result -> bindParam(':construction',$construction);
            $result -> bindParam(':observationConstruction',$observationConstruction);
            $result -> bindParam(':information',$information);
            $result -> bindParam(':observationInformation',$observationInformation);
            $result -> bindParam(':finish',$finish);
            $result -> bindParam(':cod',$cod);

            if (!$result) {
                $info = false;
            } else {
                $result-> execute();
                $info = true;
            }

            return $info;
        }

        public function checkRemanente($codIntangible)
        {
            $modelo =  new Conexion();
            $conexion = $modelo->conectarse();

            $sql = "SELECT * FROM x_intangibles_preguntas WHERE pregunta27 IS NULL AND cod_intangible=:cod";

            $result = $conexion->prepare($sql);

            $result -> bindParam(':cod',$codIntangible);

            $result-> execute();
             

            return $result->rowCount();
        }

        public function checkResidual($codIntangible)
        {
            $modelo =  new Conexion();
            $conexion = $modelo->conectarse();

            $sql = "SELECT * FROM x_intangibles_preguntas WHERE pregunta32 IS NULL AND cod_intangible=:cod";

            $result = $conexion->prepare($sql);

            $result -> bindParam(':cod',$codIntangible);

            $result-> execute();
             

            return $result->rowCount();
        }

        public function checkDeterioro($codIntangible)
        {
            $modelo =  new Conexion();
            $conexion = $modelo->conectarse();

            $sql = "SELECT * FROM x_intangibles_preguntas WHERE pregunta34 IS NULL AND cod_intangible=:cod";

            $result = $conexion->prepare($sql);

            $result -> bindParam(':cod',$codIntangible);

            $result-> execute();
             

            return $result->rowCount();
        }

        public function checkAmortizacion($codIntangible)
        {
           $modelo =  new Conexion();
            $conexion = $modelo->conectarse();

            $sql = "SELECT * FROM x_intangibles_preguntas WHERE pregunta38 IS NULL AND cod_intangible=:cod";

            $result = $conexion->prepare($sql);

            $result -> bindParam(':cod',$codIntangible);

            $result-> execute();
             

            return $result->rowCount(); 
        }


        public function queryLifeIntangible($codIntangible){
            $resultado=null;
            $modelo =  new Conexion();
            $conexion = $modelo->conectarse();

            $sql = "SELECT pregunta20 FROM x_intangibles_preguntas WHERE cod_intangible=:cod";

            $result = $conexion->prepare($sql);

            $result -> bindParam(':cod',$codIntangible);

            $result-> execute();
            while($f=$result->fetch()){
              $resultado []=$f;

            }
            return $resultado;
        }

    }

?>