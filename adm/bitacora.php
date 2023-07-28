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
	$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1 ;
	$postporpagina = 10;

	$inicio = ($pagina > 1) ? ($pagina * $postporpagina - $postporpagina) : 0;

	$_POST['buscar_tec'] = isset($_POST['buscar_tec']) ? $_POST['buscar_tec'] : false;

	//Insertar datos
	//$consulta = $conexion -> prepare('INSET INTO usuarios VALUES(null,"Eder")');
	//$consulta -> execute();


	$consulta_preparada = $conexion -> prepare("SELECT SQL_CALC_FOUND_ROWS * FROM bitacora_login LIMIT $inicio, $postporpagina");
	$consulta_preparada -> execute();
	$resultado = $consulta_preparada -> fetchAll();

	if(!$consulta_preparada){ header('Location: movimientos.php'); }

	$totalarticulos = $conexion -> query('SELECT FOUND_ROWS() as total');
	$totalarticulos = $totalarticulos -> fetch()['total'];

	$numeroPaginas = ceil($totalarticulos / $postporpagina);
	
	

} catch (PDOException $e) {
	echo "Error: " . $e -> getMessage();
}

//$rol= 'admin';

require('views\bitacora.view.php');
	
?>