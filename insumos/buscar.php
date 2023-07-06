<?php

/*
try{
	Codigo a probar
}catch(){
	Muestra el error
}
*/

try {
	//$var_guarda_conexion = new PDO ('tipo:host=ruta;dbname=nombre_basededatos', 'usuario', 'password');
	$conexion = new PDO ('mysql:host=localhost;dbname=almacen', 'root', '');
	//echo 'Conexion OK <br/><br/>';


	//Insertar datos
	//$consulta = $conexion -> prepare('INSET INTO usuarios VALUES(null,"Eder")');
	//$consulta -> execute();
	$consulta_preparada = $conexion -> prepare('SELECT * FROM insumos');
	$consulta_preparada -> execute();

	$resultado = $consulta_preparada -> fetchAll();
	
	echo "<table>";
	foreach($resultado as $fila){
		echo "<tr>";
			echo "<td>".$fila['id_insumo']."</td>";
			echo "<td>".$fila['desc_insumo']."</td>";
			echo "<td>".$fila['marca_insumo']."</td>";
			echo "<td>".$fila['cant_insumo']."</td>";
			echo "<td>".$fila['unidad_insumo']."</td>";
			echo "<td>".$fila['stock_insumo']."</td>";
		echo "</tr>";
	}
	echo "</table>";


} catch (PDOException $e) {
	echo "Error: " . $e -> getMessage();
}
	
?>