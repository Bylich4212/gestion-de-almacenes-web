/*=============================================
EDITAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEditarMaterial", function(){

	var idMaterial = $(this).attr("idMaterial");

 //alert(idMaterial);

	var datos = new FormData();
    datos.append("idMaterial", idMaterial);



    $.ajax({

      url:"ajax/materiales.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
      	   $("#idMaterial").val(respuesta["id_material"]);
  	       $("#editarCodigo").val(respuesta["cod_material"]);
           $("#editarMaterial").val(respuesta["desc_material"]);
           $("#editarUnidad").val(respuesta["und_material"]);
  	       
	  }

  	})

})

