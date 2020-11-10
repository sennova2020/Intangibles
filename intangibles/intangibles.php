<?php 
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
    <title>INTANGIBLES | Sennova</title>
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
        <img src="../images/banner1.png" alt="banner" class="img_header">
    </div>

    <?php
        echo '
        <div class="container">
                <div class="form-group row align-self-center">
                    <div class="col-12 text-center" style="margin:15px">
                        <h4>Medición de Saldos Iniciales de los Activos Intangibles Adquiridos y Desarrollados en los proyectos de investigación Sennova</h4>
                    </div>
                    <div class="col-12 text-left" style="margin:15px">
                        <a href="logout.php">SALIR</a>
                    </div>
                    <div class="col-12 text-center" style="margin:15px">
                        <p style="text-align: justify;text-justify: inter-word;">En aplicación a la resolución 533 de 2015 de la Contaduría General de la Nación, modificada por la resolución 484 de 2017 y la Resolución número 425 de 2019, por la cual se modifican las Normas para el Reconocimiento, Medición, Revelación y Presentación de los Hechos Económicos del Marco Normativo para Entidades de Gobierno y siguientes, desde el 1° de enero de 2018 debemos reconocer los activos intangibles adquiridos y desarrollados por la entidad y que cumplan con los criterios establecidos en la norma.</p>
                        <p style="text-align: justify;text-justify: inter-word;">Es de suma importancia que se registre toda información solicitada ya que debemos presentar este proceso a los entes de control y cumplir con lo establecido en la norma y con los compromisos que tiene la entidad de realizar correctamente el reconocimiento de los intangibles en la información financiera de la entidad.</p>
                        <p style="text-align: justify;text-justify: inter-word;">Este reconocimiento se realizará en varias fases debido a la magnitud del proceso, siendo la primera fase la medición de saldos iniciales de los activos intangibles, seguido de una medición posterior y finalmente una medición de indicios de deterioro.</p>
                        <p style="text-align: justify;text-justify: inter-word;">Por lo anterior, solicitamos continuar con la medición de saldos iniciales en lo concerniente a la estimación de costo de los bienes intangibles adquiridos y desarrollado por los proyectos de investigación en su Centro de Formación.</p>
                    </div>
                    <label for="documento" class="col-12 col-md-3 text-md-right col-form-label">Código de centro:</label>
                    <div class="col-12 col-md-7">
                        <h2><strong>'. $_SESSION['centro'].'</strong></h2>
                    </div>
                </div>';

        require_once('conexion.php');
        $conn = new Conexion();
        $link = $conn->conectarse();

        $sql_pry = "SELECT id, cod_intangible, nombre_intangible, codigo_centro  FROM intangible_informacion
                WHERE codigo_centro like '%"; 
                $sql_pry = $sql_pry . $_SESSION['centro'] . "%' and evaluado = false";

        $result = mysqli_query($link, $sql_pry);
        $datos_tabla = array(array());

        $contador = 0;
        if($result)
        while ($row = mysqli_fetch_assoc($result)) {
            
            if ($contador == 0) {
                echo '
                <table border="1" style="width:100%; margin:auto; border-collapse:collapse; border:1px solid rgb(200,200,200); box-sizing:border-box;">
                    <tr style="background-color:#D9E1F2; color:#203696;" align="center">
                        <th>Codigo intangible</th>                 
                        <th>Nombre de intangible</th>    
                        <th>Ver Detalle</th>   
                        <th>Aplicar encuesta</th>           
                    </tr>
                ';
            }



            echo '<tr>
                        <td style="padding:10px 10px;border:1px solid rgb(200,200,200);">' . strtoupper($row['cod_intangible']) . '</td>                     
                        <td align="center">' . strtoupper($row['nombre_intangible']) . '</td>
                        <td><a href="detalleIntangible.php?id='.$row['cod_intangible'].'&centro='.$row['codigo_centro'].'">Detalle</a></td>
                        <td><a href="formatoIntangible.php?id='.$row['cod_intangible'].'&centro='.$row['codigo_centro'].'">Aplicar encuesta</a></td>
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