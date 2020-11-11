<?php

require "conexionpdo.php";

class DevuelveProductos extends Conexion
{

    public function DevuelveProductos()
    {
        parent::Conexion();
    }

    public function getNumeroConsecutivo()
    {

        $consulta2 = "select * from x_informacion_centro";

        $preparada = $this->conexion_db->prepare($consulta2);
        $preparada->execute(array());
        $resultado = $preparada->fetchAll(PDO::FETCH_ASSOC);

        $num_consecutivo = "nada";

        foreach ($resultado as $elemento) {
            $num_consecutivo = $elemento['proyecto_num_consecutivo'];
        }

        $preparada->closeCursor();
        return $num_consecutivo;

        $this->conexion_db = null;
    }
}


$productos = new DevuelveProductos();
echo $productos->getNumeroConsecutivo();


?>





<!--

$info_califi_evaluador=htmlentities(addslashes($_POST["info_califi_evaluador"]));







$base2 = new PDO("mysql:host=localhost;dbname=formsennova", "root", "");
$base2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




$preparada=$base2->prepare($consulta2);


$preparada->bindValue(":info_califi_evaluador", $info_califi_evaluador);


$preparada->execute();