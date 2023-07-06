<?php

$id= $_GET['id'];
/*
try{
	Codigo a probar
}catch(){
	Muestra el error
}
*/

try {
	//$var_guarda_conexion = new PDO ('tipo:host=ruta;dbname=nombre_basededatos', 'usuario', 'password');
	$conexion = new PDO ('mysql:host=localhost;dbname=prueba_datos', 'root', '');
	echo 'Conexion OK <br/><br/>';

	//$nevo_usuario = $conexion -> query('INSERT INTO usuarios VALUES(null, "Eren")');

	//Desaconsejado este metodo "METODO QUERY"
	//$resultado = $conexion -> query('SELECT * FROM usuarios');

	//foreach ($resultado as $fila) {
	//	echo $fila['id'] . ' ' . $fila['nombre'] . '<br/>';
	//}

	$consulta = $conexion -> prepare('SELECT * FROM usuarios WHERE id = :id');
	$consulta -> execute( array (':id' => $id) );

	$resultado = $consulta -> fetch();
	echo "<pre>";
	print_r($resultado);
	echo "</prev>";


} catch (PDOException $e) {
	echo "Error: " . $e -> getMessage();
}
	
?>