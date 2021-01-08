<?php 
    require_once '../controladores/seguridad/liderSecurity.php';
    liderRol(1);
    session_start();
    if (!isset($_SESSION['id'])) {
        header("Location:../index.php");
    }

?>

<!------------------INCLUIR FUNCIONES------------------>
<?php include('../../funciones/funciones.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SENNOVA | Intangibles </title>
    <link rel="icon" href="../images/icon_sena.png">
    <link rel="stylesheet" href="../../css/css.css">
    <link rel="stylesheet" href="../../css/modales.css">
    <link rel="stylesheet" href="../../css/responsive.css">
    <link rel="stylesheet" href="../../css/loading.css">
    <script src="../../js/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
</head>
<body>
    <div class="header">
        <div class="banner">
            <img src="../../images/banner1.png" alt="banner" class="img_header" style="width:100%">
        </div>
    </div>
  
    <?php
      $data = $_GET['id'];
      $centro = $_GET['centro'];

      $results = getDataIntangible($data); 
      if($results != false)
      {
        $info = $results->fetch_object();
      }
      else
      {
        $info = "no encontrado";
      }
    ?>
    <div class="caja_formulario">
        <div class="titulo"><?php echo($info->nombre_intangible) ?></div>
        <div class="formulario1 formulario_c" style="color:white">
            <h2 class="titulo_formulario"><?php echo($info->cod_intangible. " - " . $info->nombre_intangible) ?></h2>
            <table class="table table-striped" style="color:white">
                <tr><td><strong>Regional:</strong></td><td><?php echo($info->regional)?></td></tr>
                <tr><td><strong>Codigo Centro:</strong></td><td><?php echo($info->codigo_centro)?></td></tr>
                <tr><td><strong>Nombre Centro:</strong></td><td><?php echo($info->nombre_centro)?></td></tr>
                <tr><td><strong>Nombre Funcionario:</strong></td><td><?php echo($info->nombre_funcionario)?></td></tr>
                <tr><td><strong>Cargo Funcionario:</strong></td><td><?php echo($info->cargo_funcionario)?></td></tr>
                <tr><td><strong>Tipo Vinculacion Funcionario:</strong></td><td><?php echo($info->tipo_vinculacion_funcionario)?></td></tr>
                <tr><td><strong>Correo Electronico Funcionario:</strong></td><td><?php echo($info->correo_electronico_funcionario)?></td></tr>
                <tr><td><strong>Numero Ip Funcionario:</strong></td><td><?php echo($info->numero_ip_funcionario)?></td></tr>
                <tr><td><strong>Tipo Intangible:</strong></td><td><?php echo($info->tipo_intangible)?></td></tr>
                <tr><td><strong>Clase Intangible:</strong></td><td><?php echo($info->clase_intangible)?></td></tr>
                <tr><td><strong>Fecha Adquisicion:</strong></td><td><?php echo($info->fecha_adquisicion)?></td></tr>
                <tr><td><strong>Costo estimado del intangible Desarrollado ó Costo Total del Intagible Adquirido:</strong></td><td><?php echo($info->costo_total)?></td></tr>
                <tr><td><strong>Si el desarrollo ó activo no se encuentra en uso explique brevemente porque:</strong></td><td><?php echo($info->activo_en_uso)?></td></tr>
                <tr><td><strong>Si tuvo inconvenientes en registrar esta información explicar porque:</strong></td><td><?php echo($info->inconvenientes_informacion)?></td></tr>
                <tr><td><strong>Nombre Intangible:</strong></td><td><?php echo($info->nombre_intangible)?></td></tr>
                <tr><td><strong>El Intangible es un Recurso Contralado?:</strong></td><td><?php echo($info->recurso_contralado)?></td></tr>
                <tr><td><strong>Control Sobre Intangible:</strong></td><td><?php echo($info->control_sobre_intangible)?></td></tr>
                <tr><td><strong>¿Del intangible se espera obtener un potencial de servicios?:</strong></td><td><?php echo($info->potencial_servicios)?></td></tr>
                <tr><td><strong>Observaciones (justifique su respuesta):</strong></td><td><?php echo($info->justificacion_respuesta_potencial)?></td></tr>
                <tr><td><strong>¿El intangible se puede medir fiablemente?:</strong></td><td><?php echo($info->intangible_medir)?></td></tr>
                <tr><td><strong>Observaciones (justifique su respuesta):</strong></td><td><?php echo($info->justificacion_respuesta_medir)?></td></tr>
                <tr><td><strong>¿El intangible se puede identificar? :</strong></td><td><?php echo($info->identificar_intangible)?></td></tr>
                <tr><td><strong>Observaciones (justifique su respuesta):</strong></td><td><?php echo($info->justificacion_respuesta_identificar)?></td></tr>
                <tr><td><strong>¿El intangible NO es considerado monetario? El intangibles es monetario cuando es un CDT, un bono o títulos valores y es no monetario en caso contrario:</strong></td><td><?php echo($info->intangible_monetario)?></td></tr>
                <tr><td><strong>Observaciones (justifique su respuesta):</strong></td><td><?php echo($info->justificacion_respuesta_monetario)?></td></tr>
                <tr><td><strong>¿El intangible es sin apariencia física?:</strong></td><td><?php echo($info->intangible_apariencia_fisica)?></td></tr>
                <tr><td><strong>Observaciones (justifique su respuesta):</strong></td><td><?php echo($info->justifique_respuesta_apariencia)?></td></tr>
                <tr><td><strong>¿El intangible se va a utilizar por más de un año?:</strong></td><td><?php echo($info->utilizar_mas_ano)?></td></tr>
                <tr><td><strong>Observaciones (justifique su respuesta):</strong></td><td><?php echo($info->justifique_respuesta_utilizar)?></td></tr>
                <tr><td><strong>Numero de resolución con la asignación de recursos ó Numero de Factura contrato o convenio de Adquision:</strong></td><td><?php echo($info->numero_factura)?></td></tr>
                <tr><td><strong>El intangible se usará de forma finita o infinita</strong></td><td><?php echo($info->intangible_finita_infinita)?></td></tr>
                <tr><td><strong>Fecha en el que comenzó a usarse el intangible después de su desarrollo o adquision:</strong></td><td><?php echo($info->fecha_utilizacion)?></td></tr>
                
            </table>
        </div>
        <div class="radicar_proyecto" id="boton_volver">VOLVER</div>
    </div>

    <script src="../../js/jquery.redirect.js"></script>

<script>

     $(document).ready(function() {
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
            event.preventDefault();
            return false;
            }
        });
      });
      
      $("#boton_volver").click(function(){
        $.redirect('intangibles.php', {'centro': '<?php echo($info->codigo_centro) ?>'}, "POST");
    });
</script>

</body>
</html>

