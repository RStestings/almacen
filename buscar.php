<?php

$login_s = '';

include('funciones/funcion_login.php');
$login = login($login_s);

include('funciones/funcion_rol.php');
$rol_s = rol($login);

include('funciones/funcion_nombre_login.php');
$nombre_s = nombre($login);


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
	
	$_POST['buscar_insumo'] = isset($_POST['buscar_insumo']) ? $_POST['buscar_insumo'] : false;

	//Insertar datos
	//$consulta = $conexion -> prepare('INSET INTO usuarios VALUES(null,"Eder")');
	//$consulta -> execute();


	$consulta_preparada = $conexion -> prepare("SELECT * FROM insumos");
	$consulta_preparada -> execute();
	$resultado = $consulta_preparada -> fetchAll();

	
	if (empty($buscar)){
		$buscar= '%' . $_POST['buscar_insumo'] . '%';
		

		$consulta_preparada = $conexion -> prepare("SELECT * FROM insumos WHERE desc_insumo LIKE '$buscar' ");
		$consulta_preparada -> execute();
	$resultado = $consulta_preparada -> fetchAll();
	}

		

	


} catch (PDOException $e) {
	echo "Error: " . $e -> getMessage();
}

//$rol= 'admin';

require('views\buscar.view.php');
	
?>