<?php

include('funciones/funcion_login.php');
$login = login();

include('funciones/funcion_rol.php');
$rol_s = rol($login);

include('funciones/funcion_nombre_login.php');
$nombre_s = nombre($login);

include('funciones/funcion_img_login.php');
$img_s = img($login);

include('funciones/funcion_hoy.php');
$hoy = hoy();

include('funciones/funcion_conexion.php');
$conexion = fconexion();

if($rol_s == 'postventa'){
    header("Location: ./postventa/index.php");
}


if($rol_s == 'admin'){
	try {

	$id_insumo = $_GET['id_insumo'];

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