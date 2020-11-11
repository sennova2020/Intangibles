<?php

    require "conexionpdo.php";

    class insertar extends Conexion{
        
        public function insertar(){
            parent::__construct();           
        }   
        
        //***********insertar en la tabla principal  */
        public function insertar_x_informacion_centro(){      
            
            

            $consulta = "INSERT INTO x_informacion_centro(proyecto_num_consecutivo, proyecto_consecutivo, proyecto_fecha, linea_programatica_id, modernizacion_id, regional_id, centro_id, subdirector_id, subdirector_celular, proyecto_nombre_autor, proyecto_cc_autor, proyecto_email_autor, proyecto_celular_autor, grupo_lac_id, proyecto_linea_investigacion) VALUES (
            :proyecto_num_consecutivo,
            :proyecto_consecutivo,
            :proyecto_fecha,
            :linea_programatica_id,
            :modernizacion_id,
            :regional_id,
            :centro_id,
            :subdirector_id,
            :subdirector_celular,
            :proyecto_nombre_autor,
            :proyecto_cc_autor,
            :proyecto_email_autor,
            :proyecto_celular_autor,
            :grupo_lac_id,
            :proyecto_linea_investigacion)";

            $preparada = $this->conexion_db->prepare($consulta); 
            
            $preparada->bindValue(":proyecto_num_consecutivo", $proyecto_num_consecutivo);
            $preparada->bindValue(":proyecto_consecutivo", $proyecto_consecutivo);
            $preparada->bindValue(":proyecto_fecha", $proyecto_fecha);
            $preparada->bindValue(":linea_programatica_id", $linea_programatica_id);
            $preparada->bindValue(":modernizacion_id", $modernizacion_id);
            $preparada->bindValue(":regional_id", $regional_id);
            $preparada->bindValue(":centro_id", $centro_id);
            $preparada->bindValue(":subdirector_id", $subdirector_id);
            $preparada->bindValue(":subdirector_celular", $subdirector_celular);
            $preparada->bindValue(":proyecto_nombre_autor", $proyecto_nombre_autor);
            $preparada->bindValue(":proyecto_cc_autor", $proyecto_cc_autor);
            $preparada->bindValue(":proyecto_email_autor", $proyecto_email_autor);
            $preparada->bindValue(":proyecto_celular_autor", $proyecto_celular_autor);
            $preparada->bindValue(":grupo_lac_id", $grupo_lac_id);   
            $preparada->bindValue(":proyecto_linea_investigacion", $proyecto_linea_investigacion);
            
            $preparada->execute();            
            
            if($preparada){
               $resultado = "realizado  informacion centro _ principal";
            }else{
                $resultado = "no realizado informacion centro _ principal";
            }
            $preparada->closeCursor();
            return $resultado;
            
            $this->conexion_db=null;
            
        }    
        


        //********funciones que no son insertar pero hacen parte de tres variables de insercion ********/

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
        public function getConsecutivo(){
            return "SGPS-" . $this->getNumeroConsecutivo() . "-2019";
        }

        //*****devuelve la fecha actual */
        public function getFecha(){
            $fecha = date("d-m-Y");
            return $fecha;
        }

    }

    
    $insertar1 = new insertar();

    $vector_x_informacion_centro = (
    $proyecto_num_consecutivo = $this->getNumeroConsecutivo(),
    $proyecto_consecutivo = $this->getConsecutivo(),
    $proyecto_fecha = $this->getFecha(),
    $linea_programatica_id = $_POST["linea_programatica_id"],
    $modernizacion_id = $_POST["modernizacion_id"],
    $regional_id = $_POST["regional_id"],
    $centro_id = $_POST["centro_id"],
    $subdirector_id = $_POST["subdirector_id"],
    $subdirector_celular = $_POST["subdirector_celular"],
    $proyecto_nombre_autor = $_POST["proyecto_nombre_autor"],
    $proyecto_cc_autor = $_POST["proyecto_cc_autor"],
    $proyecto_email_autor = $_POST["proyecto_email_autor"],
    $proyecto_celular_autor = $_POST["proyecto_celular_autor"],
    $grupo_lac_id = $_POST["grupo_lac_id"],
    $proyecto_linea_investigacion = $_POST["proyecto_linea_investigacion"]
    )


    echo $insertar1->insertar_x_informacion_centro();
    
    



?>


<!--

    $consulta2 = "INSERT INTO proyecto
    (`proyecto_num_consecutivo`, `proyecto_consecutivo`, `proyecto_fecha`, `linea_programatica_id`, `modernizacion_id`, `regional_id`, `centro_id`, `subdirector_id`, `subdirector_celular`, `proyecto_nombre_autor`, `proyecto_cc_autor`, `proyecto_email_autor`, `proyecto_celular_autor`, `grupo_lac_id`, `proyecto_titulo`, `proyecto_resumen`, `innovacion_proyecto`, `area_conocimiento_id`, `sub_area_conocimiento_id`, `redes_conocimiento_id`, `proyecto_justificacion_redes`, `sector_economico_id`, `ciiu_estructura_general_id`, `ciiu_estructura_detallada_id`, `proyecto_tiempo`, `proyecto_fecha_inicio`, `proyecto_fecha_cierre`, `proyecto_link_video_proyecto`, `proyecto_economia_naranja`, `proyecto_economia_naranja_justificacion`, `componentes_innovadores_id`, `proyecto_antecedentes_generales`, `proyecto_pertinencia_proyecto`, `proyecto_planteamiento_problema_a`, `proyecto_planteamiento_problema_b`, `proyecto_justificacion`, `proyecto_metodologia`, `proyecto_bibliografia`, `proyecto_impacto_productivo`, `proyecto_impacto_ambiental`, `proyecto_impacto_social`, `proyecto_impacto_tecnologico`, `proyecto_impacto_centro_formacion`, `proyecto_numero_semilleros`, `proyecto_nombre_semilleros`, `proyecto_numero_municipios`, `proyecto_nombre_municipios`, `proyecto_numero_programas`, `proyecto_nombre_programas`, `proyecto_numero_aprendices`, `proyecto_nombre_aprendices`, `proyecto_linea_investigacion`) VALUES ('65465','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?'
    )";