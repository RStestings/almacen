<?php

include('../funciones/funciones.php');
$login = login();

$id_s = id_s($login);

$rol_s = rol($login);

$hoy = hoy_hora();

$conexion = fconexion();

if($rol_s == 'admin' || $rol_s == 'postventa'){

$id = $_POST['id_refpostventa'];

if(empty($_POST['cant_surtir'])){
	echo "La cantidad no pude ser \"0\"";
}

$proyecto = $_POST['proyecto'];
$tecnico = $_POST['tecnico'];
$cantidad_s = $_POST['cant_surtir'];
$cantidad = $_POST['cant_refpostventa'];

if($cantidad > 0){
	$cantidad = $_POST['cant_refpostventa'] - $cantidad_s;
	$consulta_update = $conexion -> prepare("UPDATE refac_postventa SET cant_refpostventa ='$cantidad' WHERE id_refpostventa = '$id'");
	$consulta_update ->execute();	
}


try {

//$consulta_preparada = $conexion -> prepare("UPDATE usuarios SET nombre = '$nombre', edad = '$edad' WHERE id = '$id_edit'");

if($cantidad_s > 0){
	$consulta_mov = $conexion -> prepare("INSERT INTO movimientos_refpostventa VALUES (null, '$id', '$id_s', '$cantidad_s', '$proyecto', '$tecnico', '$hoy', 'Salida')");
	$consulta_mov -> execute();
}
	
} catch (PDOException $e) {
	echo "Error" . $e -> getMessage();
}

}

else{
	header("Location: ../index.php");
}

//echo $cantidad_s.' '.$id.' '.$id_s.' '.$proyecto.' ' .$tecnico.' '.$hoy;
header("Location: refpostventa.php");


?>