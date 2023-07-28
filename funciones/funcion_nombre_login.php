<?php


function nombre($login){
	
//conexion a bd
try {

	$conexion = new PDO ('mysql: host=localhost; dbname=almacen', 'root', '');
	$consulta = $conexion -> prepare("SELECT * FROM usuarios WHERE login = '$login' ");
	$consulta -> execute();
	$resultado = $consulta -> fetchAll();

	foreach ($resultado as $fila){
		$nombre = $fila['nombre'];	
	}	
	
} catch (PDOException $e) {
	echo 'Error ' . $e->getMessage();
}

return $nombre;

}

?>