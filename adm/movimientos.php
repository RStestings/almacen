<?php

include('../funciones/funciones.php');
$login = login();

$rol_s = rol($login);

$nombre_s = nombre($login);

$img_s = img($login);

$hoy = hoy();

$conexion = fconexion();

if($rol_s == 'admin' OR $rol_s == 'logistica'){

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
		
		$_POST['buscar_proyecto'] = isset($_POST['buscar_proyecto']) ? $_POST['buscar_proyecto'] : false;
		$fecha1 = ($_POST['fecha1'] = isset($_POST['fecha1']) ? $_POST['fecha1'] : false);
		$fecha2  = ($_POST['fecha2'] = isset($_POST['fecha2']) ? $_POST['fecha2'] : false);
		//Insertar datos
		//$consulta = $conexion -> prepare('INSET INTO usuarios VALUES(null,"Eder")');
		//$consulta -> execute();


		$consulta_preparada = $conexion -> prepare("SELECT * FROM movimientos_insumos");
		$consulta_preparada -> execute();
		$resultado = $consulta_preparada -> fetchAll();
		
		if (empty($buscar)){
			$buscar= '%' . $_POST['buscar_proyecto'] . '%';
			

			$consulta_preparada = $conexion -> prepare("SELECT * FROM movimientos_insumos WHERE proyecto LIKE '$buscar' ");
			$consulta_preparada -> execute();
			$resultado = $consulta_preparada -> fetchAll();
		}
			
		if($fecha1 !="" && $fecha2 != ""){
			$consulta_fecha = $conexion -> prepare("SELECT * FROM movimientos_insumos WHERE fecha BETWEEN '$fecha1' AND '$fecha2'");
			$consulta_fecha -> execute();
			$resultado = $consulta_fecha -> fetchAll();
		}

		if(isset($_POST['all']) && $fecha1 !="" && $fecha2 != "" && $_POST['buscar_proyecto'] != ""){
			$buscar= $_POST['buscar_proyecto'];
			
			$consulta_all = $conexion -> prepare("SELECT * FROM movimientos_insumos WHERE proyecto = '$buscar' AND fecha BETWEEN '$fecha1' AND '$fecha2' ");
			$consulta_all -> execute();
			$resultado = $consulta_all -> fetchAll();
			
		}
		


	} catch (PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}

	//$rol= 'admin';
    
}else if($rol == 'almacen' OR $rol == 'usuario'){
	header("Location: ./index.php");
}else{
	header("Location: ../postventa/index.php");
}

require('views\movimientos.view.php');
	
?>