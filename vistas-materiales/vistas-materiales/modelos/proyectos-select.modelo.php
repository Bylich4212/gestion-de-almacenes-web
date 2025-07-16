<?php
	require_once "conexion.php";
	
	class BuscarProyectosTodos{

   public $numero_de_registros;
   public $search;

   public function mdlMostrarBusquedaIni(){

	$numero_de_registros = $this->numero_de_registros;

//SELECT idconstruccion, proyecto, ce.estadosmae FROM construccion_mae c INNER JOIN construccion_mae_estados ce ON c.estado=ce.estado

	$stmt = Conexion::conectar()->prepare("SELECT idconstruccion, proyecto, ce.estadosmae FROM construccion_mae c INNER JOIN construccion_mae_estados ce ON c.estado=ce.estado ORDER BY ce.estadosmae LIMIT :limit");
	
	$stmt->bindParam(':limit', $numero_de_registros, PDO::PARAM_INT);
	
	$stmt->execute();
	
	$usersList = $stmt->fetchAll();

	//var_dump($usersList);
	
	$response = array();

	// Leer la informacion
	foreach($usersList as $user){
			$response[] = array(
				"id" => $user['idconstruccion'],
				"text" => $user['proyecto']. ' - ' . $user['estadosmae']
			);
	}

	echo json_encode($response);
  
	}

  public function mdlHacerBusqueda(){

	$numero_de_registros = $this->numero_de_registros;
	$search              = $this->search;

	$search= "%".$search."%";

	$stmt = Conexion::conectar()->prepare("SELECT idconstruccion, proyecto, ce.estadosmae FROM construccion_mae c INNER JOIN construccion_mae_estados ce ON c.estado=ce.estado WHERE proyecto like :proyecto ORDER BY ce.estadosmae LIMIT :limit");
	
	$stmt->bindParam(':proyecto', $search, PDO::PARAM_STR);
	$stmt->bindParam(':limit', $numero_de_registros, PDO::PARAM_INT);
	
	$stmt->execute();
	
	$usersList = $stmt->fetchAll();

	$response = array();

	// Leer la informacion
	foreach($usersList as $user){
			$response[] = array(
				"id" => $user['idconstruccion'],
				"text" => $user['proyecto']. ' - ' . $user['estadosmae'] 
			);
	}
    
	echo json_encode($response);
  
	}
}

if(!isset($_POST['palabraClave'])){

	$verreg = new BuscarProyectosTodos();
	$verreg -> numero_de_registros = 10;
	$verreg -> mdlMostrarBusquedaIni();
}else{

	$busqueda = new BuscarProyectosTodos();
	$busqueda -> search = $_POST['palabraClave'];
	$busqueda -> numero_de_registros = 10;
	$busqueda -> mdlHacerBusqueda();

}