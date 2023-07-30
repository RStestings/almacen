<?php

include('../funciones/funcion_login.php');
$login = login();

include('../funciones/funcion_id_login.php');
$id_s = id_s($login);

include('../funciones/funcion_rol.php');
$rol_s = rol($login);

include('../funciones/funcion_hoyhora.php');
$hoy = hoy();

include('../funciones/funcion_conexion.php');
$conexion = fconexion();

if($rol_s == 'admin' || $rol_s == 'postventa'){

$id = $_POST['id_refpostventa'];

if(empty($_POST['cant_surtir'])){
	echo "La cantidad no pude ser \"0\"";
}

$proyecto = $_POST['proyecto'];
$tecnico = $_POST['tecnico'];
$cantidad_s = $_POST['cant_surtir'];



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