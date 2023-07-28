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

//echo "$rol_usuario";


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

require ('views\salida_insumo.view.php');

} else {
	echo 'El usuario no tiene cumple con las credenciales';
	header ('Location: buscar.php');
}

?>