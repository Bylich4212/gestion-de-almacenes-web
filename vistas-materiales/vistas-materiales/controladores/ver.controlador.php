<?php
class ControladorVer{

	static public function ctrMostrarMovimientos(){
		
		$respuesta = Modelover::mdlMostrarMovimientos();

		return $respuesta;
	}
}
