<?php
    try{

        $respuesta = "";

        $base = new PDO("mysql:host=localhost;dbname=sennova_formulario", "root", "1842");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql="select * from usuarioslider where documento = :login and contrasena = :passw";

        $resultado=$base->prepare($sql);

        $login=htmlentities(addslashes($_POST["cedula"]));
        $password=htmlentities(addslashes($_POST["contra"]));

        $resultado->bindValue(":login", $login);
        $resultado->bindValue(":passw", $password);

        $resultado->execute();

        if($rs = $resultado->fetch()){
            session_start();
            $_SESSION['tiempo'] = time();
            $_SESSION["id"] = $_POST["cedula"];
            $_SESSION["centro"] = $rs[0];
            $respuesta= $rs[0];
        }else{
            $respuesta = "-1";
        }
        echo $respuesta;
        
    }catch(Exception $e){
        die("Error" . $e->getMessage());
    }

?>
