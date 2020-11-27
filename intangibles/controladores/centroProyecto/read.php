<?php

   

    function readProject()
    {
        $resultado = null;

        

        

        $modelProject = new proyectoEvaluarIntangible();
        $consecutive = $modelProject -> readCenter($_SESSION['centro']);

        if (isset($consecutive)) {
            
            $contador = 0;
            

            foreach ($consecutive as $projects) {
                if ($contador == 0) {
                    
                }
                
                    $resultado .= '
                                    <tr>
                                        <td style="padding:10px 10px;border:1px solid rgb(200,200,200);">' . $projects['proyecto_consecutivo'] . '</td>                     
                                        <td align="center">' . $projects['proyecto_titulo']. '</td>
                                        <td class="text-center"><a href="encuestaIntangible/encuestasTerminadas.php?project='.$projects['proyecto_consecutivo'].'">Detalle</a></td>
                                        <td class="text-center">';

                                        if(enabledOperations() === true && projectWithoutIntagibles ( $projects['proyecto_consecutivo']) === true)
                                        {
                                            $resultado .= '
                                            
                                                <div class="btn-group dropleft m-auto">
                                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Aplicar
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="ml-2" href="encuestaIntangible/encuestaIntangible.php?project='.$projects['proyecto_consecutivo'].'"><span class="redirectSpan pt-3 pb-3 text-dark">Agregar <br> <span class="ml-2">intangible</span> </span></a>';
                                                        if(sinIntangiblesTerminados($projects['proyecto_consecutivo'])==true)
                                                        {
                                                            $resultado .= '

                                                                <br>
                                                                <hr>
                                                                <span class="ml-2" id="'.$projects['proyecto_consecutivo'].'" onclick="sinIntangibles(this)"><span class="redirectSpan pt-3 pb-3 text-dark">No tiene<br><span class="ml-2">intangibles</span> </span></span>
                                                                
                                                                ';
                                                        }
                                                        
                                                        $resultado .=  itemsDropdowns($projects['proyecto_consecutivo'])
                                                        .'
                                                    </div>
                                                </div>
                                            
                                            ';
                                        }

                                            
                                            
                                        $resultado .= '</td>
                                    </tr>';

                $contador++;

            }

            
        } else {
            $resultado = '<div class="alert alert-primary" role="alert">
                    No hay proyectos registrados.
                </div>';
        }
        

        return $resultado;
    }

    function itemsDropdowns($project)
    {
        $resultado = '';
        $model = new intangible();

        /* Determine the number of intangible surveys that have not been completed, but are saved, and with all positive responses */

        $countFinish = $model -> countUnfinished($project);
        $countSave = $model -> countNotSave($project);

        if ($countFinish > 0) {
            $resultado .= '
                <br>
                <hr>
                <span class="ml-2 redirectSpan pt-3 pb-3"  id="'.$project.'" onclick="sinTerminar(this)">Sin terminar ('.$countFinish.')</span>
            ';
        }
        
        if ($countSave > 0){
            $resultado .='
                <br>
                <hr>
                <span class="ml-2 redirectSpan pt-3 pb-3"  id="'.$project.'" onclick="sinGuardar(this)">Sin guardar ('.$countSave.')</span>
            ';
        }

        return $resultado;
    }
?>