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

if($rol_s == 'postventa'){
    header("Location: ../postventa/index.php");
}

include('../funciones/funcion_conexion.php');
$conexion = fconexion();


if ($conexion != false){
$consulta = $conexion -> prepare ('SELECT * FROM usuarios');
$consulta -> execute();
$resultado = $consulta -> fetchAll();
}

$_POST['buscar'] = isset($_POST['buscar']) ? $_POST['buscar'] : false;

if (empty($buscar)){
		$buscar= '%' . $_POST['buscar'] . '%';
		

		$consulta_preparada = $conexion -> prepare("SELECT * FROM usuarios WHERE nombre LIKE '$buscar' ");
		$consulta_preparada -> execute();
		$resultado = $consulta_preparada -> fetchAll();
	}

if($rol_s != 'admin'){
	echo 'Crear pagina de usuarios restringido';
}else{
	require ('views/usuarios.view.php');
}

?>