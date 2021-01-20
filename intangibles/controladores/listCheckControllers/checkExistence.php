<?php

    function registerExistsRemanente($codIntangible)
    {
        $resultado = null;
        $modelo = new listCheck();
        $result = $modelo->checkRemanente($codIntangible);

        if ($result > 0) {
            $resultado = false;
        } else {
            $resultado = true;
        }
        

        return $resultado;
    }

    function registerExistsDeterioro($codIntangible)
    {
        $resultado = null;
        $modelo = new listCheck();
        $result = $modelo->checkDeterioro($codIntangible);

        if ($result > 0) {
            $resultado = false;
        } else {
            $resultado = true;
        }
        

        return $resultado;
    }   

    function registerExistsResidual($codIntangible)
    {
        $resultado = null;
        $modelo = new listCheck();
        $result = $modelo->checkResidual($codIntangible);

        if ($result > 0) {
            $resultado = false;
        } else {
            $resultado = true;
        }
        

        return $resultado;
    }

    function registerExistsAmortizacion($codIntangible)
    {
        $resultado = null;
        $modelo = new listCheck();
        $result = $modelo->checkAmortizacion($codIntangible);

        if ($result > 0) {
            $resultado = false;
        } else {
            $resultado = true;
        }
        

        return $resultado;
    }

?>