<?php

include('funciones/funciones.php');
$login = login();

$id_s = id_s($login);

$rol_s = rol($login);

$hoy = hoy_hora();

if($rol_s == 'postventa'){
    header("Location: ./postventa/index.php");
}

$id = $_POST['id_insumo'];

if(empty($_POST['cant_surtir'])){
	$_POST['cant_surtir'] = 0;
}
$cantidad = $_POST['cant_insumo'] - $_POST['cant_surtir'];

$proyecto = $_POST['proyecto'];
$tecnico = $_POST['tecnico'];
$cantidad_s = $_POST['cant_surtir'];
$coment = $_POST['coment_mov'];



try {

$id = $_POST['id_insumo'];

$conexion = new PDO('mysql: host=localhost; dbname=almacen', 'root', '');
$consulta_preparada = $conexion -> prepare("UPDATE insumos SET cant_insumo = '$cantidad' WHERE id_insumo = '$id'");
$consulta_preparada -> execute();

//$consulta_preparada = $conexion -> prepare("UPDATE usuarios SET nombre = '$nombre', edad = '$edad' WHERE id = '$id_edit'");

if($cantidad_s > 0){
	$consulta_mov = $conexion -> prepare("INSERT INTO movimientos_insumos VALUES (null, '$id', '$id_s', '$cantidad_s', '$proyecto', '$tecnico', '$hoy', 'Salida', '$coment')");
	$consulta_mov -> execute();
}
	
} catch (PDOException $e) {
	echo "Error" . $e -> getMessage();
}

//echo $cantidad_s.' '.$id.' '.$id_s.' '.$proyecto.' ' .$tecnico.' '.$hoy; 
header("Location: buscar.php?id_insumo=$id");

?>