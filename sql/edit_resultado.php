<?php

$errores = '';

try {

$id_edit = $_GET['id_edit'];

	$conexion = new PDO('mysql: host=localhost; dbname=prueba_datos', 'root', '');
	$consulta_preparada = $conexion -> prepare("SELECT * FROM usuarios WHERE id = '$id_edit'");
	$consulta_preparada -> execute();
	$resultado = $consulta_preparada -> fetchAll();


if (!empty($_POST)) {
	$nombre = $_POST['nombre'];
	$edad = $_POST['edad'];

	echo "$id_edit $";
}
	

	
} catch (PDOException $e) {
	echo "Error" . $e -> getMessage();
}



 
require("views/edit_resultado.view.php");

?>