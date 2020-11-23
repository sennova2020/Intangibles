<?php
    session_start();
    
    require_once '../../../modelo/intangible/intangibleModelo.php';
    require_once '../../../modelo/conexion/conexion.php';
    function classCodeIntangibe(){
        $resultado = null;
        $codeIntangible = isset($_POST["codeIntangible"])?$_POST["codeIntangible"]:"";
       
        if ($codeIntangible != "") {
            $model = new intangible();
            $results = $model -> readIntangibleFormato($codeIntangible);

            if (isset($results)) {
                
                foreach($results as $result)
                {
                    if ($result['pregunta1'] == 'Adquirido') {
                        $resultado = '
                        
                            <option value="Adquirido" selected>Adquirido</option>

                        ';
                    } else {
                        $resultado = '
                            <option value="" selected>Selecione...</option>
                            <option value="Desarrollo">Desarrollo</option>
                            <option value="Investigación">Investigación</option>

                        ';
                    }
                    
                }

            } else {
               $resultado = 'Error2';
            }
            

        } else {
           $resultado = 'Error1';
        }

        return $resultado;
    }
    
     
    echo classCodeIntangibe();

?>