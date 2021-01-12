<?php 
 require_once '../../modelo/conexion/conexion.php';
 require_once '../../modelo/intangible/intangibleModelo.php';
 require_once '../../modelo/claseIntangibleModelo.php';
 require_once '../../controladores/encuestaIntangible/read.php';
 require_once '../../controladores/seguridad/adminSecurity.php';
adminRol(2);
if (!isset($_SESSION['id'])) {
    header("Location:index.php");
}
$project = trim($_GET['project']);
?>

<!doctype html>

<html lang="es">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="../../../imagenes/icon_sena.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>INTANGIBLES | Sennova</title>
    <link rel="stylesheet" href="../../css/index.css">
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
        <img src="../../../images/banner1.png" alt="banner" class="img_header">
    </div>

    <?php
        echo '
        <div class="container">
                <div class="form-group row align-self-center">
                    <div class="col-12 text-center" style="margin:15px">
                        <h4>Medición de Saldos Iniciales de los Activos Intangibles Adquiridos y Desarrollados en los proyectos de investigación Sennova</h4>
                    </div>
                    <div class="col-12 text-left" style="margin:15px">
                        <a href="../../session/logout.php">SALIR</a>
                    </div>
                    <div class="col-12 text-center" style="margin:15px">
                        <!--<p>Posible Descripción</p>-->
                    </div>
                    <label for="documento" class="col-12 col-md-3 text-md-right col-form-label">C&oacute;digo de centro:</label>
                    <div class="col-12 col-md-7">
                        <h2><strong>'. $_SESSION['centro'].'</strong></h2>
                    </div>

                    <label for="documento" class="col-12 col-md-3 text-md-right col-form-label">C&oacute;digo de proyecto:</label>
                    <div class="col-12 col-md-7">
                        <h2><strong>'.$project.'</strong></h2>
                    </div>
                </div>';

                
    ?>
   
    <table border="1" style="width:100%; margin:auto; border-collapse:collapse; border:1px solid rgb(200,200,200); box-sizing:border-box;">
        <thead>
            <tr style="background-color:#D9E1F2; color:#203696;" align="center">
                <th>C&oacute;digo del intangible</th>                 
                <th>Nombre del intangible</th>    
                <th>Tipo de intangible</th>   
                <th>Clase de intangible</th>
                <th>Terminar</th>           
            </tr>
        </thead>   
        <tbody>
            <?php
               echo utf8_encode(readIntangibleFinished($project));
            ?>
        </tbody>
    </table>
        <br><br>
        <?php
            echo '<input type="hidden" id="project" value="'.$project.'">';
        ?>
        
    <a href="home.php"> <button class="btn" style="background-color:#639cc7;">Volver</button></a>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="../../../js/jquery.redirect.js"></script>
    <script src="../../js/admin/intangiblePorProyecto.js"></script>
    
</body>

</html>