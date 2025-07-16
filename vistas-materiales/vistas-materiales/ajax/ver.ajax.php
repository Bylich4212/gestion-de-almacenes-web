<?php

require_once "../controladores/ver.controlador.php";
require_once "../modelos/ver.modelo.php";

class ajaxVer{

	

	public function MostrarMovimiento(){

		$respuesta = ControladorVer::ctrMostrarMovimientos();

		echo json_encode($respuesta);
	}}

/*=============================================
INSTANCIA PARA BUSCAR MOVIMIENTOS POR PROYECTO
=============================================*/

if(!isset($_POST["accion"])){
	$respuesta = new ajaxVer();
	$respuesta -> MostrarMovimiento();
}


