<?php

$id = $_POST['id'];

if(empty($_POST['cant_surtir'])){
	$_POST['cant_surtir'] = 0;
}
$cantidad = $_POST['cant_hta'] + $_POST['cant_surtir'];



try {

$id_insumo = $_POST['id'];

$conexion = new PDO('mysql: host=localhost; dbname=almacen', 'root', '');
$consulta_preparada = $conexion -> prepare("UPDATE herramienta SET cant_hta = '$cantidad' WHERE id = '$id'");
$consulta_preparada -> execute();

//$consulta_preparada = $conexion -> prepare("UPDATE usuarios SET nombre = '$nombre', edad = '$edad' WHERE id = '$id_edit'");

	
} catch (PDOException $e) {
	echo "Error" . $e -> getMessage();
}

header("Location: buscar_herramienta.php?id_insumo=$id");

?>