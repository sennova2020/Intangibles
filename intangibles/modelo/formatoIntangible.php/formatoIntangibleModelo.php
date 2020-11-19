<?php

class insertar extends Conexion{

        public function __construct(){
            parent::__construct();           
        }   

        public function insertar_preguntas(){
            $cod_intangible ="";
            $consulta = "UPDATE x_intangibles_preguntas SET pregunta20=:pregunta1, pregunta21=:pregunta2, pregunta22=:pregunta3, pregunta23=:pregunta4, pregunta24=:pregunta6, pregunta25=:pregunta7, pregunta26=:pregunta8, pregunta27=:pregunta9, fecha= now() 
            WHERE  cod_intangible=:cod_intangible";

                $preparada = $this->conexion_db->prepare($consulta); 
                
                $pregunta1 = isset($_POST["pregunta1"])?$_POST["pregunta1"]:"";
                $pregunta2 = isset($_POST["pregunta2"])?$_POST["pregunta2"]:"";
                $pregunta3 = isset($_POST["pregunta3"])?$_POST["pregunta3"]:"";
                $pregunta4 = isset($_POST["pregunta4"])?$_POST["pregunta4"]:"";
                $pregunta6 = isset($_POST["pregunta6"])?$_POST["pregunta6"]:"";
                $pregunta7 = isset($_POST["pregunta7"])?$_POST["pregunta7"]:"";
                $pregunta8 = isset($_POST["pregunta8"])?$_POST["pregunta8"]:"";
                $pregunta9 = isset($_POST["pregunta9"])?$_POST["pregunta9"]:"";

                $cod_intangible = $_POST["cod_intangible"];

                $preparada->bindValue(":pregunta1", $pregunta1);
                $preparada->bindValue(":pregunta2", $pregunta2);
                $preparada->bindValue(":pregunta3", $pregunta3);
                $preparada->bindValue(":pregunta4", $pregunta4);
                $preparada->bindValue(":pregunta6", $pregunta6);
                $preparada->bindValue(":pregunta7", $pregunta7);
                $preparada->bindValue(":pregunta8", $pregunta8);
                $preparada->bindValue(":pregunta9", $pregunta9);

                $preparada->bindValue(":cod_intangible", $cod_intangible);
                $preparada->execute();            
                
                if($preparada){
                $resultado = "realizado  informacion centro _ principal";
                }else{
                    $resultado = "no realizado informacion centro _ principal";
                }
                $preparada->closeCursor();

            if($pregunta9 == "si")
            {
                $facturaTabla = isset($_POST["facturas"])?$_POST["facturas"]:"";
                $filas = explode("|", $facturaTabla);

                foreach($filas as $fila)
                {
                if($fila != '')
                {
                    $consulta = "INSERT INTO intangible_pregunta_factura(
                    numero_factura, factura_a_nombre_sena, fecha_factura, valor_total, tiene_iva, iva, concepto,  valor_concepto, es_necesario, cod_intangible, fase_intangible, fecha) VALUES (
                    :numero_factura, :factura_a_nombre_sena, :fecha_factura, :valor_total, :tiene_iva, :iva, :concepto,  :valor_concepto, :es_necesario, :cod_intangible, :fase_intangible, now() )";
                    $columnas = explode("^", $fila);

                    $numero_factura= $columnas[1];
                    $factura_a_nombre_sena= $columnas[2] == "si"? true: false;
                    $fecha_factura= $columnas[3];
                    $valor_total= $columnas[4];
                    $tiene_iva= $columnas[5]== "si"? true: false;
                    $iva= $columnas[6];
                    $concepto= $columnas[7];
                    $valor_concepto= $columnas[8];
                    $es_necesario= $columnas[9]== "si"? true: false;
                    $fase_intangible = $columnas[10];      
                    $preparada3 = $this->conexion_db->prepare($consulta);
                    $preparada3->bindValue(":numero_factura", $numero_factura);
                    $preparada3->bindValue(":factura_a_nombre_sena", $factura_a_nombre_sena);
                    $preparada3->bindValue(":fecha_factura", $fecha_factura);
                    $preparada3->bindValue(":valor_total", $valor_total);
                    $preparada3->bindValue(":tiene_iva", $tiene_iva);
                    $preparada3->bindValue(":iva", $iva);
                    $preparada3->bindValue(":concepto", $concepto);
                    $preparada3->bindValue(":valor_concepto", $valor_concepto);
                    $preparada3->bindValue(":es_necesario", $es_necesario);
                    $preparada3->bindValue(":cod_intangible", $cod_intangible);
                    $preparada3->bindValue(":fase_intangible", $fase_intangible);
                    $preparada3->execute();   
                    $preparada3->closeCursor();

                }
                }
            }

                $consulta1 = "update intangible_informacion set evaluado = true where cod_intangible = '".$cod_intangible."'";
                $preparada = $this->conexion_db->prepare($consulta1);
                $preparada->execute();  
                $preparada->closeCursor();

                if($preparada){
                $resultado = "realizado  informacion centro _ principal";
            }else{
                $resultado = "no realizado informacion centro _ principal";
            }

            $this->conexion_db=null;
            return $resultado;
        }
    }

?>