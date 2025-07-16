$(document).ready(function(){

$("#buscadorProyectoTodos").select2({
               
                ajax: {
                    url: "modelos/proyectos-todos-select.modelo.php",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            palabraClave: params.term // search term
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
                
});    


var table = $("#tablaCat").DataTable({
            "dom": '<"float-left"f><"float-right"i>t<"float-left"l><"float-right"p><"clearfix">B',
           "buttons": ['excel'],
         "ajax":{
            "url": "ajax/cat.ajax.php",
            "type":"POST",
            "dataSrc":""
         },          
            "columnDefs":[ 
                  {
                     "targets": 3,
                     "sortable": false,
                     "render": function (data, type, full, meta){
                        return "<center>" +
                                       "<button type='button' class='btn btn-primary btn-sm btnEditar' data-toggle='modal' data-target='#modal-gestionar-categoria'> " +
                                   "<i class='fas fa-pencil-alt'></i> " +
                                  "</button> " + 
                                  "<button type='button' class='btn btn-danger btn-sm btnEliminar'> " +
                                   "<i class='fas fa-trash'> </i> " +
                                  "</button>" +
                                   "</center>";
                       }
                  }
               ],
            "columns":[
                    {"data": "id"},
                    {"data": "categoria"},
                    {"data": "fecha"},
                    {"data": "acciones"}
                ]

      });


   $(".btn-agregar-categoria").on('click',function(){
            accion = "registrar";
            alert(accion);
   });

   $("#btnGuardar").on('click',function(){

            alert(accion);
            var id = $("#idCategoria").val(),
                categoria = $("#txtCategoria").val(),
                fecha = new Date().toISOString().replace(/T/, ' ').replace(/\..+/, '');
            
            var datos = new FormData();

            datos.append('id',id)
            datos.append('categoria',categoria)
            datos.append('fecha',fecha);
            datos.append('accion',accion);

                 $.ajax({
                        url: "ajax/cat.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(respuesta){
                            console.log(respuesta);

                            $("#modal-gestionar-categoria").modal('hide');
                            
                            table.ajax.reload(null,false);

                            $("#idCategoria").val("");
                            $("#txtCategoria").val("");

                        }
                    });
                })


       $('#tablaCat tbody').on('click','.btnEliminar',function(){
            var data = table.row($(this).parents('tr')).data();
            
            var id = data["id"];

            var datos = new FormData();
            datos.append('accion',"eliminar")
            datos.append('id',id);                  

                    //LLAMADO AJAX
                    $.ajax({
                        url: "ajax/cat.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(respuesta){

                            console.log(respuesta);
                        
                            table.ajax.reload( null, false );                            

                            
                        }
                    })
                })
                
})

