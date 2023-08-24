<?php

include('funciones/funciones.php');
$login = login();

$rol_s = rol($login);

$nombre_s = nombre($login);

$img_s = img($login);

if($rol_s == 'postventa'){
    header("Location: ./postventa/index.php");
}

$conexion = fconexion();

$hoy = hoy();


try {

	$buscar_desc = isset($_POST['buscar_insumo']) ? $_POST['buscar_insumo'] : false ;
	$buscar_categoria = isset($_POST['buscar_categoria']) ? $_POST['buscar_categoria'] : false ;
	
	if(empty($_POST['ok']) || $buscar_desc==false){
		$consulta = $conexion -> prepare("SELECT * FROM insumos");
		$consulta -> execute();
		$resultado = $consulta -> fetchAll();
	}

	if(!empty($buscar_desc)){
		
		$buscar_desc = '%'.$_POST['buscar_insumo'].'%';

		$consulta = $conexion -> prepare("SELECT * FROM insumos WHERE desc_insumo LIKE '$buscar_desc'");
		$consulta -> execute();
		$resultado = $consulta -> fetchAll();
	}

	if(!empty($buscar_categoria) && $buscar_desc == false){
		
		$buscar_categoria = $_POST['buscar_categoria'];

		$consulta = $conexion -> prepare("SELECT * FROM insumos WHERE id_cate LIKE '$buscar_categoria'");
		$consulta -> execute();
		$resultado = $consulta -> fetchAll();
	}


} catch (PDOException $e) {
	echo 'Error '. $e -> getMessage();
}
















/*

try {
	//$var_guarda_conexion = new PDO ('tipo:host=ruta;dbname=nombre_basededatos', 'usuario', 'password');
	//echo 'Conexion OK <br/><br/>';
	
	$_POST['buscar_insumo'] = isset($_POST['buscar_insumo']) ? $_POST['buscar_insumo'] : false;

	//Insertar datos
	//$consulta = $conexion -> prepare('INSET INTO usuarios VALUES(null,"Eder")');
	//$consulta -> execute();

	if (empty($buscar)){
		$buscar= '%' . $_POST['buscar_insumo'] . '%';
		

		$consulta_preparada = $conexion -> prepare("SELECT * FROM insumos WHERE desc_insumo LIKE '$buscar' ");
		$consulta_preparada -> execute();
	$resultado = $consulta_preparada -> fetchAll();
	}
	

} catch (PDOException $e) {
	echo "Error: " . $e -> getMessage();
}
*/

//$rol= 'admin';

require('views\buscar.view.php');
	
?>