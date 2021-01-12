
    Swal.fire({
        title: 'Cargando Información...',
        html:`
            <div class="progress" id="posModal">
                <div class="progress-bar" role="progressbar" id="porBarra" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
            </div>
        `,
        showConfirmButton:false
    })

    $.ajax({
        type: 'POST',
        url: '../../controladores/adminControllers/proyectos.php'
    })
    .done(function(respuesta){
        $("#porBarra").attr({
            'style': 'width: 50%'
        });
        $("#porBarra").html('50%');
        $("#contenTable").html(respuesta);
        $("#porBarra").attr({
            'style': 'width: 75%'
        });
        $("#porBarra").html('75%');
        $('#myTable').DataTable({
            language: {
                "processing": "Procesando...",
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "emptyTable": "Ningún dato disponible en esta tabla",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "infoThousands": ",",
                "loadingRecords": "Cargando...",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad",
                    "collection": "Colección",
                    "colvisRestore": "Restaurar visibilidad",
                    "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                    "copySuccess": {
                        "1": "Copiada 1 fila al portapapeles",
                        "_": "Copiadas %d fila al portapapeles"
                    },
                    "copyTitle": "Copiar al portapapeles",
                    "csv": "CSV",
                    "excel": "Excel",
                    "pageLength": {
                        "-1": "Mostrar todas las filas",
                        "1": "Mostrar 1 fila",
                        "_": "Mostrar %d filas"
                    },
                    "pdf": "PDF",
                    "print": "Imprimir"
                },
                "autoFill": {
                    "cancel": "Cancelar",
                    "fill": "Rellene todas las celdas con <i>%d<\/i>",
                    "fillHorizontal": "Rellenar celdas horizontalmente",
                    "fillVertical": "Rellenar celdas verticalmentemente"
                },
                "decimal": ",",
                "searchBuilder": {
                    "add": "Añadir condición",
                    "button": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "clearAll": "Borrar todo",
                    "condition": "Condición",
                    "conditions": {
                        "date": {
                            "after": "Despues",
                            "before": "Antes",
                            "between": "Entre",
                            "empty": "Vacío",
                            "equals": "Igual a",
                            "not": "No",
                            "notBetween": "No entre",
                            "notEmpty": "No Vacio"
                        },
                        "moment": {
                            "after": "Despues",
                            "before": "Antes",
                            "between": "Entre",
                            "empty": "Vacío",
                            "equals": "Igual a",
                            "not": "No",
                            "notBetween": "No entre",
                            "notEmpty": "No vacio"
                        },
                        "number": {
                            "between": "Entre",
                            "empty": "Vacio",
                            "equals": "Igual a",
                            "gt": "Mayor a",
                            "gte": "Mayor o igual a",
                            "lt": "Menor que",
                            "lte": "Menor o igual que",
                            "not": "No",
                            "notBetween": "No entre",
                            "notEmpty": "No vacío"
                        },
                        "string": {
                            "contains": "Contiene",
                            "empty": "Vacío",
                            "endsWith": "Termina en",
                            "equals": "Igual a",
                            "not": "No",
                            "notEmpty": "No Vacio",
                            "startsWith": "Empieza con"
                        }
                    },
                    "data": "Data",
                    "deleteTitle": "Eliminar regla de filtrado",
                    "leftTitle": "Criterios anulados",
                    "logicAnd": "Y",
                    "logicOr": "O",
                    "rightTitle": "Criterios de sangría",
                    "title": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "value": "Valor"
                },
                "searchPanes": {
                    "clearMessage": "Borrar todo",
                    "collapse": {
                        "0": "Paneles de búsqueda",
                        "_": "Paneles de búsqueda (%d)"
                    },
                    "count": "{total}",
                    "countFiltered": "{shown} ({total})",
                    "emptyPanes": "Sin paneles de búsqueda",
                    "loadMessage": "Cargando paneles de búsqueda",
                    "title": "Filtros Activos - %d"
                },
                "select": {
                    "1": "%d fila seleccionada",
                    "_": "%d filas seleccionadas",
                    "cells": {
                        "1": "1 celda seleccionada",
                        "_": "$d celdas seleccionadas"
                    },
                    "columns": {
                        "1": "1 columna seleccionada",
                        "_": "%d columnas seleccionadas"
                    }
                },
                "thousands": "."
            }
        } );
        $("#porBarra").attr({
            'style': 'width: 100%'
        });
        $("#porBarra").html('100%');
        Swal.close();
    })

function changeLimitDate() {
    Swal.fire({
        icon: 'warning',
        title: 'Cambio de fecha limite',
        text: 'Escoja la nueva fecha limite',
        html:`
        <label>Fecha:</label>
        <br>
        <input type="date" id = "newLimitDate" required/>
        <br>
        <br>
        <label>Motivo:</label>
        <br>
        <textarea id="motivo"></textarea>
        `,
        showCancelButton: true,
        cancelButtonColor: 'red',
        confirmButtonText: 'Cambiar'
    }).then((result) => {
        if(result.isConfirmed){
            var newLimitDate = $("#newLimitDate").val();
            var motivo = $("#motivo").val();
            if (newLimitDate == '' || motivo == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text:'No selecciono una nueva fecha.',
                    confirmButtonColor:'red'
                })
            } else {
                $.ajax({
                    type: 'POST',
                    url: '../../controladores/adminControllers/fechaLimite.php',
                    data: {
                        'date':newLimitDate,
                        'motivo':motivo
                    }
                })
                .done(function(respuesta){
                    if (respuesta ==  true) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Actualización exitosa'
                        }) 
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text:'Ha ocurrido un error en el servidor.'+respuesta,
                            confirmButtonColor:'red'
                        }) 
                    }
                })    
            }
        }
        
      })
}