<?php

$errores = '';
$enviado = '';
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
	$conexion = new PDO ('mysql: host=localhost; dbname=almacen', 'root', '');
	//echo 'Registro De Insumo Nuevos: <br/><br/>';

// Creacion consulta para Insertar datos

	if(isset($_POST['crear_ok'])){


	//
	
	$desc_hta = $_POST['desc_hta'];
	$marca_hta = $_POST['marca_hta'];
	$unidad_hta = $_POST['unidad_hta'];
	$cant_hta = $_POST['cant_hta'];
	$exis_hta = $_POST['exis_hta'];
	$incompleto_hta = $_POST['incompleto_hta'];
	$faltante_hta = $_POST['faltante_hta'];

	if(!empty($desc_hta)){
		$desc_hta = trim($desc_hta);
		$desc_hta = filter_var($desc_hta, FILTER_SANITIZE_STRING);
	}else{
		$errores.='Descripcion Vacia <br>';
	}

	if(!empty($marca_hta)){
		$marca_hta = trim($marca_hta);
		$marca_hta = filter_var($marca_hta, FILTER_SANITIZE_STRING);
	}else{
		$errores.='Marca Vacia <br>';
	}

	if(!empty($unidad_hta)){
		$unidad_hta = trim($unidad_hta);
		$unidad_hta = filter_var($unidad_hta, FILTER_SANITIZE_STRING);
	}else{
		$errores .= 'Unidad Vacia <br>';
	}

	if(!empty($cant_hta)){
		$cant_hta = trim($cant_hta);
			if(!filter_var($cant_hta, FILTER_VALIDATE_INT)){
				$errores.='Cantidad no valido <br>';
			}
	}else{
		$errores.='Cantidad Vacio <br>';
	}

/*
	if(!empty($exis_hta)){
		$exis_hta = trim($exis_hta);
			if(!filter_var($exis_hta, FILTER_VALIDATE_INT)){
				$errores.='Existente no valido <br>';
			}
	}else{
		$errores.='Existente Vacio <br>';
	}

	if(!empty($incompleto_hta)){
		$incompleto_hta = trim($incompleto_hta);
			if(!filter_var($incompleto_hta, FILTER_VALIDATE_INT)){
				$errores.='Incompleto no valido <br>';
			}
	}else{
		$errores.='Incompleto Vacio <br>';
	}

	if(!empty($faltante_hta)){
		$faltante_hta = trim($faltante_hta);
			if(!filter_var($faltante_hta, FILTER_VALIDATE_INT)){
				$errores.='Faltante no valido <br>';
				}
	}else{
			$errores .= 'Faltante Vacio <br>';
	} */


	if(!empty($desc_hta && $marca_hta && $unidad_hta && $cant_hta /*&& $exis_hta && $incompleto_hta && $faltante_hta*/)){
		$consulta = $conexion -> prepare('INSERT INTO herramienta VALUES(null, :desc_hta, :marca_hta, :unidad_hta, :cant_hta, :exis_hta, :incompleto_hta, :faltante_hta)');
		$consulta -> execute(['desc_hta'=>$desc_hta, 
						'marca_hta'=>$marca_hta,
						'unidad_hta'=>$unidad_hta,
						'cant_hta'=>$cant_hta,
						'exis_hta'=>$exis_hta,
						'incompleto_hta'=>$incompleto_hta,
						'faltante_hta'=>$faltante_hta
						]);

		$enviado = true;
	}else{

	}
	



}
} catch (PDOException $e) {
	echo "Error: " . $e -> getMessage();
}

require('views\crear_herramienta.view.php');
	
?>