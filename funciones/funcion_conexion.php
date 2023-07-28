<?php

function fconexion(){
	try {

		$conexion = new PDO ('mysql: host=localhost; dbname=almacen', 'root', '');
		
	} catch (PDOException $e) {
		echo 'Error: ' .$e -> getMessage();	
		die();	
	}

	return $conexion;
}

?>