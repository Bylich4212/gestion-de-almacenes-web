/*=============================================
EDITAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEditarTrabajador", function(){

	var idTrabajador = $(this).attr("idTrabajador");

// alert(idTrabajador);
//exit();
	var datos = new FormData();
    datos.append("idTrabajador", idTrabajador);



    $.ajax({

      url:"ajax/trabajadores.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

           console.log(respuesta);
      
      	   $("#idTrabajador").val(respuesta["id_trabajador"]);
  	       $("#editarNombre").val(respuesta["nombres"]);
           $("#editarCargo").val(respuesta["cargo"]);
           $("#editarEstado").val(respuesta["estado"]);
  	       
	  }

  	})

})

