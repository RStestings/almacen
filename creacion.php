<?php
$errores = '';
$enviado = '';

include('funciones/funcion_login.php');
$login = login();

include('funciones/funcion_rol.php');
$rol_s = rol($login);

include('funciones/funcion_nombre_login.php');
$nombre_s = nombre($login);

include('funciones/funcion_img_login.php');
$img_s = img($login);

include('funciones/funcion_hoy.php');
$hoy = hoy();

include('funciones/funcion_conexion.php');
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



if ($rol_s == 'admin'){
//Creacion consulta
try {
	//$var_guarda_conexion = new PDO ('tipo:host=ruta;dbname=nombre_basededatos', 'usuario', 'password');
	//echo 'Registro De Insumo Nuevos: <br/><br/>';

// Creacion consulta para Insertar datos

	if(isset($_POST['crear_ok'])){

	$desc_insumo = $_POST['desc_insumo'];
	$marca_insumo = $_POST['marca_insumo'];
	$cant_insumo = $_POST['cant_insumo'];
	$unidad_insumo = $_POST['unidad_insumo'];
	$stock_insumo = $_POST['stock_insumo'];

	if(!empty($desc_insumo)){
		$desc_insumo = trim($desc_insumo);
		$desc_insumo = filter_var($desc_insumo, FILTER_SANITIZE_STRING);
	}else{
		$errores.='Descripcion Vacia <br>';
	}

	if(!empty($marca_insumo)){
		$marca_insumo = trim($marca_insumo);
		$marca_insumo = filter_var($marca_insumo, FILTER_SANITIZE_STRING);
	}else{
		$errores.='Marca Vacia <br>';
	}

	if(!empty($cant_insumo)){
		$cant_insumo = trim($cant_insumo);
			if(!filter_var($cant_insumo, FILTER_VALIDATE_INT)){
				$errores.='Cantidad no valida <br>';
			}
	}else{
		$errores.='Cantidad Vacia  <br>';
	}

	if(!empty($unidad_insumo)){
		$unidad_insumo = trim($unidad_insumo);
		$unidad_insumo = filter_var($unidad_insumo, FILTER_SANITIZE_STRING);
	}else{
		$errores.='Unidad Vacia <br>';
	}

	if(!empty($stock_insumo)){
		$stock_insumo = trim($stock_insumo);
			if(!filter_var($stock_insumo, FILTER_VALIDATE_INT)){
				$errores.='Stock no valido <br>';
			}
	}else{
		$errores.='Stock Vacio <br>';
	}


	if(!empty($desc_insumo && $marca_insumo && $cant_insumo && $unidad_insumo && $stock_insumo )){
		$consulta = $conexion -> prepare('INSERT INTO insumos VALUES(null, :desc_insumo, :marca_insumo, :cant_insumo, :unidad_insumo, :stock_insumo)');
		$consulta -> execute(['desc_insumo'=>$desc_insumo, 
						'marca_insumo'=>$marca_insumo,
						'cant_insumo'=>$cant_insumo,
						'unidad_insumo'=>$unidad_insumo,
						'stock_insumo'=>$stock_insumo,
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

require('views\creacion.view.php');
	
?>