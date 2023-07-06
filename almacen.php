<?php

$conexion = new mysqli('localhost', 'root', '', 'almacen');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>

<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
	<input type='submit' name='actualizar' value='Actualizar' >
	<input type='submit' name='nuevo_insumo' value='Crear Nuevo'>
	<input type='submit' name='consultar_insumo' value='Consultar'>
	<input type='submit' name='editar_insumo' value='Editar'>
	<input type='submit' name='eliminar_insumo' value='Eliminar'>
</form>


<?php 

	if(isset($_POST['nuevo_insumo'])){

		require ('nuevo_insumo.php');
	}

	
?>

<?php

if ($conexion -> connect_errno){
	die('Lo sentimos hubo un error');
}else{
	$sql = 'SELECT * FROM insumos';
	$resultado = $conexion->query($sql);

	if($resultado -> num_rows){
		//echo '<pre>';
		//var_dump($resultado -> fetch_assoc());
		//print_r ($resultado -> fetch_assoc());
		//echo '</pre>'; 
		echo '<table>';
		echo '<tr>';
		echo "<th align='center'>  ID </th>";
		echo "<th align='center'>  DESCRIPCION </th>";
		echo "<th align='center'>  MARCA </th>";
		echo "<th align='center'>  CANTIDAD </th>";
		echo "<th align='center'>  UNIDAD </th>";
		echo "<th align='center'>  STOCK </th>";
		echo "</tr>";

		while($fila = $resultado -> fetch_assoc()){
			echo '<tr>';
			echo "<td class='centro'>".$fila['id_insumo'].'</td>';
			echo "<td class='izq'>".$fila['desc_insumo'].'</td>';
			echo "<td class='izq'>".$fila['marca_insumo'].'</td>';
			echo "<td class='centro'>".$fila['cant_insumo'].'</td>';
			echo "<td class='centro'>".$fila['unidad_insumo'].'</td>';
			echo "<td class='centro'>".$fila['stock_insumo'].'</td>';
			echo '</tr>';
		}
		echo '</table>';

	}else{
		echo 'No se encontro datos';
	}
}

?>

</body>
</html>

