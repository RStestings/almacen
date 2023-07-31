<?php

include('funciones/funciones.php');
$login = login();

$rol_s = rol($login);

$nombre_s = nombre($login);

$img_s = img($login);

$hoy = hoy();

if($rol_s == 'postventa'){
    header("Location: ./postventa/index.php");
}

if($rol_s == 'admin' OR $rol_s == 'almacen'){
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
	echo 'El usuario no tiene cumple con las credenciales';
	header ('Location: buscar.php');
}


require ('views\surtir_insumo.view.php');

?>