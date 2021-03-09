<?php
    require_once '../controladores/seguridad/rutas.php';
    try{

        $respuesta = "";

        $base = new PDO("mysql:host=localhost;dbname=sennova_formulario", "root", "");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql="select * from usuarioslider where documento = :login and contrasena = :passw";

        $resultado=$base->prepare($sql);

        $login=trim(htmlentities(addslashes($_POST["cedula"])));
        $password=trim(htmlentities(addslashes($_POST["contra"])));

        $resultado->bindValue(":login", $login);
        $resultado->bindValue(":passw", $password);

        $resultado->execute();

        if($rs = $resultado->fetch()){
            session_start();
            $_SESSION['tiempo'] = time();
            $_SESSION["id"] = trim($_POST["cedula"]);
            $_SESSION["centro"] = $rs[0];
            $_SESSION["rol"] = $rs[7];
            $respuesta= routesRol( $_SESSION["rol"]);
            
        }else{
            $respuesta = "-1";
        }

        echo $respuesta;
        
    }catch(Exception $e){
        die("Error" . $e->getMessage());
    }

?>
