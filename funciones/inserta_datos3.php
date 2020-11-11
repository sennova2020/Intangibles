<?php
  require "conexionpdo.php";

  class insertar extends Conexion{

    public function __construct(){
        parent::__construct();           
    }   

    public function __autoload(){
      echo("en directo");

    
      
    }

    public function insertar_preguntas(){
        $consulta = "INSERT INTO x_informacion_centro_preguntas(
          pregunta1, pregunta2, pregunta3, pregunta4, pregunta5, pregunta6, pregunta7, pregunta8, pregunta9, pregunta10,
          pregunta11, pregunta12, pregunta13, pregunta14, pregunta15, pregunta16, pregunta17, pregunta18, pregunta19, pregunta20,
          pregunta21, pregunta22, pregunta23, pregunta24, pregunta25, pregunta26,
          pregunta27,
          pregunta28,
          pregunta29,
          pregunta30,
          pregunta31,
          pregunta32,
          pregunta33,
          pregunta34,
          pregunta35,
          pregunta36,
          pregunta37,
          pregunta38,
          pregunta39,
          pregunta40,
          pregunta41,
          pregunta42,
          pregunta43,
          pregunta44,
          pregunta45,
          pregunta46,
          pregunta47,
          pregunta48,
          pregunta49,
          pregunta50,
          pregunta51,
          pregunta52,
          pregunta53,
          pregunta54,
          pregunta55,
          pregunta56,
          pregunta57,
          pregunta58,
          pregunta59,
          pregunta60,
          id_proyecto, fecha) VALUES (
            :pregunta1, :pregunta2, :pregunta3, :pregunta4, :pregunta5, :pregunta6, :pregunta7, :pregunta8, :pregunta9, :pregunta10,
            :pregunta11, :pregunta12, :pregunta13, :pregunta14, :pregunta15, :pregunta16, :pregunta17, :pregunta18, :pregunta19, :pregunta20,
            :pregunta21, :pregunta22, :pregunta23, :pregunta24, :pregunta25, :pregunta26, 
            :pregunta27,
            :pregunta28,
            :pregunta29,
            :pregunta30,
            :pregunta31,
            :pregunta32,
            :pregunta33,
            :pregunta34,
            :pregunta35,
            :pregunta36,
            :pregunta37,
            :pregunta38,
            :pregunta39,
            :pregunta40,
            :pregunta41,
            :pregunta42,
            :pregunta43,
            :pregunta44,
            :pregunta45,
            :pregunta46,
            :pregunta47,
            :pregunta48,
            :pregunta49,
            :pregunta50,
            :pregunta51,
            :pregunta52,
            :pregunta53,
            :pregunta54,
            :pregunta55,
            :pregunta56,
            :pregunta57,
            :pregunta58,
            :pregunta59,
            :pregunta60,
            :id_proyecto,
            now()
            )";

            $preparada = $this->conexion_db->prepare($consulta); 

            $pregunta1 = isset($_POST["pregunta1"])?$_POST["pregunta1"]:"";
            $pregunta2 = isset($_POST["pregunta2"])?$_POST["pregunta2"]:"";
            $pregunta3 = isset($_POST["pregunta3"])?$_POST["pregunta3"]:"";
            $pregunta4 = isset($_POST["pregunta4"])?$_POST["pregunta4"]:"";
            $pregunta5 = isset($_POST["pregunta5"])?$_POST["pregunta5"]:"";
            $pregunta6 = isset($_POST["pregunta6"])?$_POST["pregunta6"]:"";
            $pregunta7 = isset($_POST["pregunta7"])?$_POST["pregunta7"]:"";
            $pregunta8 = isset($_POST["pregunta8"])?$_POST["pregunta8"]:"";
            $pregunta9 = isset($_POST["pregunta9"])?$_POST["pregunta9"]:"";
            $pregunta10 = isset($_POST["pregunta10"])?$_POST["pregunta10"]:"";
            $pregunta11 = isset($_POST["pregunta11"])?$_POST["pregunta11"]:"";
            $pregunta12 = isset($_POST["pregunta12"])?$_POST["pregunta12"]:"";
            $pregunta13 = isset($_POST["pregunta13"])?$_POST["pregunta13"]:"";
            $pregunta14 = isset($_POST["pregunta14"])?$_POST["pregunta14"]:"";
            $pregunta15 = isset($_POST["pregunta15"])?$_POST["pregunta15"]:"";
            $pregunta16 = isset($_POST["pregunta16"])?$_POST["pregunta16"]:"";
            $pregunta17 = isset($_POST["pregunta17"])?$_POST["pregunta17"]:"";
            $pregunta18 = isset($_POST["pregunta18"])?$_POST["pregunta18"]:"";
            $pregunta19 = isset($_POST["pregunta19"])?$_POST["pregunta19"]:"";
            $pregunta20 = isset($_POST["pregunta20"])?$_POST["pregunta20"]:"";
            $pregunta21 = isset($_POST["pregunta21"])?$_POST["pregunta21"]:"";
            $pregunta22 = isset($_POST["pregunta22"])?$_POST["pregunta22"]:"";
            $pregunta23 = isset($_POST["pregunta23"])?$_POST["pregunta23"]:"";
            $pregunta24 = isset($_POST["pregunta24"])?$_POST["pregunta24"]:"";
            $pregunta25 = isset($_POST["pregunta25"])?$_POST["pregunta25"]:"";
            $pregunta26 = isset($_POST["pregunta26"])?$_POST["pregunta26"]:"";
            $pregunta27 = isset($_POST["pregunta27"])?$_POST["pregunta27"]:"";
            $pregunta28 = isset($_POST["pregunta28"])?$_POST["pregunta28"]:"";
            $pregunta29 = isset($_POST["pregunta29"])?$_POST["pregunta29"]:"";
            $pregunta30 = isset($_POST["pregunta30"])?$_POST["pregunta30"]:"";
            $pregunta31 = isset($_POST["pregunta31"])?$_POST["pregunta31"]:"";
            $pregunta32 = isset($_POST["pregunta32"])?$_POST["pregunta32"]:"";
            $pregunta33 = isset($_POST["pregunta33"])?$_POST["pregunta33"]:"";
            $pregunta34 = isset($_POST["pregunta34"])?$_POST["pregunta34"]:"";
            $pregunta35 = isset($_POST["pregunta35"])?$_POST["pregunta35"]:"";
            $pregunta36 = isset($_POST["pregunta36"])?$_POST["pregunta36"]:"";
            $pregunta37 = isset($_POST["pregunta37"])?$_POST["pregunta37"]:"";
            $pregunta38 = isset($_POST["pregunta38"])?$_POST["pregunta38"]:"";
            $pregunta39 = isset($_POST["pregunta39"])?$_POST["pregunta39"]:"";
            $pregunta40 = isset($_POST["pregunta40"])?$_POST["pregunta40"]:"";
            $pregunta41 = isset($_POST["pregunta41"])?$_POST["pregunta41"]:"";
            $pregunta42 = isset($_POST["pregunta42"])?$_POST["pregunta42"]:"";
            $pregunta43 = isset($_POST["pregunta43"])?$_POST["pregunta43"]:"";
            $pregunta44 = isset($_POST["pregunta44"])?$_POST["pregunta44"]:"";
            $pregunta45 = isset($_POST["pregunta45"])?$_POST["pregunta45"]:"";
            $pregunta46 = isset($_POST["pregunta46"])?$_POST["pregunta46"]:"";
            $pregunta47 = isset($_POST["pregunta47"])?$_POST["pregunta47"]:"";
            $pregunta48 = isset($_POST["pregunta48"])?$_POST["pregunta48"]:"";
            $pregunta49 = isset($_POST["pregunta49"])?$_POST["pregunta49"]:"";
            $pregunta50 = isset($_POST["pregunta50"])?$_POST["pregunta50"]:"";
            $pregunta51 = isset($_POST["pregunta51"])?$_POST["pregunta51"]:"";
            $pregunta52 = isset($_POST["pregunta52"])?$_POST["pregunta52"]:"";
            $pregunta53 = isset($_POST["pregunta53"])?$_POST["pregunta53"]:"";
            $pregunta54 = isset($_POST["pregunta54"])?$_POST["pregunta54"]:"";
            $pregunta55 = isset($_POST["pregunta55"])?$_POST["pregunta55"]:"";
            $pregunta56 = isset($_POST["pregunta56"])?$_POST["pregunta56"]:"";
            $pregunta57 = isset($_POST["pregunta57"])?$_POST["pregunta57"]:"";
            $pregunta58 = isset($_POST["pregunta58"])?$_POST["pregunta58"]:"";
            $pregunta59 = isset($_POST["pregunta59"])?$_POST["pregunta59"]:"";
            $pregunta60 = isset($_POST["pregunta60"])?$_POST["pregunta60"]:"";            

            $id_proyecto = $_POST["id_proyecto"];

            $preparada->bindValue(":pregunta1", trim($pregunta1));
            $preparada->bindValue(":pregunta2", trim($pregunta2));
            $preparada->bindValue(":pregunta3", trim($pregunta3));
            $preparada->bindValue(":pregunta4", trim($pregunta4));
            $preparada->bindValue(":pregunta5", trim($pregunta5));
            $preparada->bindValue(":pregunta6", trim($pregunta6));
            $preparada->bindValue(":pregunta7", trim($pregunta7));
            $preparada->bindValue(":pregunta8", trim($pregunta8));
            $preparada->bindValue(":pregunta9", trim($pregunta9));
           $preparada->bindValue(":pregunta10", trim($pregunta10));
           $preparada->bindValue(":pregunta11", trim($pregunta11));
           $preparada->bindValue(":pregunta12", trim($pregunta12));
           $preparada->bindValue(":pregunta13", trim($pregunta13));
           $preparada->bindValue(":pregunta14", trim($pregunta14));
           $preparada->bindValue(":pregunta15", trim($pregunta15));
           $preparada->bindValue(":pregunta16", trim($pregunta16));
           $preparada->bindValue(":pregunta17", trim($pregunta17));
           $preparada->bindValue(":pregunta18", trim($pregunta18));
           $preparada->bindValue(":pregunta19", trim($pregunta19));
           $preparada->bindValue(":pregunta20", trim($pregunta20));
           $preparada->bindValue(":pregunta21", trim($pregunta21));
           $preparada->bindValue(":pregunta22", trim($pregunta22));
           $preparada->bindValue(":pregunta23", trim($pregunta23));
           $preparada->bindValue(":pregunta24", trim($pregunta24));
           $preparada->bindValue(":pregunta25", trim($pregunta25));
           $preparada->bindValue(":pregunta26", trim($pregunta26));
           $preparada->bindValue(":pregunta27", trim($pregunta27));
           $preparada->bindValue(":pregunta28", trim($pregunta28));
           $preparada->bindValue(":pregunta29", trim($pregunta29));
           $preparada->bindValue(":pregunta30", trim($pregunta30));
           $preparada->bindValue(":pregunta31", trim($pregunta31));
           $preparada->bindValue(":pregunta32", trim($pregunta32));
           $preparada->bindValue(":pregunta33", trim($pregunta33));
           $preparada->bindValue(":pregunta34", trim($pregunta34));
           $preparada->bindValue(":pregunta35", trim($pregunta35));
           $preparada->bindValue(":pregunta36", trim($pregunta36));
           $preparada->bindValue(":pregunta37", trim($pregunta37));
           $preparada->bindValue(":pregunta38", trim($pregunta38));
           $preparada->bindValue(":pregunta39", trim($pregunta39));
           $preparada->bindValue(":pregunta40", trim($pregunta40));
           $preparada->bindValue(":pregunta41", trim($pregunta41));
           $preparada->bindValue(":pregunta42", trim($pregunta42));
           $preparada->bindValue(":pregunta43", trim($pregunta43));
           $preparada->bindValue(":pregunta44", trim($pregunta44));
           $preparada->bindValue(":pregunta45", trim($pregunta45));
           $preparada->bindValue(":pregunta46", trim($pregunta46));
           $preparada->bindValue(":pregunta47", trim($pregunta47));
           $preparada->bindValue(":pregunta48", trim($pregunta48));
           $preparada->bindValue(":pregunta49", trim($pregunta49));
           $preparada->bindValue(":pregunta50", trim($pregunta50));
           $preparada->bindValue(":pregunta51", trim($pregunta51));
           $preparada->bindValue(":pregunta52", trim($pregunta52));
           $preparada->bindValue(":pregunta53", trim($pregunta53));
           $preparada->bindValue(":pregunta54", trim($pregunta54));
           $preparada->bindValue(":pregunta55", trim($pregunta55));
           $preparada->bindValue(":pregunta56", trim($pregunta56));
           $preparada->bindValue(":pregunta57", trim($pregunta57));
           $preparada->bindValue(":pregunta58", trim($pregunta58));
           $preparada->bindValue(":pregunta59", trim($pregunta59));
           $preparada->bindValue(":pregunta60", trim($pregunta60));
            $preparada->bindValue(":id_proyecto", $id_proyecto);
            $preparada->execute();            
            
            if($preparada){
               $resultado = "realizado  informacion centro _ principal";
            }else{
                $resultado = "no realizado informacion centro _ principal";
            }
            $preparada->closeCursor();

            $consulta1 = "update proyecto_evaluar set evaluado = true where proyecto_consecutivo = '".$id_proyecto."'";
            $preparada = $this->conexion_db->prepare($consulta1);
            $preparada->execute();  

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
  if(isset($_POST["id_proyecto"]))
  {
      $insertar1->insertar_preguntas();
  }
  else
  {
      header("Location:index.php");
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
          <img src="../images/banner.png" alt="" class="img_banner">
      </div>
  </div>

  <div class="caja_formulario">
        <div class="titulo"><?php echo($_POST["id_proyecto"] . "Registrado correctamente.") ?></div>
        <div class="formulario1 formulario_c" style="color:white">
            <h2 class="titulo_formulario"><?php echo($_POST["id_proyecto"] . "Registrado correctamente.") ?></h2>
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
      $.redirect('../seguimiento/proyectos.php', {'centro': '<?php echo($_POST["centro"]) ?>'}, "POST");
    });

   </script>
