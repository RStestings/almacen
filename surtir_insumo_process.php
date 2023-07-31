<?php

include('funciones/funciones.php');
$login = login();

$id_s = id_s($login);

$hoy = hoy();

if($rol_s == 'postventa'){
    header("Location: ./postventa/index.php");
}

$id = $_POST['id_insumo'];

if(empty($_POST['cant_surtir'])){
	$_POST['cant_surtir'] = 0;
}
$cantidad = $_POST['cant_insumo'] + $_POST['cant_surtir'];

$proyecto = 'Almacen';
$tecnico = $login;
$cantidad_s = $_POST['cant_surtir'];



try {

$id_insumo = $_GET['id_insumo'];

$conexion = new PDO('mysql: host=localhost; dbname=almacen', 'root', '');
$consulta_preparada = $conexion -> prepare("UPDATE insumos SET cant_insumo = '$cantidad' WHERE id_insumo = '$id'");
$consulta_preparada -> execute();

//$consulta_preparada = $conexion -> prepare("UPDATE usuarios SET nombre = '$nombre', edad = '$edad' WHERE id = '$id_edit'");

if($cantidad_s > 0){
	$consulta_mov = $conexion -> prepare("INSERT INTO movimientos_insumos VALUES (null, '$id', '$id_s', '$cantidad_s', '$proyecto', '$tecnico', '$hoy', 'Ingreso')");
	$consulta_mov -> execute();
}

	
} catch (PDOException $e) {
	echo "Error" . $e -> getMessage();
}

header("Location: buscar.php?id_insumo=$id");

?>