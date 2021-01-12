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
    require_once '../../libreria/phpExcel/Classes/PHPExcel.php';

    $objPHPExcel = new PHPExcel();
	// Contenido de historia del archivo
	$objPHPExcel->getProperties()->setCreator("ADSI 2020")
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
	$objPHPExcel->getActiveSheet()->getStyle('A1:AT1')->applyFromArray($estiloTituloColumnas);
	

	// dibujo de los titulps y las cabeceras de la tabla
	$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A1', 'Código de centro')
            ->setCellValue('B1', 'Nombre de centro')
            ->setCellValue('C1', 'Descripción de la linea programática')
            ->setCellValue('D1', 'Titulo del proyecto')
            ->setCellValue('E1', 'Proyecto consecutivo')
            ->setCellValue('F1', 'Sin intangibles?')
            ->setCellValue('G1', 'Justificación')
            ->setCellValue('H1', 'Código del intangible')
            ->setCellValue('I1', 'Tipo de intangible')
            ->setCellValue('J1', 'Clase de intangible')
            ->setCellValue('K1', 'Nombre del intangible')
            ->setCellValue('L1', '¿El intangible es un recurso controlado? Control implica la capacidad del SENA para usar un recurso o definir el uso que un tercero debe darle, para las funciones administrativas o de formación profesional, al igual si se dispone de proceso o procedimiento')
            ->setCellValue('M1', 'Observaciones a la pregunta ¿El intangible es un recurso controlado? Aclare si el SENA tiene el control del uso del intangible, es decir, en que proceso de la entidad se utiliza.')
            ->setCellValue('N1', '¿Del intangible se espera obtener un potencial de servicios?')
            ->setCellValue('O1', 'Observaciones a la pregunta ¿Del intangible se espera obtener un potencial de servicios?')
            ->setCellValue('P1', '¿El intangible se puede medir fiablemente? La medición de un activo es fiable cuando existe evidencia de transacciones para el activo u otros similares, o cuando la estimación del valor depende de variables que se pueden medir en términos monetarios.')
            ->setCellValue('Q1', 'Observaciones a la pregunta ¿El intangible se puede medir fiablemente?')
            ->setCellValue('R1', '¿El intangible se puede identificar?')
            ->setCellValue('S1', 'Observaciones a la pregunta ¿El intangible se puede identificar?')
            ->setCellValue('T1', '¿El intangible NO es considerado monetario? El intangibles es monetario cuando es un CDT, un bono o títulos valores y es no monetario en caso contrario.')
            ->setCellValue('U1', 'Observaciones a la pregunta ¿El intangible NO es considerado monetario?')
            ->setCellValue('V1', '¿El intangible es sin apariencia física? Algunos intangibles pueden estar contenidos en, o contener, un soporte de naturaleza o apariencia física, como es el caso de un disco compacto (caso programas informáticos), de documentación legal (caso licencia)')
            ->setCellValue('W1', 'Observaciones a la pregunta ¿El intangible es sin apariencia física? Por ejemplo el software que se encuentra en un CD, la parte importante es el intangible.')
            ->setCellValue('X1', '¿El intangible se va a utilizar por más de un año? Verificar si el contrato permite la utilización del intangible por más de un año, igualmente se debe identificar si el área que generó la necesidad de su adquisición piensa utilizarlo por más de un año')
            ->setCellValue('Y1','Observaciones a la pregunta ¿El intangible se va a utilizar por más de un año?')
            ->setCellValue('Z1', '¿No se espera vender en el curso de las actividades de la entidad? Si la intención de la entidad es NO venderlo, la respuesta es SI. Si la intención de la entidad es venderlo, la respuesta a la pregunta es un NO.')
            ->setCellValue('AA1', 'Observaciones a la pregunta ¿No se espera vender en el curso de las actividades de la entidad?')
            ->setCellValue('AB1', '¿La vida útil es finita o indefinida?')
            ->setCellValue('AC1', 'Si el proyecto se desarrolló con un aliado externo, indicar cuál es el Porcentaje de contrapartida del SENA')
            ->setCellValue('AD1', 'VIDA ÚTIL TOTAL EN MESES, SI ES FINITA. (Tenga en cuenta los términos del contrato o del concepto de quien lo fabricó). Número de meses')
            ->setCellValue('AE1', 'VIDA ÚTIL TRANSCURRIDA, SI ES FINITA (con fecha 31/12/2019), Número en meses.')
            ->setCellValue('AF1', 'VIDA ÚTIL REMANENTE, SI ES FINITA (resta entre la vida útil total y la transcurrida). Número en meses')
            ->setCellValue('AG1', '¿Tiene facturas para registrar?')
            ->setCellValue('AH1', 'Fecha de cierre del proyecto técnicamente en la vigencia 2020')
            ->setCellValue('AI1', 'Fecha de cierre del proyecto presupuestalmente en la vigencia 2020')
            ->setCellValue('AJ1', 'Fecha de Registro')
            ->setCellValue('AK1', 'Número de factura')
            ->setCellValue('AL1', 'Factura a nombre del Sena')
            ->setCellValue('AM1', 'Fecha_factura')
            ->setCellValue('AN1', 'Valor total')
            ->setCellValue('AO1', 'Tiene IVA')
            ->setCellValue('AP1', 'IVA')
            ->setCellValue('AQ1', 'Concepto')
            ->setCellValue('AR1', 'Valor concepto')
            ->setCellValue('AS1', 'Es necesario este concepto para poner en funcionamiento el intangible?')
            ->setCellValue('AT1', 'La factura que esta registrando corresponde a la fase de?');


	

    $modelo= new intangible();

    if ($project == 'sinCodigo') {
        $result=$modelo->readIntangibleByAdmin();
    } else {
        $result=$modelo->readIntangibleByAdminByProject($project);
    }
	
	if (isset($result)) {

		
	
		$i=2;


		foreach ($result as $row){ 
                

					//información  
					$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue("A$i", utf8_encode($row['codigo_centro']))
					->setCellValue("B$i", utf8_encode($row['centro_nombre']))
					->setCellValue("C$i", utf8_encode($row['linea_programatica_descripcion']))
		            ->setCellValue("D$i", utf8_encode($row['proyecto_titulo']))
		            ->setCellValue("E$i", utf8_encode($row['proyecto_consecutivo']))
		            ->setCellValue("F$i", utf8_encode($row['Sin Intangibles?']))
		            ->setCellValue("G$i", utf8_encode($row['justificacion']))
					->setCellValue("H$i", utf8_encode($row['cod_intangible']))
					->setCellValue("I$i", utf8_encode($row['Tipo de intangible']))
		            ->setCellValue("J$i", utf8_encode($row['Clase de intangibles']))
                    ->setCellValue("K$i", utf8_encode($row['Nombre del Intangible.']))
                    ->setCellValue("L$i", utf8_encode($row['¿El intangible es un recurso controlado? Control implica la capacidad del SENA para usar un recurso o definir el uso que un tercero debe darle, para las funciones administrativas o de formación profesional, al igual si se dispone de proceso o procedimien']))
                    ->setCellValue("M$i", utf8_encode($row['Observaciones a la pregunta ¿El intangible es un recurso controlado? Aclare si el SENA tiene el control del uso del intangible, es decir, en que proceso de la entidad se utiliza.']))
                    ->setCellValue("N$i", utf8_encode($row['¿Del intangible se espera obtener un potencial de servicios?']))
                    ->setCellValue("O$i", utf8_encode($row['Observaciones a la pregunta ¿Del intangible se espera obtener un potencial de servicios?']))
                    ->setCellValue("P$i", utf8_encode($row['¿El intangible se puede medir fiablemente? La medición de un activo es fiable cuando existe evidencia de transacciones para el activo u otros similares, o cuando la estimación del valor depende de variables que se pueden medir en términos monetarios.']))
                    ->setCellValue("Q$i", utf8_encode($row['Observaciones a la pregunta ¿El intangible se puede medir fiablemente?']))
                    ->setCellValue("R$i", utf8_encode($row['¿El intangible se puede identificar?']))
                    ->setCellValue("S$i", utf8_encode($row['Observaciones a la pregunta ¿El intangible se puede identificar?']))
                    ->setCellValue("T$i", utf8_encode($row['¿El intangible NO es considerado monetario? El intangibles es monetario cuando es un CDT, un bono o títulos valores y es no monetario en caso contrario.']))
                    ->setCellValue("U$i", utf8_encode($row['Observaciones a la pregunta ¿El intangible NO es considerado monetario?']))
                    ->setCellValue("V$i", utf8_encode($row['¿El intangible es sin apariencia física? Algunos intangibles pueden estar contenidos en, o contener, un soporte de naturaleza o apariencia física, como es el caso de un disco compacto (caso programas informáticos), de documentación legal (caso licenci']))
                    ->setCellValue("W$i", utf8_encode($row['Observaciones a la pregunta ¿El intangible es sin apariencia física? Por ejemplo el software que se encuentra en un CD, la parte importante es el intangible.']))
                    ->setCellValue("X$i", utf8_encode($row['¿El intangible se va a utilizar por más de un año? Verificar si el contrato permite la utilización del intangible por más de un año, igualmente se debe identificar si el área que generó la necesidad de su adquisición piensa utilizarlo por más de ']))
                    ->setCellValue("Y$i", utf8_encode($row['Observaciones a la pregunta ¿El intangible se va a utilizar por más de un año?  ']))
                    ->setCellValue("Z$i", utf8_encode($row['¿No se espera vender en el curso de las actividades de la entidad? Si la intención de la entidad es NO venderlo, la respuesta es SI. Si la intención de la entidad es venderlo, la respuesta a la pregunta es un NO.']))
                    ->setCellValue("AA$i", utf8_encode($row['Observaciones a la pregunta ¿No se espera vender en el curso de las actividades de la entidad?']))
                    ->setCellValue("AB$i", utf8_encode($row['¿La vida útil es finita o indefinida?']))
                    ->setCellValue("AC$i", utf8_encode($row['Si el proyecto se desarrolló con un aliado externo, indicar cuál es el Porcentaje de contrapartida del SENA']))
                    ->setCellValue("AD$i", utf8_encode($row['VIDA ÚTIL TOTAL EN MESES, SI ES FINITA. (Tenga en cuenta los términos del contrato o del concepto de quien lo fabricó). Número de meses']))
                    ->setCellValue("AE$i", utf8_encode($row['VIDA ÚTIL TRANSCURRIDA, SI ES FINITA (con fecha 31/12/2019), Número en meses.']))
                    ->setCellValue("AF$i", utf8_encode($row['VIDA ÚTIL REMANENTE, SI ES FINITA (resta entre la vida útil total y la transcurrida). Número en meses']))
                    ->setCellValue("AG$i", utf8_encode($row['¿Tiene facturas para registrar?']))
                    ->setCellValue("AH$i", utf8_encode($row['Fecha de cierre del proyecto técnicamente en la vigencia 2020']))
                    ->setCellValue("AI$i", utf8_encode($row['Fecha de cierre del proyecto presupuestalmente en la vigencia 2020']))
                    ->setCellValue("AJ$i", utf8_encode($row['Fecha de Registro']))
                    ->setCellValue("AK$i", utf8_encode($row['numero_factura']))
                    ->setCellValue("AL$i", utf8_encode($row['Factura a nombre del Sena']))
                    ->setCellValue("AM$i", utf8_encode($row['fecha_factura']))
                    ->setCellValue("AN$i", utf8_encode($row['valor_total']))
                    ->setCellValue("AO$i", utf8_encode($row['Tiene Iva']))
                    ->setCellValue("AP$i", utf8_encode($row['iva']))
                    ->setCellValue("AQ$i", utf8_encode($row['concepto']))
                    ->setCellValue("AR$i", utf8_encode($row['valor_concepto']))
                    ->setCellValue("AS$i", utf8_encode($row['Es necesario este concepto para poner en funcionamiento el intangible?']))
                    ->setCellValue("AT$i", utf8_encode($row['La factura que esta registrando corresponde a la fase de?']));

		      		$i++;   
		     
		}
		$i=$i-1;
		//ajustes de texto
		$objPHPExcel->getActiveSheet()->getStyle("A2:AT$i")->applyFromArray($bordeCeldas);
		$objPHPExcel->getActiveSheet()->getStyle("A2:AT$i")->applyFromArray($sheet);
		$objPHPExcel->getActiveSheet()->getStyle("A2:AT$i")->applyFromArray($alin);
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