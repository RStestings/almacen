<?php

$errores = '';
$enviado = '';

include('funciones/funciones.php');
$login = login();

$rol_s = rol($login);

$nombre_s = nombre($login);

$img_s = img($login);

$hoy = hoy();

$conexion = fconexion();

if($rol_s == 'postventa'){
    header("Location: ./postventa/index.php");
}

if ($rol_s == 'admin'){
	try {

		$id = $_GET['id'];
	
		$conexion = new PDO('mysql: host=localhost; dbname=almacen', 'root', '');
	
		$consulta_preparada = $conexion -> prepare("DELETE FROM herramienta WHERE id LIKE '$id'");
		$consulta_preparada -> execute();
		$resultado = $consulta_preparada -> fetchAll();
		
	
		
	} catch (PDOException $e) {
		echo "Error" . $e -> getMessage();
	}
}else{
	echo 'Crear pagina para usuario sin privilegios';
}
 
header("Location: buscar_herramienta.php");

?>