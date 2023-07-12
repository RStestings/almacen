<?php

function rol($login){
	
//conexion a bd
try {

	$conexion = new PDO ('mysql: host=localhost; dbname=almacen', 'root', '');
	$consulta = $conexion -> prepare("SELECT * FROM usuarios WHERE login = '$login' ");
	$consulta -> execute();
	$resultado = $consulta -> fetchAll();

	foreach ($resultado as $fila) {
		$idrol = $fila['id_rol'];	
	}
	
	switch ($idrol) {
		case 1:
			 $rol = 'admin';
			break;

		case 2:
			$rol = 'almacen';
			break;
		
		default:
			$rol = 'usuario';
			break;
	}

	//echo "Bienvenido: $usuario <br><br><br> Tu usuario es: $rol";
	
} catch (PDOException $e) {
	echo 'Error ' . $e->getMessage();
}

return $rol;
}


?>