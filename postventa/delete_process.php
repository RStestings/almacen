<?php

include('../funciones/funciones.php');
$login = login();

$rol_s = rol($login);

$nombre_s = nombre($login);

$img_s = img($login);

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