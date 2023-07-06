<?php


try {

	$conexion = new PDO('mysql: host=localhost; dbname=prueba_datos', 'root', '');
	$consulta_preparada = $conexion -> prepare('SELECT * FROM usuarios');
	$consulta_preparada -> execute();
	$resultado = $consulta_preparada -> fetchAll();



	
} catch (PDOException $e) {
	echo "Error" . $e -> getMessage();
}

require('views\ver.view.php');

?>