<?php

include('funciones/funciones.php');
$login = login();

$rol_s = rol($login);
 
$conexion = fconexion();

if($rol_s == 'postventa'){
    header("Location: ./postventa/index.php");
}

$id = $_POST['id_insumo'];


if($rol_s == 'logistica'){

	try {
		$n_parte = $_POST ['numparte_insumo'];

		$conexion = new PDO('mysql: host=localhost; dbname=almacen', 'root', '');
		$consulta_preparada = $conexion -> prepare("UPDATE insumos SET numparte_insumo ='$n_parte' WHERE id_insumo = '$id'");
		$consulta_preparada -> execute();

	} catch (PDOException $E) {
		echo "Error" . $e -> getMessage();
	}

	header("Location: buscar.php");
}

if($rol_s == 'admin'){
	try {

	$id_insumo = $_POST['id_insumo'];
	$n_parte = $_POST ['numparte_insumo'];
	$desc = $_POST['desc_insumo'];
	$marca = $_POST['marca_insumo'];
	$cantidad = $_POST['cant_insumo'];
	$unidad = $_POST['unidad_insumo'];
	$stock = $_POST['stock_insumo'];

	$conexion = new PDO('mysql: host=localhost; dbname=almacen', 'root', '');
	$consulta_preparada = $conexion -> prepare("UPDATE insumos SET numparte_insumo ='$n_parte', desc_insumo = '$desc', marca_insumo = '$marca', cant_insumo = '$cantidad', unidad_insumo = '$unidad', stock_insumo = '$stock' WHERE id_insumo = '$id'");
	$consulta_preparada -> execute();

	//$consulta_preparada = $conexion -> prepare("UPDATE usuarios SET nombre = '$nombre', edad = '$edad' WHERE id = '$id_edit'");

		
	} catch (PDOException $e) {
		echo "Error" . $e -> getMessage();
	}

		header("Location: buscar.php");

	}else{
		echo "$id $desc $marca $cantidad $unidad $stock";
		echo '\n' . 'Crear pagina de usuario sin credenciales';	
	}



?>