<?php
require_once "conexion.php";

class Modelover {

    static public function mdlMostrarMovimientos() {
        $stmt = Conexion::conectar()->prepare("SELECT 
    mm.id_proceso ,
    cm.proyecto,
    ma.cod_material,
    ma.desc_material,
    mm.cantidad_mat,
     tm.tipo,
    tr.nombres AS nombres,
tr2.nombres AS nombres_2,
    ma.und_material,
    te.estado,
    mm.num_serie,
    mm.fecha_mov,'x' as accion
FROM 
    mat_movimiento mm
    INNER JOIN construccion_mae cm ON mm.id_proyecto = cm.idconstruccion
    INNER JOIN materiales ma ON mm.id_material = ma.id_material
    INNER JOIN trabajadores tr ON mm.id_trabajador = tr.id_trabajador
    INNER JOIN trabajadores tr2 ON mm.id_trabajador2 = tr2.id_trabajador
    INNER JOIN mat_tipomov tm ON mm.tipo_mov = tm.id_tipomov
    INNER JOIN mat_tipoestado te ON mm.id_estado_mat = te.id_tipoestado;
            ");

        
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }
}


