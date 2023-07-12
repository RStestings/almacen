<?php

try {

$conexion = new PDO ('mysql: host=localhost; dbname=almacen', 'root', '');
$consulta = $conexion -> prepare ('SELECT * FROM usuarios');
$consulta -> execute();
$resultado = $consulta -> fetchAll();

	
} catch (PDOException $e) {
	echo 'Error: ' . $e -> getMessage();
}

require ('views/usuarios.view.php');

?>