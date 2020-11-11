<?php

include('conexion.php');

$sql=$_GET['consulta'];
$result=mysqli_query($cn,$sql);
$resultado = "";
if($ver=mysqli_fetch_row($result)) {
    $resultado = "" . $ver[0];
}
echo $resultado;
