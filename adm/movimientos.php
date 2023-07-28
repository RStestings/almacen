<?php

include('../funciones/funcion_login.php');
$login = login();

include('../funciones/funcion_rol.php');
$rol_s = rol($login);

include('../funciones/funcion_nombre_login.php');
$nombre_s = nombre($login);

include('../funciones/funcion_img_login.php');
$img_s = img($login);

include('../funciones/funcion_hoy.php');
$hoy = hoy();

if($rol_s == 'postventa'){
    header("Location: ../postventa/index.php");
}

include('../funciones/funcion_conexion.php');
$conexion = fconexion();


/*
try{
	Codigo a probar
}catch(){
	Muestra el error
}
*/


try {
	//$var_guarda_conexion = new PDO ('tipo:host=ruta;dbname=nombre_basededatos', 'usuario', 'password');
	//echo 'Conexion OK <br/><br/>';
	
	$_POST['buscar_tec'] = isset($_POST['buscar_tec']) ? $_POST['buscar_tec'] : false;

	//Insertar datos
	//$consulta = $conexion -> prepare('INSET INTO usuarios VALUES(null,"Eder")');
	//$consulta -> execute();


	$consulta_preparada = $conexion -> prepare("SELECT * FROM movimientos_insumos");
	$consulta_preparada -> execute();
	$resultado = $consulta_preparada -> fetchAll();
	
	if (empty($buscar)){
		$buscar= '%' . $_POST['buscar_tec'] . '%';
		

		$consulta_preparada = $conexion -> prepare("SELECT * FROM movimientos_insumos WHERE tecnico LIKE '$buscar' ");
		$consulta_preparada -> execute();
	$resultado = $consulta_preparada -> fetchAll();
	}

		

	


} catch (PDOException $e) {
	echo "Error: " . $e -> getMessage();
}

//$rol= 'admin';

require('views\movimientos.view.php');
	
?>