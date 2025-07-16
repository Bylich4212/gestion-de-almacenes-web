<?php
require_once "conexion.php";

class ModeloResumen{
    static public function mdlResumen () {
        $stmt = Conexion::conectar()->prepare("SELECT 
    cm.proyecto,
    ma.cod_material,
    ma.desc_material,
    ma.und_material,
    SUM(mm.cantidad_mat) AS total_cantidad
FROM 
    mat_movimiento mm
    INNER JOIN construccion_mae cm ON mm.id_proyecto = cm.idconstruccion
    INNER JOIN materiales ma ON mm.id_material = ma.id_material
GROUP BY 
    cm.proyecto,
    ma.cod_material,
    ma.desc_material,
    ma.und_material
ORDER BY 
    cm.proyecto, ma.cod_material;");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt = null;
}
}