<?php

include('../funciones/funciones.php');
$login = login();

$rol_s = rol($login);

$conexion = fconexion();

if($rol_s == 'postventa' || $rol_s == 'usuario'){
    header("Location: ./postventa/index.php");
}

$id = $_POST['id_refpostventa'];


	try {

	$desc = $_POST['desc_refpostventa'];
	$num_parte = $_POST['numparte_refpostventa'];

	$consulta_preparada = $conexion -> prepare("UPDATE refac_postventa SET numparte_refpostventa = '$num_parte', desc_refpostventa = '$desc' WHERE id_refpostventa = '$id'");
	$consulta_preparada -> execute();

	//$consulta_preparada = $conexion -> prepare("UPDATE usuarios SET nombre = '$nombre', edad = '$edad' WHERE id = '$id_edit'");

		
	} catch (PDOException $e) {
		echo "Error" . $e -> getMessage();
	}

		header("Location: refpostventa.php");


?>