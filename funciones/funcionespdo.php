<?php

class datos extends Conexion{
    public function datos(){
        parent::Conexion();
    }

    //********funciones que no son insertar pero hacen parte de tres variables de insercion ********/

        //*****devuelve el número consecutvio sin letras ej: 5720 */
        //*****devuelve el número consecutvio sin letras ej: 5720 */
        //*****devuelve el número consecutvio sin letras ej: 5720 */
    public function getNumeroConsecutivo(){
        $consulta2 = "select * from x_informacion_centro";

        $preparada = $this->conexion_db->prepare($consulta2);
        $preparada->execute(array());
        $resultado=$preparada->fetchAll(PDO::FETCH_ASSOC);

        $num_consecutivo="nada";

        foreach($resultado as $elemento){
            $num_consecutivo = $elemento['proyecto_num_consecutivo'];
        }

        $preparada->closeCursor();
        return $num_consecutivo + 1;

        $this->conexion_db=null;
    }

    //*****devuelve el código consecutivo ej: sgps-5720-2019 */
    //*****devuelve el código consecutivo ej: sgps-5720-2019 */
    //*****devuelve el código consecutivo ej: sgps-5720-2019 */
    public function getConsecutivo(){
        return "SGPS-" . $this->getNumeroConsecutivo() . "-2019";
    }

    //*****devuelve la fecha actual */
    //*****devuelve la fecha actual */
    //*****devuelve la fecha actual */
    public function getFecha(){
        date_default_timezone_set("America/Bogota");
        $fecha = date("d-m-Y");
        return $fecha;
    }
}




?>
