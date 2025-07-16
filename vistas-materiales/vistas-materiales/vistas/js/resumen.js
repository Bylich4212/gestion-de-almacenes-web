$(document).ready(function(){



var table = $("#table").DataTable({
      
         "ajax":{
            "url": "ajax/resumen.ajax.php",
            "type":"POST",
            "dataSrc":""
         },          
            
            "columns":[
                                                              
  { "data":  "proyecto" },
  { "data": "cod_material" },
  { "data": "desc_material" },
  { "data": "und_material" },
  { "data": "total_cantidad" },
                ]

      });


   
})


