<?php

include('../funciones/funciones.php');
$login = login();

$rol_s = rol($login);

$nombre_s = nombre($login);

$img_s = img($login);

$conexion = fconexion();


$hoy = hoy();

if($rol_s == 'postventa'){
    header("Location: ../postventa/index.php");
}

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