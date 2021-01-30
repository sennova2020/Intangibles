<?php

class intangible
{
    public function create($dateFinish,$dateBudgetClosing,$typeIntangible,$classIntangible,$nameIntangible,$resourceControl,$observationResource,$potencial,$observationPotencial,$reliably,$identification,$observationReliably,$observationIdentification,$isMonetary,$physicalAppearance,$duration,$observationMonetary,$observationAppearance,$observationDuration,$buyActivity,$observationBuyActivity,$state,$project,$codeIntangible,$negativo)
    {
        $resultado = null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "INSERT INTO x_intangibles_preguntas (proyecto_consecutivo,pregunta1,pregunta2,pregunta3,pregunta4,pregunta5,pregunta6,pregunta7,pregunta8,pregunta9,pregunta10,pregunta11,pregunta12,pregunta13,pregunta14,pregunta15,pregunta16,pregunta17,pregunta18,pregunta19,cod_intangible,fecha_cierre,estado,fecha_vigencia,negativo) VALUES (:project,:typeIntangible,:classIntangible,:nameIntangible,:resourceControl,:observationResource,:potencial,:observationPotencial,:reliably,:observationReliably,:identification,:observationIdentification,:isMonetary,:observationMonetary,:physicalAppearance,:observationAppearance,:duration,:observationDuration,:buyActivity,:observationBuyActivity,:codeIntangible,:dateFinish,:state,:dateBudgetClosing,:negativo)";

        $result = $conexion -> prepare($sql);
        $result -> bindParam(':project',$project);
        $result -> bindParam(':typeIntangible',$typeIntangible);
        $result -> bindParam(':classIntangible',$classIntangible);
        $result -> bindParam(':nameIntangible',$nameIntangible);
        $result -> bindParam(':resourceControl',$resourceControl);
        $result -> bindParam(':observationResource',$observationResource);
        $result -> bindParam(':potencial',$potencial);
        $result -> bindParam(':observationPotencial',$observationPotencial);
        $result -> bindParam(':reliably',$reliably);
        $result -> bindParam(':observationReliably',$observationReliably);
        $result -> bindParam(':identification',$identification);
        $result -> bindParam(':observationIdentification',$observationIdentification);
        $result -> bindParam(':isMonetary',$isMonetary);
        $result -> bindParam(':observationMonetary',$observationMonetary);
        $result -> bindParam(':physicalAppearance',$physicalAppearance);
        $result -> bindParam(':observationAppearance',$observationAppearance);
        $result -> bindParam(':duration',$duration);
        $result -> bindParam(':observationDuration',$observationDuration);
        $result -> bindParam(':buyActivity',$buyActivity);
        $result -> bindParam(':observationBuyActivity',$observationBuyActivity);
        $result -> bindParam(':dateFinish',$dateFinish);
        $result -> bindParam(':dateBudgetClosing',$dateBudgetClosing);
        $result -> bindParam(':state',$state);
        $result -> bindParam(':codeIntangible',$codeIntangible);
        $result -> bindParam(':negativo',$negativo);
        if (!$result) {
            $resultado = 'Invalid';
        } else {
            $result -> execute();
            $resultado = $codeIntangible ;
        }
        
        return $resultado;
    }

    public function newCodeIntangible()
    {
       

       $model = new Conexion();
       $conexion = $model -> conectarse();

       $sql = 'SELECT cod_intangible FROM x_intangibles_preguntas ORDER BY cod_intangible DESC LIMIT 1';

       $result = $conexion -> prepare($sql);
       $result -> execute();
       
       while($f=$result->fetch())
       {
           $resultado [] = $f;
       }

       return $resultado;
        

    }
    
    public function countUnfinished($project)
    {
        $negativo = 1;
        $estado = 1;
        $finish = 0;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT id FROM x_intangibles_preguntas WHERE proyecto_consecutivo=:project AND estado=:estado AND negativo=:negativo AND finished=:finish";

        $result = $conexion -> prepare($sql);

        $result -> bindParam(':project',$project);
        $result -> bindParam(':estado',$estado);
        $result -> bindParam(':negativo',$negativo);
        $result -> bindParam(':finish',$finish);

        $result -> execute();

        return $result -> rowCount();
    }

    public function countNotSave($project)
    {
        $estado = 0;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT id FROM x_intangibles_preguntas WHERE proyecto_consecutivo=:project AND estado=:estado AND pregunta20 IS NULL";

        $result = $conexion -> prepare($sql);

        $result -> bindParam(':project',$project);
        $result -> bindParam(':estado',$estado);

        $result -> execute();

        return $result -> rowCount();
    }

    public function readUnfinished($project)
    {
        $negativo = 1;
        $estado = 1;
        $finish = 0;
        $resultado = null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT cod_intangible,pregunta3,pregunta2,pregunta1,pregunta20,pregunta27,pregunta32,pregunta34,pregunta38 FROM x_intangibles_preguntas WHERE proyecto_consecutivo=:project AND estado=:estado AND negativo=:negativo AND finished=:finish";

        $result = $conexion -> prepare($sql);

        $result -> bindParam(':project',$project);
        $result -> bindParam(':estado',$estado);
        $result -> bindParam(':negativo',$negativo);
        
        $result -> bindParam(':finish',$finish);

        if ($result) {
            $result->execute();

            while ($f=$result->fetch()) {
                $resultado [] = $f;
            }
        }else{
            $resultado = false;
        }

        return $resultado;
    }

    public function readNotSave($project)
    {
        $estado = 0;
        $resultado = null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT cod_intangible,pregunta3,pregunta2,pregunta1 FROM x_intangibles_preguntas WHERE proyecto_consecutivo=:project AND estado=:estado AND pregunta20 IS NULL";

        $result = $conexion -> prepare($sql);

        $result -> bindParam(':project',$project);
        $result -> bindParam(':estado',$estado);

        if ($result) {
            $result->execute();

            while ($f=$result->fetch()) {
                $resultado [] = $f;
            }
        }else{
            $resultado = false;
        }

        return $resultado;
    }

    public function readInformationIn($codeIntangible)
    {
        $estado = 0;
        $resultado = null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT * FROM x_intangibles_preguntas WHERE cod_intangible=:codeIntangible ";

        $result = $conexion -> prepare($sql);

        $result -> bindParam(':codeIntangible',$codeIntangible);

        if ($result) {
            $result->execute();

            while ($f=$result->fetch()) {
                $resultado [] = $f;
            }
        }else{
            $resultado = false;
        }

        return $resultado;
    }

    public function update($dateFinish,$dateBudgetClosing,$typeIntangible,$classIntangible,$nameIntangible,$resourceControl,$observationResource,$potencial,$observationPotencial,$reliably,$identification,$observationReliably,$observationIdentification,$isMonetary,$physicalAppearance,$duration,$observationMonetary,$observationAppearance,$observationDuration,$buyActivity,$observationBuyActivity,$state,$codeIntangible,$negativo)
    {
        $resultado = null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "UPDATE x_intangibles_preguntas SET pregunta1=:typeIntangible,pregunta2=:classIntangible,pregunta3=:nameIntangible,pregunta4=:resourceControl,pregunta5=:observationResource,pregunta6=:potencial,pregunta7=:observationPotencial,pregunta8=:reliably,pregunta9=:observationReliably,pregunta10=:identification,pregunta11=:observationIdentification,pregunta12=:isMonetary,pregunta13=:observationMonetary,pregunta14=:physicalAppearance,pregunta15=:observationAppearance,pregunta16=:duration,pregunta17=:observationDuration,pregunta18=:buyActivity,pregunta19=:observationBuyActivity,fecha_cierre=:dateFinish,estado=:state,fecha_vigencia=:dateBudgetClosing,negativo=:negativo WHERE cod_intangible=:codeIntangible";

        $result = $conexion -> prepare($sql);
        $result -> bindParam(':typeIntangible',$typeIntangible);
        $result -> bindParam(':classIntangible',$classIntangible);
        $result -> bindParam(':nameIntangible',$nameIntangible);
        $result -> bindParam(':resourceControl',$resourceControl);
        $result -> bindParam(':observationResource',$observationResource);
        $result -> bindParam(':potencial',$potencial);
        $result -> bindParam(':observationPotencial',$observationPotencial);
        $result -> bindParam(':reliably',$reliably);
        $result -> bindParam(':observationReliably',$observationReliably);
        $result -> bindParam(':identification',$identification);
        $result -> bindParam(':observationIdentification',$observationIdentification);
        $result -> bindParam(':isMonetary',$isMonetary);
        $result -> bindParam(':observationMonetary',$observationMonetary);
        $result -> bindParam(':physicalAppearance',$physicalAppearance);
        $result -> bindParam(':observationAppearance',$observationAppearance);
        $result -> bindParam(':duration',$duration);
        $result -> bindParam(':observationDuration',$observationDuration);
        $result -> bindParam(':buyActivity',$buyActivity);
        $result -> bindParam(':observationBuyActivity',$observationBuyActivity);
        $result -> bindParam(':dateFinish',$dateFinish);
        $result -> bindParam(':dateBudgetClosing',$dateBudgetClosing);
        $result -> bindParam(':state',$state);
        $result -> bindParam(':codeIntangible',$codeIntangible);
        $result -> bindParam(':negativo',$negativo);
        if (!$result) {
            $resultado = 'Invalid';
        } else {
            $result -> execute();
            $resultado = true;
        }
        
        return $resultado;
    }

    public function readIntangibleFormato($codeIntangible)
    {
        $resultado= null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql ="SELECT pregunta1,pregunta3 FROM x_intangibles_preguntas WHERE cod_intangible=:codeIntangible";

        $result = $conexion ->prepare($sql);

        $result -> bindParam(':codeIntangible',$codeIntangible);

        $result -> execute();

        while ($f = $result->fetch()){
            $resultado [] = $f;
        }

        return $resultado;
    }

    public function readFinished($project)
    {
        $negativo = 1;
        $estado = 1;
        $finish = 1;
        $resultado = null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT cod_intangible,pregunta3,pregunta2,pregunta1 FROM x_intangibles_preguntas WHERE proyecto_consecutivo=:project AND estado=:estado AND negativo IS NOT NULL AND finished =:finish";
        
        $result = $conexion -> prepare($sql);

        $result -> bindParam(':project',$project);
        $result -> bindParam(':estado',$estado);
        $result -> bindParam(':finish',$finish);

        if ($result) {
            $result->execute();

            while ($f=$result->fetch()) {
                $resultado [] = $f;
            }
        }else{
            $resultado = false;
        }

        return $resultado;
    }

    public function readFinishedDetails($codeIntangible)
    {
        $negativo = 1;
        $estado = 1;
        $resultado = null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT * FROM x_intangibles_preguntas WHERE cod_intangible=:codeIntangible AND estado=:estado AND negativo IS NOT NULL";
        
        $result = $conexion -> prepare($sql);

        $result -> bindParam(':codeIntangible',$codeIntangible);
        $result -> bindParam(':estado',$estado);

        if ($result) {
            $result->execute();

            while ($f=$result->fetch()) {
                $resultado [] = $f;
            }
        }else{
            $resultado = false;
        }

        return $resultado;
    }

    public function deleteIncompleteIntangible()
    {
        $estado = 1;
        $negativo = 1;
        $finish = 0;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql="DELETE FROM x_intangibles_preguntas WHERE estado=:estado AND negativo=:negativo AND finished=:finish";

        $result = $conexion -> prepare($sql);
        $result -> bindParam(':estado',$estado);
        $result -> bindParam(':negativo',$negativo);
        $result -> bindParam(':finish',$finish);
        $result -> execute();
    }

    public function deleteUnsaveIntangible()
    {
        $estado = 0;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql="DELETE FROM x_intangibles_preguntas WHERE estado=:estado ";

        $result = $conexion -> prepare($sql);
        $result -> bindParam(':estado',$estado);
        $result -> execute();
    }
    
    public function readProjectWithoutIntagibles ($project)
    {
        $num = 1;
        $resultado = null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT sin_intangible FROM x_intangibles_preguntas WHERE proyecto_consecutivo =:project AND sin_intangible=:num";
        
        $result = $conexion -> prepare($sql);

        $result -> bindParam(':project',$project);
        $result -> bindParam(':num',$num);

        if ($result) {
            $result->execute();

            while ($f=$result->fetch()) {
                $resultado [] = $f;
            }
        }else{
            $resultado = false;
        }

        return $resultado;
    }

    public function readAll($project){
        $resultado = null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT * FROM x_intangibles_preguntas WHERE proyecto_consecutivo =:project AND sin_intangible IS NULL";
        
        $result = $conexion -> prepare($sql);

        $result -> bindParam(':project',$project);

        if ($result) {
            $result->execute();

            while ($f=$result->fetch()) {
                $resultado [] = $f;
            }
        }else{
            $resultado = false;
        }

        return $resultado;
    }

    public function createSinIntagible($project,$justificacion,$sinJ,$estado,$negativo)
    {
        $model = new Conexion();
        $conexion = $model -> conectarse();
        $finish = 1;

        $sql = "INSERT INTO x_intangibles_preguntas (proyecto_consecutivo,fecha,estado,negativo,sin_intangible,justificacion,finished) VALUES (:project,now(),:estado,:negativo,:sinJ,:justificacion,:finish)";
        
        $result = $conexion -> prepare($sql);

        $result -> bindParam(':project',$project);
        $result -> bindParam(':justificacion',$justificacion);
        $result -> bindParam(':sinJ',$sinJ);
        
        $result -> bindParam(':estado',$estado);
        $result -> bindParam(':negativo',$negativo);
        $result -> bindParam(':finish',$finish);

        $result->execute();

    }

    public function readIntangibleByAdmin()
    {
        $resultado = null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT 
        b.codigo_centro,
        b.centro_nombre,
        b.linea_programatica_descripcion,
        b.proyecto_titulo,
        a.proyecto_consecutivo,
        (CASE WHEN a.sin_intangible= 1 THEN 'Si' ELSE 'No' END) AS 'Sin Intangibles?',
        a.justificacion,
        a.cod_intangible,
        a.pregunta1 'Tipo de intangible',
        d.denominacion 'Clase de intangibles',
        a.pregunta3 'Nombre del Intangible.',
        a.pregunta4 '¿El intangible es un recurso controlado? Control implica la capacidad del SENA para usar un recurso o definir el uso que un tercero debe darle, para las funciones administrativas o de formación profesional, al igual si se dispone de proceso o procedimiento al cual beneficia la utilización del producto. Al evaluar si existe o no control la entidad debe tener en cuenta, si el derecho de uso lo define un contrato, factura,entrada a almacén, certificado de licenciamiento, convenio o donaciones, igualmente se debe verificar el acceso al recurso o la capacidad de un tercero para negar o restringir el uso.',
        a.pregunta5 'Observaciones a la pregunta ¿El intangible es un recurso controlado? Aclare si el SENA tiene el control del uso del intangible, es decir, en que proceso de la entidad se utiliza.',
        a.pregunta6 '¿Del intangible se espera obtener un potencial de servicios?',
        a.pregunta7 'Observaciones a la pregunta ¿Del intangible se espera obtener un potencial de servicios?',
        a.pregunta8 '¿El intangible se puede medir fiablemente? La medición de un activo es fiable cuando existe evidencia de transacciones para el activo u otros similares, o cuando la estimación del valor depende de variables que se pueden medir en términos monetarios.',
        a.pregunta9 'Observaciones a la pregunta ¿El intangible se puede medir fiablemente?',
        a.pregunta10 '¿El intangible se puede identificar?',
        a.pregunta11 'Observaciones a la pregunta ¿El intangible se puede identificar?',
        a.pregunta12 '¿El intangible NO es considerado monetario? El intangibles es monetario cuando es un CDT, un bono o títulos valores y es no monetario en caso contrario.',
        a.pregunta13 'Observaciones a la pregunta ¿El intangible NO es considerado monetario?',
        a.pregunta14 '¿El intangible es sin apariencia física? Algunos intangibles pueden estar contenidos en, o contener, un soporte de naturaleza o apariencia física, como es el caso de un disco compacto (caso programas informáticos), de documentación legal (caso licencia o patente) o de una película; estos casos la sustancia material del elemento es de importancia secundaria con respecto a su componente intangible, por lo que el activo será considerado como intangible.',
        a.pregunta15 'Observaciones a la pregunta ¿El intangible es sin apariencia física? Por ejemplo el software que se encuentra en un CD, la parte importante es el intangible.',
        a.pregunta16 '¿El intangible se va a utilizar por más de un año? Verificar si el contrato permite la utilización del intangible por más de un año, igualmente se debe identificar si el área que generó la necesidad de su adquisición piensa utilizarlo por más de un año. La vida útil de los activos intangibles estará dada por el menor periodo entre el tiempo en que se obtendría el potencial de servicio esperados y el plazo establecido conforme a los términos contractuales, siempre y cuando el activo intangible se encuentre asociado a un derecho contractual o legal. Tenga en cuenta las siguientes consideraciones Marque SI, cuando:- Si el producto dispone de un derecho de uso perpetuo, indefinido o vitalicio.- Si el producto dispone de un derecho de uso superior a un año.',
        a.pregunta17 'Observaciones a la pregunta ¿El intangible se va a utilizar por más de un año?  ', 
        a.pregunta18 '¿No se espera vender en el curso de las actividades de la entidad? Si la intención de la entidad es NO venderlo, la respuesta es SI. Si la intención de la entidad es venderlo, la respuesta a la pregunta es un NO.', 
        a.pregunta19 'Observaciones a la pregunta ¿No se espera vender en el curso de las actividades de la entidad?',
        a.pregunta20 '¿La vida útil es finita o indefinida?', 
        a.pregunta21 'Si el proyecto se desarrolló con un aliado externo, indicar cuál es el Porcentaje de contrapartida del SENA',
        a.pregunta23 'VIDA ÚTIL TOTAL EN MESES, SI ES FINITA. (Tenga en cuenta los términos del contrato o del concepto de quien lo fabricó). Número de meses', 
        a.pregunta24 'VIDA ÚTIL TRANSCURRIDA, SI ES FINITA (con fecha 31/12/2019), Número en meses.', 
        a.pregunta25 'VIDA ÚTIL REMANENTE, SI ES FINITA (resta entre la vida útil total y la transcurrida). Número en meses', 
        a.pregunta26 '¿Tiene facturas para registrar?',
        a.pregunta27 'Surgió una nueva ley, norma, acuerdo, decreto o normativa interna que hace verificar la utilización del bien intangible.',
        a.pregunta28 'Justificación: Surgio una nueva ley',
        a.pregunta29 'Se espera reemplazar el activo intangible por uno con mejores condiciones como son capacidad, velocidad, definición, etc.',
        a.pregunta30 'Justificación reemplazo del activo intangible',
        a.pregunta31 'Ajuste de la vida util remanente',
        a.pregunta32 '¿El bien intangible se utilizará hasta que éste se consuma completamente o de forma significativa?',
        a.pregunta33 'Justificación ¿El bien intangible se utilizará hasta que éste se consuma completamente o de forma significativa?',
        a.pregunta34 '¿El activo intangible presenta un patrón de consumo diferente al inicialmente esperado?',
        a.pregunta35 'Si para esta pregunta, la respuesta fue SI, entonces identifique el nuevo método de amortización que se deberá utilizar de acuerdo al patrón de consumo determinado.',
        a.pregunta36 'Indique como llegó al dato de la amortización y adjunte el documento soporte para esta determinación.',
        a.pregunta37 'Durante el periodo, han tenido lugar, o van a tener lugar en un futuro inmediato, cambios significativos con una incidencia desfavorable sobre la entidad a largo plazo.',
        a.pregunta38 'Durante el periodo, han tenido lugar, o van a tener lugar en un futuro inmediato, cambios significativos con una incidencia desfavorable sobre la entidad a largo plazo.',
        a.pregunta39 'Justifique su respuesta en caso afirmativo  o negativo.',
        a.pregunta40 'Durante el periodo, el valor de mercado del activo ha disminuido significativamente más que lo que se esperaría como consecuencia del paso del tiempo o de su uso normal.',
        a.pregunta41 'Justifique su respuesta si es afirmativa  y adjunte las evidencias del estudio del mercado que realizó para determinar el valor del mercado.',
        a.pregunta43 'Valor del estudio del mercado (si no se puede estimar el costo del valor del mercado, escribir el costo de reposición).',
        a.pregunta44 'Justifique su respuesta si es negativa indicando el costo de reposición.',
        a.pregunta45 'Valor de reposición del activo intangible.',
        a.pregunta46 'Se dispone de evidencia sobre la obsolescencia o daño del activo.',
        a.pregunta47 'Si su respuesta fue afirmativa se debe calcular el valor de dichas rehabilitaciones.',
        a.pregunta48 'Durante el periodo, han tenido lugar, o se espera que tengan lugar en un futuro inmediato, cambios significativos en el grado de utilización.',
        a.pregunta49 'Justifique su respuesta si es afirmativa o negativa',
        a.pregunta50 'Se decide detener la construcción del activo antes de su finalización o de su puesta en condiciones de funcionamiento, salvo que exista evidencia objetiva de que se reanudará la construcción en el futuro próximo.',
        a.pregunta51 'Justifique su respuesta si es afirmativa o negativa.',
        a.pregunta52 'Se dispone de información procedente de informes internos que indican que la capacidad del activo para suministrar bienes o servicios ha disminuido o va a ser inferior a la esperada.',
        a.pregunta53 'Justifique su respuesta si es afirmativa o negativa.',
        a.fecha_cierre 'Fecha de cierre del proyecto técnicamente en la vigencia 2020',
        a.fecha_vigencia 'Fecha de cierre del proyecto presupuestalmente en la vigencia 2020',
        a.fecha_inicio 'Fecha de Registro',  
        c.numero_factura, 
        (CASE WHEN c.factura_a_nombre_sena= 1 THEN 'Si' ELSE 'No' END) AS 'Factura a nombre del Sena',
        c.fecha_factura, 
        c.valor_total, 
        (CASE WHEN c.tiene_iva= 1 THEN 'Si' ELSE 'No' END) AS 'Tiene Iva',
        c.iva, 
        c.concepto,
        c.valor_concepto, 
        (CASE WHEN c.es_necesario= 1 THEN 'Si' ELSE 'No' END) AS 'Es necesario este concepto para poner en funcionamiento el intangible?',
        c.fase_intangible 'La factura que esta registrando corresponde a la fase de?'
        FROM x_intangibles_preguntas a
        INNER JOIN proyecto_evaluar_intangible b
        ON a.proyecto_consecutivo = b.proyecto_consecutivo
        LEFT JOIN intangible_pregunta_factura c
        ON a.cod_intangible = c.cod_intangible
        LEFT JOIN clase_intangible d
        ON a.pregunta2 = d.cod_clase
        WHERE a.finished=1";

        
        $result = $conexion -> prepare($sql);

        $result->execute();

        while ($f=$result->fetch()) {
            $resultado [] = $f;
        }

        return $resultado;   
    }

    public function readIntangibleByAdminByProject($project)
    {
        $resultado = null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT 
        b.codigo_centro,
        b.centro_nombre,
        b.linea_programatica_descripcion,
        b.proyecto_titulo,
        a.proyecto_consecutivo,
        (CASE WHEN a.sin_intangible= 1 THEN 'Si' ELSE 'No' END) AS 'Sin Intangibles?',
        a.justificacion,
        a.cod_intangible,
        a.pregunta1 'Tipo de intangible',
        d.denominacion 'Clase de intangibles',
        a.pregunta3 'Nombre del Intangible.',
        a.pregunta4 '¿El intangible es un recurso controlado? Control implica la capacidad del SENA para usar un recurso o definir el uso que un tercero debe darle, para las funciones administrativas o de formación profesional, al igual si se dispone de proceso o procedimiento al cual beneficia la utilización del producto. Al evaluar si existe o no control la entidad debe tener en cuenta, si el derecho de uso lo define un contrato, factura,entrada a almacén, certificado de licenciamiento, convenio o donaciones, igualmente se debe verificar el acceso al recurso o la capacidad de un tercero para negar o restringir el uso.',
        a.pregunta5 'Observaciones a la pregunta ¿El intangible es un recurso controlado? Aclare si el SENA tiene el control del uso del intangible, es decir, en que proceso de la entidad se utiliza.',
        a.pregunta6 '¿Del intangible se espera obtener un potencial de servicios?',
        a.pregunta7 'Observaciones a la pregunta ¿Del intangible se espera obtener un potencial de servicios?',
        a.pregunta8 '¿El intangible se puede medir fiablemente? La medición de un activo es fiable cuando existe evidencia de transacciones para el activo u otros similares, o cuando la estimación del valor depende de variables que se pueden medir en términos monetarios.',
        a.pregunta9 'Observaciones a la pregunta ¿El intangible se puede medir fiablemente?',
        a.pregunta10 '¿El intangible se puede identificar?',
        a.pregunta11 'Observaciones a la pregunta ¿El intangible se puede identificar?',
        a.pregunta12 '¿El intangible NO es considerado monetario? El intangibles es monetario cuando es un CDT, un bono o títulos valores y es no monetario en caso contrario.',
        a.pregunta13 'Observaciones a la pregunta ¿El intangible NO es considerado monetario?',
        a.pregunta14 '¿El intangible es sin apariencia física? Algunos intangibles pueden estar contenidos en, o contener, un soporte de naturaleza o apariencia física, como es el caso de un disco compacto (caso programas informáticos), de documentación legal (caso licencia o patente) o de una película; estos casos la sustancia material del elemento es de importancia secundaria con respecto a su componente intangible, por lo que el activo será considerado como intangible.',
        a.pregunta15 'Observaciones a la pregunta ¿El intangible es sin apariencia física? Por ejemplo el software que se encuentra en un CD, la parte importante es el intangible.',
        a.pregunta16 '¿El intangible se va a utilizar por más de un año? Verificar si el contrato permite la utilización del intangible por más de un año, igualmente se debe identificar si el área que generó la necesidad de su adquisición piensa utilizarlo por más de un año. La vida útil de los activos intangibles estará dada por el menor periodo entre el tiempo en que se obtendría el potencial de servicio esperados y el plazo establecido conforme a los términos contractuales, siempre y cuando el activo intangible se encuentre asociado a un derecho contractual o legal. Tenga en cuenta las siguientes consideraciones Marque SI, cuando:- Si el producto dispone de un derecho de uso perpetuo, indefinido o vitalicio.- Si el producto dispone de un derecho de uso superior a un año.',
        a.pregunta17 'Observaciones a la pregunta ¿El intangible se va a utilizar por más de un año?  ', 
        a.pregunta18 '¿No se espera vender en el curso de las actividades de la entidad? Si la intención de la entidad es NO venderlo, la respuesta es SI. Si la intención de la entidad es venderlo, la respuesta a la pregunta es un NO.', 
        a.pregunta19 'Observaciones a la pregunta ¿No se espera vender en el curso de las actividades de la entidad?',
        a.pregunta20 '¿La vida útil es finita o indefinida?', 
        a.pregunta21 'Si el proyecto se desarrolló con un aliado externo, indicar cuál es el Porcentaje de contrapartida del SENA',
        a.pregunta23 'VIDA ÚTIL TOTAL EN MESES, SI ES FINITA. (Tenga en cuenta los términos del contrato o del concepto de quien lo fabricó). Número de meses', 
        a.pregunta24 'VIDA ÚTIL TRANSCURRIDA, SI ES FINITA (con fecha 31/12/2019), Número en meses.', 
        a.pregunta25 'VIDA ÚTIL REMANENTE, SI ES FINITA (resta entre la vida útil total y la transcurrida). Número en meses', 
        a.pregunta26 '¿Tiene facturas para registrar?',
        a.pregunta27 'Surgió una nueva ley, norma, acuerdo, decreto o normativa interna que hace verificar la utilización del bien intangible.',
        a.pregunta28 'Justificación: Surgio una nueva ley',
        a.pregunta29 'Se espera reemplazar el activo intangible por uno con mejores condiciones como son capacidad, velocidad, definición, etc.',
        a.pregunta30 'Justificación reemplazo del activo intangible',
        a.pregunta31 'Ajuste de la vida util remanente', 
        a.pregunta32 '¿El bien intangible se utilizará hasta que éste se consuma completamente o de forma significativa?',
        a.pregunta33 'Justificación ¿El bien intangible se utilizará hasta que éste se consuma completamente o de forma significativa?',
        a.pregunta34 '¿El activo intangible presenta un patrón de consumo diferente al inicialmente esperado?',
        a.pregunta35 'Si para esta pregunta, la respuesta fue SI, entonces identifique el nuevo método de amortización que se deberá utilizar de acuerdo al patrón de consumo determinado.',
        a.pregunta36 'Indique como llegó al dato de la amortización y adjunte el documento soporte para esta determinación.',
        a.pregunta38 'Durante el periodo, han tenido lugar, o van a tener lugar en un futuro inmediato, cambios significativos con una incidencia desfavorable sobre la entidad a largo plazo.',
        a.pregunta39 'Justifique su respuesta en caso afirmativo  o negativo.',
        a.pregunta40 'Durante el periodo, el valor de mercado del activo ha disminuido significativamente más que lo que se esperaría como consecuencia del paso del tiempo o de su uso normal.',
        a.pregunta41 'Justifique su respuesta si es afirmativa  y adjunte las evidencias del estudio del mercado que realizó para determinar el valor del mercado.',
        a.pregunta43 'Valor del estudio del mercado (si no se puede estimar el costo del valor del mercado, escribir el costo de reposición).',
        a.pregunta44 'Justifique su respuesta si es negativa indicando el costo de reposición.',
        a.pregunta45 'Valor de reposición del activo intangible.',
        a.pregunta46 'Se dispone de evidencia sobre la obsolescencia o daño del activo.',
        a.pregunta47 'Si su respuesta fue afirmativa se debe calcular el valor de dichas rehabilitaciones.',
        a.pregunta48 'Durante el periodo, han tenido lugar, o se espera que tengan lugar en un futuro inmediato, cambios significativos en el grado de utilización.',
        a.pregunta49 'Justifique su respuesta si es afirmativa o negativa',
        a.pregunta50 'Se decide detener la construcción del activo antes de su finalización o de su puesta en condiciones de funcionamiento, salvo que exista evidencia objetiva de que se reanudará la construcción en el futuro próximo.',
        a.pregunta51 'Justifique su respuesta si es afirmativa o negativa.',
        a.pregunta52 'Se dispone de información procedente de informes internos que indican que la capacidad del activo para suministrar bienes o servicios ha disminuido o va a ser inferior a la esperada.',
        a.pregunta53 'Justifique su respuesta si es afirmativa o negativa.',
        a.fecha_cierre 'Fecha de cierre del proyecto técnicamente en la vigencia 2020',
        a.fecha_vigencia 'Fecha de cierre del proyecto presupuestalmente en la vigencia 2020',
        a.fecha_inicio 'Fecha de Registro',  
        c.numero_factura, 
        (CASE WHEN c.factura_a_nombre_sena= 1 THEN 'Si' ELSE 'No' END) AS 'Factura a nombre del Sena',
        c.fecha_factura, 
        c.valor_total, 
        (CASE WHEN c.tiene_iva= 1 THEN 'Si' ELSE 'No' END) AS 'Tiene Iva',
        c.iva, 
        c.concepto,
        c.valor_concepto, 
        (CASE WHEN c.es_necesario= 1 THEN 'Si' ELSE 'No' END) AS 'Es necesario este concepto para poner en funcionamiento el intangible?',
        c.fase_intangible 'La factura que esta registrando corresponde a la fase de?'
        FROM x_intangibles_preguntas a
        INNER JOIN proyecto_evaluar_intangible b
        ON a.proyecto_consecutivo = b.proyecto_consecutivo
        LEFT JOIN intangible_pregunta_factura c
        ON a.cod_intangible = c.cod_intangible
        LEFT JOIN clase_intangible d
        ON a.pregunta2 = d.cod_clase
        WHERE a.proyecto_consecutivo=:project AND a.finished=1";
        
        $result = $conexion -> prepare($sql);
        $result -> bindParam(':project',$project);
        $result->execute();

        while ($f=$result->fetch()) {
            $resultado [] = $f;
        }

        return $resultado;   
    }
   
    public function existProject($project)
    {
        $resultado = null;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql = "SELECT sin_intangible FROM x_intangibles_preguntas WHERE proyecto_consecutivo =:project";
        
        $result = $conexion -> prepare($sql);

        $result -> bindParam(':project',$project);
        $result -> execute();
        return $result->rowCount();
    }

    public function readDeleteIncompleteIntangible()
    {
        $resultado= null;
        $estado = 1;
        $negativo = 1;
        $finish = 0;
        $model = new Conexion();
        $conexion = $model -> conectarse();

        $sql="SELECT pregunta37,pregunta42 FROM x_intangibles_preguntas WHERE estado=:estado AND negativo=:negativo AND finished=:finish";

        $result = $conexion -> prepare($sql);
        $result -> bindParam(':estado',$estado);
        $result -> bindParam(':negativo',$negativo);
        $result -> bindParam(':finish',$finish);
        $result -> execute();

        while ($f=$result->fetch()) {
            $resultado [] = $f; 
        }

        return $resultado;
    }
}


?>