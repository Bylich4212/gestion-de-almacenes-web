<?php 

class ControladorMovMateriales{

	static public function ctrMostrarMovMateriales(){
		
		$respuesta = ModeloMovMateriales::mdlMostrarMovMateriales();

		return $respuesta;
	}

	static public function ctrRegistrarMovMateriales($id_proyecto, $id_trabajador,$id_trabajador2 ,$fecha_mov, $num_reg, $tipo_mov, $id_material, $cantidad_mat, $id_estado_mat,$num_serie){

		$respuesta = ModeloMovMateriales::mdlRegistrarMovMateriales($id_proyecto, $id_trabajador,$id_trabajador2,$fecha_mov, $num_reg, $tipo_mov, $id_material, $cantidad_mat, $id_estado_mat,$num_serie);

		return $respuesta;
	}

	static public function ctrEliminarMovMateriales($id_proceso){

		$respuesta = ModeloMovMateriales::mdlEliminarMovMateriales($id_proceso);

		return $respuesta;
	}

	static public function ctrVaciartabla(){

		$respuesta = ModeloMovMateriales::mdlvaciartabla("mat_procesos","mat_movimiento");

		return $respuesta;
	}

}