<?php



/*
try{
	Codigo a probar
}catch(){
	Muestra el error
}
*/

$rol = isset($_POST['rol']) ? $_POST['rol'] : false; 

try {
	//$var_guarda_conexion = new PDO ('tipo:host=ruta;dbname=nombre_basededatos', 'usuario', 'password');
	$conexion = new PDO ('mysql:host=localhost;dbname=almacen', 'root', '');
	//echo 'Conexion OK <br/><br/>';

	$_POST['buscar_herramienta'] = isset($_POST['buscar_herramienta']) ? $_POST['buscar_herramienta'] : false;



	//Insertar datos
	//$consulta = $conexion -> prepare('INSET INTO usuarios VALUES(null,"Eder")');
	//$consulta -> execute();
	
	$consulta_preparada = $conexion -> prepare("SELECT * FROM herramienta");
	$consulta_preparada -> execute();
	$resultado = $consulta_preparada -> fetchAll();

	
	if (empty($buscar)){
		$buscar= '%' . $_POST['buscar_herramienta'] . '%';
		

		$consulta_preparada = $conexion -> prepare("SELECT * FROM herramienta WHERE desc_hta LIKE '$buscar' ");
		$consulta_preparada -> execute();
	$resultado = $consulta_preparada -> fetchAll();
	}


} catch (PDOException $e) {
	echo "Error: " . $e -> getMessage();
}

$rol = 'admin';

require('views\buscar_herramienta.view.php');
	
?>