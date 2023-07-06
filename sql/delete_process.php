<?php

$errores = '';

try {

	$id_delete = $_GET['id_delete'];

	$conexion = new PDO('mysql: host=localhost; dbname=prueba_datos', 'root', '');

	$consulta_preparada = $conexion -> prepare("DELETE FROM usuarios WHERE id LIKE '$id_delete'");
	$consulta_preparada -> execute();
	$resultado = $consulta_preparada -> fetchAll();
	

	
} catch (PDOException $e) {
	echo "Error" . $e -> getMessage();
}


 
header("Location: eliminar.php");

?>