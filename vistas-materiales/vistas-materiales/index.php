<?php

require_once "controladores/plantilla.controlador.php";

require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/ventas.controlador.php";
require_once "controladores/materiales.controlador.php";
require_once "controladores/cat.controlador.php";
require_once "controladores/trabajadores.controlador.php";
require_once "controladores/ver.controlador.php";
require_once "controladores/resumen.controlador.php";



require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/materiales.modelo.php";
require_once "modelos/cat.modelo.php";
require_once "modelos/trabajadores.modelo.php";
require_once "modelos/ver.modelo.php";
require_once "modelos/resumen.modelo.php";
$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();

/* EDITAR USUARIOS PARTE 1 - COMPLETA */