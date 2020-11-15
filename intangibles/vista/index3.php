<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="imagenes/icon_sena.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>CONSULTA DE PROYECTOS | Sennova</title>
    <link rel="stylesheet" href="css/index.css">

</head>

<body>
    <div id="header">
        <img src="images/banner_login.png" alt="" class="img_header">
    </div>

    <?php
    if (empty($_POST["documento"])) {
        echo '
        <div class="d-flex justify-content-around" style="height:50vh;">  
            <div class="container recuadro">
                <form action="index.php" method="POST" name="form1" target="_self">
                    <div class="form-group row align-self-center">
                        <div class="col-12 text-center" style="margin:15px">
                            <h4>CONSULTAR CALIFICACIÓN DE PROYECTOS</h4>
                        </div>
                        <label for="documento" class="col-12 col-md-3 text-md-right col-form-label">Documento:</label>
                        <div class="col-12 col-md-7">
                            <input type="text" class="form-control" name="documento" placeholder="No. de documento" pattern="[0-9]{7,}" title="Ingrese su número de documento">
                        </div>
                        <div class="col-12 text-center" style="margin-top:15px">
                            <button type="submit" class="btn btn-primary">Consultar</button>
                        </div>
                    </div>
                </form>
                <div id="header">
                    <img src="images/logo2.png" alt="" class="img_header2">
                </div>
            </div>
        </div>';
    } else {
        echo '
        <div class="container">

            <form action="index.php" method="POST" name="form1" target="_self">
                <div class="form-group row align-self-center">
                    <div class="col-12 text-center" style="margin:15px">
                        <h4>CONSULTAR CALIFICACIÓN DE PROYECTOS</h4>
                    </div>
                    <label for="documento" class="col-12 col-md-3 text-md-right col-form-label">Documento:</label>
                    <div class="col-12 col-md-7">
                        <input type="text" class="form-control" name="documento" placeholder="No. de documento" pattern="[0-9]{7,}" title="Ingrese su número de documento">
                    </div>
                    <div class="col-12 text-center" style="margin-top:15px">
                        <button type="submit" class="btn btn-primary">Nueva Consulta</button>
                    </div>
                </div>
            </form>';

        require_once('conexion.php');
        $conn = new Conexion();
        $link = $conn->conectarse();

        $query = "select 
        
        x_informacion_centro.proyecto_consecutivo, 
        consulta.consulta_titulo,
        consulta.consulta_evaluacion_final
        
        FROM 
        
        consulta INNER JOIN
        x_informacion_centro
        
        ON
        
        x_informacion_centro.proyecto_consecutivo = consulta.consulta_consecutivo
        
        WHERE 
        
        x_informacion_centro.proyecto_cc_autor like '%" . $_POST['documento'] . "%'";


        //$query = "select c.proyecto_nombre_autor, p.proyecto_titulo, c.proyecto_consecutivo, a.calificacion1, a.calificacion2 FROM x_informacion_proyecto p, x_informacion_centro c LEFT JOIN asignacion a ON c.proyecto_consecutivo = a.consecutivo WHERE c.proyecto_consecutivo = p.proyecto_consecutivo AND (c.proyecto_cc_autor LIKE '%" . $_POST['documento'] . "%')";

        $result = mysqli_query($link, $query);
        $datos_tabla = array(array());        

        $contador = 0;
        while ($row = mysqli_fetch_assoc($result)) {

            if($contador == 0){
                echo '
                <table border="1" style="margin:auto; border-collapse:collapse; border:1px solid rgb(200,200,200); box-sizing:border-box;">
                    <tr style="background-color:#D9E1F2; color:#203696;" align="center">
                        <th>CONSECUTIVO</th>
                        <th>PROYECTO</th>
                        <th>CALIFICACI&Oacute;N</th>                
                    </tr>
                ';
            }

            echo '<tr><td style="padding:10px 10px;border:1px solid rgb(200,200,200);">' . $row['proyecto_consecutivo'] . '</td><td>' . $row['consulta_titulo'] . '</td><td align="center">Aprobado con observaciones</td></tr>';

            $contador++;

            // if (($row['calificacion1'] == null) && ($row['calificacion2'] == null))

            //     echo '<tr><td>' . $row['proyecto_consecutivo'] . '</td><td>' . $row['proyecto_titulo'] . '</td><td align="center">-</td><td align="center">No aprobado</td></tr>';

            // else {

            //     if (($row['calificacion1'] != null) && ($row['calificacion2'] != null))
            //         $total = round((($row['calificacion1'] + $row['calificacion2']) / 2), 1);

            //     else
            //         $total = intval($row['calificacion1']) + intval($row['calificacion2']);

            //     echo '<tr><td>' . $row['proyecto_consecutivo'] . '</td><td class="text-justify">' . $row['proyecto_titulo'] . '</td><td align="center">' . $total . '</td><td align="center">';

            //     if ($total < 70)
            //         echo 'No aprobado';

            //     else if ($total < 80)
            //         echo 'Aprobado con observaciones';

            //     else
            //         echo 'Aprobado';

            //     echo '</td></tr>';

            //     $contador++;
            // }
        }
        echo '</table>';

        if ($contador == 0) {
            echo "No se han encontrado resultados";
         }
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>