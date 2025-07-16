<?php
class ControladorResumen{
    static public function ctrResumen(){
        $respuesta = ModeloResumen::mdlResumen();
        return $respuesta;
    }
}