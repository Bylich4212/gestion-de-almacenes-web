$(document).ready(function () {
    var table = $("#tabla").DataTable({
        fixedHeader: true,
        dom: 'B<"float-left"f><"float-right"i>t<"float-left"l><"float-right"p><"clearfix">',
        buttons: [
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis',
            {
                text: 'Limpiar Filtros',
                action: function (e, dt, node, config) {
                    $('#tabla thead input').val('');
                    dt.columns().every(function () {
                        this.search('');
                    });
                    dt.draw();
                }
            }
        ],
        ajax: {
            url: "ajax/ver.ajax.php",
            type: "POST",
            dataSrc: ""
        },
        columnDefs: [
            {
                targets: 12, // columna de acción (última)
                sortable: false,
                render: function (data, type, full, meta) {
                    return "<center>" +
                        "<button type='button' class='btn btn-primary btn-sm btnEditar' data-toggle='modal' data-target='#modal-gestionar-categoria'>" +
                        "<i class='fas fa-pencil-alt'></i> " +
                        "</button> " +
                        "<button type='button' class='btn btn-danger btn-sm btnEliminar'>" +
                        "<i class='fas fa-trash'> </i> " +
                        "</button>" +
                        "</center>";
                }
            }
        ],
        columns: [
            { data: "id_proceso" },          // 0
            { data: "proyecto" },            // 1
            { data: "cod_material" },        // 2
            { data: "desc_material" },       // 3
            { data: "cantidad_mat" },        // 4
            { data: "tipo" },                // 5
            { data: "nombres" },             // 6 (trabajador entrega)
            { data: "nombres_2" },           // 7 (trabajador recibe) <-- Cambiar alias en SQL (ver abajo)
            { data: "und_material" },        // 8
            { data: "estado" },              // 9
            { data: "num_serie" },           // 10
            { data: "fecha_mov" },           // 11
            { data: "accion" }               // 12
        ]
    });

    // Filtros por columna
    $('#tabla thead th').each(function () {
        var title = $(this).text() || 'Columna';
        $(this).html('<div>' + title + '</div><input type="text" placeholder="B. ' + title + '" style="width:100%;" />');
    });

    table.columns().every(function () {
        var that = this;
        $('input', this.header()).on('keyup change', function () {
            if (that.search() !== this.value) {
                that.search(this.value).draw();
            }
        });
    });
});
