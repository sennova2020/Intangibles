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

        public function createRevIndDeterioro()
        {
            
        }
    }

?>