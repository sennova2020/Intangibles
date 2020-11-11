<?php

include('conexion.php');
include('../funciones/funciones.php');
session_start();
// error_reporting(0);
/*
 * Variables de sesión: Primer Formulario => $fu#
 *
 * Tabla correspondiente: db.proyecto as p
 */

$fu1 = $_POST['f_programatica'];     // Linea Programática // DB: p.linea_programatica_id
$fu2 = $_POST['f_moder'];            // Modernización // DB: p.modernizacion_id
$fu3 = $_POST['f_regional'];         // Nombre Regional // DB: p.regional_id
$fu4 = $_POST['f_centro'];           // Nombre Centro // DB: p.centro_id
$fu5 = $_POST['f_subdirector'];      // Nombre SubDirector // DB: p.subdirector_id
$fu6 = $_POST['celular_subdirector']; // Celular SubDirector // DB: sub.
$fu7 = $_POST['f_nautores'];         // Autores del Proyecto // DB: p.proyecto_nombre_autor
$fu8 = $_POST['f_iautores'];         // Identificación Autores // DB: p.proyecto_cc_autor
$fu9 = $_POST['f_co_autores'];      // Correo Autores // DB: p.proyecto_email_autor
$fu10 = $_POST['f_cel_autores'];     // Celulares Autores // DB: p.proyecto_celular_autor
$fu11 = $_POST['f_ngrupo'];          // Nombre Grupo // DB: p.grupo_lac_id grup_lac.grupo_lac_nombre
$fu12 = numero_consecutivo();
$fu13 = consecutivo();
$fu14 = fecha_actual();
$fu15 = "No Aplica";
if(!empty($_POST['f_investi'])){
 $fu15 = $_POST['f_investi'];
}

/*
 * Variables de sesión: Segundo Formulario => $fd#
 *
 * Tabla correspondiente: db.proyecto
 */

$fd1 = $_POST['f2_titulo'];               // Titulo Proyecto // DB: p.proyecto_titulo
$fd2 = $_POST['f2_resumen'];              // Resúmen Proyecto // DB: p.proyecto_resumen
$fd3 = $_POST['f2_area_conocimiento'];    // Area de Conocimiento // DB: p.area_conocimiento_id
$fd4 = $_POST['f2_sub_are_conocimiento']; // Sub Área conocimiento // DB: p.sub_area_conocimiento_id
$fd5 = $_POST['f2_redes_conocimiento'];   // Redes Conocimiento // DB: p.redes_conocimiento_id
$fd6 = $_POST['f2_justificacion'];        // Justificacion Proyecto // DB: p.proyecto_justificacion_redes
$fd7 = $_POST['f2_sector_economico'];     // Sector económico // DB: p.sector_economico_id
$fd8 = $_POST['f2_ciiu'];                 // Código CIIU versión 4AC REV Colombia // DB: p.ciiu_estructura_general_id
$fd9 = $_POST['f2_tiempo'];               // Tiempo ejecución // DB: p.proyecto_tiempo
$fd10 = $_POST['f2_inicio'];              // Fecha Inicio // DB: p.proyecto_fecha_inicio
$fd11 = $_POST['f2_cierre'];              // Fecha Fin // DB: p.proyecto_fecha_cierre
$fd12 = $_POST['f2_link_video'];          // Video Proyecto // DB: p.proyecto_link_video_proyecto
$fd13 = $_POST['f2_naranja'];             // Relación Economía Naranja // DB: p.proyecto_economia_naranja
$fd14 = $_POST['f2_jus_naranja'];         // Justificación Econ Naranja // DB: p.proyecto_economia_naranja_justificacion
$fd15 = $_POST['f2_innovadores'];         // Procesos Innovación // DB: p.componentes_innovadores_id
$fd16 = $_POST['f2_antecedentes'];        // Antecedentes Proyecto // DB: p.proyecto_antecedentes_generales
$fd17 = $_POST['f2_pertinencia'];         // Continuidad Años Anteriores // DB: p.proyecto_pertinencia_proyecto
$fd18 = $_POST['f2_problema_a'];          // Plantiamiento Problema A // DB: p.proyecto_planteamiento_problema_a
$fd19 = $_POST['f2_problema_b'];          // Plantiamiento Problema B // DB: p.proyecto_planteamiento_problema_b
$fd20 = $_POST['f2_jus_proyecto'];        // Justificación Proyecto // DB: p.proyecto_justificacion
$fd21 = $_POST['f2_metodologia'];         // Metodología Proyecto // DB: p.proyecto_metodologia
$fd22 = $_POST['f2_bibliografia'];        // Bibliografía Proyecto // DB: p.proyecto_bibliografia
$fd23 = $_POST['f2_innovacion'];          // Componente Innovador del Proyecto // DB: p.innovacion_proyecto

/* Variables de sesión: Octavo Formulario => $fo# */

$fo1 = $_POST['f8_isp1'];
$fo2 = $_POST['f8_isp2'];
$fo3 = $_POST['f8_isp3'];
$fo4 = $_POST['f8_isp4'];
$fo5 = $_POST['f8_isp5'];
$fo6 = $_POST['f8_isp6'];
$fo7 = $_POST['f8_isp7'];
$fo8 = $_POST['f8_isp8'];
$fo9 = $_POST['f8_isp9'];
$fo10 = $_POST['f8_isp10'];
$fo11 = $_POST['f8_isp11'];
$fo12 = $_POST['f8_isp12'];
$fo13 = $_POST['f8_isp13'];

$proyecto = $cn->prepare("INSERT INTO proyecto
(`proyecto_num_consecutivo`, `proyecto_consecutivo`, `proyecto_fecha`, `linea_programatica_id`, `modernizacion_id`, `regional_id`, `centro_id`, `subdirector_id`, `subdirector_celular`, `proyecto_nombre_autor`, `proyecto_cc_autor`, `proyecto_email_autor`, `proyecto_celular_autor`, `grupo_lac_id`, `proyecto_titulo`, `proyecto_resumen`, `innovacion_proyecto`, `area_conocimiento_id`, `sub_area_conocimiento_id`, `redes_conocimiento_id`, `proyecto_justificacion_redes`, `sector_economico_id`, `ciiu_estructura_general_id`, `ciiu_estructura_detallada_id`, `proyecto_tiempo`, `proyecto_fecha_inicio`, `proyecto_fecha_cierre`, `proyecto_link_video_proyecto`, `proyecto_economia_naranja`, `proyecto_economia_naranja_justificacion`, `componentes_innovadores_id`, `proyecto_antecedentes_generales`, `proyecto_pertinencia_proyecto`, `proyecto_planteamiento_problema_a`, `proyecto_planteamiento_problema_b`, `proyecto_justificacion`, `proyecto_metodologia`, `proyecto_bibliografia`, `proyecto_impacto_productivo`, `proyecto_impacto_ambiental`, `proyecto_impacto_social`, `proyecto_impacto_tecnologico`, `proyecto_impacto_centro_formacion`, `proyecto_numero_semilleros`, `proyecto_nombre_semilleros`, `proyecto_numero_municipios`, `proyecto_nombre_municipios`, `proyecto_numero_programas`, `proyecto_nombre_programas`, `proyecto_numero_aprendices`, `proyecto_nombre_aprendices`, `proyecto_linea_investigacion`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?
)");

$proyecto->bind_param("issiiiiiissssisssiiisssissssssssssssssssssssssssssss", $fu12, $fu13, $fu14, $fu1, $fu2, $fu3, $fu4, $fu5, $fu6, $fu7, $fu8, $fu9, $fu10, $fu11, $fd1, $fd2, $fd23, $fd3, $fd4, $fd5, $fd6, $fd7, $fd7, $fd8, $fd9, $fd10, $fd11, $fd12, $fd13, $fd14, $fd15, $fd16, $fd17, $fd18, $fd19, $fd20, $fd21, $fd22, $fo1, $fo2, $fo3, $fo4, $fo5, $fo6, $fo7, $fo8, $fo9, $fo10, $fo11, $fo12, $fo13, $fu15);
$proyecto->execute();

$ft1 = $_POST['f3_g'];   // Objetivo General // DB: ob.objetivo_descripcion WHERE to.tipo_objetivo = 1

$ft2 = $_POST['f3_e1'];  // Objetivo Específico 1 // DB: ob.objetivo_descripcion WHERE to.tipo_objetivo = 2
$ft3 = $_POST['f3_e2'];  // Objetivo Específico 2 // DB: ob.objetivo_descripcion WHERE to.tipo_objetivo = 2
$ft4 = $_POST['f3_e3'];  // Objetivo Específico 3 // DB: ob.objetivo_descripcion WHERE to.tipo_objetivo = 2
$ft5 = $_POST['f3_e4'];  // Objetivo Específico 4 // DB: ob.objetivo_descripcion WHERE to.tipo_objetivo = 2

/* Variables: Cuarto Formulario => $fc# */

$fc1 = $_POST['f4_aco1'];    // Objetivo Específico 1 // DB: ob.objetivo_actividad WHERE to.tipo_objetivo = 2
$fc2 = $_POST['f4_aco2'];    // Objetivo Específico 2 // DB: ob.objetivo_actividad WHERE to.tipo_objetivo = 2
$fc3 = $_POST['f4_aco3'];    // Objetivo Específico 3 // DB: ob.objetivo_actividad WHERE to.tipo_objetivo = 2
$fc4 = $_POST['f4_aco4'];    // Objetivo Específico 4 // DB: ob.objetivo_actividad WHERE to.tipo_objetivo = 2

/* Variables: Quinto Formulario => $fq# */

$fq1 = $_POST['f5_re1'];     // Objetivo Específico 1 // DB: ob.objetivo_resultado WHERE to.tipo_objetivo = 2
$fq2 = $_POST['f5_re2'];     // Objetivo Específico 1 // DB: ob.objetivo_resultado WHERE to.tipo_objetivo = 2
$fq3 = $_POST['f5_re3'];     // Objetivo Específico 1 // DB: ob.objetivo_resultado WHERE to.tipo_objetivo = 2
$fq4 = $_POST['f5_re4'];     // Objetivo Específico 1 // DB: ob.objetivo_resultado WHERE to.tipo_objetivo = 2
$a = 1; // Tipo de Objetivo General
$b = 2; // Tipo de Objetivo Especifico

/**
 * Insersiones de Bloques Objetivos.
 * Secciónes Incluidas: Formulario Tercero, Cuarto y Quinto:
 * Bloque: Objetivo.
 */


$query_obj_g = $cn->prepare("INSERT INTO objetivo(`objetivo_descripcion`, `tipo_objetivo_id`, `proyecto_id`) VALUES (?,?,?);");
$query_obj_g->bind_param("sis", $ft1, $a, $fu13);

$query_obj_g->execute();

$query_obj_ed1 = $cn->prepare("INSERT INTO objetivo(`objetivo_descripcion`, `objetivo_actividad`, `objetivo_resultado`, `tipo_objetivo_id`, `proyecto_id`) VALUES (?,?,?,?,?);");
$query_obj_ed1->bind_param("sssis", $ft2, $fc1, $fq1, $b, $fu13);

$query_obj_ed1->execute();

$query_obj_ed2 = $cn->prepare("INSERT INTO objetivo(`objetivo_descripcion`, `objetivo_actividad`, `objetivo_resultado`, `tipo_objetivo_id`, `proyecto_id`) VALUES (?,?,?,?,?);");
$query_obj_ed2->bind_param("sssis", $ft3, $fc2, $fq2, $b, $fu13);

$query_obj_ed2->execute();

if (!empty($ft4) || !empty($fc3) || !empty($fq3)) {
	$query_obj_ed3 = $cn->prepare("INSERT INTO objetivo(`objetivo_descripcion`, `objetivo_actividad`, `objetivo_resultado`, `tipo_objetivo_id`, `proyecto_id`) VALUES (?,?,?,?,?);");
	$query_obj_ed3->bind_param("sssis", $ft4, $fc3, $fq3, $b, $fu13);
	$query_obj_ed3->execute();
	$query_obj_ed3->close();
}

if (!empty($ft5) || !empty($fc4) || !empty($fq4)) {
	$query_obj_ed4 = $cn->prepare("INSERT INTO objetivo(`objetivo_descripcion`, `objetivo_actividad`, `objetivo_resultado`, `tipo_objetivo_id`, `proyecto_id`) VALUES (?,?,?,?,?);");
	$query_obj_ed4->bind_param("sssis", $ft5, $fc4, $fq4, $b, $fu13);
	$query_obj_ed4->execute();
	$query_obj_ed4->close();
}

/*
 *Tabla producto resultado
 */

/* Variables de sesión: Sexto Formulario => $fs# */

$fs1 = $_POST['f6_pe1'];
$fs2 = $_POST['f6_pe2'];
$fs3 = $_POST['f6_pe3'];
$fs4 = $_POST['f6_pe4'];
$fs5 = $_POST['f6_pe5'];
$fs6 = $_POST['f6_pe6'];
$fs7 = $_POST['f6_pe7'];
$fs8 = $_POST['f6_pe8'];

/* Variables de sesión: Séptimo Formulario => $fe# */

$fe1 = $_POST['f7_idp1'];
$fe2 = $_POST['f7_idp2'];
$fe3 = $_POST['f7_idp3'];
$fe4 = $_POST['f7_idp4'];


$sql_isp1 = $cn->prepare("INSERT INTO `producto_resultado`(`producto_resultado_fecha_entrega`, `producto_resultado_descripcion`, `producto_resultado_indicadores`, `proyecto_id`) VALUES (?,?,?,?);");
$sql_isp1->bind_param("ssss", $fs2, $fs1, $fe1, $fu13);

$sql_isp2 = $cn->prepare("INSERT INTO `producto_resultado`(`producto_resultado_fecha_entrega`, `producto_resultado_descripcion`, `producto_resultado_indicadores`, `proyecto_id`) VALUES (?,?,?,?);");
$sql_isp2->bind_param("ssss", $fs4, $fs3, $fe2, $fu13);

$sql_isp1->execute();
$sql_isp2->execute();

if (!empty($fs6)) {
	$sql_isp3 = $cn->prepare("INSERT INTO `producto_resultado`(`producto_resultado_fecha_entrega`, `producto_resultado_descripcion`, `producto_resultado_indicadores`, `proyecto_id`) VALUES (?,?,?,?);");
	$sql_isp3->bind_param("ssss", $fs6, $fs5, $fe3, $fu13);
	$sql_isp3->execute();
	$sql_isp3->close();
}

if (!empty($fs8)) {
	$sql_isp4 = $cn->prepare("INSERT INTO `producto_resultado`(`producto_resultado_fecha_entrega`, `producto_resultado_descripcion`, `producto_resultado_indicadores`, `proyecto_id`) VALUES (?,?,?,?);");
	$sql_isp4->bind_param("ssss", $fs8, $fs7, $fe4, $fu13);
	$sql_isp4->execute();

	$sql_isp4->close();
}

/************************INICIO*Formulario Modernizacion*********************/

if (!empty($_SESSION['moderni1'])) {

	$moder_sp1 = $_SESSION['moderni1']; // Infraestructura Q&A: SI & NO // DB: eam.infra_moder
	$moder_sp2 = $_SESSION['moderni2']; // Infraestructura Justificación // DB: eam.justif_moder
	$moder_sp3 = $_SESSION['moderni3']; // Adecuaciones Q&A: SI & NO // DB: eam.reque_adecuacion
	$moder_sp4 = $_SESSION['moderni4']; // Adecuaciones Justificación // DB: eam.justif_adecuacion
	$moder_sp5 = $_SESSION['moderni5']; // Número Empresas a Impactar // DB: eam.num_empre_region
	$moder_sp6 = $_SESSION['moderni6']; // Nombre & NIT Empresa // DB: eam.nom_nit_empre
	$moder_sp7 = $_SESSION['moderni7']; // Número Equipos & Bienes Bajas // DB: eam.nom_bienes
	$moder_sp8 = $_SESSION['moderni8']; // Nombre Equipos & Bienes Bajas // DB: eam.num_bienes
	$moder_sp9 = $_SESSION['moderni9']; // Número de Equipos Financiados // DB: eam.num_nom_proyec_finan
	$moder_sp10 = $_SESSION['moderni10']; // Nombre & Código SGPS // DB: eam.nom_cod_sgps_proyec
	$moder_sp11 = $_SESSION['moderni11']; // Presupuesto SGPS // DB: eam.presu_sgps_proyec
	$moder_sp12 = "No Aplica"; // Funcionarios Sennova Involucrados Q&A: SI & NO// DB:eam.funcionarios_sennova
	if(!empty($_SESSION['moderni12'])){
	 $moder_sp12 = $_SESSION['moderni12'];
	}
	$moder_sp13 = "No Aplica"; // Nombre Funcionarios Sennova // DB: eam.nom_funcionarios
	if(!empty($_SESSION['moderni13'])){
	 $moder_sp13 = $_SESSION['moderni13'];
	}
	$moder_sp14 = "No Aplica"; // Registra Manueales Q&A: SI & NO // DB.registro_manuales_projecto
	if(!empty($_SESSION['moderni14'])){
	 $moder_sp14 = $_SESSION['moderni14'];
	}

	$query_moderni = $cn->prepare("INSERT INTO e_actualizacion_modernizacion(infra_moder, justif_moder, reque_adecuacion, justif_adecuacion, num_empre_region, nom_nit_empre, nom_bienes, num_bienes, num_nom_proyec_finan, nom_cod_sgps_proyec, presu_sgps_proyec, funcionarios_sennova, nom_funcionarios, registro_manuales_projecto, proyecto_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
	$query_moderni->bind_param("sssssssssssssss", $moder_sp1, $moder_sp2, $moder_sp3, $moder_sp4, $moder_sp5, $moder_sp6, $moder_sp7, $moder_sp8, $moder_sp9, $moder_sp10, $moder_sp11, $moder_sp12, $moder_sp13, $moder_sp14, $fu13);

	$query_moderni->execute();

	$query_moderni->close();
}

/************************FIN********Formulario Modernizacion*********************/

/*********************INICIO*Formulario Servicios Tecnologicos*********************/

if (!empty($_SESSION['ste1'])) {

	$stecno_sf1 = $_SESSION['ste1']; // Contemplación Q&A: SI & NO // DB: est.q_serv_tecno
	$stecno_sf2 = $_SESSION['ste2']; // Relación de Normas Técnicas // DB: est.repot_serv_tecno
	$stecno_sf3 = $_SESSION['ste3']; // Calidad en el Producto Q&A: SI & NO // DB: est.q_calidad_serv_tecno
	$stecno_sf4 = $_SESSION['ste4']; // Relación de Normas // DB: est.normas_serv_tecno
	$stecno_sf5 = $_SESSION['ste5']; // Acredita Servicio Tecnológico Q&A: SI & NO // DB: est.q_acredita_objetivo_serv
	$stecno_sf6 = $_SESSION['ste6']; // Relación de Acreditación del Servicio Tecnológico // DB: est.especifi_acredi_objetivo_serv
	$stecno_sf7 = $_SESSION['ste7']; // Requiere Auditorías en Servicio Tecnológico Q&A: SI & NO // DB: est.q_reque_auditoria
	$stecno_sf8 = $_SESSION['ste8']; // Proveedores a Nivel Naciona e Internacional // DB: est.verif_nal_internal
	$stecno_sf9 = $_SESSION['ste9']; // Requiere Normas Técnicas Q&A: SI & NO // DB: est.q_implem_normas_tec
	$stecno_sf10 = $_SESSION['ste10']; // Relación de normas técnicas // DB: est.conocimiento_normas_implem
	$stecno_sf11 = $_SESSION['ste11']; // Funcionarios Sennova Vinculados Q&A: SI & NO // DB: est.funcio_implement
	$stecno_sf12 = $_SESSION['ste12']; // Nombres de funcionarios Sennova Involucrados// DB: est.nom_funcio_implement
	$stecno_sf13 = $_SESSION['ste13']; // Incluye Guias del Producto // DB: est.q_incluy_guias_servi
	$stecno_sf14 = $_SESSION['ste14']; // Requiere Equipo Adaptación Q&A: SI & NO // DB: est.q_reque_ambiente
	$stecno_sf15 = $_SESSION['ste15']; // Relacione Equipo para Adaptación // DB: est.especifi_equipo_ambiente
	$stecno_sf16 = $_SESSION['ste16']; // Requiere Mantenimiento Q&A: SI & NO // DB: est.q_equipo_mantenimiento
	$stecno_sf17 = $_SESSION['ste17']; // Contratistas de Mantenimiento Nacionales Q&A: SI & NO // DB: est.q_prestadores_serv_nacional
	$stecno_sf18 = $_SESSION['ste18']; // Funcionarios Sennova Conocen sobre el Mantemiento del Producto Q&A: SI & NO // DB: est.q_conoc_funcio_mantemiento
	$stecno_sf19 = $_SESSION['ste19']; // Nombre de Funcionarios Sennova que conocen sobre el Mantemiento del Producto // DB: est.nom_coe_funcio_mantemiento
	$stecno_sf20 = $_SESSION['ste20']; // Son productos los Manuales de los equipos por adquirir Q&A: SI & NO // DB: est.incluy_manuals_servi
	$stecno_sf21 = $_SESSION['ste21']; // Requiere Materiales, Patrones y Cert Calibración Q&A: SI & NO // DB: est.q_mat_ref_medir_calib
	$stecno_sf22 = $_SESSION['ste22']; // Nombre de Materiales, Patrones y Cert Calibración // DB: est.nom_mat_ref_medir_calib
	$stecno_sf23 = $_SESSION['ste23']; // Requiere Infraestructura en Centro de Formación // DB: est.q_infra_adecuada
	$stecno_sf24 = $_SESSION['ste24']; // Nombre Areas de prestación del servicio tecnológico // DB: est.nom_infra_adecuada

	$query_stecno = $cn->prepare("INSERT INTO e_servicios_tecnologicos(q_serv_tecno,repot_serv_tecno,q_calidad_serv_tecno,normas_serv_tecno,q_acredita_objetivo_serv,especifi_acredi_objetivo_serv,q_reque_auditoria,verif_nal_internal,q_implem_normas_tec,conocimiento_normas_implem,q_funcio_implement,nom_funcio_implement,q_incluy_guias_servi,q_reque_ambiente,especifi_equipo_ambiente,q_equipo_mantenimiento,q_prestadores_serv_nacional,q_conoc_funcio_mantemiento,nom_coe_funcio_mantemiento,incluy_manuals_servi,q_mat_ref_medir_calib,nom_mat_ref_medir_calib,q_infra_adecuada,nom_infra_adecuada,proyecto_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
	$query_stecno->bind_param("sssssssssssssssssssssssss", $stecno_sf1, $stecno_sf2, $stecno_sf3, $stecno_sf4, $stecno_sf5, $stecno_sf6, $stecno_sf7, $stecno_sf8, $stecno_sf9, $stecno_sf10, $stecno_sf11, $stecno_sf12, $stecno_sf13, $stecno_sf14, $stecno_sf15, $stecno_sf16, $stecno_sf17, $stecno_sf18, $stecno_sf19, $stecno_sf20, $stecno_sf21, $stecno_sf22, $stecno_sf22, $stecno_sf24, $fu13);

	$query_stecno -> execute();

	$query_stecno -> close();
}

/*********************FIN*Formulario Servicios Tecnologicos*********************/

/***********Formulario CULTURA DE LA INNOVACIÓN - Inicio***********/

if (!empty($_SESSION['ceu1'])) {

	$ceu_sf1 = $_SESSION['ceu1']; // Lugar del Evento // DB: eci.lugar
	$ceu_sf2 = $_SESSION['ceu2']; // Cantidad de Personas Externas al Sena en el Evento // DB: eci.cant_person
	$ceu_sf3 = $_SESSION['ceu3']; // Revistas y Centro con ISSN // DB: eci.q_revista_memoria_issn
	$ceu_sf4 = $_SESSION['ceu4']; // Relación de Códigos ISSN // DB: eci.cod_issn
	$ceu_sf5 = $_SESSION['ceu5']; // Cantidad de Personas Sena esperada en el Evento // DB: eci.cant_person_sena
	$ceu_sf6 = $_SESSION['ceu6']; // Cantidad empresarios invitados en el evento // DB: eci.num_empresario_invit
	$ceu_sf7 = $_SESSION['ceu7']; // Nombre empresas invitadas al evento // DB: eci.nom_empresas_invit
	$ceu_sf8 = "No Aplica"; // Memorias escritas en el Evento // DB: eci.memo_escrita
  if(!empty($_SESSION['ceu8'])){
	 $ceu_sf8 = $_SESSION['ceu8'];
	}
	$ceu_sf9 = $_SESSION['ceu9']; // Integrantes del Comité Editorial // DB: eci.nom_integ_memoria_ponen_poster
	$ceu_sf10 = $_SESSION['ceu10']; // Líneas Temáticas // DB: eci.linea_tematic_event
	$ceu_sf11 = $_SESSION['ceu11']; // Duración del Evento en Días // DB: eci.dur_event_dias
	$ceu_sf12 = $_SESSION['ceu12']; // Centro de Formación Aliado // DB: eci.centro_form_ali
	$ceu_sf13 = $_SESSION['ceu13']; // Nombre y Número - Lider o Persona Encargada // DB: eci.nom_person_contact
	$ceu_sf14 = $_SESSION['ceu14']; // Justificación de Alianza // DB: eci.justi_aliancia_ref
	$ceu_sf15 = $_SESSION['ceu15']; // Contrapartida del cento de Formación Aliado // DB: eci.contrapartida_centro_form

	$query_ceu = $cn->prepare("INSERT INTO e_cultura_informacion(lugar, cant_person, q_revista_memoria_issn, cod_issn, cant_person_sena, num_empresario_invit, nom_empresas_invit, memo_escrita, nom_integ_memoria_ponen_poster, linea_tematic_event, dur_event_dias, centro_form_ali, nom_num_person_contact, justi_aliancia_ref, contrapartida_centro_form, proyecto_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
	$query_ceu->bind_param("ssssssssssssssss", $ceu_sf1, $ceu_sf2, $ceu_sf3, $ceu_sf4, $ceu_sf5, $ceu_sf6, $ceu_sf7, $ceu_sf8, $ceu_sf9, $ceu_sf10, $ceu_sf11, $ceu_sf12, $ceu_sf13, $ceu_sf14, $ceu_sf15, $fu13);

	$query_ceu->execute();

	$query_ceu->close();
}

/***********Formulario CULTURA DE LA INNOVACIÓN - Fin***********/

/************************************************ Radicar Modals *******************************************/

/***************************inicio*Entidad Aliada*1*******************/

if (!empty($_SESSION['entali1'])) {

	$entidad_imp1 = $_SESSION['entali1']; // Nombre Entidad Aliada // DB: ea.nombre_entidad
	$entidad_imp2 = $_SESSION['entali2']; // Distribución de responsabilidades // DB: ea.distri_responsi
	$entidad_imp3 = $_SESSION['entali3']; // Naturaleza de la entidad // DB: ea.natu_entidad
	$entidad_imp4 = $_SESSION['entali4']; // Clasificación Empresa // DB: ea.clasi_empresa
	$entidad_imp5 = $_SESSION['entali5']; // NIT // DB: ea.nit
	$entidad_imp6 = $_SESSION['entali6']; //
	$entidad_imp7 = $_SESSION['entali7']; // Tipo y Código de Convenio // DB: ea.tipo_cod_convenio
	$entidad_imp8 = $_SESSION['entali8']; // Nombre de Participantes de Entidad Aliada // DB: ea.nombre_parti
	$entidad_imp9 = $_SESSION['entali9']; // Número de Identificación de Integrantes // DB: ea.numid_integ
	$entidad_imp10 = $_SESSION['entali10']; // Email de Integrantes // DB: ea.email_integ
	$entidad_imp11 = $_SESSION['entali11']; // Número de celular de Integrantes // DB: ea.cel_integ
	$entidad_imp12 = $_SESSION['entali12']; // Recursos en Especie Entidad Externa Aliada // DB: ea.recur_entidad_ext
	$entidad_imp13 = $_SESSION['entali13']; // Descripción de Recursos Entidad Aportados // DB: ea.desc_recur_entidad_ext
	$entidad_imp14 = $_SESSION['entali14']; // Recursos en Dinero Entidad Externa Aliada // DB: ea.dinero_ent_exter
	$entidad_imp15 = $_SESSION['entali15']; // Descripción de Destino de Recursos // DB: ea.desc_dest_recur
	$entidad_imp16 = $_SESSION['entali16']; // Nombre Grupo de Investigación LAC // DB: ea.nom_grup_inves_lac
	$entidad_imp17 = $_SESSION['entali17']; // Código de GrupLAC // DB: ea.cod_glac_ali
	$entidad_imp18 = $_SESSION['entali18']; // Link GrupLAC de la Entidad Aliada // DB: ea.link_glac_ent
  $entidad_imp19 = $_SESSION['entali19']; // Metodología o Actividades de Transferencia // DB: ea.m_a_cent_form

	$query_entidad = $cn->prepare("INSERT INTO entidad_aliada(`nombre_entidad`, `distri_responsi`, `natu_entidad`, `clasi_empresa`, `nit`, `convenio`, `tipo_cod_convenio`, `nombre_parti`, `numid_integ`, `email_integ`, `cel_integ`, `recur_entidad_ext`, `desc_recur_entidad_ext`, `dinero_ent_exter`, `desc_dest_recur`, `nom_grup_inves_lac`, `cod_glac_aliada`, `link_glac_ent`, `m_a_cent_form`, `proyecto_id`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
	$query_entidad->bind_param("ssssssssssssssssssss", $entidad_imp1, $entidad_imp2, $entidad_imp3, $entidad_imp4, $entidad_imp5, $entidad_imp6, $entidad_imp7, $entidad_imp8, $entidad_imp9, $entidad_imp10, $entidad_imp11, $entidad_imp12, $entidad_imp13, $entidad_imp14, $entidad_imp15, $entidad_imp16, $entidad_imp17, $entidad_imp18, $entidad_imp19, $fu13);

	$query_entidad->execute();
	$query_entidad->close();
}

/*********************FIN*Entidad Aliada*1*******************/

/******************INICIO*Entidad Aliada*2********************/

if (!empty($_SESSION['entalidos1'])) {

	$entidad_idd1 = $_SESSION['entalidos1']; // Nombre Entidad Aliada // DB: ea.nombre_entidad
	$entidad_idd2 = $_SESSION['entalidos2']; // Distribución de responsabilidades // DB: ea.distri_responsi
	$entidad_idd3 = $_SESSION['entalidos3']; // Naturaleza de la entidad // DB: ea.natu_entidad
	$entidad_idd4 = $_SESSION['entalidos4']; // Clasificación Empresa // DB: ea.clasi_empresa
	$entidad_idd5 = $_SESSION['entalidos5']; // NIT // DB: ea.nit
	$entidad_idd6 = $_SESSION['entalidos6']; //
	$entidad_idd7 = $_SESSION['entalidos7']; // Tipo y Código de Convenio // DB: ea.tipo_cod_convenio
	$entidad_idd8 = $_SESSION['entalidos8']; // Nombre de Participantes de Entidad Aliada // DB: ea.nombre_parti
	$entidad_idd9 = $_SESSION['entalidos9']; // Número de Identificación de Integrantes // DB: ea.numid_integ
	$entidad_idd10 = $_SESSION['entalidos10']; // Email de Integrantes // DB: ea.email_integ
	$entidad_idd11 = $_SESSION['entalidos11']; // Número de celular de Integrantes // DB: ea.cel_integ
	$entidad_idd12 = $_SESSION['entalidos12']; // Recursos en Especie Entidad Externa Aliada // DB: ea.recur_entidad_ext
	$entidad_idd13 = $_SESSION['entalidos13']; // Descripción de Recursos Entidad Aportados // DB: ea.desc_recur_entidad_ext
	$entidad_idd14 = $_SESSION['entalidos14']; // Recursos en Dinero Entidad Externa Aliada // DB: ea.dinero_ent_exter
	$entidad_idd15 = $_SESSION['entalidos15']; // Descripción de Destino de Recursos // DB: ea.desc_dest_recur
	$entidad_idd16 = $_SESSION['entalidos16']; // Nombre Grupo de Investigación LAC // DB: ea.nom_grup_inves_lac
	$entidad_idd17 = $_SESSION['entalidos17']; // Código de GrupLAC // DB: ea.cod_glac_ali
	$entidad_idd18 = $_SESSION['entalidos18']; // Link GrupLAC de la Entidad Aliada // DB: ea.link_glac_ent
	$entidad_idd19 = $_SESSION['entalidos19']; // Metodología o Actividades de Transferencia // DB: ea.m_a_cent_form

	$query_entidad2 = $cn->prepare("INSERT INTO entidad_aliada(`nombre_entidad`, `distri_responsi`, `natu_entidad`, `clasi_empresa`, `nit`, `convenio`, `tipo_cod_convenio`, `nombre_parti`, `numid_integ`, `email_integ`, `cel_integ`, `recur_entidad_ext`, `desc_recur_entidad_ext`, `dinero_ent_exter`, `desc_dest_recur`, `nom_grup_inves_lac`, `cod_glac_aliada`, `link_glac_ent`, `m_a_cent_form`, `proyecto_id`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
	$query_entidad2->bind_param("ssssssssssssssssssss", $entidad_idd1, $entidad_idd2, $entidad_idd3, $entidad_idd4, $entidad_idd5, $entidad_idd6, $entidad_idd7, $entidad_idd8, $entidad_idd9, $entidad_idd10, $entidad_idd11, $entidad_idd12, $entidad_idd13, $entidad_idd14, $entidad_idd15, $entidad_idd16, $entidad_idd17, $entidad_idd18, $entidad_idd19, $fu13);

	$query_entidad2->execute();
	$query_entidad2->close();
}

/*********************FIN***********Entidad aliada*2*******************/

/**********************************Entidad aliada*3********************/

// if (!empty($_SESSION['entalitres1'])) {
//
// 	$entidad_iee1 = $_SESSION['entalitres1'];   // Nombre Entidad Aliada // DB: ea.nombre_entidad
// 	$entidad_iee2 = $_SESSION['entalitres2'];   // Distribución de responsabilidades // DB: ea.distri_responsi
// 	$entidad_iee3 = $_SESSION['entalitres3'];   // Naturaleza de la entidad // DB: ea.natu_entidad
// 	$entidad_iee4 = $_SESSION['entalitres4'];   // Clasificación Empresa // DB: ea.clasi_empresa
// 	$entidad_iee5 = $_SESSION['entalitres5'];   // NIT // DB: ea.nit
// 	$entidad_iee6 = $_SESSION['entalitres6'];   //
// 	$entidad_iee7 = $_SESSION['entalitres7'];   // Tipo y Código de Convenio // DB: ea.tipo_cod_convenio
// 	$entidad_iee8 = $_SESSION['entalitres8'];   // Nombre de Participantes de Entidad Aliada // DB: ea.nombre_parti
// 	$entidad_iee9 = $_SESSION['entalitres9'];   // Número de Identificación de Integrantes // DB: ea.numid_integ
// 	$entidad_iee10 = $_SESSION['entalitres10']; // Email de Integrantes // DB: ea.email_integ
// 	$entidad_iee11 = $_SESSION['entalitres11']; // Número de celular de Integrantes // DB: ea.cel_integ
// 	$entidad_iee12 = $_SESSION['entalitres12']; // Recursos en Especie Entidad Externa Aliada // DB: ea.recur_entidad_ext
// 	$entidad_iee13 = $_SESSION['entalitres13']; // Descripción de Recursos Entidad Aportados // DB: ea.desc_recur_entidad_ext
// 	$entidad_iee14 = $_SESSION['entalitres14']; // Recursos en Dinero Entidad Externa Aliada // DB: ea.dinero_ent_exter
// 	$entidad_iee15 = $_SESSION['entalitres15']; // Descripción de Destino de Recursos // DB: ea.desc_dest_recur
// 	$entidad_iee16 = $_SESSION['entalitres16']; // Nombre Grupo de Investigación LAC // DB: ea.nom_grup_inves_lac
// 	$entidad_iee17 = $_SESSION['entalitres17']; // Código de GrupLAC // DB: ea.cod_glac_ali
// 	$entidad_iee18 = $_SESSION['entalitres18']; // Link GrupLAC de la Entidad Aliada // DB: ea.link_glac_ent
// 	$entidad_iee19 = $_SESSION['entalitres19']; // Metodología o Actividades de Transferencia // DB: ea.m_a_cent_form
//
// 	$query_entidad3 = $cn->prepare("INSERT INTO entidad_aliada(`nombre_entidad`, `distri_responsi`, `natu_entidad`, `clasi_empresa`, `nit`, `convenio`, `tipo_cod_convenio`, `nombre_parti`, `numid_integ`, `email_integ`, `cel_integ`, `recur_entidad_ext`, `desc_recur_entidad_ext`, `dinero_ent_exter`, `desc_dest_recur`, `nom_grup_inves_lac`, `cod_glac_aliada`, `link_glac_ent`, `m_a_cent_form`, `proyecto_id`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
// 	$query_entidad3->bind_param("ssssssssssssssssssss", $entidad_iee1, $entidad_iee2, $entidad_iee3, $entidad_iee4, $entidad_iee5, $entidad_iee6, $entidad_iee7, $entidad_iee8, $entidad_iee9, $entidad_iee10, $entidad_iee11, $entidad_iee12, $entidad_iee13, $entidad_iee14, $entidad_iee15, $entidad_iee16, $entidad_iee17, $entidad_iee18, $entidad_iee19, $fu13);
//
// 	$query_entidad3->execute();
// 	$query_entidad3->close();
// }
/*********************FIN***********Entidad Aliada*3*******************/

/**
 * Subir archivos al servidor.
 * Secciónes Incluidas: Última parte del Formulario:
 * Bloque: Subir archivos.
 * Inicio
 */

/*
 * Subir archivo 1
 */

$nombre = $_FILES['cargar1']['name'];
$guardado = $_FILES['cargar1']['tmp_name'];

if (!file_exists('carpeta_archivos')) {
	mkdir('carpeta_archivos', 0777, true);
	if (file_exists('carpeta_archivos')) {
		if (move_uploaded_file($guardado, 'carpeta_archivos/' . $fu13 . ".zip")) { } else { }
	}
} else {
	if (move_uploaded_file($guardado, 'carpeta_archivos/' . $fu13 . ".zip")) { } else { }
}

/*
 * Subir Archivo 2
 */

$nombre2 = $_FILES['cargar2']['name'];
$guardado2 = $_FILES['cargar2']['tmp_name'];

if (!file_exists('carpeta_archivos')) {
	mkdir('carpeta_archivos', 0777, true);
	if (file_exists('carpeta_archivos')) {
		if (move_uploaded_file($guardado2, 'carpeta_archivos/' . $fu13 . ".xlsm")) { }
	}
} else {
	if (move_uploaded_file($guardado2, 'carpeta_archivos/' . $fu13 . ".xlsm")) { }
}

/*
 * Fin
 */

/**
 * Confirmacion de formulario lleno
 */

if ($proyecto && $query_obj_g && $query_obj_ed1 && $query_obj_ed2 && $sql_isp1 && $sql_isp2) {
	echo "<script>
		alert('Datos guardados con éxito, Su número de radicado es: " . $fu13 . " expedido el " . $fu14 . "');

	</script>";


	$proyecto->close();
	$query_obj_g->close();
	$query_obj_ed1->close();
	$query_obj_ed2->close();
	$sql_isp1->close();
	$sql_isp2->close();

	$cn->close();
  session_destroy();
} else {
	echo "<script>
    	alert('Error');
	</script>";
	$proyecto->close();
	$query_obj_g->close();
	$query_obj_ed1->close();
	$query_obj_ed2->close();
	$sql_isp1->close();
	$sql_isp2->close();

	$cn->close();
  session_destroy();
}

////window.location.href='../index.php';
//window.location.href='../index.php';
