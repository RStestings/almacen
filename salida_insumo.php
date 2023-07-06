<?php

$rol = '';

include('funciones/funcion_rol.php');
$rol_usuario = rol($rol);

//echo "$rol_usuario";


if($rol_usuario == 'admin' OR $rol_usuario == 'almacen'){

	try {

	$id_insumo = $_GET['id_insumo'];

	$conexion = new PDO('mysql: host=localhost; dbname=almacen', 'root', '');
	$consulta_preparada = $conexion -> prepare("SELECT * FROM insumos WHERE id_insumo = '$id_insumo'");
	$consulta_preparada -> execute();
	$resultado = $consulta_preparada -> fetchAll();

	
	} catch (PDOException $e) {
		echo "Error" . $e -> getMessage();
	}

require ('views\salida_insumo.view.php');

} else {
	echo 'El usuario no tiene cumple con las credenciales';
	header ('Location: buscar.php');
}

?>