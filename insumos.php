<?php

$rol = '';

include('funciones/funcion_rol.php');

$rol_usuario = rol($rol);

/*
try{
	Codigo a probar
}catch(){
	Muestra el error
}
*/


try {
	//$var_guarda_conexion = new PDO ('tipo:host=ruta;dbname=nombre_basededatos', 'usuario', 'password');
	$conexion = new PDO ('mysql:host=localhost;dbname=almacen', 'root', '');
	//echo 'Conexion OK <br/><br/>';


	//Insertar datos
	//$consulta = $conexion -> prepare('INSET INTO usuarios VALUES(null,"Eder")');
	//$consulta -> execute();


$ordena = isset($_POST['asc']) ? $_POST['asc'] : false;
$ordenb = isset($_POST['desc']) ? $_POST['desc'] : false;

	if ($ordena){

		$consulta_preparada = $conexion -> prepare('SELECT * FROM insumos ORDER BY cant_insumo ASC');
	}elseif ($ordenb){
		$consulta_preparada = $conexion -> prepare('SELECT * FROM insumos ORDER BY cant_insumo DESC');
	}else{
		$consulta_preparada = $conexion -> prepare('SELECT * FROM insumos');
	}	

	$consulta_preparada -> execute();
	$resultado = $consulta_preparada -> fetchAll();


} catch (PDOException $e) {
	echo "Error: " . $e -> getMessage();
}

require('views\insumos.view.php');
	
?>