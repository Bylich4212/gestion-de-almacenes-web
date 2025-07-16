<?php

class ControladorTrabajadores{

	// CREAR CATEGORIAS

	static public function ctrCrearTrabajador(){

		if(isset($_POST["nuevoTrabajador"])){

			if($_POST["nuevoCargo"]){

			   	$tabla = "trabajadores";

			   	$datos = array("nombres"=>$_POST["nuevoTrabajador"],
					           "cargo"=>$_POST["nuevoCargo"]);

			   	$respuesta = ModeloTrabajadores::mdlIngresarTrabajador($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "Nuevo trabajador ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "trabajadores";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Trabajador no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "trabajadores";

							}
						})

			  	</script>';

			}


	}


	}

	// MOSTRAR CATEGORIAS

	static public function ctrMostrarTrabajadores($item, $valor){

		$tabla = "trabajadores";

		$respuesta = ModeloTrabajadores::mdlMostrarTrabajadores($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditarTrabajador(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				$tabla = "trabajadores";

				$datos = array("nombres"=>$_POST["editarNombre"],
					           "cargo"=>$_POST["editarCargo"],
					           "estado"=>$_POST["editarEstado"],
							   "id_trabajador"=>$_POST["idTrabajador"]);

				$respuesta = ModeloTrabajadores::mdlEditarTrabajador($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "Datos de trabajador ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "trabajadores";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Trabajador no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "trabajadores";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	// ESPERANDO LA VARIABLE GET DEL JS

	static public function ctrBorrarCategoria(){

		if(isset($_GET["idCategoria"])){

			$tabla ="Categorias";
			$datos = $_GET["idCategoria"];

			$respuesta = ModeloCategorias::mdlBorrarCategoria($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "categorias";

									}
								})

					</script>';
			}
		}
		
	}



}

