<?php
$errores = '';
$enviado = '';

include('../funciones/funciones.php');
$login = login();

$rol_s = rol($login);

$nombre_s = nombre($login);

$img_s = img($login);

$hoy = hoy();

$conexion = fconexion();

if($rol_s == 'almacen' || $rol_s == 'usuario'){
    header("Location: ./postventa/index.php");
}
/*
try{
	Codigo a probar
}catch(){
	Muestra el error
}
*/

//Creacion consulta
try {
	//$var_guarda_conexion = new PDO ('tipo:host=ruta;dbname=nombre_basededatos', 'usuario', 'password');
	//echo 'Registro De Insumo Nuevos: <br/><br/>';

// Creacion consulta para Insertar datos

	if(isset($_POST['crear_ok'])){

		$desc_refpostventa = $_POST['desc_refpostventa'];
		$numparte = $_POST['numparte_refpostventa'];

	if(!empty($desc_refpostventa)){
		$desc_refpostventa = trim($desc_refpostventa);
	}else{
		$errores.='Descripcion Vacia <br>';
	}

	if(!empty($numparte)){
		$numparte = trim($numparte);
	}else{
		$errores.='Numero de Parte Vacia <br>';
	}

	if(!empty($desc_refpostventa) && !empty($numparte)){
		$consulta = $conexion -> prepare("INSERT INTO refac_postventa VALUES(null, '$numparte', '$desc_refpostventa')");
		$consulta -> execute();

		$enviado = true;
	}else{

	}
	



}
} catch (PDOException $e) {
	echo "Error: " . $e -> getMessage();
}

require('views\creacion.view.php');
	
?>