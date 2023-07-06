<?php

$errores = '';

try {

	$id = $_GET['id'];

	$conexion = new PDO('mysql: host=localhost; dbname=almacen', 'root', '');

	$consulta_preparada = $conexion -> prepare("DELETE FROM herramienta WHERE id LIKE '$id'");
	$consulta_preparada -> execute();
	$resultado = $consulta_preparada -> fetchAll();
	

	
} catch (PDOException $e) {
	echo "Error" . $e -> getMessage();
}


 
header("Location: buscar_herramienta.php");

?>