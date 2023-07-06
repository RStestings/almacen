<?php

$errores = '';

try {

/*$id_edit = $_GET['id_edit'];

$nombre = $_POST['nombre'];
$edad = $_POST['edad'];

	$conexion = new PDO('mysql: host=localhost; dbname=prueba_datos', 'root', '');
	$consulta_preparada = $conexion -> prepare("UPDATE usuarios SET nombre = '$nombre', edad = '$edad' WHERE id = '$id_edit'");
	$consulta_preparada -> execute();
	//$resultado = $consulta_preparada -> fetchAll();
	*/
	

echo "$id_edit $nombre $edad";
	
} catch (PDOException $e) {
	echo "Error" . $e -> getMessage();
}

?>