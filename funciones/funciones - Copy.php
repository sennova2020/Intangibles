<?php

/* Se aplica a cada select/option que se requiera llenar */
function llenarcombo($consulta)
{
    include('conexion.php');
    $ins = mysqli_query($cn, $consulta);
    $respuesta = "<option value=''>Seleccionar:</option>";

    while ($res = mysqli_fetch_array($ins)) {
        $minus = strtoupper($res[1]);
        $minus2 = utf8_encode($minus);
        $respuesta = $respuesta . "<option value='$res[0]'>" . $minus2 . "</option>";
    }
    echo $respuesta;
}

function convertir($dato1, $tabla, $campo_id, $campo_dato)
{
    include('conexion.php');
    $codigo = 0;
    $sql_dato = "SELECT $campo_id FROM $tabla WHERE $campo_dato = '$dato1'";
    $ins = mysqli_query($cn, $sql_dato);
    if ($array = mysqli_fetch_array($ins)) {
        $codigo = $array[0];
    }
    return $codigo;
}

function lugar()
{
    include('conexion.php');
    $sql_d2 = "SELECT COUNT(*) FROM `proyecto`";
    $ins = mysqli_query($cn, $sql_d2);
    if ($array = mysqli_fetch_array($ins)) {
        $codigo = $array[0];
    }
    return $codigo + 1;
}

function numero_consecutivo()
{
    include('conexion.php');
    $sql_d2 = "SELECT proyecto_num_consecutivo FROM `proyecto`";
    $ins = mysqli_query($cn, $sql_d2);
    while ($array = mysqli_fetch_array($ins)) {
        $codigo = $array[0];
    }
    return $codigo + 1;
}

function consecutivo()
{
    include('conexion.php');
    $sql_d2 = "SELECT proyecto_num_consecutivo FROM `proyecto`";

    $ins = mysqli_query($cn, $sql_d2);

    while ($array = mysqli_fetch_array($ins)) {
        $codigo = $array[0];
    }

    $codigo = $codigo + 1;

    $consecutivo = "SGPS-" . $codigo . "-" . date("Y");
    return $consecutivo;
}

function fecha_actual()
{
    $fecha = date("d-m-Y");
    return $fecha;
}
