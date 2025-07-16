<?php
	require_once "conexion.php";
	
	class BuscarMateriales{

   public $numero_de_registros;
   public $search;

   public function mdlMostrarBusquedaIni(){

	$numero_de_registros = $this->numero_de_registros;


	$stmt = Conexion::conectar()->prepare("SELECT id_material, cod_material, desc_material  FROM materiales ORDER BY cod_material LIMIT :limit");
	
	$stmt->bindParam(':limit', $numero_de_registros, PDO::PARAM_INT);
	
	$stmt->execute();
	
	$usersList = $stmt->fetchAll();

	//var_dump($usersList);
	
	$response = array();

	// Leer la informacion
	foreach($usersList as $user){
			$response[] = array(
				"id" => $user['id_material'],
				"text" => $user['cod_material']. ' - ' . $user['desc_material']
			);
	}

	echo json_encode($response);
  
	}

  public function mdlHacerBusqueda(){

	$numero_de_registros = $this->numero_de_registros;
	$search              = $this->search;

	$search = "%" . $search . "%";

	$stmt = Conexion::conectar()->prepare("
		SELECT id_material, cod_material, desc_material 
		FROM materiales 
		WHERE cod_material LIKE :search OR desc_material LIKE :search 
		ORDER BY cod_material 
		LIMIT :limit
	");

	$stmt->bindParam(':search', $search, PDO::PARAM_STR);
	$stmt->bindParam(':limit', $numero_de_registros, PDO::PARAM_INT);

	$stmt->execute();

	$usersList = $stmt->fetchAll();

	$response = array();

	foreach($usersList as $user){
		$response[] = array(
			"id" => $user['id_material'],
			"text" => $user['cod_material'] . ' - ' . $user['desc_material']
		);
	}

	echo json_encode($response);
}

}

if(!isset($_POST['palabraClave'])){

	$verreg = new BuscarMateriales();
	$verreg -> numero_de_registros = 10;
	$verreg -> mdlMostrarBusquedaIni();
}else{

	$busqueda = new BuscarMateriales();
	$busqueda -> search = $_POST['palabraClave'];
	$busqueda -> numero_de_registros = 10;
	$busqueda -> mdlHacerBusqueda();

}