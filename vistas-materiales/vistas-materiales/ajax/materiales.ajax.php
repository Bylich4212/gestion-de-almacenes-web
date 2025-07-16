<?php

require_once "../controladores/materiales.controlador.php";
require_once "../modelos/materiales.modelo.php";

class AjaxMateriales{

	/*=============================================
	EDITAR CLIENTE
	=============================================*/	

	public $idCliente;

	public function ajaxEditarMaterial(){

		$item = "id_material";
		$valor = $this->idMaterial;

		$respuesta = ControladorMateriales::ctrMostrarMateriales($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
EDITAR CLIENTE
=============================================*/	

if(isset($_POST["idMaterial"])){

	$material = new AjaxMateriales();
	$material -> idMaterial = $_POST["idMaterial"];
	$material -> ajaxEditarMaterial();

}