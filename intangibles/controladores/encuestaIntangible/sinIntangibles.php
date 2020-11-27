<?php
require_once '../../modelo/conexion/conexion.php';
require_once '../../modelo/intangible/intangibleModelo.php';
 function registerSinIntangible()
 {
     $project =$_POST['project'];
     $justificacion =$_POST['justificacion'];
     $sinJ =1;
     $estado = 1;
     $negativo = 0;

     $model = new intangible();
     $result = $model -> createSinIntagible($project,$justificacion,$sinJ,$estado,$negativo);

     return 'Acción exitosa.';



     //createSinIntagible($project,$justificacion,$sinJ)
 }

 echo registerSinIntangible();
?>