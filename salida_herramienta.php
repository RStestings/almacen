<?php

try {

$id = $_GET['id'];

$conexion = new PDO('mysql: host=localhost; dbname=almacen', 'root', '');
$consulta_preparada = $conexion -> prepare("SELECT * FROM herramienta WHERE id = '$id'");
$consulta_preparada -> execute();
$resultado = $consulta_preparada -> fetchAll();

	
} catch (PDOException $e) {
	echo "Error" . $e -> getMessage();
}

require ('views\salida_herramienta.view.php');

?>