$(document).ready(function(){

    // Select2 para proyectos
    $("#buscadorProyectoTodos").select2({
        ajax: {
            url: "modelos/proyectos-select.modelo.php",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    palabraClave: params.term
                };
            },
            processResults: function (response) {
                return {
                    results: response
                };
            },
            cache: true
        },
        placeholder: "Seleccione un proyecto...",
        allowClear: true
    });

    // Select2 para trabajadores
    $("#buscadorTrabajador").select2({
        ajax: {
            url: "modelos/trabajador-select.modelo.php",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    palabraClave: params.term
                };
            },
            processResults: function (response) {
                return {
                    results: response
                };
            },
            cache: true
        },
        placeholder: "Seleccione un trabajador...",
        allowClear: true
    }); 



    $("#buscadorTrabajador2").select2({
        ajax: {
            url: "modelos/trabajador-select.modelo.php",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    palabraClave: params.term
                };
            },
            processResults: function (response) {
                return {
                    results: response
                };
            },
            cache: true
        },
        placeholder: "Seleccione un trabajador...",
        allowClear: true
    }); 




    // Select2 para materiales
    $("#buscadorMateriales").select2({
        ajax: {
            url: "modelos/materiales-select.modelo.php",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    palabraClave: params.term
                };
            },
            processResults: function (response) {
                return {
                    results: response
                };
            },
            cache: true
        },
        placeholder: "Seleccione un material...",
        allowClear: true
    });          

    var accion = "";

    var table = $("#tablaMatTmp").DataTable({
        dom: '<"float-left"f><"float-right"i>t<"float-left"l><"float-right"p><"clearfix">B',
        buttons: ['excel'],
        ajax: {
            url: "ajax/mov-materiales.ajax.php",
            type: "POST",
            dataSrc: ""
        },          
        columnDefs: [ 
            {
                targets: 5,
                sortable: false,
                render: function (data, type, full, meta){
                    return "<center>" +
                           "<button type='button' class='btn btn-danger btn-sm btnEliminarTmp'> " +
                           "<i class='fas fa-trash'> </i> " +
                           "</button>" +
                           "</center>";
                }
            }
        ],
        columns: [
            {data: "id_proceso"},
            {data: "proyecto"},
            {data: "desc_material"},
            {data: "cantidad_mat"},
             {data: "num_serie"},
            {data: "acciones"}
        ],
        language: {
            decimal: "",
            emptyTable: "No hay datos disponibles en la tabla",
            info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
            infoEmpty: "Mostrando 0 a 0 de 0 registros",
            infoFiltered: "(filtrado de _MAX_ registros totales)",
            lengthMenu: "Mostrar _MENU_ registros",
            loadingRecords: "Cargando...",
            processing: "Procesando...",
            search: "Buscar:",
            zeroRecords: "No se encontraron registros coincidentes",
            paginate: {
                first: "Primero",
                last: "Último", 
                next: "Siguiente",
                previous: "Anterior"
            }
        }
    });

    function validarFormulario() {
        var errores = [];

        if (!$("#buscadorProyectoTodos").val()) {
            errores.push("• Debe rellenar todos los campos");
        }
        

        return errores;
    }

    function mostrarErrores(errores) {
        alert("Por favor corrija los siguientes errores:\n\n" + errores.join("\n"));
    }

    function limpiarFormulario() {
        $("#buscadorMateriales").val(null).trigger('change');
        $("#cantidadMaterial").val("");
        $("#estadoMat").val("");
         $("#num_serie").val("0");
        
        
    }

    $(".btn-agregar-tmp").on('click', function(){
        accion = "registrar";
    });

    $(".btnAgregarTmp").on('click', function(){
        
        var $btn = $(this);

        var errores = validarFormulario();
        if (errores.length > 0) {
            mostrarErrores(errores);
            return;
        }

        var datos = new FormData();
        datos.append('id_proyecto', $("#buscadorProyectoTodos").val());
        datos.append('id_trabajador', $("#buscadorTrabajador").val());
        datos.append('id_trabajador2', $("#buscadorTrabajador2").val());
        datos.append('fecha_mov', $("#fechaMov").val());
        datos.append('num_reg', $("#numRegistro").val());
        datos.append('tipo_mov', $("#tipoMovMat").val());
        datos.append('id_material', $("#buscadorMateriales").val());
        datos.append('cantidad_mat', $("#cantidadMaterial").val());
        datos.append('id_estado_mat', $("#estadoMat").val());
        datos.append('num_serie', $("#num_serie").val());
        datos.append('accion', accion);

        // Solo deshabilitar el botón, no cambiar texto ni ocultar
        $btn.prop('disabled', true);

        $.ajax({
            url: "ajax/mov-materiales.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta){
                console.log(respuesta);
                table.ajax.reload(null, false);
                limpiarFormulario();
                $btn.prop('disabled', false);
                if (respuesta.includes("correctamente")) {
                    alert("Registro agregado correctamente");
                }
            },
            error: function(xhr, status, error) {
                console.log("Error: " + error);
                alert("Error al procesar la solicitud");
                $btn.prop('disabled', false);
            }
        });
    });

    $('#tablaMatTmp tbody').on('click', '.btnEliminarTmp', function(){
        
        if (!confirm("¿Está seguro de que desea eliminar este registro?")) {
            return;
        }
        
        var data = table.row($(this).parents('tr')).data();
        var id_proceso = data["id_proceso"];

        var datos = new FormData();
        datos.append('accion', "eliminar");
        datos.append('id_proceso', id_proceso);                  

        $(this).prop('disabled', true);

        $.ajax({
            url: "ajax/mov-materiales.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta){
                console.log(respuesta);
                table.ajax.reload(null, false);
                if (respuesta.includes("correctamente")) {
                    alert("Registro eliminado correctamente");
                }
            },
            error: function(xhr, status, error) {
                console.log("Error: " + error);
                alert("Error al eliminar el registro");
            }
        });
    });

});
$("#btn-registrotemp").on('click', function() {

    // Verificamos si hay datos en la tabla
    var cantidadFilas = $("#tablaMatTmp").DataTable().data().count();

    if (cantidadFilas === 0) {
        alert("Debe agregar al menos un material antes de registrar.");
        return; // No continuar si no hay datos
    }

    // Confirmación del usuario
    if (!confirm("¿Está seguro de que desea registrar y vaciar la tabla temporal? Esta acción no se puede deshacer.")) {
        return;
    }

    var datos = new FormData();
    datos.append('accion', "registrartmp");

    $.ajax({
        url: "ajax/mov-materiales.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            console.log(respuesta);
            alert("Tabla vaciada correctamente");
            // Recarga los datos del DataTable sin recargar toda la página
            $("#tablaMatTmp").DataTable().ajax.reload(null, false);
        },
        error: function(xhr, status, error) {
            alert("Ocurrió un error al vaciar la tabla");
            console.error(error);
        }
    });
});
