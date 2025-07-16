<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxCategorias{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/

	// 1

	public $idCategoria;

	public function ajaxEditarCategoria(){

		// 3

		$item = "id";
		$valor = $this->idCategoria;

		$respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

		// RESPUESTA CODIFICADA EN JSON PARA LA RECIBA JS

		echo json_encode($respuesta);

	}



}

// EDITAR CATEGORIA

// OBJETO QUE VA A RECIBIR

// SI VIENE LA VARIABLE POST

// 2

if(isset($_POST["idCategoria"])){

	$categoria = new AjaxCategorias();
	$categoria -> idCategoria = $_POST["idCategoria"];
	$categoria -> ajaxEditarCategoria();
}



