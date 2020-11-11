<?php

    require "conexionpdo.php";
    require "funcionespdo.php";

    class insertar extends Conexion{
        
        public function insertar(){
            parent::__construct();           
        }   
        
        //***********insertar en la tabla principal  */        
        //***********insertar en la tabla principal  */        
        //***********insertar en la tabla principal  */        
        //***********insertar en la tabla principal  */   
        
        
        public function insertar_x_informacion_centro(){  

            $datosg = new datos();
            //****trayendo variables del formualrio por método post***/
            $proyecto_num_consecutivo = $datosg->getNumeroConsecutivo();
            $proyecto_consecutivo = $datosg->getConsecutivo();
            $proyecto_fecha = $datosg->getFecha();
            $linea_programatica_id = $_POST["linea_programatica_id"];
            $modernizacion_id = $_POST["modernizacion_id"];
            $regional_id = $_POST["regional_id"];
            $centro_id = $_POST["centro_id"];
            $subdirector_id = $_POST["subdirector_id"];
            $subdirector_celular = $_POST["subdirector_celular"];
            $proyecto_nombre_autor = $_POST["proyecto_nombre_autor"];
            $proyecto_cc_autor = $_POST["proyecto_cc_autor"];
            $proyecto_email_autor = $_POST["proyecto_email_autor"];
            $proyecto_celular_autor = $_POST["proyecto_celular_autor"];
            $grupo_lac_id = $_POST["grupo_lac_id"];
            $proyecto_linea_investigacion = $_POST["proyecto_linea_investigacion"]; 

            //***consulta para insertar a la base de datos por medio de parámetros de dos puntos o marcadores*/
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

            //*****convirtiendo la consulta a preparada */    
            $preparada = $this->conexion_db->prepare($consulta); 
            
            //*****sincronizando  marcadores con variables*/
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
            
            //*****ejecutando la consulta */
            $preparada->execute();             

            if($preparada){
               $resultado = "realizado_principal";
            }else{
                $resultado = "no realizado informacion centro _ principal";
            }

            //***cerrando consultas */
            $preparada->closeCursor();

            //****devolviendo resultado */
            return $resultado;

             //***cerrando conexiones */
            $this->conexion_db=null;            
        }  
        
        
        //***********insertar en x informacion proyecto  */
        //***********insertar en x informacion proyecto  */
        //***********insertar en x informacion proyecto  */
        //***********insertar en x informacion proyecto  */

      
        public function insertar_x_informacion_proyecto(){  

            $datosg = new datos();
            //****trayendo variables del formualrio por método post***/
            
            $proyecto_consecutivo = $datosg->getConsecutivo();            
            $proyecto_titulo = $_POST["proyecto_titulo"];
            $proyecto_resumen = $_POST["proyecto_resumen"];
            $innovacion_proyecto = $_POST["innovacion_proyecto"];
            $area_conocimiento_id = $_POST["area_conocimiento_id"];
            $sub_area_conocimiento_id = $_POST["sub_area_conocimiento_id"];
            $redes_conocimiento_id = $_POST["redes_conocimiento_id"];
            $proyecto_justificacion_redes = $_POST["proyecto_justificacion_redes"];
            $sector_economico_id = $_POST["sector_economico_id"];
            $ciiu_estructura_general_id = $_POST["sector_economico_id"];
            $ciiu_estructura_detallada_id = $_POST["ciiu_estructura_detallada_id"];
            $proyecto_tiempo = $_POST["proyecto_tiempo"];
            $proyecto_fecha_inicio = $_POST["proyecto_fecha_inicio"]; 
            $proyecto_fecha_cierre = $_POST["proyecto_fecha_cierre"]; 
            $proyecto_link_video_proyecto = $_POST["proyecto_link_video_proyecto"];
            $proyecto_economia_naranja = $_POST["proyecto_economia_naranja"]; 
            $proyecto_economia_naranja_justificacion = $_POST["proyecto_economia_naranja_justificacion"]; 
            $componentes_innovadores_id = $_POST["componentes_innovadores_id"]; 
            $proyecto_antecedentes_generales = $_POST["proyecto_antecedentes_generales"]; 
            $proyecto_pertinencia_proyecto = $_POST["proyecto_pertinencia_proyecto"]; 
            $proyecto_planteamiento_problema_a = $_POST["proyecto_planteamiento_problema_a"]; 
            $proyecto_planteamiento_problema_b = $_POST["proyecto_planteamiento_problema_b"]; 
            $proyecto_justificacion = $_POST["proyecto_justificacion"]; 
            $proyecto_metodologia = $_POST["proyecto_metodologia"]; 
            $proyecto_bibliografia = $_POST["proyecto_bibliografia"]; 

            //***consulta para insertar a la base de datos por medio de parámetros de dos puntos o marcadores*/
            $consulta = "INSERT INTO x_informacion_proyecto(proyecto_consecutivo, proyecto_titulo, proyecto_resumen, innovacion_proyecto, area_conocimiento_id, sub_area_conocimiento_id, redes_conocimiento_id, proyecto_justificacion_redes, sector_economico_id, ciiu_estructura_general_id, ciiu_estructura_detallada_id, proyecto_tiempo, proyecto_fecha_inicio, proyecto_fecha_cierre, proyecto_link_video_proyecto, proyecto_economia_naranja, proyecto_economia_naranja_justificacion, componentes_innovadores_id, proyecto_antecedentes_generales, proyecto_pertinencia_proyecto, proyecto_planteamiento_problema_a, proyecto_planteamiento_problema_b, proyecto_justificacion, proyecto_metodologia, proyecto_bibliografia)
             VALUES (
            :proyecto_consecutivo, 
            :proyecto_titulo, 
            :proyecto_resumen, 
            :innovacion_proyecto, 
            :area_conocimiento_id, 
            :sub_area_conocimiento_id, 
            :redes_conocimiento_id, 
            :proyecto_justificacion_redes, 
            :sector_economico_id, 
            :ciiu_estructura_general_id, 
            :ciiu_estructura_detallada_id, 
            :proyecto_tiempo, 
            :proyecto_fecha_inicio, 
            :proyecto_fecha_cierre, 
            :proyecto_link_video_proyecto, 
            :proyecto_economia_naranja, 
            :proyecto_economia_naranja_justificacion, 
            :componentes_innovadores_id, 
            :proyecto_antecedentes_generales, 
            :proyecto_pertinencia_proyecto, 
            :proyecto_planteamiento_problema_a, 
            :proyecto_planteamiento_problema_b, 
            :proyecto_justificacion, 
            :proyecto_metodologia, 
            :proyecto_bibliografia);";

            //*****convirtiendo la consulta a preparada */    
            $preparada = $this->conexion_db->prepare($consulta); 
            
            //*****sincronizando  marcadores con variables*/
            $preparada->bindValue(":proyecto_consecutivo", $proyecto_consecutivo);
            $preparada->bindValue(":proyecto_titulo", $proyecto_titulo);
            $preparada->bindValue(":proyecto_resumen", $proyecto_resumen);
            $preparada->bindValue(":innovacion_proyecto", $innovacion_proyecto);
            $preparada->bindValue(":area_conocimiento_id", $area_conocimiento_id);
            $preparada->bindValue(":sub_area_conocimiento_id", $sub_area_conocimiento_id);
            $preparada->bindValue(":redes_conocimiento_id", $redes_conocimiento_id);
            $preparada->bindValue(":proyecto_justificacion_redes", $proyecto_justificacion_redes);
            $preparada->bindValue(":sector_economico_id", $sector_economico_id);
            $preparada->bindValue(":ciiu_estructura_general_id", $ciiu_estructura_general_id);
            $preparada->bindValue(":ciiu_estructura_detallada_id", $ciiu_estructura_detallada_id);
            $preparada->bindValue(":proyecto_tiempo", $proyecto_tiempo);
            $preparada->bindValue(":proyecto_fecha_inicio", $proyecto_fecha_inicio);
            $preparada->bindValue(":proyecto_fecha_cierre", $proyecto_fecha_cierre);   
            $preparada->bindValue(":proyecto_link_video_proyecto", $proyecto_link_video_proyecto);
            $preparada->bindValue(":proyecto_economia_naranja", $proyecto_economia_naranja);   
            $preparada->bindValue(":proyecto_economia_naranja_justificacion", $proyecto_economia_naranja_justificacion);   
            $preparada->bindValue(":componentes_innovadores_id", $componentes_innovadores_id);   
            $preparada->bindValue(":proyecto_antecedentes_generales", $proyecto_antecedentes_generales);   
            $preparada->bindValue(":proyecto_pertinencia_proyecto", $proyecto_pertinencia_proyecto);   
            $preparada->bindValue(":proyecto_planteamiento_problema_a", $proyecto_planteamiento_problema_a);   
            $preparada->bindValue(":proyecto_planteamiento_problema_b", $proyecto_planteamiento_problema_b);   
            $preparada->bindValue(":proyecto_justificacion", $proyecto_justificacion);   
            $preparada->bindValue(":proyecto_metodologia", $proyecto_metodologia);   
            $preparada->bindValue(":proyecto_bibliografia", $proyecto_bibliografia);   
                       
            //*****ejecutando la consulta */
            $preparada->execute();             

            if($preparada){
               $resultado = "realizado_informacion_proyecto";
            }else{
                $resultado = "no realizado informacion proyecto";
            }

            //***cerrando consultas */
            $preparada->closeCursor();

            //****devolviendo resultado */
            return $resultado;

             //***cerrando conexiones */
            $this->conexion_db=null;            
        }



         //***********insertar en la tabla impacto  */        
         //***********insertar en la tabla impacto  */        
         //***********insertar en la tabla impacto  */        
         //***********insertar en la tabla impacto  */   
         
         
         public function insertar_x_impacto(){  

            $datosg = new datos();
            //****trayendo variables del formualrio por método post***/            
            $proyecto_consecutivo = $datosg->getConsecutivo();                
            $proyecto_impacto_productivo = $_POST["proyecto_impacto_productivo"];
            $proyecto_impacto_ambiental = $_POST["proyecto_impacto_ambiental"];
            $proyecto_impacto_social = $_POST["proyecto_impacto_social"];
            $proyecto_impacto_tecnologico = $_POST["proyecto_impacto_tecnologico"];
            $proyecto_impacto_centro_formacion = $_POST["proyecto_impacto_centro_formacion"];
            $proyecto_numero_semilleros = $_POST["proyecto_numero_semilleros"];
            $proyecto_nombre_semilleros = $_POST["proyecto_nombre_semilleros"];
            $proyecto_numero_municipios = $_POST["proyecto_numero_municipios"];
            $proyecto_nombre_municipios = $_POST["proyecto_nombre_municipios"];
            $proyecto_numero_programas = $_POST["proyecto_numero_programas"];
            $proyecto_nombre_programas = $_POST["proyecto_nombre_programas"];
            $proyecto_numero_aprendices = $_POST["proyecto_numero_aprendices"];
            $proyecto_nombre_aprendices = $_POST["proyecto_nombre_aprendices"];
            
            //***consulta para insertar a la base de datos por medio de parámetros de dos puntos o marcadores*/
            $consulta = "INSERT INTO x_impacto(proyecto_consecutivo, proyecto_impacto_productivo, proyecto_impacto_ambiental, proyecto_impacto_social, proyecto_impacto_tecnologico, proyecto_impacto_centro_formacion, proyecto_numero_semilleros, proyecto_nombre_semilleros, proyecto_numero_municipios, proyecto_nombre_municipios, proyecto_numero_programas, proyecto_nombre_programas, proyecto_numero_aprendices, proyecto_nombre_aprendices)
             VALUES (
            :proyecto_consecutivo, 
            :proyecto_impacto_productivo, 
            :proyecto_impacto_ambiental, 
            :proyecto_impacto_social, 
            :proyecto_impacto_tecnologico, 
            :proyecto_impacto_centro_formacion, 
            :proyecto_numero_semilleros, 
            :proyecto_nombre_semilleros, 
            :proyecto_numero_municipios, 
            :proyecto_nombre_municipios, 
            :proyecto_numero_programas, 
            :proyecto_nombre_programas, 
            :proyecto_numero_aprendices, 
            :proyecto_nombre_aprendices)";

            //*****convirtiendo la consulta a preparada */    
            $preparada = $this->conexion_db->prepare($consulta); 
            
            //*****sincronizando  marcadores con variables*/
            $preparada->bindValue(":proyecto_consecutivo", $proyecto_consecutivo);
            $preparada->bindValue(":proyecto_impacto_productivo", $proyecto_impacto_productivo);
            $preparada->bindValue(":proyecto_impacto_ambiental", $proyecto_impacto_ambiental);
            $preparada->bindValue(":proyecto_impacto_social", $proyecto_impacto_social);
            $preparada->bindValue(":proyecto_impacto_tecnologico", $proyecto_impacto_tecnologico);
            $preparada->bindValue(":proyecto_impacto_centro_formacion", $proyecto_impacto_centro_formacion);
            $preparada->bindValue(":proyecto_numero_semilleros", $proyecto_numero_semilleros);
            $preparada->bindValue(":proyecto_nombre_semilleros", $proyecto_nombre_semilleros);
            $preparada->bindValue(":proyecto_numero_municipios", $proyecto_numero_municipios);
            $preparada->bindValue(":proyecto_nombre_municipios", $proyecto_nombre_municipios);
            $preparada->bindValue(":proyecto_numero_programas", $proyecto_numero_programas);
            $preparada->bindValue(":proyecto_nombre_programas", $proyecto_nombre_programas);
            $preparada->bindValue(":proyecto_numero_aprendices", $proyecto_numero_aprendices);
            $preparada->bindValue(":proyecto_nombre_aprendices", $proyecto_nombre_aprendices);            
            
            //*****ejecutando la consulta */
            $preparada->execute();             

            if($preparada){
               $resultado = "realizado_impacto";
            }else{
                $resultado = "no realizado informacion impacto";
            }

            //***cerrando consultas */
            $preparada->closeCursor();

            //****devolviendo resultado */
            return $resultado;

             //***cerrando conexiones */
            $this->conexion_db=null;            
        }  

  

    //***********insertar en la tabla obetivo  */        
    //***********insertar en la tabla obetivo  */        
    //***********insertar en la tabla obetivo  */        
    //***********insertar en la tabla obetivo  */ 

    public function insertar_x_objetivo(){  
        $resultado = "";
        $datosg = new datos();
        //****trayendo variables del formualrio por método post***/ 
        $proyecto_id = $datosg->getConsecutivo();         

        $objetivo_descripcion = $_POST["objetivo_descripcion"];          
        
        $objetivo_descripcion1 = $_POST["objetivo_descripcion1"];
        $objetivo_actividad1 = $_POST["objetivo_actividad1"];
        $objetivo_resultado1 = $_POST["objetivo_resultado1"];        

        $objetivo_descripcion2 = $_POST["objetivo_descripcion2"];
        $objetivo_actividad2 = $_POST["objetivo_actividad2"];
        $objetivo_resultado2 = $_POST["objetivo_resultado2"];
        
        $objetivo_descripcion3 = $_POST["objetivo_descripcion3"];
        $objetivo_actividad3 = $_POST["objetivo_actividad3"];
        $objetivo_resultado3 = $_POST["objetivo_resultado3"];

        $objetivo_descripcion4 = $_POST["objetivo_descripcion4"];
        $objetivo_actividad4 = $_POST["objetivo_actividad4"];
        $objetivo_resultado4 = $_POST["objetivo_resultado4"];

        //***consulta para insertar a la base de datos por medio de parámetros de dos puntos o marcadores*/
        $consulta = "INSERT INTO x_objetivo(objetivo_descripcion, tipo_objetivo_id, proyecto_id)
        VALUES (
        :objetivo_descripcion,         
        :tipo_objetivo_id, 
        :proyecto_id);"; 
        
        $consulta1 = "INSERT INTO x_objetivo(objetivo_descripcion, objetivo_actividad, objetivo_resultado, tipo_objetivo_id, proyecto_id)
        VALUES (
        :objetivo_descripcion, 
        :objetivo_actividad, 
        :objetivo_resultado, 
        :tipo_objetivo_id, 
        :proyecto_id);"; 

      
        //000*****convirtiendo la consulta a preparada */    
        $preparada = $this->conexion_db->prepare($consulta); 

        //000*****sincronizando  marcadores con variables*/
        $preparada->bindValue(":objetivo_descripcion", $objetivo_descripcion);
        $preparada->bindValue(":tipo_objetivo_id", "1");
        $preparada->bindValue(":proyecto_id", $proyecto_id);


        //111*****convirtiendo la consulta a preparada */    
        $preparada1 = $this->conexion_db->prepare($consulta1); 

        //111*****sincronizando  marcadores con variables*/
        $preparada1->bindValue(":objetivo_descripcion", $objetivo_descripcion1);
        $preparada1->bindValue(":objetivo_actividad", $objetivo_actividad1);
        $preparada1->bindValue(":objetivo_resultado", $objetivo_resultado1);
        $preparada1->bindValue(":tipo_objetivo_id", "2");
        $preparada1->bindValue(":proyecto_id", $proyecto_id);

        //222*****convirtiendo la consulta a preparada */    
        $preparada2 = $this->conexion_db->prepare($consulta1); 

        //222*****sincronizando  marcadores con variables*/
        $preparada2->bindValue(":objetivo_descripcion", $objetivo_descripcion2);
        $preparada2->bindValue(":objetivo_actividad", $objetivo_actividad2);
        $preparada2->bindValue(":objetivo_resultado", $objetivo_resultado2);
        $preparada2->bindValue(":tipo_objetivo_id", "2");
        $preparada2->bindValue(":proyecto_id", $proyecto_id);

        //333*****convirtiendo la consulta a preparada */    
        $preparada3 = $this->conexion_db->prepare($consulta1); 

        //333*****sincronizando  marcadores con variables*/
        $preparada3->bindValue(":objetivo_descripcion", $objetivo_descripcion3);
        $preparada3->bindValue(":objetivo_actividad", $objetivo_actividad3);
        $preparada3->bindValue(":objetivo_resultado", $objetivo_resultado3);
        $preparada3->bindValue(":tipo_objetivo_id", "2");
        $preparada3->bindValue(":proyecto_id", $proyecto_id);

        //444*****convirtiendo la consulta a preparada */    
        $preparada4 = $this->conexion_db->prepare($consulta1); 

        //444*****sincronizando  marcadores con variables*/
        $preparada4->bindValue(":objetivo_descripcion", $objetivo_descripcion4);
        $preparada4->bindValue(":objetivo_actividad", $objetivo_actividad4);
        $preparada4->bindValue(":objetivo_resultado", $objetivo_resultado4);
        $preparada4->bindValue(":tipo_objetivo_id", "2");
        $preparada4->bindValue(":proyecto_id", $proyecto_id);

        
        //*****ejecutando la consulta */
        $preparada->execute();
        $preparada1->execute();  
        $preparada2->execute();  
        
        if($preparada){
            $resultado .= "realizado  objetivo general <br>";
        }else{
            $resultado .= "no realizado objetivo general <br>";
        }

        if($preparada1){
            $resultado .= "realizado  objetivo e1 <br>";
        }else{
            $resultado .= "no realizado objetivo e1 <br>";
        }

        if($preparada2){
            $resultado .= "realizado  objetivo e2 <br>";
        }else{
            $resultado .= "no realizado objetivo e2 <br>";
        }


        if($objetivo_descripcion3 != null){
            $preparada3->execute();
            if($preparada3){
                $resultado .= "realizado  objetivo e3 <br>";
            }else{
                $resultado .= "no realizado objetivo e3 <br>";
            }    
        }

        if($objetivo_descripcion4 != null){
            $preparada4->execute();
            if($preparada4){
                $resultado .= "realizado  objetivo e4 <br>";
            }else{
                $resultado .= "no realizado objetivo e4 <br>";
            }    
        }

        //***cerrando consultas */
        $preparada->closeCursor();
        $preparada1->closeCursor();
        $preparada2->closeCursor();
        $preparada3->closeCursor();
        $preparada4->closeCursor();

        //****devolviendo resultado */
        return $resultado;

            //***cerrando conexiones */
        $this->conexion_db=null;            
    }  


    //***********insertar en la tabla producto resultado  */        
    //***********insertar en la tabla producto resultado  */        
    //***********insertar en la tabla producto resultado  */        
    //***********insertar en la tabla producto resultado  */  
    
    
    public function insertar_x_producto_resultado(){  
        $resultado = "";
        $datosg = new datos();
        //****trayendo variables del formualrio por método post***/ 
        $proyecto_id = $datosg->getConsecutivo();    
        
        $producto_resultado_fecha_entrega1 = $_POST["producto_resultado_fecha_entrega1"];
        $producto_resultado_descripcion1 = $_POST["producto_resultado_descripcion1"];
        $producto_resultado_indicadores1 = $_POST["producto_resultado_indicadores1"]; 
        
        $producto_resultado_fecha_entrega2 = $_POST["producto_resultado_fecha_entrega2"];
        $producto_resultado_descripcion2 = $_POST["producto_resultado_descripcion2"];
        $producto_resultado_indicadores2 = $_POST["producto_resultado_indicadores2"]; 

        $producto_resultado_fecha_entrega3 = $_POST["producto_resultado_fecha_entrega3"];
        $producto_resultado_descripcion3 = $_POST["producto_resultado_descripcion3"];
        $producto_resultado_indicadores3 = $_POST["producto_resultado_indicadores3"]; 

        $producto_resultado_fecha_entrega4 = $_POST["producto_resultado_fecha_entrega4"];
        $producto_resultado_descripcion4 = $_POST["producto_resultado_descripcion4"];
        $producto_resultado_indicadores4 = $_POST["producto_resultado_indicadores4"]; 

        //***consulta para insertar a la base de datos por medio de parámetros de dos puntos o marcadores*/
        $consulta = "INSERT INTO x_producto_resultado(producto_resultado_fecha_entrega, producto_resultado_descripcion, producto_resultado_indicadores, proyecto_id) VALUES (
        :producto_resultado_fecha_entrega, 
        :producto_resultado_descripcion, 
        :producto_resultado_indicadores, 
        :proyecto_id);"; 
        
        //111*****convirtiendo la consulta a preparada */    
        $preparada1 = $this->conexion_db->prepare($consulta); 

        //111*****sincronizando  marcadores con variables*/
        $preparada1->bindValue(":producto_resultado_fecha_entrega", $producto_resultado_fecha_entrega1);
        $preparada1->bindValue(":producto_resultado_descripcion", $producto_resultado_descripcion1);
        $preparada1->bindValue(":producto_resultado_indicadores", $producto_resultado_indicadores1);
        $preparada1->bindValue(":proyecto_id", $proyecto_id);

        //222*****convirtiendo la consulta a preparada */    
        $preparada2 = $this->conexion_db->prepare($consulta); 

        //222*****sincronizando  marcadores con variables*/
        $preparada2->bindValue(":producto_resultado_fecha_entrega", $producto_resultado_fecha_entrega2);
        $preparada2->bindValue(":producto_resultado_descripcion", $producto_resultado_descripcion2);
        $preparada2->bindValue(":producto_resultado_indicadores", $producto_resultado_indicadores2);
        $preparada2->bindValue(":proyecto_id", $proyecto_id);

        //333*****convirtiendo la consulta a preparada */    
        $preparada3 = $this->conexion_db->prepare($consulta); 

        //333*****sincronizando  marcadores con variables*/
        $preparada3->bindValue(":producto_resultado_fecha_entrega", $producto_resultado_fecha_entrega3);
        $preparada3->bindValue(":producto_resultado_descripcion", $producto_resultado_descripcion3);
        $preparada3->bindValue(":producto_resultado_indicadores", $producto_resultado_indicadores3);
        $preparada3->bindValue(":proyecto_id", $proyecto_id);

        //444*****convirtiendo la consulta a preparada */    
        $preparada4 = $this->conexion_db->prepare($consulta); 

        //444*****sincronizando  marcadores con variables*/
        $preparada4->bindValue(":producto_resultado_fecha_entrega", $producto_resultado_fecha_entrega4);
        $preparada4->bindValue(":producto_resultado_descripcion", $producto_resultado_descripcion4);
        $preparada4->bindValue(":producto_resultado_indicadores", $producto_resultado_indicadores4);
        $preparada4->bindValue(":proyecto_id", $proyecto_id);
                
        //*****ejecutando la consulta */
        $preparada1->execute();      
        $preparada2->execute();      
        
        if($preparada1){
            $resultado .= "realizado  producto resultado 1 <br>";
        }else{
            $resultado .= "no realizado producto resultado 1 <br>";
        }

        if($preparada2){
            $resultado .= "realizado producto resultado 2 <br>";
        }else{
            $resultado .= "no realizado producto resultado 2 <br>";
        }

        if($producto_resultado_descripcion3 != null){
            $preparada3->execute();
            if($preparada3){
                $resultado .= "realizado producto resultado 3 <br>";
            }else{
                $resultado .= "no realizado producto resultado 3 <br>";
            }   
        }

        if($producto_resultado_descripcion4 != null){
            $preparada4->execute();
            if($preparada4){
                $resultado .= "realizado producto resultado 4 <br>";
            }else{
                $resultado .= "no realizado producto resultado 4 <br>";
            }    
        }

        //***cerrando consultas */       
        $preparada1->closeCursor();
        $preparada2->closeCursor();
        $preparada3->closeCursor();
        $preparada4->closeCursor();

        //****devolviendo resultado */
        return $resultado;

            //***cerrando conexiones */
        $this->conexion_db=null;            
    }  

    //***********insertar en la tabla modernizacion  */        
    //***********insertar en la tabla modernizacion  */        
    //***********insertar en la tabla modernizacion  */        
    //***********insertar en la tabla modernizacion  */  

    public function insertar_x_e_actualizacion_modernizacion(){  
        $resultado = "No aplica modernizacion";
        $datosg = new datos();
        //****trayendo variables del formualrio por método post***/            
        $proyecto_id = $datosg->getConsecutivo();                
        $infra_moder = $_POST["infra_moder"];
        $justif_moder = $_POST["justif_moder"];
        $reque_adecuacion = $_POST["reque_adecuacion"];
        $justif_adecuacion = $_POST["justif_adecuacion"];
        $num_empre_region = $_POST["num_empre_region"];
        $nom_nit_empre = $_POST["nom_nit_empre"];
        $nom_bienes = $_POST["nom_bienes"];
        $num_bienes = $_POST["num_bienes"];
        $num_nom_proyec_finan = $_POST["num_nom_proyec_finan"];
        $nom_cod_sgps_proyec = $_POST["nom_cod_sgps_proyec"];
        $presu_sgps_proyec = $_POST["presu_sgps_proyec"];
        $funcionarios_sennova = $_POST["funcionarios_sennova"];
        $nom_funcionarios = $_POST["nom_funcionarios"];
        $registro_manuales_projecto = $_POST["registro_manuales_projecto"];
        
        //***consulta para insertar a la base de datos por medio de parámetros de dos puntos o marcadores*/
        $consulta = "INSERT INTO x_e_actualizacion_modernizacion(infra_moder, justif_moder, reque_adecuacion, justif_adecuacion, num_empre_region, nom_nit_empre, nom_bienes, num_bienes, num_nom_proyec_finan, nom_cod_sgps_proyec, presu_sgps_proyec, funcionarios_sennova, nom_funcionarios, registro_manuales_projecto, proyecto_id)
         VALUES (
        :infra_moder, 
        :justif_moder, 
        :reque_adecuacion, 
        :justif_adecuacion, 
        :num_empre_region, 
        :nom_nit_empre, 
        :nom_bienes, 
        :num_bienes, 
        :num_nom_proyec_finan, 
        :nom_cod_sgps_proyec, 
        :presu_sgps_proyec, 
        :funcionarios_sennova, 
        :nom_funcionarios, 
        :registro_manuales_projecto, 
        :proyecto_id)";

        //*****convirtiendo la consulta a preparada */    
        $preparada = $this->conexion_db->prepare($consulta); 
        
        //*****sincronizando  marcadores con variables*/
        $preparada->bindValue(":infra_moder", $infra_moder);
        $preparada->bindValue(":justif_moder", $justif_moder);
        $preparada->bindValue(":reque_adecuacion", $reque_adecuacion);
        $preparada->bindValue(":justif_adecuacion", $justif_adecuacion);
        $preparada->bindValue(":num_empre_region", $num_empre_region);
        $preparada->bindValue(":nom_nit_empre", $nom_nit_empre);
        $preparada->bindValue(":nom_bienes", $nom_bienes);
        $preparada->bindValue(":num_bienes", $num_bienes);
        $preparada->bindValue(":num_nom_proyec_finan", $num_nom_proyec_finan);
        $preparada->bindValue(":nom_cod_sgps_proyec", $nom_cod_sgps_proyec);
        $preparada->bindValue(":presu_sgps_proyec", $presu_sgps_proyec);
        $preparada->bindValue(":funcionarios_sennova", $funcionarios_sennova);
        $preparada->bindValue(":nom_funcionarios", $nom_funcionarios);
        $preparada->bindValue(":registro_manuales_projecto", $registro_manuales_projecto);
        $preparada->bindValue(":proyecto_id", $proyecto_id);
               
        
        if($infra_moder != 0 && $infra_moder != null){
            //*****ejecutando la consulta */
            $preparada->execute();    
            if($preparada){
                $resultado = "realizado modernizacion";
            }else{
                $resultado = "no realizado modernizacion";
            }
        }
       

        //***cerrando consultas */
        $preparada->closeCursor();

        //****devolviendo resultado */
        return $resultado;

         //***cerrando conexiones */
        $this->conexion_db=null;            
    }  

    
    //***********insertar en la tabla cultura informacion  */        
    //***********insertar en la tabla cultura informacion  */        
    //***********insertar en la tabla cultura informacion  */        
    //***********insertar en la tabla cultura informacion  */  

    public function insertar_x_e_cultura_informacion(){  
        $resultado = "No aplica cultura informacion";
        $datosg = new datos();
        //****trayendo variables del formualrio por método post***/            
        $proyecto_id = $datosg->getConsecutivo();                
        $lugar = $_POST["lugar"];
        $cant_person = $_POST["cant_person"];
        $q_revista_memoria_issn = $_POST["q_revista_memoria_issn"];
        $cod_issn = $_POST["cod_issn"];
        $cant_person_sena = $_POST["cant_person_sena"];
        $num_empresario_invit = $_POST["num_empresario_invit"];
        $nom_empresas_invit = $_POST["nom_empresas_invit"];
        $memo_escrita = $_POST["memo_escrita"];
        $nom_integ_memoria_ponen_poster = $_POST["nom_integ_memoria_ponen_poster"];
        $linea_tematic_event = $_POST["linea_tematic_event"];
        $dur_event_dias = $_POST["dur_event_dias"];
        $centro_form_ali = $_POST["centro_form_ali"];
        $nom_num_person_contact = $_POST["nom_num_person_contact"];
        $justi_aliancia_ref = $_POST["justi_aliancia_ref"];
        $contrapartida_centro_form = $_POST["contrapartida_centro_form"];        
        
        //***consulta para insertar a la base de datos por medio de parámetros de dos puntos o marcadores*/
        $consulta = "INSERT INTO x_e_cultura_informacion(lugar, cant_person, q_revista_memoria_issn, cod_issn, cant_person_sena, num_empresario_invit, nom_empresas_invit, memo_escrita, nom_integ_memoria_ponen_poster, linea_tematic_event, dur_event_dias, centro_form_ali, nom_num_person_contact, justi_aliancia_ref, contrapartida_centro_form, proyecto_id) 
        VALUES (
            :lugar, 
            :cant_person, 
            :q_revista_memoria_issn, 
            :cod_issn, 
            :cant_person_sena, 
            :num_empresario_invit, 
            :nom_empresas_invit, 
            :memo_escrita, 
            :nom_integ_memoria_ponen_poster, 
            :linea_tematic_event, 
            :dur_event_dias, 
            :centro_form_ali, 
            :nom_num_person_contact, 
            :justi_aliancia_ref, 
            :contrapartida_centro_form, 
            :proyecto_id
        )";

        //*****convirtiendo la consulta a preparada */    
        $preparada = $this->conexion_db->prepare($consulta); 
        
        //*****sincronizando  marcadores con variables*/
        $preparada->bindValue(":lugar", $lugar);
        $preparada->bindValue(":cant_person", $cant_person);
        $preparada->bindValue(":q_revista_memoria_issn", $q_revista_memoria_issn);
        $preparada->bindValue(":cod_issn", $cod_issn);
        $preparada->bindValue(":cant_person_sena", $cant_person_sena);
        $preparada->bindValue(":num_empresario_invit", $num_empresario_invit);
        $preparada->bindValue(":nom_empresas_invit", $nom_empresas_invit);
        $preparada->bindValue(":memo_escrita", $memo_escrita);
        $preparada->bindValue(":nom_integ_memoria_ponen_poster", $nom_integ_memoria_ponen_poster);
        $preparada->bindValue(":linea_tematic_event", $linea_tematic_event);
        $preparada->bindValue(":dur_event_dias", $dur_event_dias);
        $preparada->bindValue(":centro_form_ali", $centro_form_ali);
        $preparada->bindValue(":nom_num_person_contact", $nom_num_person_contact);
        $preparada->bindValue(":justi_aliancia_ref", $justi_aliancia_ref);
        $preparada->bindValue(":contrapartida_centro_form", $contrapartida_centro_form);
        $preparada->bindValue(":proyecto_id", $proyecto_id);
               
        if($lugar != null){
            //*****ejecutando la consulta */
            $preparada->execute();    
            if($preparada){
                $resultado = "realizado cultura informacion";
            }else{
                $resultado = "no cultura informacion";
            }
        }
       
        //***cerrando consultas */
        $preparada->closeCursor();

        //****devolviendo resultado */
        return $resultado;

         //***cerrando conexiones */
        $this->conexion_db=null;            
    }  



    //*********** insertar en la tabla servicios tecnológicos *****/        
    //*********** insertar en la tabla servicios tecnológicos *****/        
    //*********** insertar en la tabla servicios tecnológicos *****/        
    //*********** insertar en la tabla servicios tecnológicos *****/  

    public function insertar_x_e_servicios_tecnologicos(){  
        $resultado = "No aplica servicios tecnológicos";
        $datosg = new datos();
        //****trayendo variables del formualrio por método post***/

        $proyecto_id = $datosg->getConsecutivo();                
        $q_serv_tecno = $_POST["q_serv_tecno"];
        $repot_serv_tecno = $_POST["repot_serv_tecno"];
        $q_calidad_serv_tecno = $_POST["q_calidad_serv_tecno"];
        $normas_serv_tecno = $_POST["normas_serv_tecno"];
        $q_acredita_objetivo_serv = $_POST["q_acredita_objetivo_serv"];
        $especifi_acredi_objetivo_serv = $_POST["especifi_acredi_objetivo_serv"];
        $q_reque_auditoria = $_POST["q_reque_auditoria"];
        $verif_nal_internal = $_POST["verif_nal_internal"];
        $q_implem_normas_tec = $_POST["q_implem_normas_tec"];
        $conocimiento_normas_implem = $_POST["conocimiento_normas_implem"];
        $q_funcio_implement = $_POST["q_funcio_implement"];
        $nom_funcio_implement = $_POST["nom_funcio_implement"];
        $q_incluy_guias_servi = $_POST["q_incluy_guias_servi"];
        $q_reque_ambiente = $_POST["q_reque_ambiente"];
        $especifi_equipo_ambiente = $_POST["especifi_equipo_ambiente"];
        $q_equipo_mantenimiento = $_POST["q_equipo_mantenimiento"];
        $q_prestadores_serv_nacional = $_POST["q_prestadores_serv_nacional"];
        $q_conoc_funcio_mantemiento = $_POST["q_conoc_funcio_mantemiento"];
        $nom_coe_funcio_mantemiento = $_POST["nom_coe_funcio_mantemiento"];
        $incluy_manuals_servi = $_POST["incluy_manuals_servi"];
        $q_mat_ref_medir_calib = $_POST["q_mat_ref_medir_calib"];
        $nom_mat_ref_medir_calib = $_POST["nom_mat_ref_medir_calib"];
        $q_infra_adecuada = $_POST["q_infra_adecuada"];
        $nom_infra_adecuada = $_POST["nom_infra_adecuada"];                  
        
        //***consulta para insertar a la base de datos por medio de parámetros de dos puntos o marcadores*/
        $consulta = "INSERT INTO x_e_servicios_tecnologicos(q_serv_tecno, repot_serv_tecno, q_calidad_serv_tecno, normas_serv_tecno, q_acredita_objetivo_serv, especifi_acredi_objetivo_serv, q_reque_auditoria, verif_nal_internal, q_implem_normas_tec, conocimiento_normas_implem, q_funcio_implement, nom_funcio_implement, q_incluy_guias_servi, q_reque_ambiente, especifi_equipo_ambiente, q_equipo_mantenimiento, q_prestadores_serv_nacional, q_conoc_funcio_mantemiento, nom_coe_funcio_mantemiento, incluy_manuals_servi, q_mat_ref_medir_calib, nom_mat_ref_medir_calib, q_infra_adecuada, nom_infra_adecuada, proyecto_id)
         VALUES (
        :q_serv_tecno, 
        :repot_serv_tecno, 
        :q_calidad_serv_tecno, 
        :normas_serv_tecno, 
        :q_acredita_objetivo_serv, 
        :especifi_acredi_objetivo_serv, 
        :q_reque_auditoria, 
        :verif_nal_internal, 
        :q_implem_normas_tec, 
        :conocimiento_normas_implem, 
        :q_funcio_implement, 
        :nom_funcio_implement, 
        :q_incluy_guias_servi, 
        :q_reque_ambiente, 
        :especifi_equipo_ambiente, 
        :q_equipo_mantenimiento, 
        :q_prestadores_serv_nacional, 
        :q_conoc_funcio_mantemiento, 
        :nom_coe_funcio_mantemiento, 
        :incluy_manuals_servi, 
        :q_mat_ref_medir_calib, 
        :nom_mat_ref_medir_calib, 
        :q_infra_adecuada, 
        :nom_infra_adecuada, 
        :proyecto_id)";

        //*****convirtiendo la consulta a preparada */    
        $preparada = $this->conexion_db->prepare($consulta); 
        
        //*****sincronizando  marcadores con variables*/
        $preparada->bindValue(":q_serv_tecno", $q_serv_tecno);
        $preparada->bindValue(":repot_serv_tecno", $repot_serv_tecno);
        $preparada->bindValue(":q_calidad_serv_tecno", $q_calidad_serv_tecno);
        $preparada->bindValue(":normas_serv_tecno", $normas_serv_tecno);
        $preparada->bindValue(":q_acredita_objetivo_serv", $q_acredita_objetivo_serv);
        $preparada->bindValue(":especifi_acredi_objetivo_serv", $especifi_acredi_objetivo_serv);
        $preparada->bindValue(":q_reque_auditoria", $q_reque_auditoria);
        $preparada->bindValue(":verif_nal_internal", $verif_nal_internal);
        $preparada->bindValue(":q_implem_normas_tec", $q_implem_normas_tec);
        $preparada->bindValue(":conocimiento_normas_implem", $conocimiento_normas_implem);
        $preparada->bindValue(":q_funcio_implement", $q_funcio_implement);
        $preparada->bindValue(":nom_funcio_implement", $nom_funcio_implement);
        $preparada->bindValue(":q_incluy_guias_servi", $q_incluy_guias_servi);
        $preparada->bindValue(":q_reque_ambiente", $q_reque_ambiente);
        $preparada->bindValue(":especifi_equipo_ambiente", $especifi_equipo_ambiente);
        $preparada->bindValue(":q_equipo_mantenimiento", $q_equipo_mantenimiento);
        $preparada->bindValue(":q_prestadores_serv_nacional", $q_prestadores_serv_nacional);
        $preparada->bindValue(":q_conoc_funcio_mantemiento", $q_conoc_funcio_mantemiento);
        $preparada->bindValue(":nom_coe_funcio_mantemiento", $nom_coe_funcio_mantemiento);
        $preparada->bindValue(":incluy_manuals_servi", $incluy_manuals_servi);
        $preparada->bindValue(":q_mat_ref_medir_calib", $q_mat_ref_medir_calib);
        $preparada->bindValue(":nom_mat_ref_medir_calib", $nom_mat_ref_medir_calib);
        $preparada->bindValue(":q_infra_adecuada", $q_infra_adecuada);
        $preparada->bindValue(":nom_infra_adecuada", $nom_infra_adecuada);
        $preparada->bindValue(":proyecto_id", $proyecto_id);       
               
        if($q_serv_tecno != 0){
            //*****ejecutando la consulta */
            $preparada->execute();    
            if($preparada){
                $resultado = "realizado servicios tecnológicos";
            }else{
                $resultado = "no cultura servicios tecnológicos";
            }
        }
       
        //***cerrando consultas */
        $preparada->closeCursor();

        //****devolviendo resultado */
        return $resultado;

         //***cerrando conexiones */
        $this->conexion_db=null;            
    }  


    
    //*********** insertar en la tabla Entidad aliada 1 *****/        
    //*********** insertar en la tabla Entidad aliada 1 *****/        
    //*********** insertar en la tabla Entidad aliada 1 *****/        
    //*********** insertar en la tabla Entidad aliada 1 *****/  

    public function insertar_x_entidad_aliada1(){  
        $resultado = "No se ha registrado entidad aliada 1";
        $datosg = new datos();
        //****trayendo variables del formualrio por método post***/

        $proyecto_id = $datosg->getConsecutivo();                
        $nombre_entidad = $_POST["nombre_entidad"];
        $distri_responsi = $_POST["distri_responsi"];
        $natu_entidad = $_POST["natu_entidad"];
        $clasi_empresa = $_POST["clasi_empresa"];
        $nit = $_POST["nit"];
        $convenio = $_POST["convenio"];
        $tipo_cod_convenio = $_POST["tipo_cod_convenio"];
        $nombre_parti = $_POST["nombre_parti"];
        $numid_integ = $_POST["numid_integ"];
        $email_integ = $_POST["email_integ"];
        $cel_integ = $_POST["cel_integ"];
        $recur_entidad_ext = $_POST["recur_entidad_ext"];
        $desc_recur_entidad_ext = $_POST["desc_recur_entidad_ext"];
        $dinero_ent_exter = $_POST["dinero_ent_exter"];
        $desc_dest_recur = $_POST["desc_dest_recur"];
        $nom_grup_inves_lac = $_POST["nom_grup_inves_lac"];
        $cod_glac_aliada = $_POST["cod_glac_aliada"];
        $link_glac_ent = $_POST["link_glac_ent"];
        $m_a_cent_form = $_POST["m_a_cent_form"];
                
        //***consulta para insertar a la base de datos por medio de parámetros de dos puntos o marcadores*/
        $consulta = "INSERT INTO x_entidad_aliada(nombre_entidad, distri_responsi, natu_entidad, clasi_empresa, nit, convenio, tipo_cod_convenio, nombre_parti, numid_integ, email_integ, cel_integ, recur_entidad_ext, desc_recur_entidad_ext, dinero_ent_exter, desc_dest_recur, nom_grup_inves_lac, cod_glac_aliada, link_glac_ent, m_a_cent_form, proyecto_id)
         VALUES (
        :nombre_entidad, 
        :distri_responsi, 
        :natu_entidad, 
        :clasi_empresa, 
        :nit, 
        :convenio, 
        :tipo_cod_convenio, 
        :nombre_parti, 
        :numid_integ, 
        :email_integ, 
        :cel_integ, 
        :recur_entidad_ext, 
        :desc_recur_entidad_ext, 
        :dinero_ent_exter, 
        :desc_dest_recur, 
        :nom_grup_inves_lac, 
        :cod_glac_aliada, 
        :link_glac_ent, 
        :m_a_cent_form, 
        :proyecto_id)";

        //*****convirtiendo la consulta a preparada */    
        $preparada = $this->conexion_db->prepare($consulta); 
        
        //*****sincronizando  marcadores con variables*/
        $preparada->bindValue(":nombre_entidad", $nombre_entidad);
        $preparada->bindValue(":distri_responsi", $distri_responsi);
        $preparada->bindValue(":natu_entidad", $natu_entidad);
        $preparada->bindValue(":clasi_empresa", $clasi_empresa);
        $preparada->bindValue(":nit", $nit);
        $preparada->bindValue(":convenio", $convenio);
        $preparada->bindValue(":tipo_cod_convenio", $tipo_cod_convenio);
        $preparada->bindValue(":nombre_parti", $nombre_parti);
        $preparada->bindValue(":numid_integ", $numid_integ);
        $preparada->bindValue(":email_integ", $email_integ);
        $preparada->bindValue(":cel_integ", $cel_integ);
        $preparada->bindValue(":recur_entidad_ext", $recur_entidad_ext);
        $preparada->bindValue(":desc_recur_entidad_ext", $desc_recur_entidad_ext);
        $preparada->bindValue(":dinero_ent_exter", $dinero_ent_exter);
        $preparada->bindValue(":desc_dest_recur", $desc_dest_recur);
        $preparada->bindValue(":nom_grup_inves_lac", $nom_grup_inves_lac);
        $preparada->bindValue(":cod_glac_aliada", $cod_glac_aliada);
        $preparada->bindValue(":link_glac_ent", $link_glac_ent);
        $preparada->bindValue(":m_a_cent_form", $m_a_cent_form);
        $preparada->bindValue(":proyecto_id", $proyecto_id);
               
        $preparada->bindValue(":proyecto_id", $proyecto_id);       
               
        if($nombre_entidad != null){
            //*****ejecutando la consulta */
            $preparada->execute();    
            if($preparada){
                $resultado = "realizado Entidad aliada 1";
            }else{
                $resultado = "no cultura Entidad aliada 1";
            }
        }
       
        //***cerrando consultas */
        $preparada->closeCursor();

        //****devolviendo resultado */
        return $resultado;

         //***cerrando conexiones */
        $this->conexion_db=null;            
    }  



    //*********** insertar en la tabla Entidad aliada 2 *****/        
    //*********** insertar en la tabla Entidad aliada 2 *****/        
    //*********** insertar en la tabla Entidad aliada 2 *****/        
    //*********** insertar en la tabla Entidad aliada 2 *****/  

    public function insertar_x_entidad_aliada2(){  
        $resultado = "No se ha registrado entidad aliada 2";
        $datosg = new datos();

        //****trayendo variables del formualrio por método post***/
        $proyecto_id = $datosg->getConsecutivo();                
        $nombre_entidad = $_POST["nombre_entidad1"];
        $distri_responsi = $_POST["distri_responsi1"];
        $natu_entidad = $_POST["natu_entidad1"];
        $clasi_empresa = $_POST["clasi_empresa1"];
        $nit = $_POST["nit1"];
        $convenio = $_POST["convenio1"];
        $tipo_cod_convenio = $_POST["tipo_cod_convenio1"];
        $nombre_parti = $_POST["nombre_parti1"];
        $numid_integ = $_POST["numid_integ1"];
        $email_integ = $_POST["email_integ1"];
        $cel_integ = $_POST["cel_integ1"];
        $recur_entidad_ext = $_POST["recur_entidad_ext1"];
        $desc_recur_entidad_ext = $_POST["desc_recur_entidad_ext1"];
        $dinero_ent_exter = $_POST["dinero_ent_exter1"];
        $desc_dest_recur = $_POST["desc_dest_recur1"];
        $nom_grup_inves_lac = $_POST["nom_grup_inves_lac1"];
        $cod_glac_aliada = $_POST["cod_glac_aliada1"];
        $link_glac_ent = $_POST["link_glac_ent1"];
        $m_a_cent_form = $_POST["m_a_cent_form1"];
                
        //***consulta para insertar a la base de datos por medio de parámetros de dos puntos o marcadores*/
        $consulta = "INSERT INTO x_entidad_aliada(nombre_entidad, distri_responsi, natu_entidad, clasi_empresa, nit, convenio, tipo_cod_convenio, nombre_parti, numid_integ, email_integ, cel_integ, recur_entidad_ext, desc_recur_entidad_ext, dinero_ent_exter, desc_dest_recur, nom_grup_inves_lac, cod_glac_aliada, link_glac_ent, m_a_cent_form, proyecto_id)
         VALUES (
        :nombre_entidad, 
        :distri_responsi, 
        :natu_entidad, 
        :clasi_empresa, 
        :nit, 
        :convenio, 
        :tipo_cod_convenio, 
        :nombre_parti, 
        :numid_integ, 
        :email_integ, 
        :cel_integ, 
        :recur_entidad_ext, 
        :desc_recur_entidad_ext, 
        :dinero_ent_exter, 
        :desc_dest_recur, 
        :nom_grup_inves_lac, 
        :cod_glac_aliada, 
        :link_glac_ent, 
        :m_a_cent_form, 
        :proyecto_id)";

        //*****convirtiendo la consulta a preparada */    
        $preparada = $this->conexion_db->prepare($consulta); 
        
        //*****sincronizando  marcadores con variables*/
        $preparada->bindValue(":nombre_entidad", $nombre_entidad);
        $preparada->bindValue(":distri_responsi", $distri_responsi);
        $preparada->bindValue(":natu_entidad", $natu_entidad);
        $preparada->bindValue(":clasi_empresa", $clasi_empresa);
        $preparada->bindValue(":nit", $nit);
        $preparada->bindValue(":convenio", $convenio);
        $preparada->bindValue(":tipo_cod_convenio", $tipo_cod_convenio);
        $preparada->bindValue(":nombre_parti", $nombre_parti);
        $preparada->bindValue(":numid_integ", $numid_integ);
        $preparada->bindValue(":email_integ", $email_integ);
        $preparada->bindValue(":cel_integ", $cel_integ);
        $preparada->bindValue(":recur_entidad_ext", $recur_entidad_ext);
        $preparada->bindValue(":desc_recur_entidad_ext", $desc_recur_entidad_ext);
        $preparada->bindValue(":dinero_ent_exter", $dinero_ent_exter);
        $preparada->bindValue(":desc_dest_recur", $desc_dest_recur);
        $preparada->bindValue(":nom_grup_inves_lac", $nom_grup_inves_lac);
        $preparada->bindValue(":cod_glac_aliada", $cod_glac_aliada);
        $preparada->bindValue(":link_glac_ent", $link_glac_ent);
        $preparada->bindValue(":m_a_cent_form", $m_a_cent_form);
        $preparada->bindValue(":proyecto_id", $proyecto_id);
               
        $preparada->bindValue(":proyecto_id", $proyecto_id);       
               
        if($nombre_entidad != null){
            //*****ejecutando la consulta */
            $preparada->execute();    
            if($preparada){
                $resultado = "realizado Entidad aliada 2";
            }else{
                $resultado = "no cultura Entidad aliada 2";
            }
        }
       
        //***cerrando consultas */
        $preparada->closeCursor();

        //****devolviendo resultado */
        return $resultado;

         //***cerrando conexiones */
        $this->conexion_db=null;            
    }  


    
    //*********** insertar en la tabla subir archivo*****/        
    //*********** insertar en la tabla subir archivo*****/        
    //*********** insertar en la tabla subir archivo*****/        
    //*********** insertar en la tabla subir archivo*****/  
public function cargar_archivos(){  
    $resultado = "";
    $datosg = new datos();

    //****trayendo variables del formualrio por método post***/
    $proyecto_id = $datosg->getConsecutivo();                
    
    $nombre = $_FILES['cargar1']['name'];
    $guardado = $_FILES['cargar1']['tmp_name'];
    
    if (!file_exists('carpeta_archivos')) {
        mkdir('carpeta_archivos', 0777, true);
        if (file_exists('carpeta_archivos')) {
            if (move_uploaded_file($guardado, 'carpeta_archivos/' . $proyecto_id . ".zip")) {
                $resultado .= "archivo zip cargado <br>";
            } else {
                $resultado .= "archivo zip NO cargado <br>";
             }
        }
    } else {
        if (move_uploaded_file($guardado, 'carpeta_archivos/' . $proyecto_id . ".zip")) { 
            $resultado .= "archivo zip cargado <br>";
        } else {
            $resultado .= "archivo zip NO cargado <br>";
         }
    }
    
    /*
     * Subir Archivo 2
     */
    
    $nombre2 = $_FILES['cargar2']['name'];
    $guardado2 = $_FILES['cargar2']['tmp_name'];
    
    if (!file_exists('carpeta_archivos')) {
        mkdir('carpeta_archivos', 0777, true);
        if (file_exists('carpeta_archivos')) {
            if (move_uploaded_file($guardado2, 'carpeta_archivos/' . $proyecto_id . ".xlsm")) { 
                $resultado .= "archivo xlsm cargado <br>";
            }else{
                $resultado .= "archivo xlsm NO cargado <br>";
            }
        }
    } else {
        if (move_uploaded_file($guardado2, 'carpeta_archivos/' . $proyecto_id . ".xlsm")) {
            $resultado .= "archivo xlsm cargado <br>";
         }else{
            $resultado .= "archivo xlsm NO cargado <br>";
         }
    }
    

    //****devolviendo resultado */
    return $resultado;

     //***cerrando conexiones */
    $this->conexion_db=null;            
}  




public function verificar($verificar1, $verificar2, $verificar3){  
    $resultado = "";
    $datosg = new datos();

    //****trayendo variables del formualrio por método post***/
    $proyecto_id = $datosg->getConsecutivo();                
    $proyecto_fecha = $datosg->getFecha();

    $correcto1 == "realizado_impacto";
    $correcto2 == "realizado_informacion_proyecto";
    $correcto3 == "realizado_principal";
       
    if($correcto1 != $verificar1 || $correcto2 != $verificar2 || $correcto3 != $verificar3){
        echo "<script>
            alert('Error');
        </script>";
    }else{
        echo "<script>
            alert('Datos guardados con éxito, Su número de radicado es: " . $proyecto_id . " expedido el " . $proyecto_fecha . "');
        </script>";
    }


    

    //****devolviendo resultado */
    return $resultado;

     //***cerrando conexiones */
    $this->conexion_db=null;            
}  




}


    $insertar1 = new insertar();
    
    $insertar1->insertar_x_informacion_proyecto() . "<br>";
    $insertar1->insertar_x_impacto() . "<br>";
    $insertar1->insertar_x_objetivo() . "<br>";
    $insertar1->insertar_x_producto_resultado() . "<br>";    
    $insertar1->insertar_x_e_actualizacion_modernizacion() . "<br>";
    $insertar1->insertar_x_e_cultura_informacion() . "<br>";
    $insertar1->insertar_x_e_servicios_tecnologicos() . "<br>";
    $insertar1->insertar_x_entidad_aliada1() . "<br>";
    $insertar1->insertar_x_entidad_aliada2() . "<br>";
    $insertar1->cargar_archivos() . "<br>";
        
    $datosg = new datos();

    $proyecto_id = $datosg->getConsecutivo();                
    $proyecto_fecha = $datosg->getFecha(); 

    if("realizado_principal" == $insertar1->insertar_x_informacion_centro()){
        echo "<script>
            alert('Datos guardados con éxito, Su número de radicado es: " . $proyecto_id . " expedido el " . $proyecto_fecha . "');
            window.location.href='../index.php';
        </script>";
    }else{
        echo "<script>
            alert('Error');
        </script>";
    }

    
    
    //window.location.href='../index.php';
    
?>


<!--

    $consulta2 = "INSERT INTO proyecto
    (`proyecto_num_consecutivo`, `proyecto_consecutivo`, `proyecto_fecha`, `linea_programatica_id`, `modernizacion_id`, `regional_id`, `centro_id`, `subdirector_id`, `subdirector_celular`, `proyecto_nombre_autor`, `proyecto_cc_autor`, `proyecto_email_autor`, `proyecto_celular_autor`, `grupo_lac_id`, `proyecto_titulo`, `proyecto_resumen`, `innovacion_proyecto`, `area_conocimiento_id`, `sub_area_conocimiento_id`, `redes_conocimiento_id`, `proyecto_justificacion_redes`, `sector_economico_id`, `ciiu_estructura_general_id`, `ciiu_estructura_detallada_id`, `proyecto_tiempo`, `proyecto_fecha_inicio`, `proyecto_fecha_cierre`, `proyecto_link_video_proyecto`, `proyecto_economia_naranja`, `proyecto_economia_naranja_justificacion`, `componentes_innovadores_id`, `proyecto_antecedentes_generales`, `proyecto_pertinencia_proyecto`, `proyecto_planteamiento_problema_a`, `proyecto_planteamiento_problema_b`, `proyecto_justificacion`, `proyecto_metodologia`, `proyecto_bibliografia`, `proyecto_impacto_productivo`, `proyecto_impacto_ambiental`, `proyecto_impacto_social`, `proyecto_impacto_tecnologico`, `proyecto_impacto_centro_formacion`, `proyecto_numero_semilleros`, `proyecto_nombre_semilleros`, `proyecto_numero_municipios`, `proyecto_nombre_municipios`, `proyecto_numero_programas`, `proyecto_nombre_programas`, `proyecto_numero_aprendices`, `proyecto_nombre_aprendices`, `proyecto_linea_investigacion`) VALUES ('65465','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?','?'
    )";