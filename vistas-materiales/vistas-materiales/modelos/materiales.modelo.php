<?php

require_once "conexion.php";

class ModeloMateriales{

	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlIngresarMaterial($tabla, $datos){
	    try {
	        // Validar datos requeridos
	        if(!isset($datos["cod_material"]) || !isset($datos["desc_material"]) || !isset($datos["und_material"])) {
	            throw new Exception("Datos incompletos");
	        }
	        
	        $conexion = Conexion::conectar();
	        $stmt = $conexion->prepare("INSERT INTO $tabla(cod_material, desc_material, und_material) 
	                                  VALUES (:cod_material, :desc_material, :und_material)");

	        $stmt->bindParam(":cod_material", $datos["cod_material"], PDO::PARAM_INT);
	        $stmt->bindParam(":desc_material", $datos["desc_material"], PDO::PARAM_STR);
	        $stmt->bindParam(":und_material", $datos["und_material"], PDO::PARAM_STR);
	        
	        $result = $stmt->execute();
	        
	        return $result ? "ok" : "error";
	        
	    } catch (PDOException $e) {
	        // Registrar el error
	        error_log("Error al ingresar material: " . $e->getMessage());
	        return "error: " . $e->getMessage();
	    } finally {
	        if(isset($stmt)) {
	            $stmt = null;
	        }
	        // Cerrar conexión si es necesario
	    }
	}

	// MOSTRAR CATEGORIAS

	static public function mdlMostrarMateriales($tabla, $item, $valor){

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

	static public function mdlEditarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET categoria = :categoria WHERE id = :id");

		$stmt -> bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

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