<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<title>Editar Insumo</title>
</head>

<body>

	

	<form action="editar_insumo_process.php" method="post">
		<?php foreach ($resultado as $fila) : ?>

	<h1 id="texto_centro">Editar <?php echo "\"" . $fila['desc_insumo'] . "\"";?></h1>
	<hr>

	<br>


		<input type="text" name="id_insumo" hidden value="<?php echo $fila['id_insumo']; ?>">
		
			

			<table>

				<tr>
					<td><label>ID: </label></td>
					<td><input type="text" name="id_insumo_ver" disabled value="<?php echo $fila['id_insumo']; ?>" ></td>
				</tr>

				<tr>
					<td><label>Descripcion: </label></td>
					<td><input type="text" name="desc_insumo" value="<?php echo $fila['desc_insumo']; ?>" ></td>
				</tr>

				<tr>
					<td><label>Marca: </label></td>
					<td><input type="text" name="marca_insumo" value="<?php echo $fila['marca_insumo']; ?>"></td>
				</tr>

				<tr>
					<td><label>Cantidad: </label></td>
					<td><input type="text" name="cant_insumo" value="<?php echo $fila['cant_insumo']; ?>"></td>
				</tr>

				<tr>
					<td><label>Unidad: </label></td>
					<td><input type="text" name="unidad_insumo" value="<?php echo $fila['unidad_insumo']; ?>"></td>
				</tr>

				<tr>
					<td><label>Stock: </label></td>
					<td><input type="text" name="stock_insumo" value="<?php echo $fila['stock_insumo']; ?>"></td>
				</tr>

			</table>
			
		
		<?php endforeach; ?>


		<?php 
		$fila= isset($fila) ? $fila : false;

		if($fila == false){ 
			echo "Dato No Existente";
		} ?>

		<br><br>
		<input class="button button2" type="submit" name="ok" value="Editar">
		<a class="button button2" href="buscar.php">Salir</a>
		
	</form>

</body>

