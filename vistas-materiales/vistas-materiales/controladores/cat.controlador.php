<?php 

class ControladorCat{

	static public function ctrMostrarCategorias(){
		
		$respuesta = ModeloCat::mdlMostrarCategorias();

		return $respuesta;
	}

	static public function ctrRegistrarCategorias($categoria, $fecha){

		$respuesta = ModeloCat::mdlRegistrarCategorias($categoria, $fecha);

		return $respuesta;
	}

	static public function ctrEliminarCategoria($id){

		$respuesta = ModeloCat::mdlEliminarCategoria($id);

		return $respuesta;
	}

	static public function ctrActualizarCategoria($id,$categoria, $ruta, $estado, $fecha){

		$respuesta = ModeloCategorias::mdlActualizarCategoria($id,$categoria, $ruta, $estado, $fecha);

		return $respuesta;
	}

}