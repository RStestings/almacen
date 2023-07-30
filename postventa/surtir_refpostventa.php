<?php

include('../funciones/funcion_login.php');
$login = login();

include('../funciones/funcion_rol.php');
$rol_s = rol($login);

include('../funciones/funcion_nombre_login.php');
$nombre_s = nombre($login);

include('../funciones/funcion_img_login.php');
$img_s = img($login);

include('../funciones/funcion_hoy.php');
$hoy = hoy();

if($rol_s == 'postventa' || $rol_s == 'usuario'){
    header("Location: ../index.php");
}

if($rol_s == 'admin' OR $rol_s == 'almacen'){
	try {

	$id_refpostventa = $_GET['id_refpostventa'];

	$conexion = new PDO('mysql: host=localhost; dbname=almacen', 'root', '');
	$consulta_preparada = $conexion -> prepare("SELECT * FROM refac_postventa WHERE id_refpostventa = '$id_refpostventa'");
	$consulta_preparada -> execute();
	$resultado = $consulta_preparada -> fetchAll();

		
	} catch (PDOException $e) {
		echo "Error" . $e -> getMessage();
	}	
}else{}


require ('views\surtir_refpostventa.view.php');

?>