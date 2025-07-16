<?php 

require_once "../controladores/cat.controlador.php";
require_once "../modelos/cat.modelo.php";

class ajaxCat{

	public $id;
	public $categoria;
	public $ruta;
	public $estado;
	public $fecha;

	public function MostrarCategorias(){

		$respuesta = ControladorCat::ctrMostrarCategorias();

		echo json_encode($respuesta);
	}

	public function registrarCategorias(){
		
		$respuesta = ControladorCat::ctrRegistrarCategorias($this->categoria, $this->fecha);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}

	public function eliminarCategoria(){
		
		$respuesta = ControladorCat::ctrEliminarCategoria($this->id);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}

	public function actualizarCategoria(){
		
		$respuesta = ControladorCategorias::ctrActualizarCategoria($this->id,$this->categoria, $this->ruta, $this->estado, $this->fecha);

		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}
	
}

if(!isset($_POST["accion"])){
	$respuesta = new ajaxCat();
	$respuesta -> MostrarCategorias();
}else{

	if($_POST["accion"] == "registrar"){
		$insertar = new ajaxCat();
		$insertar->categoria = $_POST["categoria"];
		$insertar->fecha = $_POST["fecha"];
		$insertar->registrarCategorias();
	}

	if($_POST["accion"] == "eliminar"){
		$eliminar = new ajaxCat();

		$eliminar->id = $_POST["id"];
		
		$eliminar->eliminarCategoria();
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

}