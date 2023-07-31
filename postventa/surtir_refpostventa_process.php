<?php

include('../funciones/funciones.php');
$login = login();

$rol_s = rol($login);

$id_s = id_s($login);

$hoy = hoy();

$conexion = fconexion();

if($rol_s == 'postventa' || $rol_s == 'usuario'){
    header("Location: ./postventa/index.php");
}

$id = $_POST['id_refpostventa'];

if(empty($_POST['cant_surtir'])){
	$_POST['cant_surtir'] = 0;
}

$proyecto = 'Almacen Postventa';
$tecnico = $login;
$cantidad_s = $_POST['cant_surtir'];



try {

$id_refpostventa = $_POST['id_refpostventa'];

//$consulta_preparada = $conexion -> prepare("UPDATE usuarios SET nombre = '$nombre', edad = '$edad' WHERE id = '$id_edit'");

if($cantidad_s > 0){
	$consulta_mov = $conexion -> prepare("INSERT INTO movimientos_refpostventa VALUES (null, '$id_refpostventa', '$id_s', '$cantidad_s', '$proyecto', '$tecnico', '$hoy', 'Ingreso')");
	$consulta_mov -> execute();
}

	
} catch (PDOException $e) {
	echo "Error" . $e -> getMessage();
}

header("Location: refpostventa.php");

?>