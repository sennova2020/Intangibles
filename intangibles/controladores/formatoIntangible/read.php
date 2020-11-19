<?php

    function readParameterFormato($codIntangible){

        $resultado = null;
        $model = new intangible();
        $results = $model -> readIntangibleFormato($codIntangible);
        $modelTwo = new proyectoEvaluarIntangible();
        $resulstTwo = $modelTwo -> readNameCenter($_SESSION['centro']);

        foreach($results as $result)
        {
            $resultado .= '
                <div class="titulo">'.utf8_encode($result['pregunta3']).'</div>
                <div class="formulario1 formulario_c" style="color:white">
                    <h2 class="titulo_formulario">Por definir</h2>
                    <p><strong>Centro: </strong>
            ';
            foreach ($resulstTwo as $resultTwo)
            {
                $resultado .= '
                    
                            '.utf8_encode($resultTwo['centro_nombre']).'
                
                ';
            }

            $resultado .= '
                    </p>
                    <br />
                    <p><strong>Intangible: </strong>
                        '.utf8_encode($result['pregunta3']).'
                    </p>
                    <br />
                    <p><strong>Tipo Intangible: </strong>
                        '.utf8_encode($result['pregunta1']).'
                    </p>
                </div>
            ';
            
        }

        return $resultado;
    }

    function linkSharepoint($project){
        
        $resultado = null;

        $model = new proyectoEvaluarIntangible();
        $projects = $model -> readAll($project);

        if(isset($projects))
        {
            foreach($projects as $key)
            {
                $resultado .= '

                    <a class="btn btn-md btn-warning" href="'.$key['link_sharepoint'].'"
                    target="_blank">Ingrese Evidencias Aquí</a>

                ';
            }
        }else{
           $resultado .= '
           
            <a class="btn btn-md btn-warning" href="#"
                target="_blank">Ingrese Evidencias Aquí</a>
           
           '; 
        }
 
        return $resultado;
    }

?>