<?php

require_once "conexion.php";

class ModeloTrabajadores{

	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlIngresarTrabajador($tabla, $datos){
	    try {
	        // Validar datos requeridos
	        if(!isset($datos["nombres"]) || !isset($datos["cargo"])) {
	            throw new Exception("Datos incompletos");
	        }
	        
	        $conexion = Conexion::conectar();
	        $stmt = $conexion->prepare("INSERT INTO $tabla(nombres, cargo) 
	                                  VALUES (:nombres, :cargo)");

	        $stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
	        $stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
	        
	        $result = $stmt->execute();
	        
	        return $result ? "ok" : "error";
	        
	    } catch (PDOException $e) {
	        // Registrar el error
	        error_log("Error al ingresar trabajador: " . $e->getMessage());
	        return "error: " . $e->getMessage();
	    } finally {
	        if(isset($stmt)) {
	            $stmt = null;
	        }
	        // Cerrar conexión si es necesario
	    }
	}

	// MOSTRAR CATEGORIAS

	static public function mdlMostrarTrabajadores($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function mdlEditarTrabajador($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombres = :nombres, cargo = :cargo, estado = :estado WHERE id_trabajador = :id_trabajador");

		$stmt -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stmt -> bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
		$stmt -> bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
		$stmt -> bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	static public function mdlBorrarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}