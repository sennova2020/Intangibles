$(document).on('change', '#cargar1', function () {
  // this.files[0].size recupera el tamaño del archivo
  // alert(this.files[0].size);

  var fileName = this.files[0].name;
  var fileSize = this.files[0].size;

  if (fileSize > 100000000) {
    alert('El archivo no debe superar los 100MB');
    this.value = '';
    this.files[0].name = '';
  } else {
    // recuperamos la extensión del archivo
    var ext = fileName.split('.').pop();

    // console.log(ext);

    switch (ext) {
      case 'zip':

        $("#car1").html("Archivo cargado");

        break;
      default:
        alert('El archivo no tiene la extensión adecuada');
        this.value = ''; // reset del valor
        this.files[0].name = '';
    }
  }
});

$(document).on('change', '#cargar2', function () {
  // this.files[0].size recupera el tamaño del archivo
  // alert(this.files[0].size);

  var fileName = this.files[0].name;
  var fileSize = this.files[0].size;

  if (fileSize > 200000000) {
    alert('El archivo no debe superar los 100MB');
    this.value = '';
    this.files[0].name = '';
  } else {
    // recuperamos la extensión del archivo
    var ext = fileName.split('.').pop();

    // console.log(ext);

    switch (ext) {
      case 'xlsm':
        $("#car2").html("Archivo cargado");
        break;
      default:
        alert('El archivo no tiene la extensión adecuada');
        this.value = ''; // reset del valor
        this.files[0].name = '';
    }
  }
});


$(document).ready(function () {
  /* ******* Elementos ocultos por defecto ******** */



  $("#entidades_ali").hide();
  $("#select_moder").hide();
  $("#naranja_justifique").hide();
  $("#fondo_actualizaciones").hide();

  /* Condicionales Modales - Inicio */

  $("#si_ceam1").hide();
  $("#si_ceam2").hide();
  $("#si_ceam3").hide();

  $("#si_cest1").hide();
  $("#si_cest2").hide();
  $("#si_cest3").hide();
  $("#si_cest4").hide();
  $("#si_cest5").hide();
  $("#si_cest6").hide();
  $("#si_cest7").hide();
  $("#si_cest8").hide();
  $("#si_cest9").hide();
  $("#si_cest10").hide();
  $("#si_cest11").hide();

  $("#si_ceci1").hide();

  $("#cip").hide();
  $("#f_investi").hide();
  $("#cargando_select").hide();

  /* Fin */

  // Ocultado a la Carga de Formularios

  $("#fondo_investigacion").hide(); //
  $("#fondo_servicios_tec").hide(); //
  $("#fondo_innovacion").hide(); //
  $("#fondo_mixto").hide();
  $("#fondo_mixto2").hide();
  $("#fondo_mixto3").hide();
  $("#fondo_imagen_tabla").hide();
  $("#cantidad1").hide();
  $("#cantidad2").hide();
  $("#cantidad3").hide();

  // $("#boton_radicar").click(function(){
  //   $("#formulario_principal").submit();
  /* Actualizaciones  modernizacion para sesiones */

  // $("#fondo_actualizaciones input").keyup(function() {
  //   var contenido = $(this).val();
  //   var nombre = $(this).attr("name");
  //   guardarvariable(nombre, contenido);
  // });

  // $("#fondo_actualizaciones select").change(function() {
  //   var contenido = $(this).val();
  //   var nombre = $(this).attr("name");
  //   guardarvariable(nombre, contenido);
  // });

  /* Actualizaciones servicios tecnologicos para sesiones - Inicio */

  // $("#fondo_servicios_tec input").keyup(function() {
  //   var contenido = $(this).val();
  //   var nombre = $(this).attr("name");
  //   guardarvariable(nombre, contenido);
  // });

  // $("#fondo_servicios_tec select").change(function() {
  //   var contenido = $(this).val();
  //   var nombre = $(this).attr("name");
  //   guardarvariable(nombre, contenido);
  // });

  /* Fin */

  /* Especificaciones Cultura de la innovacion */

  // $("#fondo_mixto input").keyup(function() {
  //   var contenido = $(this).val();
  //   var nombre = $(this).attr("name");
  //   guardarvariable(nombre, contenido);
  // });

  // $("#fondo_mixto2 input").keyup(function() {
  //   var contenido = $(this).val();
  //   var nombre = $(this).attr("name");
  //   guardarvariable(nombre, contenido);
  // });

  // $("#fondo_mixto3 input").keyup(function() {
  //   var contenido = $(this).val();
  //   var nombre = $(this).attr("name");
  //   guardarvariable(nombre, contenido);
  // });

  // $("#fondo_mixto select").change(function() {
  //   var contenido = $(this).val();
  //   var nombre = $(this).attr("name");
  //   guardarvariable(nombre, contenido);
  // });

  // $("#fondo_mixto2 select").change(function() {
  //   var contenido = $(this).val();
  //   var nombre = $(this).attr("name");
  //   guardarvariable(nombre, contenido);
  // });

  // $("#fondo_mixto3 select").change(function() {
  //   var contenido = $(this).val();
  //   var nombre = $(this).attr("name");
  //   guardarvariable(nombre, contenido);
  // });

  // $("#fondo_investigacion input").keyup(function() {
  //   var contenido = $(this).val();
  //   var nombre = $(this).attr("name");
  //   guardarvariable(nombre, contenido);
  // });

  // $("#fondo_investigacion select").change(function() {
  //   var contenido = $(this).val();
  //   var nombre = $(this).attr("name");
  //   guardarvariable(nombre, contenido);
  // });

  // /* Cultura innovacion */

  // $("#fondo_innovacion input").keyup(function() {
  //   var contenido = $(this).val();
  //   var nombre = $(this).attr("name");
  //   guardarvariable(nombre, contenido);
  // });

  // $("#fondo_innovacion select").change(function() {
  //   var contenido = $(this).val();
  //   var nombre = $(this).attr("name");
  //   guardarvariable(nombre, contenido);
  // });

  // $("#boton_test").click(function() {
  //   $("#formulario_principal").submit();
  // });

  /* Ajax para guardar la variable en sesiones ($_SESSION[]) */

  // function guardarvariable(nombre, contenido) {
  //   var xmlhttp = new XMLHttpRequest();
  //   xmlhttp.onreadystatechange = function() {
  //     if (this.readyState == 4 && this.status == 200) {
  //       //document.getElementById("boton_test").innerHTML = this.responseText;
  //     }
  //   };

  //   xmlhttp.open(
  //     "GET",
  //     "funciones/guardar_variable_session.php?nombre=" +
  //       nombre +
  //       "&contenido=" +
  //       contenido,
  //     true
  //   );
  //   xmlhttp.send();
  // }

  // });

  /*
   * Habilitar & Deshabilitar Campos del Formulario. Inicio
   */

  $("#select_programatica").change(function () {
    var primero = $("#select_programatica").val();

    if (primero == 1 || primero == 7 || primero == 10) {
      // Despligue Modernización
      $("#entidades_ali").hide(); // Oculta - Entidades Aliadas
      $("#select_moder").show(); // Enseña - Select Linea de Modernización
      $("#fondo_actualizaciones").show(); // Enseña - Formulario Modernización
      $("#fondo_actualizaciones div ul li>input:nth-of-type(n)").removeClass("nova"); // Remueve clases al Formulario | Tipo input | Campos Obligatorios.
      $("#fondo_actualizaciones div ul li>textarea:nth-of-type(n)").removeClass("nova"); // Remueve clases al Formulario | Tipo textarea | Campos Obligatorios.
      $("#fondo_actualizaciones div ul li>select:nth-of-type(n)").removeClass("nova"); // Remueve clases al Formulario | Tipo select | Campos Obligatorios.
      $("#fondo_innovacion").hide(); // Oculta - Formulario Cultura e Información
      $("#fondo_innovacion div ul li>input:nth-of-type(n)").addClass("nova"); // Agrega clases al Formulario | Tipo input | Campos no obligatorios.
      $("#fondo_innovacion div ul li>textarea:nth-of-type(n)").addClass("nova"); // Agrega clases al Formulario | Tipo textarea | Campos no obligatorios.
      $("#fondo_innovacion div ul li>select:nth-of-type(n)").addClass("nova"); // Agrega clases al Formulario | Tipo select | Campos no obligatorios.
      $("#fondo_servicios_tec").hide(); // Oculta - Formulario Cultura e Información
      $("#fondo_servicios_tec div ul li>input:nth-of-type(n)").addClass("nova"); // Agrega clases al Formulario | Tipo input | Campos no obligatorios.
      $("#fondo_servicios_tec div ul li>textarea:nth-of-type(n)").addClass("nova"); // Agrega clases al Formulario | Tipo textarea | Campos no obligatorios.
      $("#fondo_servicios_tec div ul li>select:nth-of-type(n)").addClass("nova"); // Agrega clases al Formulario | Tipo select | Campos no obligatorios.
    } else if (primero == 3 || primero == 4) {
      // Despliegue Investigación
      $("#entidades_ali").show(); // Enseña - Entidades Aliadas | Se llama la función al presionar boton 'Agregar Entidad Aliada'
      $("#select_moder").hide(); // Oculta - Select Linea de Modernización
      $("#fondo_actualizaciones").hide(); // Oculta - Formulario Modernización
      $("#fondo_actualizaciones div ul li>input:nth-of-type(n)").addClass(
        "nova"
      ); // Agrega clases al Formulario | Tipo input | Campos no obligatorios.
      $("#fondo_actualizaciones div ul li>textarea:nth-of-type(n)").addClass(
        "nova"
      ); // Agrega clases al Formulario | Tipo textarea | Campos no obligatorios.
      $("#fondo_actualizaciones div ul li>select:nth-of-type(n)").addClass(
        "nova"
      ); // Agrega clases al Formulario | Tipo select | Campos no obligatorios.
      $("#fondo_innovacion").hide(); // Oculta - Formulario Cultura e Información
      $("#fondo_innovacion div ul li>input:nth-of-type(n)").addClass("nova"); // Agrega clases al Formulario | Tipo input | Campos no obligatorios.
      $("#fondo_innovacion div ul li>textarea:nth-of-type(n)").addClass("nova"); // Agrega clases al Formulario | Tipo textarea | Campos no obligatorios.
      $("#fondo_innovacion div ul li>select:nth-of-type(n)").addClass("nova"); // Agrega clases al Formulario | Tipo select | Campos no obligatorios.
      $("#fondo_servicios_tec").hide(); // Ocultar - Formulario Cultura e Información
      $("#fondo_servicios_tec div ul li>input:nth-of-type(n)").addClass("nova"); // Agrega clases al Formulario | Tipo input | Campos no obligatorios.
      $("#fondo_servicios_tec div ul li>textarea:nth-of-type(n)").addClass(
        "nova"
      ); // Agrega clases al Formulario | Tipo textarea | Campos no obligatorios.
      $("#fondo_servicios_tec div ul li>select:nth-of-type(n)").addClass(
        "nova"
      ); // Agrega clases al Formulario | Tipo select | Campos no obligatorios.
      // $("#fondo_mixto").hide(); // Muestra el fondo en base que trabaja con Modals
      // $(".todo").css("position", "fixed"); // Se habilita para el uso de Modales en la pagina
    } else if (primero == 2) {
      // Despligue de Servicios Tecnológicos
      $("#entidades_ali").hide(); // Oculta - Entidades Aliadas
      $("#select_moder").hide(); // Oculta - Select Linea de Modernización
      $("#fondo_actualizaciones").hide(); // Oculta - Formulario Modernización
      $("#fondo_actualizaciones div ul li>input:nth-of-type(n)").addClass(
        "nova"
      ); // Agrega clases al Formulario | Tipo input | Campos no obligatorios.
      $("#fondo_actualizaciones div ul li>textarea:nth-of-type(n)").addClass(
        "nova"
      ); // Agrega clases al Formulario | Tipo textarea | Campos no obligatorios.
      $("#fondo_actualizaciones div ul li>select:nth-of-type(n)").addClass(
        "nova"
      ); // Agrega clases al Formulario | Tipo select | Campos no obligatorios.
      $("#fondo_innovacion").hide(); // Oculta - Formulario Cultura e Información
      $("#fondo_innovacion div ul li>input:nth-of-type(n)").addClass("nova"); // Agrega clases al Formulario | Tipo input | Campos no obligatorios.
      $("#fondo_innovacion div ul li>textarea:nth-of-type(n)").addClass("nova"); // Agrega clases al Formulario | Tipo textarea | Campos no obligatorios.
      $("#fondo_innovacion div ul li>select:nth-of-type(n)").addClass("nova"); // Agrega clases al Formulario | Tipo select | Campos no obligatorios.
      $("#fondo_servicios_tec").show(); // Enseña - Formulario Cultura e Información
      $("#fondo_servicios_tec div ul li>input:nth-of-type(n)").removeClass(
        "nova"
      ); // Remueve clases al Formulario | Tipo input | Campos Obligatorios.
      $("#fondo_servicios_tec div ul li>textarea:nth-of-type(n)").removeClass(
        "nova"
      ); // Remueve clases al Formulario | Tipo textarea | Campos Obligatorios.
      $("#fondo_servicios_tec div ul li>select:nth-of-type(n)").removeClass(
        "nova"
      ); // Remueve clases al Formulario | Tipo select | Campos Obligatorios.
      // $(".todo").css("position", "fixed");
    } else if (primero == 5 || primero == 8 || primero == 11) {
      // Despliegue de Apropiación
      $("#entidades_ali").show(); // Enseña - Entidades Aliadas | Se llama la función al presionar boton 'Agregar Entidad Aliada'
      $("#select_moder").hide(); // Oculta - Select Linea de Modernización
      $("#fondo_actualizaciones").hide(); // Oculta - Formulario Modernización
      $("#fondo_actualizaciones div ul li>input:nth-of-type(n)").addClass(
        "nova"
      ); // Agrega clases al Formulario | Tipo input | Campos no obligatorios.
      $("#fondo_actualizaciones div ul li>textarea:nth-of-type(n)").addClass(
        "nova"
      ); // Agrega clases al Formulario | Tipo textarea | Campos no obligatorios.
      $("#fondo_actualizaciones div ul li>select:nth-of-type(n)").addClass(
        "nova"
      ); // Agrega clases al Formulario | Tipo select | Campos no obligatorios.
      $("#fondo_innovacion").show(); // Enseña - Formulario Cultura e Información
      $("#fondo_innovacion div ul li>input:nth-of-type(n)").removeClass("nova"); // Remueve clases al Formulario | Tipo input | Campos Obligatorios.
      $("#fondo_innovacion div ul li>textarea:nth-of-type(n)").removeClass(
        "nova"
      ); // Remueve clases al Formulario | Tipo textarea | Campos Obligatorios.
      $("#fondo_innovacion div ul li>select:nth-of-type(n)").removeClass(
        "nova"
      ); // Remueve clases al Formulario | Tipo select | Campos Obligatorios.
      $("#fondo_servicios_tec").hide(); // Oculta - Formulario Cultura e Información
      $("#fondo_servicios_tec div ul li>input:nth-of-type(n)").addClass("nova"); // Agrega clases al Formulario | Tipo input | Campos no obligatorios.
      $("#fondo_servicios_tec div ul li>textarea:nth-of-type(n)").addClass(
        "nova"
      ); // Agrega clases al Formulario | Tipo textarea | Campos no obligatorios.
      $("#fondo_servicios_tec div ul li>select:nth-of-type(n)").addClass(
        "nova"
      ); // Agrega clases al Formulario | Tipo select | Campos no obligatorios.
      // $(".todo").css("position", "fixed");
    } else {
      // Despliegue de Vigencia // Remueve todos los Formularios y opciones para Entidades
      $("#entidades_ali").hide(); // Oculta - Entidades Aliadas | Se llama la función al presionar boton 'Agregar Entidad Aliada'
      $("#select_moder").hide(); // Oculta - Select Linea de Modernización
      $("#fondo_actualizaciones").hide(); // Oculta - Formulario Modernización
      $("#fondo_actualizaciones div ul li>input:nth-of-type(n)").addClass(
        "nova"
      ); // Agrega clases al Formulario | Tipo input | Campos no obligatorios.
      $("#fondo_actualizaciones div ul li>textarea:nth-of-type(n)").addClass(
        "nova"
      ); // Agrega clases al Formulario | Tipo textarea | Campos no obligatorios.
      $("#fondo_actualizaciones div ul li>select:nth-of-type(n)").addClass(
        "nova"
      ); // Agrega clases al Formulario | Tipo select | Campos no obligatorios.
      $("#fondo_innovacion").hide(); // Oculta - Formulario Cultura e Información
      $("#fondo_innovacion div ul li>input:nth-of-type(n)").addClass("nova"); // Agrega clases al Formulario | Tipo input | Campos Obligatorios.
      $("#fondo_innovacion div ul li>textarea:nth-of-type(n)").addClass("nova"); // Agrega clases al Formulario | Tipo textarea | Campos Obligatorios.
      $("#fondo_innovacion div ul li>select:nth-of-type(n)").addClass("nova"); // Agrega clases al Formulario | Tipo select | Campos Obligatorios.
      $("#fondo_servicios_tec").hide(); // Oculta - Formulario Cultura e Información
      $("#fondo_servicios_tec div ul li>input:nth-of-type(n)").addClass("nova"); // Agrega clases al Formulario | Tipo input | Campos no obligatorios.
      $("#fondo_servicios_tec div ul li>textarea:nth-of-type(n)").addClass(
        "nova"
      ); // Agrega clases al Formulario | Tipo textarea | Campos no obligatorios.
      $("#fondo_servicios_tec div ul li>select:nth-of-type(n)").addClass(
        "nova"
      ); // Agrega clases al Formulario | Tipo select | Campos no obligatorios.
      $(".todo").css("position", "relative");
    }

    /**
     *  Fin
     */

    // Ocultar Campos Grupo de Investigación, GrupLink, Código GrupLac. - Inicio //

    if (
      primero == 6 ||
      primero == 7 ||
      primero == 8 ||
      primero == 9 ||
      primero == 10 ||
      primero == 11
    ) {
      $(".info_cent_prop li:nth-child(12)").fadeOut(300);
      $(".info_cent_prop li:nth-child(12) > select").addClass("nova");
      $(".info_cent_prop li:nth-child(13)").fadeOut(300);
      $(".info_cent_prop li:nth-child(13) > label").addClass("nova");
      $(".info_cent_prop li:nth-child(14)").fadeOut(300);
      $(".info_cent_prop li:nth-child(14) > label").addClass("nova");
      $(".info_cent_prop li:nth-child(15)").fadeOut(300);
      $(".info_cent_prop li:nth-child(15) > select").addClass("nova");
    } else {
      $(".info_cent_prop li:nth-child(12)").fadeIn(300);
      $(".info_cent_prop li:nth-child(12) > select").removeClass("nova");
      $(".info_cent_prop li:nth-child(13)").fadeIn(300);
      $(".info_cent_prop li:nth-child(13) > label").removeClass("nova");
      $(".info_cent_prop li:nth-child(14)").fadeIn(300);
      $(".info_cent_prop li:nth-child(14) > label").removeClass("nova");
      $(".info_cent_prop li:nth-child(15)").fadeIn(300);
      $(".info_cent_prop li:nth-child(15) > select").removeClass("nova");
    }

    // Fin

    /* Mostrar de Carácter Obligatorio Campo para Innovación del Proyecto para Linea Programativa - 82  - Inicio */

    if (primero == 4) {
      $("#cip").fadeIn(300);
      $("li#cip > textarea").removeClass("nova");
    } else {
      $("#cip").fadeOut(300);
      $("li#cip > textarea").addClass("nova");
    }

    // Fin
  });

  // Boton 'Agregar Entidad Aliada' - Inicio

  var formulario_numero = 1;

  $("#boton_agregar_entidad").click(function () {
    if (formulario_numero == 1) {
      $("#fondo_mixto").show();
      $(".todo").css("position", "fixed");
      $("#cantidad1").show();
    } else if (formulario_numero == 2) {
      $("#fondo_mixto2").show();
      $(".todo").css("position", "fixed");
      $("#cantidad2").show();
    } else {
      alert("No es posible agregar más de 2 entidades aliadas");
    }
    formulario_numero++;
  });


  $("#cerrar_modal1").click(function (e) {
    $("#fondo_mixto").hide();
    $(".todo").css("position", "relative");
    formulario_numero = 1;
  });

  $("#cerrar_modal2").click(function (e) {
    $("#fondo_mixto2").hide();
    $(".todo").css("position", "relative");
    formulario_numero = 2;
  });

  $("#cerrar_modal3").click(function (e) {
    $("#fondo_mixto3").hide();
    $(".todo").css("position", "relative");
    formulario_numero = 3;
  });

  // Fin

  // Ocultar opción Economia Naranja - Inicio

  $("#select_naranja").change(function () {
    var primero2 = $("#select_naranja").val();

    if (primero2 == 1) {
      $("#naranja_justifique").fadeIn(300);
      $("li#naranja_justifique > textarea").removeClass("nova");
    } else {
      $("#naranja_justifique").fadeOut(300);
      $("li#naranja_justifique > textarea").addClass("nova");
    }
  });

  // Fin

  // Consultar Regionales dentro del Selector

  $("#select_regional").change(function () {
    nombre_select = $("#select_centro");

    numero_select = $("#select_regional").val();
    consulta = "SELECT * from centro where regional_id ='" + numero_select + "'";
    recargarLista(nombre_select, consulta);

    nombre_select2 = $("#nombre_subdirector");
    consulta2 = "SELECT * from subdirector where centro_id ='" + numero_select + "'";
    recargarLista(nombre_select2, consulta2);

    $("#correo_subdirector").text("");
    // nombre_p1 = $("#correo_subdirector");
    // numero_select1 = $("#nombre_subdirector").val();
    // consulta1 = "SELECT subdirector_correo from subdirector where subdirector_id ='" + numero_select1 + "'";
    // alert("nombre_p1 " + nombre_p1 + "..." + " numero_select1 " + numero_select1 );
    // recargarDato(nombre_p1, consulta1);
  });

  $("#area_conocimiento").change(function () {
    nombre_select = $("#sub_are_conocimiento");
    numero_select = $("#area_conocimiento").val();
    consulta =
      "SELECT * from sub_area_conocimiento where area_conocimiento_id ='" +
      numero_select +
      "' order by sub_area_conocimiento_descripcion";
    recargarLista(nombre_select, consulta);
  });

  $("#nombre_subdirector").change(function () {
    nombre_p = $("#correo_subdirector");
    numero_select = $("#nombre_subdirector").val();
    consulta =
      "SELECT subdirector_correo from subdirector where subdirector_id ='" +
      numero_select +
      "'";
    recargarDato(nombre_p, consulta);
  });

  // Consultar Grupos de Investigación -- Inicio

  $("#nombre_grupo").change(function () {
    $("#f_investi").hide();
    $("#cargando_select").show();
    nombre_p = $("#codigo_grupo");
    numero_select = $("#nombre_grupo").val();
    consulta = "SELECT grupo_lac_linea from grup_lac where grupo_lac_id ='" + numero_select + "'";
    recargarDato(nombre_p, consulta);


    nombre_p2 = $("#link_grupo");
    consulta2 = "SELECT grupo_lac_link from grup_lac where grupo_lac_id ='" + numero_select + "'";
    recargarDato(nombre_p2, consulta2);


    setTimeout(function () {
      nombre_p3 = $("#f_investi");
      numero_select5 = $("#codigo_grupo").text();
      consulta5 = "SELECT linea_investigacion_id, linea_investigacion_descripcion from linea_investigacion where link_grup ='" + numero_select5 + "'";
      recargarLista(nombre_p3, consulta5);
      $("#cargando_select").hide();
      $("#f_investi").show();
    }, 2000);

  });

  // Fin

  // Confirma cuando el archivo a sido adjunto. Inicio



  // Fin

  // Condicionales SI/NO // Inicio

  // Entidades Aliadas

  $("#select_convenio").change(function () {
    if ($(this).val() == 1) {
      $("#sisi_convenio").fadeIn(300);
      $("li#sisi_convenio > input").val("");
    } else {
      $("#sisi_convenio").fadeOut(300);
      $("li#sisi_convenio > input").val("No aplica");
    }
  });

  $("#select_convenio2").change(function () {
    if ($(this).val() == 1) {
      $("#sisi_convenio2").fadeIn(300);
      $("li#sisi_convenio2 > input").val("");
    } else {
      $("#sisi_convenio2").fadeOut(300);
      $("li#sisi_convenio2 > input").val("No aplica");
    }
  });

  $("#select_convenio3").change(function () {
    if ($(this).val() == 1) {
      $("#sisi_convenio3").fadeIn(300);
      $("li#sisi_convenio3 > input").val("");
    } else {
      $("#sisi_convenio3").fadeOut(300);
      $("li#sisi_convenio3 > input").val("No aplica");
    }
  });

  // Fin

  // Condicionales de Especialización Actualización & Modernización AS CEAM // Inicio

  $("#con_eam1").change(function () {
    if ($(this).val() == 1) {
      $("#si_ceam1").fadeIn(300);
      $("li#si_ceam1 > input").removeClass("nova");
    } else {
      $("#si_ceam1").fadeOut(300);
      $("li#si_ceam1 > input").addClass("nova");
    }
  });

  $("#con_eam2").change(function () {
    if ($(this).val() == 1) {
      $("#si_ceam2").fadeIn(300);
      $("li#si_ceam2 > input").removeClass("nova");
    } else {
      $("#si_ceam2").fadeOut(300);
      $("li#si_ceam2 > input").addClass("nova");
    }
  });

  $("#con_eam3").change(function () {
    if ($(this).val() == 1) {
      $("#si_ceam3").fadeIn(300);
      $("li#si_ceam3 > input").removeClass("nova");
    } else {
      $("#si_ceam3").fadeOut(300);
      $("li#si_ceam3 > input").addClass("nova");
    }
  });

  // Fin

  // Condicionales de Especificaciones Servicios Tecnológicos AS CEST // Inicio

  $("#con_est1").change(function () {
    if ($(this).val() == 1) {
      $("#si_cest1").fadeIn(300);
      $("li#si_cest1 > input").removeClass("nova");
    } else {
      $("#si_cest1").fadeOut(300);
      $("li#si_cest1 > input").addClass("nova");
    }
  });

  $("#con_est2").change(function () {
    if ($(this).val() == 1) {
      $("#si_cest2").fadeIn(300);
      $("li#si_cest2 > input").removeClass("nova");
    } else {
      $("#si_cest2").fadeOut(300);
      $("li#si_cest2 > input").addClass("nova");
    }
  });

  $("#con_est3").change(function () {
    if ($(this).val() == 1) {
      $("#si_cest3").fadeIn(300);
      $("li#si_cest3 > input").removeClass("nova");
    } else {
      $("#si_cest3").fadeOut(300);
      $("li#si_cest3 > input").addClass("nova");
    }
  });

  $("#con_est4").change(function () {
    if ($(this).val() == 1) {
      $("#si_cest4").fadeIn(300);
      $("li#si_cest4 > input").removeClass("nova");
    } else {
      $("#si_cest4").fadeOut(300);
      $("li#si_cest4 > input").addClass("nova");
    }
  });

  $("#con_est5").change(function () {
    if ($(this).val() == 1) {
      $("#si_cest5").fadeIn(300);
      $("li#si_cest5 > input").removeClass("nova");
    } else {
      $("#si_cest5").fadeOut(300);
      $("li#si_cest5 > input").addClass("nova");
    }
  });

  $("#con_est6").change(function () {
    if ($(this).val() == 1) {
      $("#si_cest6").fadeIn(300);
      $("li#si_cest6 > input").removeClass("nova");
    } else {
      $("#si_cest6").fadeOut(300);
      $("li#si_cest6 > input").addClass("nova");
    }
  });

  $("#con_est7").change(function () {
    if ($(this).val() == 1) {
      $("#si_cest7").fadeIn(300);
      $("li#si_cest7 > input").removeClass("nova");
    } else {
      $("#si_cest7").fadeOut(300);
      $("li#si_cest7 > input").addClass("nova");
    }
  });

  $("#con_est8").change(function () {
    if ($(this).val() == 1) {
      $("#si_cest8").fadeIn(300);
      $("li#si_cest8 > select").removeClass("nova");
    } else {
      $("#si_cest8").fadeOut(300);
      $("li#si_cest8 > select").addClass("nova");
    }
  });

  $("#con_est9").change(function () {
    if ($(this).val() == 1) {
      $("#si_cest9").fadeIn(300);
      $("li#si_cest9 > input").removeClass("nova");
    } else {
      $("#si_cest9").fadeOut(300);
      $("li#si_cest9 > input").addClass("nova");
    }
  });

  $("#con_est10").change(function () {
    if ($(this).val() == 1) {
      $("#si_cest10").fadeIn(300);
      $("li#si_cest10 > input").removeClass("nova");
    } else {
      $("#si_cest10").fadeOut(300);
      $("li#si_cest10 > input").addClass("nova");
    }
  });

  $("#con_est11").change(function () {
    if ($(this).val() == 1) {
      $("#si_cest11").fadeIn(300);
      $("li#si_cest11 > input").removeClass("nova");
    } else {
      $("#si_cest11").fadeOut(300);
      $("li#si_cest11 > input").addClass("nova");
    }
  });

  // Fin

  // Condicionales de Especificaciones Cultura de la Información AS ECI // Inicio

  $("#con_eci1").change(function () {
    if ($(this).val() == 1) {
      $("#si_ceci1").fadeIn(300);
      $("li#si_ceci1 > input").removeClass("nova");
    } else {
      $("#si_ceci1").fadeOut(300);
      $("li#si_ceci1 > input").addClass("nova");
    }
  });

  // Fin

  $("#select_ciiu_general").change(function () {
    nombre_select = $("#select_ciiu_detallada");
    codigo_select = $("#codigo_grupo").text();
    numero_select = $("#select_ciiu_general").val();
    consulta =
      "SELECT ciiu_estructura_detallada_id, ciiu_estructura_detallada_descripcion FROM ciiu_estructura_detallada where ciiu_estructura_general_letra ='" +
      numero_select + "'";
    recargarLista(nombre_select, consulta);
  });

  /*
   * Funciones
   */

  function recargarLista(nombre_p, consulta) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        nombre_p.html(this.responseText);
      }
    };

    xmlhttp.open(
      "GET",
      "funciones/recargar_datos.php?consulta=" + consulta,
      true
    );
    xmlhttp.send();
  }

  function recargarDato(nombre_select, consulta) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        nombre_select.html(this.responseText);
      }
    };

    xmlhttp.open(
      "GET",
      "funciones/recargar_dato.php?consulta=" + consulta,
      true
    );
    xmlhttp.send();
  }

  /******************* Ocultar Modals *****************************/

  // $("#fondo_actualizaciones").click(function(e) {
  //     if (e.target !== this)
  //         return;
  //     $("#fondo_actualizaciones").fadeOut(500);
  //     $(".todo").css("position", "relative");

  // });

  // $("#cerrar_modal1").click(function(e) {
  //     $("#fondo_actualizaciones").hide();
  //     $(".todo").css("position", "relative");

  // });
  /*************** */

  // $("#fondo_investigacion").click(function(e) {

  //     if (e.target !== this)
  //         return;
  //     $("#fondo_investigacion").fadeOut(500);
  //     $(".todo").css("position", "relative");

  // });


  /*************** */

  // $("#fondo_servicios_tec").click(function(e) {

  //     if (e.target !== this)
  //         return;
  //     $("#fondo_servicios_tec").fadeOut(500);
  //     $(".todo").css("position", "relative");

  // });

  // $("#cerrar_servicios").click(function(e) {
  //     $("#fondo_servicios_tec").hide();
  //     $(".todo").css("position", "relative");

  // });

  /*************** */

  // $("#fondo_mixto").click(function(e) {

  //     if (e.target !== this)
  //         return;
  //     $("#fondo_mixto").fadeOut(500);
  //     $(".todo").css("position", "relative");

  // });

  // $("#cerrar_mixto").click(function(e) {
  //     $("#fondo_mixto").hide();
  //     $(".todo").css("position", "relative");

  // });

  /***************** Funciones*****************************/

  /*************** */

  // $("#fondo_innovacion").click(function(e) {

  //     if (e.target !== this)
  //         return;
  //     $("#fondo_innovacion").fadeOut(500);
  //     $(".todo").css("position", "relative");

  // });

  // $("#cerrar_innovacion1").click(function(e) {
  //     $("#fondo_innovacion").hide();
  //     $(".todo").css("position", "relative");

  // });

  /**************** Modal imagen tabla introducción**********************/

  $("#tabla_introduccion").click(function (e) {
    $("#fondo_imagen_tabla").fadeIn(300);
    $(".todo").css("position", "fixed");
  });

  $("#fondo_imagen_tabla").click(function (e) {
    $("#fondo_imagen_tabla").hide();
    $(".todo").css("position", "relative");
  });

  //************************** VALIDACIÓN DE MODALS ***************************************/

  verificar_todos_modales(
    $("#boton_modernizacion"),
    $("#fondo_actualizaciones input:not(.nova)"),
    $("#fondo_actualizaciones select:not(.nova)"),
    $("#fondo_actualizaciones textarea:not(.nova)"),
    $("#fondo_actualizaciones")
  );

  verificar_todos_modales(
    $("#boton_servicios_tec"),
    $("#fondo_servicios_tec input:not(.nova)"),
    $("#fondo_servicios_tec select:not(.nova)"),
    $("#fondo_servicios_tec textarea:not(.nova)"),
    $("#fondo_servicios_tec")
  );

  verificar_todos_modales(
    $("#boton_innovacion"),
    $("#fondo_innovacion input:not(.nova)"),
    $("#fondo_innovacion select:not(.nova)"),
    $("#fondo_innovacion textarea:not(.nova)"),
    $("#fondo_innovacion")
  );

  verificar_todos_modales3(
    $("#boton_aliada"),
    $("#fondo_mixto input:not(.nova2)"),
    $("#fondo_mixto select:not(.nova2)"),
    $("#fondo_mixto textarea:not(.nova2)"),
    $("#fondo_mixto"),
    $("#cantidad1"),
    $("#fondo_mixto_uno")
  );

  verificar_todos_modales3(
    $("#boton_aliada2"),
    $("#fondo_mixto2 input:not(.nova2)"),
    $("#fondo_mixto2 select:not(.nova2)"),
    $("#fondo_mixto2 textarea:not(.nova2)"),
    $("#fondo_mixto2"),
    $("#cantidad2"),
    $("#fondo_mixto_uno2")
  );

  //

  function verificar_todos_modales3(
    boton,
    vary1,
    vary2,
    vary3,
    desaparece,
    etiqueta,
    contenido
  ) {
    var todo_lleno2;
    boton.click(function () {
      todo_lleno2 = true;

      validar2(vary1);
      validar_textarea2(vary2);
      validar_select2(vary3);

      if (todo_lleno2) {
        desaparece.hide();
        $(".todo").css("position", "relative");
        var conten = contenido.val();
        etiqueta.show();
        etiqueta.text("" + conten);
      } else {
        alert("Campos vacios, por favor revisar nuevamente.");
      }
    });

    function validar2($inputs_inter) {
      //var $inputs = $("#fondo_actualizaciones input:not(.nova)");
      $inputs_inter.each(function (index, element) {
        if ($(element).val().length == " ") {
          $(element).css("border", "solid 2px red");
          todo_lleno2 = false;
        } else {
          $(element).css("border", "1px solid rgb(200,200,200)");
        }
      });
    }

    function validar_select2($selects_inter) {
      $selects_inter.each(function (index, element) {
        if (
          $(element)
          .val()
          .trim() === ""
        ) {
          $(element).css("border", "solid 2px red");
          todo_lleno2 = false;
        } else {
          $(element).css("border", "1px solid rgb(200,200,200)");
        }
      });
    }

    function validar_textarea2($textarea_inter) {
      $textarea_inter.each(function (index, element) {
        if ($(element).val().length == " ") {
          $(element).css("border", "solid 2px red");
          todo_lleno2 = false;
        } else {
          $(element).css("border", "1px solid rgb(200,200,200)");
        }
      });
    }
  }

  function verificar_todos_modales(boton, vary1, vary2, vary3, desaparece) {
    var todo_lleno2;
    boton.click(function () {
      todo_lleno2 = true;

      validar2(vary1);
      validar_textarea2(vary2);
      validar_select2(vary3);

      if (todo_lleno2) {
        desaparece.hide();
        $(".todo").css("position", "relative");
      } else {
        alert("Campos vacios, por favor revisar nuevamente.");
      }
    });

    function validar2($inputs_inter) {
      //var $inputs = $("#fondo_actualizaciones input:not(.nova)");
      $inputs_inter.each(function (index, element) {
        if ($(element).val().length == " ") {
          $(element).css("border", "solid 2px red");
          todo_lleno2 = false;
        } else {
          $(element).css("border", "1px solid rgb(200,200,200)");
        }
      });
    }

    function validar_select2($selects_inter) {
      $selects_inter.each(function (index, element) {
        if (
          $(element)
          .val()
          .trim() === ""
        ) {
          $(element).css("border", "solid 2px red");
          todo_lleno2 = false;
        } else {
          $(element).css("border", "1px solid rgb(200,200,200)");
        }
      });
    }

    function validar_textarea2($textarea_inter) {
      $textarea_inter.each(function (index, element) {
        if ($(element).val().length == " ") {
          $(element).css("border", "solid 2px red");
          todo_lleno2 = false;
        } else {
          $(element).css("border", "1px solid rgb(200,200,200)");
        }
      });
    }
  }

  /*
   * VALIDACIÓN CUANDO LOS CAMPOS PIERDEN EL FOCO
   */

  //    $("select:not(.nova)").each(function(index, element) {
  //        $(this).focusout(function(){
  //           if ($(element).val().trim() === '') {
  //               $(element).css("border", "solid 2px red");
  //               todo_lleno2=false;
  //           }else{
  //               $(element).css("border", "1px solid rgb(200,200,200)");
  //           }
  //        });
  //    });

  $("input:not(.nova)").each(function (index, element) {
    $(this).keyup(function () {
      if ($(element).val().length == " ") {
        $(element).css("border", "solid 2px red");
      } else {
        $(element).css("border", "1px solid rgb(200,200,200)");
      }
    });

    $(this).focusout(function () {
      if ($(element).val().length == " ") {
        $(element).css("border", "solid 2px red");
      } else {
        $(element).css("border", "1px solid rgb(200,200,200)");
      }
    });
  });

  $("textarea:not(.nova)").each(function (index, element) {
    $(this).keyup(function () {
      if ($(element).val().length == " ") {
        $(element).css("border", "solid 2px red");
      } else {
        $(element).css("border", "1px solid rgb(200,200,200)");
      }
    });

    $(this).focusout(function () {
      if ($(element).val().length == " ") {
        $(element).css("border", "solid 2px red");
      } else {
        $(element).css("border", "1px solid rgb(200,200,200)");
      }
    });
  });

  /********FIN*********validaciones modales */

  /********************VALIDACIONES BOTON RADICAR Formulario Principal***************************/

  var todo_lleno;
  $("#boton_radicar").click(function () {
    todo_lleno = true;

    validar();
    validar_textarea();
    //validar_select();

    if (todo_lleno) {
      $("#formulario_principal").submit();
    } else {
      alert("Campos vacios o faltan archivos por cargar, por favor revisar nuevamente.");
    }
  });

  function validar() {
    var $inputs = $("#formulario_principal input:not(.nova)");

    $inputs.each(function (index, element) {
      if ($(element).val().length == " ") {
        console.log(element);
        $(element).css("border", "solid 2px red");
        todo_lleno = false;
      } else {
        $(element).css("border", "none");
      }
    });
  }

  //     function validar_select(){
  //
  //         var $selects = $("#formulario_principal select:not(.nova)");
  //
  //         $selects.each(function(index, element) {
  //             if ($(element).val().trim() === '') {
  //                 $(element).css("border", "solid 2px red");
  //                 todo_lleno=false;
  //             }else{
  //                 $(element).css("border", "none");
  //             }
  //         });
  //
  //     }

  function validar_textarea() {
    var $textarea = $("#formulario_principal textarea:not(.nova)");

    var contador = 0;
    var elemento_devuelto;
    var falta = 0;

    $textarea.each(function (index, element) {
      if ($(element).val().length == " ") {
        console.log(element);
        $(element).css("border", "solid 2px red");
        todo_lleno = false;
      } else {
        $(element).css("border", "none");
      }
    });
    return elemento_devuelto;
  }

  /**********FIN**********VALIDACIONES BOTON RADICAR***************************/

  $("#loading").hide();



  $("#ceu12_ultimo").keyup(function () {
    if ($(this).val() == "no" || $(this).val() == "No" || $(this).val() == "NO" || $(this).val() == "nO") {
      $("#ceu_a1").val('No aplica');
      $("#ceu_a2").val('No aplica');
      $("#ceu_a3").val('No aplica');

      $("#ceu_a1").prop('disabled', true);
      $("#ceu_a2").prop('disabled', true);
      $("#ceu_a3").prop('disabled', true);

    } else {

      $("#ceu_a1").val(' ');
      $("#ceu_a2").val(' ');
      $("#ceu_a3").val(' ');

      $("#ceu_a1").prop('disabled', false);
      $("#ceu_a2").prop('disabled', false);
      $("#ceu_a3").prop('disabled', false);
    }
  });



});