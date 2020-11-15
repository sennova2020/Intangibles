<?php

   

    function readProject()
    {
        $resultado = null;

        $modelCenterId = new center();
        $centerCode = $modelCenterId -> readCenterId($_SESSION['centro']);

        if (isset($centerCode)) {

            foreach ($centerCode as $key) {

                $modelCenterInformation = new centerInformation();
                $project = $modelCenterInformation -> readProject($key['centro_id']);

                if (isset($project)) {

                    foreach ($project as $k) {

                        $modelProject = new consecutiveProject();
                        $consecutive = $modelProject -> readTitle($k['proyecto_consecutivo']);

                        if (isset($consecutive)) {
                            
                            $contador = 0;
                            

                            foreach ($consecutive as $projects) {
                                if ($contador == 0) {
                                    
                                }
                                
                                $resultado .= '<tr>
                                            <td style="padding:10px 10px;border:1px solid rgb(200,200,200);">' . $projects['proyecto_consecutivo'] . '</td>                     
                                            <td align="center">' . $projects['proyecto_titulo']. '</td>
                                            <td class="text-center"><a href="#">Detalle</a></td>
                                            <td class="text-center">
                                                <div class="btn-group dropleft m-auto">
                                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Aplicar
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="ml-2" href="encuestaIntangible.php?project='.$projects['proyecto_consecutivo'].'">Agregar intangible</a>
                                                        <br>
                                                        <hr>
                                                        <a class="ml-2" href="#">Sin terminar</a>
                                                        <br>
                                                        <hr>
                                                        <a class="ml-2" href="#">Sin guardar</a>
                                                    </div>
                                                </div>
                                                
                                            </td>
                                    </tr>';

                                $contador++;

                            }

                            
                        } else {
                            $resultado = '<div class="alert alert-primary" role="alert">
                                    No hay proyectos registrados.
                                </div>';
                        }
                        
                    }

                } else {

                    $resultado = '<div class="alert alert-primary" role="alert">
                                    No hay proyectos registrados.
                                </div>';
                                 
                }
                
            }
        } else {
            $resultado = '<div class="alert alert-primary" role="alert">
                                No hay proyectos registrados.
                            </div>';
        }
        

        return $resultado;
    }

?>