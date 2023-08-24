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
/*
try{
	Codigo a probar
}catch(){
	Muestra el error
}
*/



if ($rol_s == 'admin' || $rol_s == 'almacen'){
//Creacion consulta
try {
	//$var_guarda_conexion = new PDO ('tipo:host=ruta;dbname=nombre_basededatos', 'usuario', 'password');
	//echo 'Registro De Insumo Nuevos: <br/><br/>';

// Creacion consulta para Insertar datos

	if(isset($_POST['crear_ok'])){

	$nomb_categoria = $_POST['nomb_cat']; 

	if(!empty($nomb_categoria)){
		$nomb_categoria = trim($nomb_categoria);
		$nomb_categoria = filter_var($nomb_categoria, FILTER_SANITIZE_STRING);
	}else{
		$errores.='<div class="alert">Descripcion Vacia <br></div>';
	}


	if(!empty($nomb_categoria )){
		$consulta = $conexion -> prepare('INSERT INTO cate_insumo VALUES(null, :desc_cat)');
		$consulta -> execute(['desc_cat'=> $nomb_categoria
						]);

		$enviado = true;
	}else{

	}
	



}
} catch (PDOException $e) {
	echo "Error: " . $e -> getMessage();
} 
}
else {
	echo 'El usuario no tiene cumple con las credenciales';
	header ('Location: buscar.php');
}

require('views\creacion_categoria.view.php');
	
?>