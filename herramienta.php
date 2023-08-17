<?php

include('funciones/funciones.php');
$login = login();

$rol_s = rol($login);

$nombre_s = nombre($login);

$img_s = img($login);

$hoy = hoy();

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
	$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1 ;
	$postporpagina = 15;

	$inicio = ($pagina > 1) ? ($pagina * $postporpagina - $postporpagina) : 0;
	$conexion = new PDO ('mysql:host=localhost;dbname=almacen', 'root', '');
	//echo 'Conexion OK <br/><br/>';


	//Insertar datos
	//$consulta = $conexion -> prepare('INSET INTO usuarios VALUES(null,"Eder")');
	//$consulta -> execute();

	$consulta_preparada = $conexion -> prepare("SELECT SQL_CALC_FOUND_ROWS * FROM herramienta LIMIT $inicio, $postporpagina");
	$consulta_preparada -> execute();
	$resultado = $consulta_preparada -> fetchAll();

	if(!$consulta_preparada){ header('Location: herramienta.php'); }

	$totalarticulos = $conexion -> query('SELECT FOUND_ROWS() as total');
	$totalarticulos = $totalarticulos -> fetch()['total'];

	$numeroPaginas = ceil($totalarticulos / $postporpagina);	


} catch (PDOException $e) {
	echo "Error: " . $e -> getMessage();
}

require('views\herramienta.view.php');
	
?>