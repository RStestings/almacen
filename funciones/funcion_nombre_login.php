<?php


function nombre($nombre){
	
//conexion a bd
try {

	$conexion = new PDO ('mysql: host=localhost; dbname=almacen', 'root', '');
	$consulta = $conexion -> prepare("SELECT * FROM usuarios where login = '$rol' ");
	$consulta -> execute();
	$resultado = $consulta -> fetchAll();

	foreach ($resultado as $fila){
		$nombre = $fila['nombre'];	
	}	

	//echo "Bienvenido: $nombre_usuario <br><br><br> Tu usuario es: $rol";
	
} catch (PDOException $e) {
	echo 'Error ' . $e->getMessage();
}

return $nombre;

}

?>