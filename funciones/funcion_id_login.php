<?php


function id_s($login){
	
//conexion a bd
try {

	$conexion = new PDO ('mysql: host=localhost; dbname=almacen', 'root', '');
	$consulta = $conexion -> prepare("SELECT * FROM usuarios WHERE login = '$login' ");
	$consulta -> execute();
	$resultado = $consulta -> fetchAll();

	foreach ($resultado as $fila){
		$id = $fila['id_usuario'];	
	}	
	
} catch (PDOException $e) {
	echo 'Error ' . $e->getMessage();
}

return $id;

}

?>