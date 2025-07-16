<?php
	require_once "conexion.php";
	
	class BuscarTrabajador {

    public $numero_de_registros;
    public $search;

    public function mdlMostrarBusquedaIni() {
        $numero_de_registros = $this->numero_de_registros;

        $stmt = Conexion::conectar()->prepare(
            "SELECT id_trabajador, nombres, cargo FROM trabajadores ORDER BY cargo LIMIT :limit"
        );

        $stmt->bindParam(':limit', $numero_de_registros, PDO::PARAM_INT);
        $stmt->execute();

        $usersList = $stmt->fetchAll();
        $response = array();

        foreach ($usersList as $user) {
            $response[] = array(
                "id" => $user['id_trabajador'],
                "text" => $user['nombres'] . " - " . $user['cargo'],
                "cargo" => $user['cargo'] // por si lo necesitas adicionalmente
            );
        }

        echo json_encode($response);
    }

    public function mdlHacerBusqueda() {
        $numero_de_registros = $this->numero_de_registros;
        $search = "%".$this->search."%";

        $stmt = Conexion::conectar()->prepare(
            "SELECT id_trabajador, nombres, cargo FROM trabajadores 
             WHERE nombres LIKE :nombres 
             ORDER BY nombres 
             LIMIT :limit"
        );

        $stmt->bindParam(':nombres', $search, PDO::PARAM_STR);
        $stmt->bindParam(':limit', $numero_de_registros, PDO::PARAM_INT);
        $stmt->execute();

        $usersList = $stmt->fetchAll();
        $response = array();

        foreach ($usersList as $user) {
            $response[] = array(
                "id" => $user['id_trabajador'],
                "text" => $user['nombres'] . " - " . $user['cargo'],
                "cargo" => $user['cargo']
            );
        }

        echo json_encode($response);
    }
}

if (!isset($_POST['palabraClave'])) {
    $verreg = new BuscarTrabajador();
    $verreg->numero_de_registros = 10;
    $verreg->mdlMostrarBusquedaIni();
} else {
    $busqueda = new BuscarTrabajador();
    $busqueda->search = $_POST['palabraClave'];
    $busqueda->numero_de_registros = 10;
    $busqueda->mdlHacerBusqueda();
}