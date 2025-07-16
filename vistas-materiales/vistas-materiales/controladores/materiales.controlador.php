<?php

class ControladorMateriales{

	// CREAR CATEGORIAS

	static public function ctrCrearMaterial(){

		if(isset($_POST["nuevoCodigo"])){

			if($_POST["nuevoCodigo"]){

			   	$tabla = "materiales";

			   	$datos = array("cod_material"=>$_POST["nuevoCodigo"],
					           "desc_material"=>$_POST["nuevoMaterial"],
					           "und_material"=>$_POST["nuevaUnidad"]);

			   	$respuesta = ModeloMateriales::mdlIngresarMaterial($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "Nuevo Material ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "materiales";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Material no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "materiales";

							}
						})

			  	</script>';

			}


	}


	}

	// MOSTRAR CATEGORIAS

	static public function ctrMostrarMateriales($item, $valor){

		$tabla = "materiales";

		$respuesta = ModeloMateriales::mdlMostrarMateriales($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditarMaterial(){

		if(isset($_POST["editarCodigo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCodigo"])){

				$tabla = "categorias";

				$datos = array("categoria"=>$_POST["editarCategoria"],
							   "id"=>$_POST["idCategoria"]);

				$respuesta = ModeloCategorias::mdlEditarCategoria($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "categorias";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
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

