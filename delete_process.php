<?php

$rol = '';
$errores = '';

include('funciones/funcion_rol.php');
$rol_usuario = rol($rol);

if($rol_usuario == 'admin'){

	try {

		$id_delete = $_GET['id_insumo'];

		$conexion = new PDO('mysql: host=localhost; dbname=almacen', 'root', '');

		$consulta_preparada = $conexion -> prepare("DELETE FROM insumos WHERE id_insumo LIKE '$id_delete'");
		$consulta_preparada -> execute();
		$resultado = $consulta_preparada -> fetchAll();
	
	} catch (PDOException $e) {
		echo "Error" . $e -> getMessage();
	}
}else{
header('Location: buscar.php');
}
 
header("Location: buscar.php");

?>