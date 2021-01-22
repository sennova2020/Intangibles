<?php
  require "conexionpdo.php";
  
  class insertar extends Conexion{

    public function __construct(){
        parent::__construct();           
    }   

    public function insertar_preguntas(){
        $cod_intangible ="";
        $consulta = "UPDATE x_intangibles_preguntas SET pregunta20=:tiempoVida, pregunta21=:pregunta3, pregunta22=:pregunta4, pregunta23=:pregunta6, pregunta24=:pregunta7, pregunta25=:pregunta8, pregunta26=:pregunta9, fecha= now(),fecha_inicio=:fechaInicio 
        WHERE  cod_intangible=:cod_intangible";

            $preparada = $this->conexion_db->prepare($consulta); 
            
            $fechaInicio = isset($_POST["fechaInicio"])?$_POST["fechaInicio"]:"";
            $tiempoVida = isset($_POST["tiempoVida"])?$_POST["tiempoVida"]:"";
            $pregunta3 = isset($_POST["pregunta3"])?$_POST["pregunta3"]:"";
            $pregunta4 = isset($_POST["pregunta4"])?$_POST["pregunta4"]:"";
            $pregunta6 = isset($_POST["pregunta6"])?$_POST["pregunta6"]:"";
            $pregunta7 = isset($_POST["pregunta7"])?$_POST["pregunta7"]:"";
            $pregunta8 = isset($_POST["pregunta8"])?$_POST["pregunta8"]:"";
            $pregunta9 = isset($_POST["pregunta9"])?$_POST["pregunta9"]:"no";

            $cod_intangible = $_POST["cod_intangible"];

            $preparada->bindValue(":fechaInicio", $fechaInicio);
            $preparada->bindValue(":tiempoVida", $tiempoVida);
            $preparada->bindValue(":pregunta3", $pregunta3);
            $preparada->bindValue(":pregunta4", $pregunta4);
            $preparada->bindValue(":pregunta6", $pregunta6);
            $preparada->bindValue(":pregunta7", $pregunta7);
            $preparada->bindValue(":pregunta8", $pregunta8);
            $preparada->bindValue(":pregunta9", $pregunta9);
 
            $preparada->bindValue(":cod_intangible", $cod_intangible);
            $preparada->execute();            
            
            if($preparada){
               $resultado = "realizado  informacion centro _ principal";
            }else{
                $resultado = "no realizado informacion centro _ principal";
            }
            $preparada->closeCursor();

           if($pregunta9 == "si")
           {
            $facturaTabla = isset($_POST["facturas"])?$_POST["facturas"]:"";
            
            $filas = explode("|", $facturaTabla);
            
            foreach($filas as $fila)
            {
              
              if($fila != '')
              {

                $columnas = explode("^", $fila);

                

                
                  $consulta = "INSERT INTO intangible_pregunta_factura(
                  tipo_documento_contable,numero_factura, factura_a_nombre_sena, fecha_factura, valor_total, tiene_iva, iva, concepto,  valor_concepto, es_necesario, cod_intangible, fase_intangible, fecha) VALUES (:tipo_documento,
                  :numero_factura, :factura_a_nombre_sena, :fecha_factura, :valor_total, :tiene_iva, :iva, :concepto,  :valor_concepto, :es_necesario, :cod_intangible, :fase_intangible, now() )";
                  
                
                  $tipo_documento = $columnas['1'];
                  $numero_factura= $columnas['2'];
                  
                  $factura_a_nombre_sena= $columnas['3'] == "si"? 1 : 0;
                  $fecha_factura= $columnas['4'];
                  $valor_total= $columnas['5'];
                  $tiene_iva= $columnas['6']== "si"? 1: 0;
                  echo $tiene_iva;
                  $iva= $columnas['6']== "si" ? $columnas['7'] : 0;
                  $concepto= $columnas['8'];
                  $valor_concepto= $columnas['9'];
                  $es_necesario= $columnas['10']== "si"? 1: 0;
                  $fase_intangible = $columnas['11']; 

                  $preparada3 = $this->conexion_db->prepare($consulta);

                  $preparada3->bindValue(":tipo_documento", $tipo_documento);
                  $preparada3->bindValue(":numero_factura", $numero_factura);
                  $preparada3->bindValue(":factura_a_nombre_sena", $factura_a_nombre_sena);
                  $preparada3->bindValue(":fecha_factura", $fecha_factura);
                  $preparada3->bindValue(":valor_total", $valor_total);
                  $preparada3->bindValue(":tiene_iva", $tiene_iva);
                  $preparada3->bindValue(":iva", $iva);
                  $preparada3->bindValue(":concepto", $concepto);
                  $preparada3->bindValue(":valor_concepto", $valor_concepto);
                  $preparada3->bindValue(":es_necesario", $es_necesario);
                  $preparada3->bindValue(":cod_intangible", $cod_intangible);
                  $preparada3->bindValue(":fase_intangible", $fase_intangible);
                  $preparada3->execute();   
                  $preparada3->closeCursor();
                
              } 
            }
           }

            $consulta1 = "update intangible_informacion set evaluado = true where cod_intangible = '".$cod_intangible."'";
            $preparada = $this->conexion_db->prepare($consulta1);
            $preparada->execute();  
            $preparada->closeCursor();

            if($preparada){
              $resultado = "realizado  informacion centro _ principal";
           }else{
               $resultado = "no realizado informacion centro _ principal";
           }

           $this->conexion_db=null;
          return $resultado;
    }
  }

  $insertar1 = new insertar();
  if(isset($_POST["cod_intangible"]))
  {
      $insertar1->insertar_preguntas();
      header("Location:../intangibles/vista/listaCheck/checkRemanente.php?id=".$_POST["cod_intangible"]);
  }
  else
  {
      header("Location:../intagibles/index.php");
  }
  
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SENNOVA | Banco de Proyectos</title>
    <link rel="icon" href="images/icon_sena.png">
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="../css/modales.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/loading.css">
    <script src="../js/jquery.js"></script>

</head>
<body>
  <div class="header">
      <div class="banner">
        <img src="../images/banner1.png" alt="banner" class="img_header" style="width:100%">
      </div>
  </div>

  <div class="caja_formulario">
        <div class="titulo"><?php echo($_POST["cod_intangible"] . "Registrado correctamente.") ?></div>
        <div class="formulario1 formulario_c" style="color:white">
            <h2 class="titulo_formulario"><?php echo($_POST["cod_intangible"] . "Registrado correctamente.") ?></h2>
            <p><strong>Centro:</strong>
            <?php echo($_POST["centro"]) ?>
            </p>
            <div class="radicar_proyecto" id="boton_volver">VOLVER A LISTA</div>
        </div>
    </div>
</body>



<script src="../js/jquery.redirect.js"></script>
  
  <script>

    $("#boton_volver").click(function(){
      $.redirect('../intangibles/vista/intangibles.php', {'centro': '<?php echo($_POST["centro"]) ?>'}, "POST");
    });

   </script>
