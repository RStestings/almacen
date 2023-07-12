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


/* try {

echo $rol;
	$conexion_usu = new PDO ('mysql: host=localhost; dbname=almacen', 'root', '');
	$consulta_usu = $conexion_usu -> prepare("SELECT * FROM usuarios WHERE id_usuario = '$rol_usuario'");
	$consulta_usu -> execute();
	$resultado_usu = $consulta_usu -> fetchAll();

	foreach ($resultado_usu as $fila_usu) {
		echo $fila_usu['nombre'];
	}
	
} catch (PDOException $e) {
	echo 'Error: ' . $e -> getMessage();
} */

require('views\insumos.view.php');
	
?>