

<?php
require_once "../controladores/resumen.controlador.php";
require_once "../modelos/resumen.modelo.php";
class ajaxResumen{
public function MostrarResumen(){
    $respuesta = ControladorResumen::ctrResumen();
    echo json_encode($respuesta);
    
}}
$respuesta = new ajaxResumen();
$respuesta -> MostrarResumen();
