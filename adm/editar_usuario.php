<?php

$errores = '';
$enviado = '';

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

include('../funciones/funcion_conexion.php');
$conexion = fconexion();

if($rol_s == 'admin'){
	try {

	$id_usuario = $_GET['id_usuario'];
	$consulta_preparada = $conexion -> prepare("SELECT * FROM usuarios WHERE id_usuario = '$id_usuario'");
	$consulta_preparada -> execute();
	$resultado = $consulta_preparada -> fetchAll();

	$consulta_rol = $conexion -> prepare('SELECT * FROM rol_usuario');
	$consulta_rol -> execute();
	$resultado_rol = $consulta_rol -> fetchAll();

		
	} catch (PDOException $e) {
		echo "Error" . $e -> getMessage();
	}
}else{
	header('Location: usuarios.php');
}

require ('views/editar_usuario.view.php');

?>