<?php 
 require_once '../modelo/conexion/conexion.php';
 require_once '../modelo/centroInformation/centroModel.php';
 require_once '../modelo/centroInformation/informacionCentro.php';
 require_once '../modelo/proyectoConsecutivo/proyectoConsecutivoModel.php';
 require_once '../modelo/intangible/intangibleModelo.php';
 require_once '../modelo/proyectoEvaluarIntangible.php';
 require_once '../modelo/fechaLimite.php';
 require_once '../controladores/centroProyecto/read.php';
 require_once '../controladores/verificaciones/fechaLimite.php';
 require_once '../controladores/verificaciones/sinIntagibles.php';
 require_once '../controladores/seguridad/liderSecurity.php';
liderRol(1);
if (!isset($_SESSION['id'])) {
    header("Location:../index.php");
}
if(enabledOperations() === false)
{
    deleteIntangibleLimitDate(1);
}
?>

<!doctype html>

<html lang="es">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SENNOVA | Intangibles </title>
        <link rel="icon" href="../../images/icon_sena.png">
        <link rel="stylesheet" href="../../css/css.css">
        <link rel="stylesheet" href="../../css/modales.css">
        <link rel="stylesheet" href="../../css/responsive.css">
        <link rel="stylesheet" href="../../css/loading.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
        <!-- CSS only -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
            integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <!-- JS, Popper.js, and jQuery -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
        </script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
            crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/intangible.css">
    
</head>

<body>
    
    <div id="header">
        <img src="../../images/banner1.png" alt="banner" class="img_header">
    </div>
    
    <?php
        echo '
        <div class="container">
                <div class="form-group row align-self-center">
                    <div class="col-12 text-center" style="margin:15px">
                        <h4>Medición de Saldos Iniciales de los Activos Intangibles Adquiridos y Desarrollados en los proyectos de investigación Sennova</h4>
                    </div>
                    <div class="col-12 text-left" style="margin:15px">
                        <a href="../session/logout.php">SALIR</a>
                    </div>
                    <div class="col-12 text-center" style="margin:15px">
                       <article class="text-left">

                            <p><strong>Resolución 533 de 2015: </strong>Contaduría General de la Nación, por la cual se incorpora, en el Régimen de Contabilidad Publica, el marco normativo aplicable a entidades de gobierno y se dictan otras disposiciones; modificado por la Resolución 425 de 2019 por la cual se modifican las Normas para el Reconocimiento, Medición, Revelación y Presentación de los Hechos Económicos del Marco Normativo para Entidades de Gobierno.</p>

                            <p><strong>Resolución 620 de 2015: </strong>Contaduría General de la Nación, por la cual se incorpora el Catalogo General de Cuentas al Marco Normativo para entidades de Gobierno, actualizado por la Resolución 095 de 2020 contaduría General de la nación.</p>

                            <p><strong>Resolución 193 de 2016: </strong>Suscrita por la Contaduría General de la nación: Por el cual se incorpora, en los procedimientos transversales del régimen de contabilidad pública, el procedimiento para la evaluación del control interno contable.</p>

                            <p><strong>Guía de orientación contable en el marco de la emergencia económica generada por el COVID – 19.</strong></p>

                            <p><strong>GRF-M-004 Manual de Políticas Contables SENA</strong></p>

                            <p><h4 class="text-center">ACTIVOS INTANGIBLES:</h4></p>

                            <p><strong></strong>Es así, que un activo intangible es el “recurso identificable, de carácter no monetario y sin apariencia física, sobre los cuales la entidad tiene control, espera tener potencial de servicio y puede realizar mediciones fiables. Estos activos se caracterizan porque no se espera vendernos en el curso de las actividades de la entidad y se prevé usarlo durante más de un periodo contable” (Procedimiento reconocimiento intangibles adquiridos, código GRF – P – 025, Compromiso, 2019); se pueden clasificar en dos tipos, los adquiridos y los que se han generados internamente (Desarrollados).</p>

                            <p><strong>Los activos intangibles adquiridos, </strong>“son aquellos que cumplen con los criterios de reconocimiento de activos intangibles que se adquieren a un tercero en forma separada y pueden ser identificados por derechos contractuales o legales y están representados por el precio de adquisición, los aranceles de importación e impuestos no recuperables y cualquier otro costo atribuible a la adquisición o preparación para el uso del activo”. (Procedimiento reconocimiento intangibles adquiridos, código GRF – P – 025, Compromiso, 2019). </p>

                            <p><strong>Los intangibles generados internamente (Desarrollados) </strong>“son aquellos que surgen de una fase de desarrollo y que pasan previamente por una fase de investigación y como resultado de esta fase, se puede demostrar la certeza de completar de manera técnica la producción del producto; disponibilidad de recursos técnicos, financieros o de otro, para completar el desarrollo; demostrar la intención de completar el producto, para usarlo; determinar su utilización dentro de las funciones misionales de SENA de formación profesional o en aquellas administrativas que coadyuvan con este fin; la capacidad del SENA para utilizar el producto; su capacidad para medir el desembolso atribuible al desarrollo del intangible”. (Procedimiento reconocimiento intangibles Desarrollados, código GRF – P – 031, Compromiso, 2019). 

                            <br> <br>


                            Por lo anterior y de acuerdo con las Normas Para El Reconocimiento, Medición, Revelación Y Presentación De Los Hechos Económicos (Actualizadas según la Resolución 425 de 2019- Contraloría General de la Nación), un intangible desarrollado en fase de investigación comprende todo aquel estudio original y planificado que realiza la entidad con la finalidad de obtener nuevos conocimientos científicos o tecnológicos; por otro lado, en fase de desarrollo consiste en la aplicación de los resultados de la investigación (o de cualquier otro tipo de conocimiento científico) a un plan o diseño para la producción de sistemas nuevos o sustancialmente mejorados, materiales, productos, métodos o procesos, antes del comienzo de su producción o utilización comercial.
                            </p>


                       
                       </article>
                    </div>
                    <label for="documento" class="col-12 col-md-3 text-md-right col-form-label">Descargar formatos:</label>
                    <div class="col-12 col-md-7">
                        <a href="../controladores/encuestaIntangible/downloadDocumenst.php?document=GRF-F-078_FORMATO_ADQUIRIDOS_V2.xlsx" class="documents"><span id="GRF-F-078" onclick="descargarFormatos(this)">GRF-F-078</span></a>

                        <a href="../controladores/encuestaIntangible/downloadDocumenst.php?document=GRF-F-080__FORMATO_RECONOCIMIENTO__ACTIVOS_INTANGIBLES_DESARROLLADOS.xlsx" class="documents ml-3"><span onclick="descargarFormatos(this)" id="GRF-F-080">GRF-F-080</span></a>

                        <a href="../controladores/encuestaIntangible/downloadDocumenst.php?document=GRF-F-081_FORMATO_MEDICION_ACTIVOS_INTANGIBLES_EN_DESARROLLO.xlsx" class="documents ml-3"><span onclick="descargarFormatos(this)" id="GRF-F-081">GRF-F-081</span></a>

                        <a href="../controladores/encuestaIntangible/downloadDocumenst.php?document=Estudio_de_mercado_Intangible.xlsx" class="documents ml-3"><span onclick="descargarFormatos(this)" id="estudioMercado">Estudio de Mercado</span></a>

                        <a href="../controladores/encuestaIntangible/downloadDocumenst.php?document=Guía de Usuario lista de chequeo medicion incial - Intangibles.pdf" class="documents ml-3"><span onclick="descargarFormatos(this)" id="guiaIntangibles">Guia Intangibles</span></a>
                    </div>
                    <label for="documento" class="col-12 col-md-3 text-md-right col-form-label">Fecha limite:</label>
                    <div class="col-12 col-md-7">
                        <h2><strong>'. getLimitDate().'</strong></h2>
                    </div>
                    <label for="documento" class="col-12 col-md-3 text-md-right col-form-label">C&oacute;digo de centro:</label>
                    <div class="col-12 col-md-7">
                        <h2><strong>'. $_SESSION['centro'].'</strong></h2>
                    </div>

                    
                </div>';
    
                echo '
                    <table border="1" style="width:100%; margin:auto; border-collapse:collapse; border:1px solid rgb(200,200,200); box-sizing:border-box;">
                        <tr style="background-color:#D9E1F2; color:#203696;" align="center">
                            <th>C&oacutedigo proyecto</th>                 
                            <th>Nombre de proyecto</th>    
                            <th>Ver intangibles</th>   
                            <th>Agregar intangibles</th>           
                        </tr>
                    ';
        
                echo utf8_encode(readProject());
                echo "</table>";
    ?>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../js/jquery.js"></script>
    <script src="../../js/jquery.redirect.js"></script>
    <script src="../js/intangible.js"></script>
    <br>
    <br>
    <br>
    <br>
    <br>
</body>

</html>