<?php

$errores = '';

try {

	$_POST['buscar'] = isset($_POST['buscar']) ? $_POST['buscar'] : false; 

	$conexion = new PDO('mysql: host=localhost; dbname=prueba_datos', 'root', '');

	$consulta_preparada = $conexion -> prepare("SELECT * FROM usuarios");
	$consulta_preparada -> execute();
	$resultado = $consulta_preparada -> fetchAll();

	if(!empty($_POST['buscar'])){
		$buscar = '%' . $_POST['buscar'].'%';

		$consulta_preparada = $conexion -> prepare("SELECT * FROM usuarios WHERE nombre LIKE '$buscar'");
		$consulta_preparada -> execute();
		$resultado = $consulta_preparada -> fetchAll();
	} 

	if($resultado == false){
		$errores .= "No se encontro coincidencias";
	}



	
} catch (PDOException $e) {
	echo "Error" . $e -> getMessage();
}


require('views\consultar.view.php');

?>