<?php

require_once "../controladores/trabajadores.controlador.php";
require_once "../modelos/trabajadores.modelo.php";

class AjaxTrabajadores{

	/*=============================================
	EDITAR CLIENTE
	=============================================*/	

	public $idTrabajador;

	public function ajaxEditarTrabajador(){

		$item = "id_trabajador";
		$valor = $this->idTrabajador;

		$respuesta = ControladorTrabajadores::ctrMostrarTrabajadores($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
EDITAR CLIENTE
=============================================*/	

if(isset($_POST["idTrabajador"])){

	$material = new AjaxTrabajadores();
	$material -> idTrabajador = $_POST["idTrabajador"];
	$material -> ajaxEditarTrabajador();

}