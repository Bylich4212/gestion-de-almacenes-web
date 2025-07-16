<?php 

require_once "conexion.php";

class ModeloMovMateriales{

	static public function mdlMostrarMovMateriales(){

		$stmt = Conexion::conectar()-> prepare("SELECT id_proceso,id_proyecto,c.proyecto,m.id_material, desc_material ,cantidad_mat,num_serie,'X' as acciones 
FROM mat_procesos m
INNER JOIN construccion_mae c ON m.id_proyecto=c.idconstruccion
INNER JOIN materiales mat ON m.id_material=mat.id_material");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt = null;
	}

	static public function mdlRegistrarMovMateriales(
  $id_proyecto,
  $id_trabajador,
  $id_trabajador2,
  $fecha_mov,
  $num_reg,
  $tipo_mov,
  $id_material,
  $cantidad_mat,
  $id_estado_mat,
  $num_serie
) {
  $stmt = Conexion::conectar()->prepare("INSERT INTO mat_procesos (
      id_proyecto, id_trabajador, id_trabajador2, fecha_mov, num_reg,
      tipo_mov, id_material, cantidad_mat, id_estado_mat, num_serie
    ) VALUES (
      :id_proyecto, :id_trabajador, :id_trabajador2, :fecha_mov, :num_reg,
      :tipo_mov, :id_material, :cantidad_mat, :id_estado_mat, :num_serie
    )");

  $stmt->bindParam(":id_proyecto", $id_proyecto, PDO::PARAM_INT);
  $stmt->bindParam(":id_trabajador", $id_trabajador, PDO::PARAM_INT);
  $stmt->bindParam(":id_trabajador2", $id_trabajador2, PDO::PARAM_INT);
  $stmt->bindParam(":fecha_mov", $fecha_mov, PDO::PARAM_STR);
  $stmt->bindParam(":num_reg", $num_reg, PDO::PARAM_INT);
  $stmt->bindParam(":tipo_mov", $tipo_mov, PDO::PARAM_INT);
  $stmt->bindParam(":id_material", $id_material, PDO::PARAM_INT);
  $stmt->bindParam(":cantidad_mat", $cantidad_mat, PDO::PARAM_STR);
  $stmt->bindParam(":id_estado_mat", $id_estado_mat, PDO::PARAM_INT);
  $stmt->bindParam(":num_serie", $num_serie, PDO::PARAM_STR);

  if ($stmt->execute()) {
    return "El movimiento se registró correctamente";
  } else {
    return "Error, no se pudo registrar el movimiento";
  }

  $stmt = null;
}

	static public function mdlEliminarMovMateriales($id_proceso){

		$stmt = Conexion::conectar()->prepare("DELETE FROM mat_procesos WHERE id_proceso = :id_proceso");

		$stmt -> bindParam(":id_proceso", $id_proceso, PDO::PARAM_INT);

		if($stmt -> execute()){
            return "La categoría se eliminó correctamente";
        }else{
            return "Error, no se pudo eliminar la categoría";
        }        

        $stmt = null;

	}

	static public function mdlActualizarCategoria($id,$categoria, $ruta, $estado, $fecha){

		$stmt = Conexion::conectar()->prepare("UPDATE categorias
											   SET categoria = :categoria,
											   	   ruta = :ruta,
												   estado = :estado,
												   fecha = :fecha
											   WHERE id = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);
		$stmt -> bindParam(":categoria", $categoria, PDO::PARAM_STR);
		$stmt -> bindParam(":ruta", $ruta, PDO::PARAM_STR);
		$stmt -> bindParam(":estado", $estado, PDO::PARAM_STR);
		$stmt -> bindParam(":fecha", $fecha, PDO::PARAM_STR);

		if($stmt -> execute()){
            return "La categoría se actualizó correctamente";
        }else{
            return "Error, no se pudo actualizar la categoría";
        }        

        $stmt = null;
	}
	
static public function mdlvaciartabla($tablaOrigen, $tablaDestino) {
    try {
        $conexion = Conexion::conectar();

        // Iniciar transacción
        $conexion->beginTransaction();

        // Insertar los datos, aplicando la lógica para tipo_mov = 2
        $sqlInsert = "INSERT INTO $tablaDestino (
                          id_proceso,
                          id_proyecto,
                          id_trabajador,
                          id_trabajador2,
                          fecha_mov,
                          num_reg,
                          tipo_mov,
                          id_material,
                          cantidad_mat,
                          id_estado_mat,
                          num_serie
                      )
                      SELECT 
                          id_proceso,
                          id_proyecto,
                          id_trabajador,
                          id_trabajador2,
                          fecha_mov,
                          num_reg,
                          tipo_mov,
                          id_material,
                         
                          CASE 
                              WHEN tipo_mov > 2 THEN -ABS(cantidad_mat) 
                              ELSE cantidad_mat 
                          END AS cantidad_mat,
                          id_estado_mat,
                          num_serie
                      FROM $tablaOrigen";

        $stmtInsert = $conexion->prepare($sqlInsert);
        $stmtInsert->execute();

        // Eliminar los datos de la tabla temporal
        $sqlDelete = "DELETE FROM $tablaOrigen";
        $stmtDelete = $conexion->prepare($sqlDelete);
        $stmtDelete->execute();

        // Confirmar transacción
        $conexion->commit();
        return "ok";

    } catch (Exception $e) {
        // Revertir en caso de error
        $conexion->rollBack();
        return "error: " . $e->getMessage();
    }
}

}
?>
   