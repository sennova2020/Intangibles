<?php
    require_once '../seguridad/adminSecurity.php';
    require_once '../../modelo/conexion/conexion.php';
    require_once '../../modelo/proyectoEvaluarIntangible.php';
    adminRol(2);
    function readProjectsAdmin(){
        $resultado = null;
        $modelo = new proyectoEvaluarIntangible();
        $projects = $modelo->readAllAdmin();
        foreach($projects as $item){
            $resultado.=
                '<tr>
                    <td>'.$item['proyecto_consecutivo'].'</td>
                    <td>'.$item['proyecto_titulo'].'</td>
                    <td>'.$item['centro_nombre'].'</td>
                    <td>
                        <a href="#" class="col-12 text-center" style="margin-top:15px">
                            <button type="submit" class="btn btn-primary">Detalle</button>
                        </a>
                    </td>
                    <td>
                        <a href="../../controladores/adminControllers/reportes.php?rep=2&proj='.$item['proyecto_consecutivo'].'" class="col-12 text-center" style="margin-top:15px">
                            <button type="submit" class="btn btn-primary">Descargar</button>
                        </a>
                    </td>
                    
                </tr>';
        }
        return $resultado;
    }
    echo readProjectsAdmin();
?>