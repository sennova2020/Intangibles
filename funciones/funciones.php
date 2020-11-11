<?php

/* Se aplica a cada select/option que se requiera llenar */
function llenarcombo($consulta)
{
    try {
        include('conexion.php');
        $ins = mysqli_query($cn, $consulta);
        $respuesta = "<option value=''>Seleccionar:</option>";
    
        while ($res = mysqli_fetch_array($ins)) {
            $minus = strtoupper($res[1]);
            $minus2 = utf8_encode($minus);
            $respuesta = $respuesta . "<option value='$res[0]'>" . $minus2 . "</option>";
        }
        echo $respuesta;
    } catch (Exception $e) {
        //echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
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

function log_encuesta($texto){
    $ddf = fopen('log_process'.$_SESSION['id'].'.log','a');
    fwrite($ddf, $_SESSION['id']);
    fwrite($ddf, "[".date("r")."] log encuesta: $texto\r\n");
    fclose($ddf);
}

function getDataProyecto($id){
    try{
        include('conexion.php');
        $sql_pry = "SELECT proyecto_consecutivo, 
                    linea_programatica_descripcion,
                    codigo_centro, 
                    centro_nombre,
                    proyecto_titulo 
                    FROM proyecto_evaluar
                    where proyecto_consecutivo = '".$id."' limit 1";
        $res = $cn->query($sql_pry);
        return $res;
    }catch(Exception $e){
        die("Error" . $e->getMessage());
    }
}

function getDataSeguimiento($id)
{
    try
    {
        include('conexion.php');
        $sql_pry = "SELECT 
        d.regional_nombre,
        c.codigo_centro, 
        p.centro_nombre,
        p.proyecto_consecutivo, 
        p.linea_programatica_descripcion,
        p.proyecto_titulo 
        FROM proyecto_evaluar p 
        INNER JOIN centro c ON c.codigo_centro = p.codigo_centro
        INNER JOIN regional d ON d.regional_id = c.regional_id
        where proyecto_consecutivo = '".$id."' limit 1";
        $res = $cn->query($sql_pry);
        return $res;
    }catch(Exception $e){
        die("Error" . $e->getMessage());
    }
}

function getDataObjetivoArray($id)
{
    try
    {
        $result = [];

        include('conexion.php');
        $sql_pry = "SELECT tipo_objetivo_id, objetivo_descripcion
        FROM x_objetivo c
        where proyecto_id = '".$id."' ";
        $res = $cn->query($sql_pry);


        while($row = $res->fetch_array())
        {
            array_push ( $result , $row );
        }
        return $result;
    }catch(Exception $e){
        die("Error" . $e->getMessage());
    }
}

function getDataProductoArray($id)
{
    try
    {
        $result = [];

        include('conexion.php');
        $sql_pry = "SELECT producto_resultado_descripcion
        FROM x_producto_resultado c
        where proyecto_id = '".$id."' ";
        $res = $cn->query($sql_pry);
       
        while($row = $res->fetch_array())
        {
            array_push ( $result , $row );
        }

        return $result;
    }catch(Exception $e){
        die("Error" . $e->getMessage());
    }
}


function getDataIntangible($id){
    try {
        include('conexion.php');
        $sql_pry = "SELECT 
                        id,
                        regional,
                        codigo_centro,
                        nombre_centro,
                        nombre_funcionario,
                        cargo_funcionario,
                        tipo_vinculacion_funcionario,
                        correo_electronico_funcionario,
                        numero_ip_funcionario,
                        tipo_intangible,
                        clase_intangible,
                        fecha_adquisicion,
                        costo_total,
                        activo_en_uso,
                        inconvenientes_informacion,
                        nombre_intangible,
                        recurso_contralado,
                        control_sobre_intangible,
                        potencial_servicios,
                        justificacion_respuesta_potencial,
                        intangible_medir,
                        justificacion_respuesta_medir,
                        identificar_intangible,
                        justificacion_respuesta_identificar,
                        intangible_monetario,
                        justificacion_respuesta_monetario,
                        intangible_apariencia_fisica,
                        justifique_respuesta_apariencia,
                        utilizar_mas_ano,
                        justifique_respuesta_utilizar,
                        numero_factura,
                        intangible_finita_infinita,
                        fecha_utilizacion,
                        evidencias,
                        observacion,
                        link_evidencias,
                        cod_intangible,
                        evaluado,
                        link_sharepoint 
                    FROM intangible_informacion
                    where cod_intangible = '".$id."' limit 1";
        $res = $cn->query($sql_pry);
        return $res;
    } catch (\Throwable $th) {
        die("Error" . $e->getMessage());
    }
}