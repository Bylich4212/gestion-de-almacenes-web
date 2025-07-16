<?php 

require_once "../controladores/mov-materiales.controlador.php";
require_once "../modelos/mov-materiales.modelo.php";

class ajaxMovMateriales{

	public $id_proyecto;
	public $id_trabajador;

	public $id_trabajador2;
	public $id_proceso;
	public $fecha_mov;
	public $num_reg;
	public $tipo_mov;
	public $id_material;
	public $cantidad_mat;
	public $id_estado_mat;

	public $num_serie;
	
	public function MostrarMovProcesos(){

		$respuesta = ControladorMovMateriales::ctrMostrarMovMateriales();

		echo json_encode($respuesta);
	}

	public function registrarMovMaterial(){
		
		$respuesta = ControladorMovMateriales::ctrRegistrarMovMateriales($this->id_proyecto, $this->id_trabajador,$this->id_trabajador2, $this->fecha_mov, $this->num_reg, $this->tipo_mov, $this->id_material, $this->cantidad_mat, $this->id_estado_mat, $this->num_serie);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}

	public function eliminarMovMaterial(){
		
		$respuesta = ControladorMovMateriales::ctrEliminarMovMateriales($this->id_proceso);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}

	public function actualizarCategoria(){
		
		$respuesta = ControladorCategorias::ctrActualizarCategoria($this->id,$this->categoria, $this->ruta, $this->estado, $this->fecha);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}
	public function vaciartabla(){
		
		$respuesta = ControladorMovMateriales::ctrVaciartabla();

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}
	
	
}

if(!isset($_POST["accion"])){
	$respuesta = new ajaxMovMateriales();
	$respuesta -> MostrarMovProcesos();
}else{

	if($_POST["accion"] == "registrar"){
		$insertar = new ajaxMovMateriales();
		$insertar->id_proyecto = $_POST["id_proyecto"];
		$insertar->id_trabajador = $_POST["id_trabajador"];
		$insertar->id_trabajador2 = $_POST["id_trabajador2"];
		$insertar->fecha_mov = $_POST["fecha_mov"];
		$insertar->num_reg = $_POST["num_reg"];
		$insertar->tipo_mov = $_POST["tipo_mov"];
		$insertar->id_material = $_POST["id_material"];
		$insertar->cantidad_mat = $_POST["cantidad_mat"];
		$insertar->id_estado_mat = $_POST["id_estado_mat"];
		$insertar->num_serie = $_POST["num_serie"];
		$insertar->registrarMovMaterial();
	}

	if($_POST["accion"] == "eliminar"){
		$eliminar = new ajaxMovMateriales();

		$eliminar->id_proceso = $_POST["id_proceso"];
		
		$eliminar->eliminarMovMaterial();
	}

	if($_POST["accion"] == "actualizar"){
		$actualizar = new ajaxCategorias();

		$actualizar->id = $_POST["id"];
		$actualizar->categoria = $_POST["categoria"];
		$actualizar->ruta = $_POST["ruta"];
		$actualizar->estado = $_POST["estado"];
		$actualizar->fecha = $_POST["fecha"];
		
		$actualizar->actualizarCategoria();
	}

	if($_POST["accion"] == "registrartmp"){
		$vaciar = new ajaxMovMateriales();		
		$vaciar->vaciartabla();
		

	}


}