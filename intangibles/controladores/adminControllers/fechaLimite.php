<?php
 require_once '../seguridad/adminSecurity.php';
 require_once '../../modelo/conexion/conexion.php';
 require_once '../../modelo/fechaLimite.php';
 adminRol(2);

    $fecha = trim($_POST['date']);
    $motivo = trim($_POST['motivo']);
    $user = trim($_SESSION['id']);
    $create = date("Y-m-d h:m:s");
    if ($fecha !='' &&  $motivo !='') {
        $modelo =  new fechaLimite();
        $result = $modelo->create($fecha,$motivo,$user,$create);

        echo $result;
    }else{
        echo 'Invalid2';
    }

?>