<?php

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

require('views\ver_insumos.view.php');
	
?>