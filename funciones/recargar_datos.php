<?php

include('conexion.php');

$sql=$_GET['consulta'];
$result=mysqli_query($cn,$sql);
$cadena="<option value='0'>Seleccionar...</option>";

while ($ver=mysqli_fetch_row($result)) {
    $minus = strtoupper($ver[1]);
    $minus2 = utf8_encode($minus);
    $cadena=$cadena.'<option value='.$ver[0].'>'.$minus2.'</option>';
}

echo  $cadena;
