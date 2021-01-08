<?php 
require_once '../controladores/seguridad/liderSecurity.php';
liderRol(1);
session_start();
if (!isset($_SESSION['id'])) {
    header("Location:index.php");
}
?>

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
    <style>
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body>
    <div id="header">
        <img src="images/banner_login.png" alt="banner" class="img_header">
    </div>

    <?php
        echo '
        <div class="container">
                <div class="form-group row align-self-center">
                    <div class="col-12 text-center" style="margin:15px">
                        <h4>ENCUESTA RESUMEN SEGUIMIENTO Y ANÁLISIS DE VIABILIDAD DE LOS PROYECTOS SENNOVA</h4>
                    </div>
                    <div class="col-12 text-left" style="margin:15px">
                        <a href="logout.php">SALIR</a>
                    </div>
                    <div class="col-12 text-center" style="margin:15px">
                        <p style="text-align: justify;text-justify: inter-word;">Las circunstancias actuales por las que atraviesa el país y el mundo por causa de la pandemia del COVID-19 y las medidas adoptadas para enfrentar sus efectos, hacen palpable la necesidad de evaluar y ajustar la planeación y desarrollo de las actividades misionales del SENA.</p>
                        <p style="text-align: justify;text-justify: inter-word;">En ese contexto, acorde con la orientación remitida por la Dirección de Formación Profesional que tiene por asunto “Presentación de informe bimestral de seguimiento Proyectos Sennova”, se solicitó a los Centros de Formación Profesional, bajo la articulación del líder Sennova, documentar el seguimiento a la ejecución de los proyectos con corte al 30 de abril, así como el análisis de su viabilidad en las actuales circunstancias.</p>
                        <p style="text-align: justify;text-justify: inter-word;">Realizado el anterior ejercicio, le solicitamos diligenciar la siguiente Encuesta resumen que permitirá una lectura más eficiente de los avances y análisis técnicos, administrativos y financieros, documentados en el Formato seguimiento proyectos marco (GIC-F-004) y el Formato acta y Registro de asistencia (GD-F-007). De sus respuestas a la encuesta dependerá la utilidad de este mecanismo de gestión de información, así como la confiabilidad de los análisis que tengan lugar a partir de la misma.</p>
                    </div>
                    <label for="documento" class="col-12 col-md-3 text-md-right col-form-label">Código de centro:</label>
                    <div class="col-12 col-md-7">
                        <h2><strong>'. $_SESSION['centro'].'</strong></h2>
                    </div>
                </div>';

        require_once('conexion.php');
        $conn = new Conexion();
        $link = $conn->conectarse();

        $sql_pry = "SELECT proyecto_consecutivo, 
                linea_programatica_descripcion,
                codigo_centro, 
                centro_nombre,
                proyecto_titulo 
                FROM proyecto_evaluar
                WHERE codigo_centro like '%"; 
                $sql_pry = $sql_pry . $_SESSION['centro'] . "%' and evaluado = false";

        $result = mysqli_query($link, $sql_pry);
        $datos_tabla = array(array());

        $contador = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            
            if ($contador == 0) {
                echo '
                <table border="1" style="margin:auto; border-collapse:collapse; border:1px solid rgb(200,200,200); box-sizing:border-box;">
                    <tr style="background-color:#D9E1F2; color:#203696;" align="center">
                        <th>CONSECUTIVO</th>
                        <th>LÍNEA PROGRAMÁTICA</th>
                        <th>CENTRO</th>                       
                        <th>PROYECTO</th>    
                        <th></th>            
                    </tr>
                ';
            }

            $cod_linea = explode('-', $row['linea_programatica_descripcion'])[0];
            $cod_linea = str_replace(' ', '', $cod_linea);

            echo '<tr>
                        <td style="padding:10px 10px;border:1px solid rgb(200,200,200);">' . strtoupper($row['proyecto_consecutivo']) . '</td>
                        <td>' . strtoupper($row['linea_programatica_descripcion']) . '</td>
                        <td>' . strtoupper($row['centro_nombre']) . '</td>                        
                        <td align="center">' . strtoupper($row['proyecto_titulo']) . '</td>
                        <td><a href="formato.php?id='.$row['proyecto_consecutivo'].'&centro='.$row['codigo_centro'].'&cod_linea='.$cod_linea.'">Aplicar encuesta</a></td>
                </tr>';

            $contador++;
        }
        echo '</table>';

        if ($contador == 0) {
            echo "<br><center><h1>No se han encontrado resultados</h1></center>";
        }
    
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <br>
    <br>
    <br>
    <br>
    <br>
</body>

</html>