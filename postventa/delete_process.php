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

if($rol_s == 'almacen' || $rol_s == 'usuario'){
    header("Location: ./postventa/index.php");
}


	try {

		$id_delete = $_GET['id_refpostventa'];

		$conexion = new PDO('mysql: host=localhost; dbname=almacen', 'root', '');

		$consulta_preparada = $conexion -> prepare("DELETE FROM refac_postventa WHERE id_refpostventa LIKE '$id_delete'");
		$consulta_preparada -> execute();
		$resultado = $consulta_preparada -> fetchAll();
	
	} catch (PDOException $e) {
		echo "Error" . $e -> getMessage();
	}
 
header("Location: refpostventa.php");

?>