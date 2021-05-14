<?php
require_once '../../modelo/conexion/conexion.php';
require_once '../../modelo/intangible/intangibleModelo.php';
require_once '../seguridad/adminSecurity.php';
adminRol(2);

function downloadExcelReport($project)
{
            $contenido = "<style>

                        th{
                            background-color: orange;
                        }
                        
                    </style>
            ";
            $contenido .= "<table border style='width: 1000%;text-align: center;'><thead style='background-color: orange;width: 1150px;'><tr>
            
			<th > ".utf8_decode('Código de centdo')."</th>
            <th > ".utf8_decode('Nombre de centdo')."</th>
            <th > ".utf8_decode('Descripción de la linea programática')."</th>
            <th > ".utf8_decode('Titulo del proyecto')."</th>
            <th > ".utf8_decode('Proyecto consecutivo')."</th>
            <th > ".utf8_decode('Sin intangibles?')."</th>
            <th > ".utf8_decode('Justificación')."</th>
            <th > ".utf8_decode('Código del intangible')."</th>
            <th > ".utf8_decode('Tipo de intangible')."</th>
            <th > ".utf8_decode('Clase de intangible')."</th>
            <th > ".utf8_decode('Nombre del intangible')."</th>
            <th > ".utf8_decode('¿El intangible es un recurso contdolado? Contdol implica la capacidad del SENA para usar un recurso o definir el uso que un tercero debe darle, para las funciones administdativas o de formación profesional, al igual si se dispone de proceso o procedimiento')."</th>
            <th > ".utf8_decode('Observaciones a la pregunta ¿El intangible es un recurso contdolado? Aclare si el SENA tiene el contdol del uso del intangible, es decir, en que proceso de la entidad se utiliza.')."</th>
            <th > ".utf8_decode('¿Del intangible se espera obtener un potencial de servicios?')."</th>
            <th > ".utf8_decode('Observaciones a la pregunta ¿Del intangible se espera obtener un potencial de servicios?')."</th>
            <th > ".utf8_decode('¿El intangible se puede medir fiablemente? La medición de un activo es fiable cuando existe evidencia de tdansacciones para el activo u otdos similares, o cuando la estimación del valor depende de variables que se pueden medir en términos monetarios.')."</th>
            <th > ".utf8_decode('Observaciones a la pregunta ¿El intangible se puede medir fiablemente?')."</th>
            <th > ".utf8_decode('¿El intangible se puede identificar?')."</th>
            <th > ".utf8_decode('Observaciones a la pregunta ¿El intangible se puede identificar?')."</th>
            <th > ".utf8_decode('¿El intangible NO es considerado monetario? El intangibles es monetario cuando es un CDT, un bono o títulos valores y es no monetario en caso contdario.')."</th>
            <th > ".utf8_decode('Observaciones a la pregunta ¿El intangible NO es considerado monetario?')."</th>
            <th > ".utf8_decode('¿El intangible es sin apariencia física? Algunos intangibles pueden estar contenidos en, o contener, un soporte de naturaleza o apariencia física, como es el caso de un disco compacto (caso programas informáticos), de documentación legal (caso licencia)')."</th>
            <th > ".utf8_decode('Observaciones a la pregunta ¿El intangible es sin apariencia física? Por ejemplo el software que se encuentda en un CD, la parte importante es el intangible.')."</th>
            <th > ".utf8_decode('¿El intangible se va a utilizar por más de un año? Verificar si el contdato permite la utilización del intangible por más de un año, igualmente se debe identificar si el área que generó la necesidad de su adquisición piensa utilizarlo por más de un año')."</th>
            <th > ".utf8_decode('bservaciones a la pregunta ¿El intangible se va a utilizar por más de un año?')."</th>
            <th > ".utf8_decode('¿No se espera vender en el curso de las actividades de la entidad? Si la intención de la entidad es NO venderlo, la respuesta es SI. Si la intención de la entidad es venderlo, la respuesta a la pregunta es un NO.')."</th>
            <th > ".utf8_decode('Observaciones a la pregunta ¿No se espera vender en el curso de las actividades de la entidad?')."</th>
            <th > ".utf8_decode('¿La vida útil es finita o indefinida?')."</th>
            <th > ".utf8_decode('Si el proyecto se desarrolló con un aliado externo, indicar cuál es el Porcentaje de contdapartida del SENA')."</th>
            <th > ".utf8_decode('VIDA ÚTIL TOTAL EN MESES, SI ES FINITA. (Tenga en cuenta los términos del contdato o del concepto de quien lo fabricó). Número de meses')."</th>
            <th > ".utf8_decode('VIDA ÚTIL tdANSCURRIDA, SI ES FINITA (con fecha 31/12/2019), Número en meses.')."</th>
            <th > ".utf8_decode('VIDA ÚTIL REMANENTE, SI ES FINITA (resta entde la vida útil total y la tdanscurrida). Número en meses')."</th>
            <th > ".utf8_decode('¿Tiene facturas para registdar?')."</th>
            <th > ".utf8_decode('Fecha de cierre del proyecto técnicamente en la vigencia 2020')."</th>
            <th > ".utf8_decode('Fecha de cierre del proyecto presupuestalmente en la vigencia 2020')."</th>
            <th > ".utf8_decode('Fecha de Registdo')."</th>
            <th > ".utf8_decode('Número de factura')."</th>
            <th > ".utf8_decode('Factura a nombre del Sena')."</th>
            <th > ".utf8_decode('Fecha_factura')."</th>
            <th > ".utf8_decode('Valor total')."</th>
            <th > ".utf8_decode('Tiene IVA')."</th>
            <th > ".utf8_decode('IVA')."</th>
            <th > ".utf8_decode('Concepto')."</th>
            <th > ".utf8_decode('Valor concepto')."</th>
            <th > ".utf8_decode('Es necesario este concepto para poner en funcionamiento el intangible?')."</th>
            <th > ".utf8_decode('La factura que esta registdando corresponde a la fase de?')."</th>

    
            <th > ".utf8_decode('Surgió una nueva ley, norma, acuerdo, decreto o normativa interna que hace verificar la utilización del bien intangible.')."</th>
            <th > ".utf8_decode('Justificación')."</th>
            <th > ".utf8_decode('Se espera reemplazar el activo intangible por uno con mejores condiciones como son capacidad, velocidad, definición, etc')."</th>
            <th > ".utf8_decode('Justificación')."</th>
            <th > ".utf8_decode('AJUSTE DE LA VIDA UTIL: Si alguno de los criterios establecidos en la lista de chequeo se respondió SI, determine el nuevo periodo durante el cual se espera que el activo intangible sea utilizable por parte de los usuarios. En observaciones, indique como llego a este dato o indique el documento soporte para esta determinación.')."</th>

            <th > ".utf8_decode('¿El bien intangible se utilizará hasta que éste se consuma completamente o de forma significativa?')."</th>
            <th > ".utf8_decode('Justificación')."</th>

            <th > ".utf8_decode('¿El activo intangible presenta un patdón de consumo diferente al inicialmente esperado?')."</th>
            <th > ".utf8_decode('Si para esta pregunta, la respuesta fue SI, entonces identifique el nuevo método de amortización que se deberá utilizar de acuerdo al patdón de consumo determinado. ')."</th>
            <th > ".utf8_decode('Indique como llegó al dato de la amortización y adjunte el documento soporte para esta determinación.')."</th>
        
        
            <th > ".utf8_decode('Durante el periodo, han tenido lugar, o van a tener lugar en un futuro inmediato, cambios significativos con una incidencia desfavorable sobre la entidad a largo plazo, los cuales están relacionados con el entorno legal, tecnológico o de política gubernamental, en los que opera la entidad.')."</th>
            <th > ".utf8_decode('Justifique su respuesta en caso afirmativo o negativo')."</th>
            <th > ".utf8_decode('Durante el periodo, el valor de mercado del activo ha disminuido significativamente más que lo que se esperaría como consecuencia del paso del tiempo o de su uso normal.')."</th>
            <th > ".utf8_decode('Justifique su respuesta si es afirmativa  y adjunte las evidencias del estudio del mercado que realizó para determinar el valor del mercado.')."</th>
            <th > ".utf8_decode('Valor del estudio del mercado (si no se puede estimar el costo del valor del mercado, escribir el costo de reposición)')."</th>
            <th > ".utf8_decode('Justifique su respuesta si es negativa indicando el costo de reposición, que es el valor que se incurriría si se tuviera que reponer el bien que se encuentda evaluando, en las mismas condiciones en las que se encuentda. Para esto realice la siguiente pregunta, si tuviera que adquirir este elemento que se encuentda evaluando, ¿cuál sería su costo o valor en el mercado?, ¿ese valor en el que tuviera que incurrir es muy inferior al valor reflejado como VALOR DEL BIEN?.')."</th>
            <th > ".utf8_decode('Valor de reposición del activo intangible.')."</th>
            <th > ".utf8_decode('Se dispone de evidencia sobre la obsolescencia o daño del activo.')."</th>
            <th > ".utf8_decode('Si su respuesta fue afirmativa se debe calcular el valor de dichas rehabilitaciones.')."</th>
            <th > ".utf8_decode('Durante el periodo, han tenido lugar, o se espera que tengan lugar en un futuro inmediato, cambios significativos en el grado de utilización o la manera como se usa o se espera usar el activo, los cuales afectarán desfavorablemente la entidad a largo plazo. Estos cambios incluyen el hecho de que el activo esté ocioso, los planes de discontinuación o restducturación de la operación a la que pertenece el activo, los planes para disponer el activo antes de la fecha prevista y el cambio de la vida útil de un activo de indefinida a finita.')."</th>
            <th > ".utf8_decode('Justifique su respuesta si es afirmativa o negativa.')."</th>
            <th > ".utf8_decode('Se decide detener la construcción del activo antes de su finalización o de su puesta en condiciones de funcionamiento, salvo que exista evidencia objetiva de que se reanudará la constducción en el futuro próximo.')."</th>
            <th > ".utf8_decode('Justifique su respuesta si es afirmativa o negativa.')."</th>
            <th > ".utf8_decode('Se dispone de información procedente de informes internos que indican que la capacidad del activo para suministdar bienes o servicios ha disminuido o va a ser inferior a la esperada. ')."</th>
            <th > ".utf8_decode('Justifique su respuesta si es afirmativa o negativa')."</th>";

            $contenido.= "</tr></thead>";

    $modelo= new intangible();

    if ($project == 'sinCodigo') {
        $result=$modelo->readIntangibleByAdmin();
    } else {
        $result=$modelo->readIntangibleByAdminByProject($project);
    }
	
	if (isset($result)) {

		
	
		

		foreach ($result as $row){ 
                

            //información  
            $contenido.="</thead><tbody><tr>
            <td>".utf8_decode($row['codigo_centro'])."</td>
            <td>".utf8_decode($row['centro_nombre'])."</td>
            <td>".utf8_decode($row['linea_programatica_descripcion'])."</td>
            <td>".utf8_decode($row['proyecto_titulo'])."</td>
            <td>".utf8_decode($row['proyecto_consecutivo'])."</td>
            <td>".utf8_decode($row['Sin Intangibles?'])."</td>
            <td>".utf8_decode($row['justificacion'])."</td>
            <td>".utf8_decode($row['cod_intangible'])."</td>
            <td>".utf8_decode($row['Tipo de intangible'])."</td>
            <td>".utf8_decode($row['Clase de intangibles'])."</td>
            <td>".utf8_decode($row['Nombre del Intangible.'])."</td>
            <td>".utf8_decode($row['¿El intangible es un recurso controlado?'])."</td>
            <td>".utf8_decode($row['Observaciones a la pregunta ¿El intangible es un recurso controlado? Aclare si el SENA tiene el control del uso del intangible, es decir, en que proceso de la entidad se utiliza.'])."</td>
            <td>".utf8_decode($row['¿Del intangible se espera obtener un potencial de servicios?'])."</td>
            <td>".utf8_decode($row['Observaciones a la pregunta ¿Del intangible se espera obtener un potencial de servicios?'])."</td>
            <td>".utf8_decode($row['¿El intangible se puede medir fiablemente?'])."</td>
            <td>".utf8_decode($row['Observaciones a la pregunta ¿El intangible se puede medir fiablemente?'])."</td>
            <td>".utf8_decode($row['¿El intangible se puede identificar?'])."</td>
            <td>".utf8_decode($row['Observaciones a la pregunta ¿El intangible se puede identificar?'])."</td>
            <td>".utf8_decode($row['¿El intangible NO es considerado monetario? El intangibles es monetario cuando es un CDT, un bono o títulos valores y es no monetario en caso contrario.'])."</td>
            <td>".utf8_decode($row['Observaciones a la pregunta ¿El intangible NO es considerado monetario?'])."</td>
            <td>".utf8_decode($row['¿El intangible es sin apariencia física?'])."</td>
            <td>".utf8_decode($row['Observaciones a la pregunta ¿El intangible es sin apariencia física? Por ejemplo el software que se encuentra en un CD, la parte importante es el intangible.'])."</td>
            <td>".utf8_decode($row['¿El intangible se va a utilizar por más de un año?'])."</td>
            <td>".utf8_decode($row['Observaciones a la pregunta ¿El intangible se va a utilizar por más de un año?  '])."</td>
            <td>".utf8_decode($row['¿No se espera vender en el curso de las actividades de la entidad? Si la intención de la entidad es NO venderlo, la respuesta es SI. Si la intención de la entidad es venderlo, la respuesta a la pregunta es un NO.'])."</td>
            <td>".utf8_decode( $row['Observaciones a la pregunta ¿No se espera vender en el curso de las actividades de la entidad?'])."</td>
            <td>".utf8_decode( $row['¿La vida útil es finita o indefinida?'])."</td>
            <td>".utf8_decode( $row['Si el proyecto se desarrolló con un aliado externo, indicar cuál es el Porcentaje de contrapartida del SENA'])."</td>
            <td>".utf8_decode( $row['VIDA ÚTIL TOTAL EN MESES, SI ES FINITA. (Tenga en cuenta los términos del contrato o del concepto de quien lo fabricó). Número de meses'])."</td>
            <td>".utf8_decode( $row['VIDA ÚTIL TRANSCURRIDA, SI ES FINITA (con fecha 31/12/2019), Número en meses.'])."</td>
            <td>".utf8_decode( $row['VIDA ÚTIL REMANENTE, SI ES FINITA (resta entre la vida útil total y la transcurrida). Número en meses'])."</td>
            <td>".utf8_decode( $row['¿Tiene facturas para registrar?'])."</td>
            <td>".utf8_decode( $row['Fecha de cierre del proyecto técnicamente en la vigencia 2020'])."</td>
            <td>".utf8_decode( $row['Fecha de cierre del proyecto presupuestalmente en la vigencia 2020'])."</td>
            <td>".utf8_decode( $row['Fecha de Registro'])."</td>
            <td>".utf8_decode( $row['numero_factura'])."</td>
            <td>".utf8_decode( $row['Factura a nombre del Sena'])."</td>
            <td>".utf8_decode( $row['fecha_factura'])."</td>
            <td>".utf8_decode( $row['valor_total'])."</td>
            <td>".utf8_decode( $row['Tiene Iva'])."</td>
            <td>".utf8_decode( $row['iva'])."</td>
            <td>".utf8_decode( $row['concepto'])."</td>
            <td>".utf8_decode( $row['valor_concepto'])."</td>
            <td>".utf8_decode( $row['Es necesario este concepto para poner en funcionamiento el intangible?'])."</td>
            <td>".utf8_decode( $row['La factura que esta registrando corresponde a la fase de?'])."</td>
            <td>".utf8_decode( $row['Surgió una nueva ley, norma, acuerdo, decreto o normativa interna que hace verificar la utilización del bien intangible.'])."</td>
            <td>".utf8_decode( $row['Justificación: Surgio una nueva ley'])."</td>
            <td>".utf8_decode( $row['Se espera reemplazar el activo intangible por uno con mejores condiciones como son capacidad, velocidad, definición, etc.'])."</td>
            <td>".utf8_decode( $row['Justificación reemplazo del activo intangible'])."</td>
            <td>".utf8_decode( $row['Ajuste de la vida util remanente'])."</td>
            <td>".utf8_decode( $row['¿El bien intangible se utilizará hasta que éste se consuma completamente o de forma significativa?'])."</td>
            <td>".utf8_decode( $row['Justificación ¿El bien intangible se utilizará hasta que éste se consuma completamente o de forma significativa?'])."</td>
            <td>".utf8_decode( $row['¿El activo intangible presenta un patrón de consumo diferente al inicialmente esperado?'])."</td>
            <td>".utf8_decode( $row['Si para esta pregunta, la respuesta fue SI, entonces identifique el nuevo método de amortización que se deberá utilizar de acuerdo al patrón de consumo determinado.'])."</td>
            <td>".utf8_decode( $row['Indique como llegó al dato de la amortización y adjunte el documento soporte para esta determinación.'])."</td>
            <td>".utf8_decode( $row['Durante el periodo, han tenido lugar, o van a tener lugar en un futuro inmediato, cambios significativos con una incidencia desfavorable sobre la entidad a largo plazo.'])."</td>
            <td>".utf8_decode( $row['Justifique su respuesta en caso afirmativo  o negativo.'])."</td>
            <td>".utf8_decode( $row['Durante el periodo, el valor de mercado del activo ha disminuido significativamente más que lo que se esperaría como consecuencia del paso del tiempo o de su uso normal.'])."</td>
            <td>".utf8_decode( $row['Justifique su respuesta si es afirmativa  y adjunte las evidencias del estudio del mercado que realizó para determinar el valor del mercado.'])."</td>
            <td>".utf8_decode( $row['Valor del estudio del mercado (si no se puede estimar el costo del valor del mercado, escribir el costo de reposición).'])."</td>
            <td>".utf8_decode( $row['Justifique su respuesta si es negativa indicando el costo de reposición.'])."</td>
            <td>".utf8_decode( $row['Valor de reposición del activo intangible.'])."</td>
            <td>".utf8_decode( $row['Se dispone de evidencia sobre la obsolescencia o daño del activo.'])."</td>
            <td>".utf8_decode( $row['Si su respuesta fue afirmativa se debe calcular el valor de dichas rehabilitaciones.'])."</td>
            <td>".utf8_decode( $row['Durante el periodo, han tenido lugar, o se espera que tengan lugar en un futuro inmediato, cambios significativos en el grado de utilización.'])."</td>
            <td>".utf8_decode( $row['Justifique su respuesta si es afirmativa o negativa.'])."</td>
            <td>".utf8_decode( $row['Se decide detener la construcción del activo antes de su finalización o de su puesta en condiciones de funcionamiento, salvo que exista evidencia objetiva de que se reanudará la construcción en el futuro próximo.'])."</td>
            <td>".utf8_decode( $row['Justifique su respuesta si es afirmativa o negativa.'])."</td>
            <td>".utf8_decode( $row['Se dispone de información procedente de informes internos que indican que la capacidad del activo para suministrar bienes o servicios ha disminuido o va a ser inferior a la esperada.'])."</td>
            <td>".utf8_decode( $row['Justifique su respuesta si es afirmativa o negativa.'])."</td>

            </tr>";
		     
		}

        $contenido.= "</tbody></table>";

        if ($project == 'sinCodigo') {
            $nombre='Reporte-Intangibles';
        } else {
            $nombre='Reporte-Intangibles-Proyecto-'.$project;
        }
        header('Content-type:application/xls');
        header('Content-Disposition: attachment; filename='.$nombre.'.xls');
        echo $contenido;
        
        

        exit;
            
        
	
    }

   
    
}



if ($_GET['rep'] == 1) {
    downloadExcelReport('sinCodigo');
} else {
    if($_GET['rep'] == 2){
        downloadExcelReport($_GET['proj']);
    }
}



?>