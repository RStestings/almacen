<?php

include('../funciones/funciones.php');
$login = login();

$rol_s = rol($login);

$nombre_s = nombre($login);

$img_s = img($login);

$hoy = hoy();

$conexion = fconexion();

if($rol_s == 'almacen' || $rol_s == 'usuario'){
    header("Location: ./postventa/index.php");
}

	try {

	$id_refpostventa = $_GET['id_refpostventa'];

	$consulta_preparada = $conexion -> prepare("SELECT * FROM refac_postventa WHERE id_refpostventa = '$id_refpostventa'");
	$consulta_preparada -> execute();
	$resultado = $consulta_preparada -> fetchAll();

		
	} catch (PDOException $e) {
		echo "Error" . $e -> getMessage();
	}

require ('views/editar_refpostventa.view.php');

?>