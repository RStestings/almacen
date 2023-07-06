<?php

$rol = '';

include('funciones/funcion_rol.php');
$usuario_rol = rol($rol);

if($usuario_rol == 'admin'){
	try {

	$id_insumo = $_GET['id_insumo'];

	$conexion = new PDO('mysql: host=localhost; dbname=almacen', 'root', '');
	$consulta_preparada = $conexion -> prepare("SELECT * FROM insumos WHERE id_insumo = '$id_insumo'");
	$consulta_preparada -> execute();
	$resultado = $consulta_preparada -> fetchAll();

		
	} catch (PDOException $e) {
		echo "Error" . $e -> getMessage();
	}
}else{
	header('Location: buscar.php');
}

require ('views/editar_insumo.view.php');

?>