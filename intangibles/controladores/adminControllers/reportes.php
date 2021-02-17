<?php
require_once '../../modelo/conexion/conexion.php';
require_once '../../modelo/intangible/intangibleModelo.php';
require_once '../seguridad/adminSecurity.php';
adminRol(2);
function getHeaders($nombre){

	// Redirect output to a client’s web browser (Excel2007)
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment;filename="'.$nombre.'.xlsx"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');

	// If you're serving to IE over SSL, then the following may be needed
	header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
	header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	header ('Pragma: public'); // HTTP/1.0

    }
    
function downloadExcelReport($project)
{
    require_once '../../library/phpExcel/Classes/PHPExcel.php';

    $objPHPExcel = new PHPExcel();
	// Contenido de historia del archivo
	$objPHPExcel->getProperties()->setCreator("SENNOVA-INTANGIBLE 2021")
							 ->setLastModifiedBy("Maarten Balliauw")
							 //veersion minima de excel
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");

	//tipo de letra y tamaño
	$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')
                                          ->setSize(10);



    // estilos de los titulos de las columnas
    $estiloTituloColumnas = array(
    	//fuente
	    'font' => array(
		'name'  => 'Arial',
		'bold'  => true,
		'size' =>10,
		'color' => array(
		'rgb' => '000000'
		)
	    ),
	    //colores
	    'fill' => array(
		'type' => PHPExcel_Style_Fill::FILL_SOLID,
		'color' => array('rgb' => 'D0CECE')
	    ),
	    //enmarcados de los bordes
	    'borders' => array(
		'allborders' => array(
		'style' => PHPExcel_Style_Border::BORDER_THIN
		)
	    ),
	    //alineación
	    'alignment' =>  array(
		'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
	    )
	);
    //bordes del contenido
    $bordeCeldas = array(
	 
	    'borders' => array(
		'allborders' => array(
		'style' => PHPExcel_Style_Border::BORDER_THIN
		)
	    ),
	   
	);
	//color de fondo de contenido
	$sheet = array(
           'fill' => array(
               'type' => PHPExcel_Style_Fill::FILL_SOLID,
               'color' => array('rgb' => 'BDD7EE')
           
       )
	);
	//alineacion del contenido
	$alin= array(
		'alignment' =>  array(
		'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
		) 
	);



	//ancho en filas de la tabla y sus estilos
	$objPHPExcel->getActiveSheet()->getStyle('A2:BS2')->applyFromArray($estiloTituloColumnas);
	

	// dibujo de los titulps y las cabeceras de la tabla
    $objPHPExcel->setActiveSheetIndex(0)
    //Titulos de costo de intangibles, facturas y nombramiento
            ->setCellValue('A1','Nombres y Costos de intangibles')
            ->setCellValue('AU1','LISTA DE CHEQUEO REVISION VIDA UTIL REMANENTE')
            ->setCellValue('AZ1','LISTA DE CHEQUEO REVISION VALOR RESIDUAL')
            ->setCellValue('BB2',' LISTA DE CHEQUEO REVISION MÉTODO DE AMORTIZACIÓN')
            ->setCellValue('BE2',' LISTA DE CHEQUEO REVISION INDICIOS DE DETERIORO')
			->setCellValue('A2', 'Código de centro')
            ->setCellValue('B2', 'Nombre de centro')
            ->setCellValue('C2', 'Descripción de la linea programática')
            ->setCellValue('D2', 'Titulo del proyecto')
            ->setCellValue('E2', 'Proyecto consecutivo')
            ->setCellValue('F2', 'Sin intangibles?')
            ->setCellValue('G2', 'Justificación')
            ->setCellValue('H2', 'Código del intangible')
            ->setCellValue('I2', 'Tipo de intangible')
            ->setCellValue('J2', 'Clase de intangible')
            ->setCellValue('K2', 'Nombre del intangible')
            ->setCellValue('L2', '¿El intangible es un recurso controlado? Control implica la capacidad del SENA para usar un recurso o definir el uso que un tercero debe darle, para las funciones administrativas o de formación profesional, al igual si se dispone de proceso o procedimiento')
            ->setCellValue('M2', 'Observaciones a la pregunta ¿El intangible es un recurso controlado? Aclare si el SENA tiene el control del uso del intangible, es decir, en que proceso de la entidad se utiliza.')
            ->setCellValue('N2', '¿Del intangible se espera obtener un potencial de servicios?')
            ->setCellValue('O2', 'Observaciones a la pregunta ¿Del intangible se espera obtener un potencial de servicios?')
            ->setCellValue('P2', '¿El intangible se puede medir fiablemente? La medición de un activo es fiable cuando existe evidencia de transacciones para el activo u otros similares, o cuando la estimación del valor depende de variables que se pueden medir en términos monetarios.')
            ->setCellValue('Q2', 'Observaciones a la pregunta ¿El intangible se puede medir fiablemente?')
            ->setCellValue('R2', '¿El intangible se puede identificar?')
            ->setCellValue('S2', 'Observaciones a la pregunta ¿El intangible se puede identificar?')
            ->setCellValue('T2', '¿El intangible NO es considerado monetario? El intangibles es monetario cuando es un CDT, un bono o títulos valores y es no monetario en caso contrario.')
            ->setCellValue('U2', 'Observaciones a la pregunta ¿El intangible NO es considerado monetario?')
            ->setCellValue('V2', '¿El intangible es sin apariencia física? Algunos intangibles pueden estar contenidos en, o contener, un soporte de naturaleza o apariencia física, como es el caso de un disco compacto (caso programas informáticos), de documentación legal (caso licencia)')
            ->setCellValue('W2', 'Observaciones a la pregunta ¿El intangible es sin apariencia física? Por ejemplo el software que se encuentra en un CD, la parte importante es el intangible.')
            ->setCellValue('X2', '¿El intangible se va a utilizar por más de un año? Verificar si el contrato permite la utilización del intangible por más de un año, igualmente se debe identificar si el área que generó la necesidad de su adquisición piensa utilizarlo por más de un año')
            ->setCellValue('Y2','Observaciones a la pregunta ¿El intangible se va a utilizar por más de un año?')
            ->setCellValue('Z2', '¿No se espera vender en el curso de las actividades de la entidad? Si la intención de la entidad es NO venderlo, la respuesta es SI. Si la intención de la entidad es venderlo, la respuesta a la pregunta es un NO.')
            ->setCellValue('AA2', 'Observaciones a la pregunta ¿No se espera vender en el curso de las actividades de la entidad?')
            ->setCellValue('AB2', '¿La vida útil es finita o indefinida?')
            ->setCellValue('AC2', 'Si el proyecto se desarrolló con un aliado externo, indicar cuál es el Porcentaje de contrapartida del SENA')
            ->setCellValue('AD2', 'VIDA ÚTIL TOTAL EN MESES, SI ES FINITA. (Tenga en cuenta los términos del contrato o del concepto de quien lo fabricó). Número de meses')
            ->setCellValue('AE2', 'VIDA ÚTIL TRANSCURRIDA, SI ES FINITA (con fecha 31/12/2019), Número en meses.')
            ->setCellValue('AF2', 'VIDA ÚTIL REMANENTE, SI ES FINITA (resta entre la vida útil total y la transcurrida). Número en meses')
            ->setCellValue('AG2', '¿Tiene facturas para registrar?')
            ->setCellValue('AH2', 'Fecha de cierre del proyecto técnicamente en la vigencia 2020')
            ->setCellValue('AI2', 'Fecha de cierre del proyecto presupuestalmente en la vigencia 2020')
            ->setCellValue('AJ2', 'Fecha de Registro')
            ->setCellValue('AK2', 'Número de factura')
            ->setCellValue('AL2', 'Factura a nombre del Sena')
            ->setCellValue('AM2', 'Fecha_factura')
            ->setCellValue('AN2', 'Valor total')
            ->setCellValue('AO2', 'Tiene IVA')
            ->setCellValue('AP2', 'IVA')
            ->setCellValue('AQ2', 'Concepto')
            ->setCellValue('AR2', 'Valor concepto')
            ->setCellValue('AS2', 'Es necesario este concepto para poner en funcionamiento el intangible?')
            ->setCellValue('AT2', 'La factura que esta registrando corresponde a la fase de?')

        //Titulos de listas de chequeo de vida remanente
	
            ->setCellValue('AU2', 'Surgió una nueva ley, norma, acuerdo, decreto o normativa interna que hace verificar la utilización del bien intangible.')
            ->setCellValue('AV2', 'Justificación')
            ->setCellValue('AW2', 'Se espera reemplazar el activo intangible por uno con mejores condiciones como son capacidad, velocidad, definición, etc')
            ->setCellValue('AX2', 'Justificación')
            ->setCellValue('AY2', 'AJUSTE DE LA VIDA UTIL: Si alguno de los criterios establecidos en la lista de chequeo se respondió “SI”, determine el nuevo periodo durante el cual se espera que el activo intangible sea utilizable por parte de los usuarios. En observaciones, indique como llego a este dato o indique el documento soporte para esta determinación.')

        //Titulos de listas de chequeo revision valor residual
            ->setCellValue('AZ2', '¿El bien intangible se utilizará hasta que éste se consuma completamente o de forma significativa?')
            ->setCellValue('BA2', 'Justificación')

        //Titulos de listas de chequeo revision metodo de amortización
            ->setCellValue('BB2', '¿El activo intangible presenta un patrón de consumo diferente al inicialmente esperado?')
            ->setCellValue('BC2', 'Si para esta pregunta, la respuesta fue SI, entonces identifique el nuevo método de amortización que se deberá utilizar de acuerdo al patrón de consumo determinado. ')
            ->setCellValue('BD2', 'Indique como llegó al dato de la amortización y adjunte el documento soporte para esta determinación.')
        
        //Titulos de listas de chequeo revisión de indicios de deterioro
            ->setCellValue('BE2', 'Durante el periodo, han tenido lugar, o van a tener lugar en un futuro inmediato, cambios significativos con una incidencia desfavorable sobre la entidad a largo plazo, los cuales están relacionados con el entorno legal, tecnológico o de política gubernamental, en los que opera la entidad.')
            ->setCellValue('BF2', 'Justifique su respuesta en caso afirmativo o negativo')
            ->setCellValue('BG2', 'Durante el periodo, el valor de mercado del activo ha disminuido significativamente más que lo que se esperaría como consecuencia del paso del tiempo o de su uso normal.')
            ->setCellValue('BH2', 'Justifique su respuesta si es afirmativa  y adjunte las evidencias del estudio del mercado que realizó para determinar el valor del mercado.')
            ->setCellValue('BI2', 'Valor del estudio del mercado (si no se puede estimar el costo del valor del mercado, escribir el costo de reposición)')
            ->setCellValue('BJ2', 'Justifique su respuesta si es negativa indicando el costo de reposición, que es el valor que se incurriría si se tuviera que reponer el bien que se encuentra evaluando, en las mismas condiciones en las que se encuentra. Para esto realice la siguiente pregunta, si tuviera que adquirir este elemento que se encuentra evaluando, ¿cuál sería su costo o valor en el mercado?, ¿ese valor en el que tuviera que incurrir es muy inferior al valor reflejado como VALOR DEL BIEN?.')
            ->setCellValue('BK2', 'Valor de reposición del activo intangible.')
            ->setCellValue('BL2', 'Se dispone de evidencia sobre la obsolescencia o daño del activo.')
            ->setCellValue('BM2', 'Si su respuesta fue afirmativa se debe calcular el valor de dichas rehabilitaciones.')
            ->setCellValue('BN2', 'Durante el periodo, han tenido lugar, o se espera que tengan lugar en un futuro inmediato, cambios significativos en el grado de utilización o la manera como se usa o se espera usar el activo, los cuales afectarán desfavorablemente la entidad a largo plazo. Estos cambios incluyen el hecho de que el activo esté ocioso, los planes de discontinuación o restructuración de la operación a la que pertenece el activo, los planes para disponer el activo antes de la fecha prevista y el cambio de la vida útil de un activo de indefinida a finita.')
            ->setCellValue('BO2', 'Justifique su respuesta si es afirmativa o negativa.')
            ->setCellValue('BP2', 'Se decide detener la construcción del activo antes de su finalización o de su puesta en condiciones de funcionamiento, salvo que exista evidencia objetiva de que se reanudará la construcción en el futuro próximo.')
            ->setCellValue('BQ2', 'Justifique su respuesta si es afirmativa o negativa.')
            ->setCellValue('BR2', 'Se dispone de información procedente de informes internos que indican que la capacidad del activo para suministrar bienes o servicios ha disminuido o va a ser inferior a la esperada. ')
            ->setCellValue('BS2', 'Justifique su respuesta si es afirmativa o negativa');

    $modelo= new intangible();

    if ($project == 'sinCodigo') {
        $result=$modelo->readIntangibleByAdmin();
    } else {
        $result=$modelo->readIntangibleByAdminByProject($project);
    }
	
	if (isset($result)) {

		
	
		$i=3;


		foreach ($result as $row){ 
                

					//información  
					$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue("A$i", $row['codigo_centro'])
					->setCellValue("B$i", $row['centro_nombre'])
					->setCellValue("C$i", $row['linea_programatica_descripcion'])
		            ->setCellValue("D$i", $row['proyecto_titulo'])
		            ->setCellValue("E$i", $row['proyecto_consecutivo'])
		            ->setCellValue("F$i", $row['Sin Intangibles?'])
		            ->setCellValue("G$i", $row['justificacion'])
					->setCellValue("H$i", $row['cod_intangible'])
					->setCellValue("I$i", $row['Tipo de intangible'])
		            ->setCellValue("J$i", $row['Clase de intangibles'])
                    ->setCellValue("K$i", $row['Nombre del Intangible.'])
                    ->setCellValue("L$i", $row['¿El intangible es un recurso controlado? Control implica la capacidad del SENA para usar un recurso o definir el uso que un tercero debe darle, para las funciones administrativas o de formación profesional, al igual si se dispone de proceso o procedimien'])
                    ->setCellValue("M$i", $row['Observaciones a la pregunta ¿El intangible es un recurso controlado? Aclare si el SENA tiene el control del uso del intangible, es decir, en que proceso de la entidad se utiliza.'])
                    ->setCellValue("N$i", $row['¿Del intangible se espera obtener un potencial de servicios?'])
                    ->setCellValue("O$i", $row['Observaciones a la pregunta ¿Del intangible se espera obtener un potencial de servicios?'])
                    ->setCellValue("P$i", $row['¿El intangible se puede medir fiablemente? La medición de un activo es fiable cuando existe evidencia de transacciones para el activo u otros similares, o cuando la estimación del valor depende de variables que se pueden medir en términos monetarios.'])
                    ->setCellValue("Q$i", $row['Observaciones a la pregunta ¿El intangible se puede medir fiablemente?'])
                    ->setCellValue("R$i", $row['¿El intangible se puede identificar?'])
                    ->setCellValue("S$i", $row['Observaciones a la pregunta ¿El intangible se puede identificar?'])
                    ->setCellValue("T$i", $row['¿El intangible NO es considerado monetario? El intangibles es monetario cuando es un CDT, un bono o títulos valores y es no monetario en caso contrario.'])
                    ->setCellValue("U$i", $row['Observaciones a la pregunta ¿El intangible NO es considerado monetario?'])
                    ->setCellValue("V$i", $row['¿El intangible es sin apariencia física? Algunos intangibles pueden estar contenidos en, o contener, un soporte de naturaleza o apariencia física, como es el caso de un disco compacto (caso programas informáticos), de documentación legal (caso licenci'])
                    ->setCellValue("W$i", $row['Observaciones a la pregunta ¿El intangible es sin apariencia física? Por ejemplo el software que se encuentra en un CD, la parte importante es el intangible.'])
                    ->setCellValue("X$i", $row['¿El intangible se va a utilizar por más de un año? Verificar si el contrato permite la utilización del intangible por más de un año, igualmente se debe identificar si el área que generó la necesidad de su adquisición piensa utilizarlo por más de '])
                    ->setCellValue("Y$i", $row['Observaciones a la pregunta ¿El intangible se va a utilizar por más de un año?  '])
                    ->setCellValue("Z$i", $row['¿No se espera vender en el curso de las actividades de la entidad? Si la intención de la entidad es NO venderlo, la respuesta es SI. Si la intención de la entidad es venderlo, la respuesta a la pregunta es un NO.'])
                    ->setCellValue("AA$i", $row['Observaciones a la pregunta ¿No se espera vender en el curso de las actividades de la entidad?'])
                    ->setCellValue("AB$i", $row['¿La vida útil es finita o indefinida?'])
                    ->setCellValue("AC$i", $row['Si el proyecto se desarrolló con un aliado externo, indicar cuál es el Porcentaje de contrapartida del SENA'])
                    ->setCellValue("AD$i", $row['VIDA ÚTIL TOTAL EN MESES, SI ES FINITA. (Tenga en cuenta los términos del contrato o del concepto de quien lo fabricó). Número de meses'])
                    ->setCellValue("AE$i", $row['VIDA ÚTIL TRANSCURRIDA, SI ES FINITA (con fecha 31/12/2019), Número en meses.'])
                    ->setCellValue("AF$i", $row['VIDA ÚTIL REMANENTE, SI ES FINITA (resta entre la vida útil total y la transcurrida). Número en meses'])
                    ->setCellValue("AG$i", $row['¿Tiene facturas para registrar?'])
                    ->setCellValue("AH$i", $row['Fecha de cierre del proyecto técnicamente en la vigencia 2020'])
                    ->setCellValue("AI$i", $row['Fecha de cierre del proyecto presupuestalmente en la vigencia 2020'])
                    ->setCellValue("AJ$i", $row['Fecha de Registro'])
                    ->setCellValue("AK$i", $row['numero_factura'])
                    ->setCellValue("AL$i", $row['Factura a nombre del Sena'])
                    ->setCellValue("AM$i", $row['fecha_factura'])
                    ->setCellValue("AN$i", $row['valor_total'])
                    ->setCellValue("AO$i", $row['Tiene Iva'])
                    ->setCellValue("AP$i", $row['iva'])
                    ->setCellValue("AQ$i", $row['concepto'])
                    ->setCellValue("AR$i", $row['valor_concepto'])
                    ->setCellValue("AS$i", $row['Es necesario este concepto para poner en funcionamiento el intangible?'])
                    ->setCellValue("AT$i", $row['La factura que esta registrando corresponde a la fase de?'])
                    ->setCellValue("AU$i", $row['Surgió una nueva ley, norma, acuerdo, decreto o normativa interna que hace verificar la utilización del bien intangible.'])
                    ->setCellValue("AV$i", $row['Justificación: Surgio una nueva ley'])
                    ->setCellValue("AW$i", $row['Se espera reemplazar el activo intangible por uno con mejores condiciones como son capacidad, velocidad, definición, etc.'])
                    ->setCellValue("AX$i", $row['Justificación reemplazo del activo intangible'])
                    ->setCellValue("AY$i", $row['Ajuste de la vida util remanente'])
                    ->setCellValue("AZ$i", $row['¿El bien intangible se utilizará hasta que éste se consuma completamente o de forma significativa?'])
                    ->setCellValue("BA$i", $row['Justificación ¿El bien intangible se utilizará hasta que éste se consuma completamente o de forma significativa?'])
                    ->setCellValue("BB$i", $row['¿El activo intangible presenta un patrón de consumo diferente al inicialmente esperado?'])
                    ->setCellValue("BC$i", $row['Si para esta pregunta, la respuesta fue SI, entonces identifique el nuevo método de amortización que se deberá utilizar de acuerdo al patrón de consumo determinado.'])
                    ->setCellValue("BD$i", $row['Indique como llegó al dato de la amortización y adjunte el documento soporte para esta determinación.'])
                    ->setCellValue("BE$i", $row['Durante el periodo, han tenido lugar, o van a tener lugar en un futuro inmediato, cambios significativos con una incidencia desfavorable sobre la entidad a largo plazo.'])
                    ->setCellValue("BF$i", $row['Justifique su respuesta en caso afirmativo  o negativo.'])
                    ->setCellValue("BG$i", $row['Durante el periodo, el valor de mercado del activo ha disminuido significativamente más que lo que se esperaría como consecuencia del paso del tiempo o de su uso normal.'])
                    ->setCellValue("BH$i", $row['Justifique su respuesta si es afirmativa  y adjunte las evidencias del estudio del mercado que realizó para determinar el valor del mercado.'])
                    ->setCellValue("BI$i", $row['Valor del estudio del mercado (si no se puede estimar el costo del valor del mercado, escribir el costo de reposición).'])
                    ->setCellValue("BJ$i", $row['Justifique su respuesta si es negativa indicando el costo de reposición.'])
                    ->setCellValue("BK$i", $row['Valor de reposición del activo intangible.'])
                    ->setCellValue("BL$i", $row['Se dispone de evidencia sobre la obsolescencia o daño del activo.'])
                    ->setCellValue("BM$i", $row['Si su respuesta fue afirmativa se debe calcular el valor de dichas rehabilitaciones.'])
                    ->setCellValue("BN$i", $row['Durante el periodo, han tenido lugar, o se espera que tengan lugar en un futuro inmediato, cambios significativos en el grado de utilización.'])
                    ->setCellValue("BO$i", $row['Justifique su respuesta si es afirmativa o negativa.'])
                    ->setCellValue("BP$i", $row['Se decide detener la construcción del activo antes de su finalización o de su puesta en condiciones de funcionamiento, salvo que exista evidencia objetiva de que se reanudará la construcción en el futuro próximo.'])
                    ->setCellValue("BQ$i", $row['Justifique su respuesta si es afirmativa o negativa.'])
                    ->setCellValue("BR$i", $row['Se dispone de información procedente de informes internos que indican que la capacidad del activo para suministrar bienes o servicios ha disminuido o va a ser inferior a la esperada.'])
                    ->setCellValue("BS$i", $row['Justifique su respuesta si es afirmativa o negativa.']);

		      		$i++;   
		     
		}
		$i=$i-1;
		//ajustes de texto
        
        $objPHPExcel->getActiveSheet()->getStyle("A1:BS$i")->applyFromArray($bordeCeldas);
		$objPHPExcel->getActiveSheet()->getStyle("A1:BS$i")->applyFromArray($sheet);
        $objPHPExcel->getActiveSheet()->getStyle("A1:BS$i")->applyFromArray($alin);
        $objPHPExcel->getActiveSheet()->mergeCells('A1:AT1');
        $objPHPExcel->getActiveSheet()->mergeCells('AU1:AY1');
        $objPHPExcel->getActiveSheet()->mergeCells('AZ1:BA1');
        $objPHPExcel->getActiveSheet()->mergeCells('BB1:BD1');
        $objPHPExcel->getActiveSheet()->mergeCells('BE1:BS1');
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AL')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AM')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AN')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AO')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AP')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AQ')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AR')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AS')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AT')->setAutoSize(true);

        $objPHPExcel->getActiveSheet()->getColumnDimension('AU')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AV')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AW')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AX')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AY')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AZ')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BA')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BB')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BC')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BD')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BE')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BF')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BG')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BH')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BI')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BJ')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BK')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BL')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BM')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BN')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BO')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BP')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BQ')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BR')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('BS')->setAutoSize(true);







		//titulo del archivpo
		$objPHPExcel->getActiveSheet()->setTitle('Reporte-Intangibles');


		$objPHPExcel->setActiveSheetIndex(0);

        if ($project == 'sinCodigo') {
            $nombre='Reporte-Intangibles';
        } else {
            $nombre='Reporte-Intangibles-Proyecto-'.$project;
        }
		
		getHeaders($nombre);


		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
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