<?php
<<<<<<< HEAD
$img = '';
=======

>>>>>>> fc32f1bfe696ac8769beba975885a79acc19a2c6

function img($login){
	
//conexion a bd
try {

<<<<<<< HEAD
	

=======
>>>>>>> fc32f1bfe696ac8769beba975885a79acc19a2c6
	$conexion = new PDO ('mysql: host=localhost; dbname=almacen', 'root', '');
	$consulta = $conexion -> prepare("SELECT * FROM usuarios WHERE login = '$login' ");
	$consulta -> execute();
	$resultado = $consulta -> fetchAll();

	foreach ($resultado as $fila){
		$img = $fila['img_usuario'];	
	}	
	
} catch (PDOException $e) {
	echo 'Error ' . $e->getMessage();
}

return $img;

}

?>