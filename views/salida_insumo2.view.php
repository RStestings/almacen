<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<title>Salida Insumo</title>
</head>
<body>

	<h1 id="texto_centro">Registrar Salida De Insumo</h1>
	<hr>

	<br>

	<form action="salida_insumo_process.php" method="post">
		<?php foreach ($resultado as $fila) : ?>
		<h5>
			Existencias: <?php echo $fila['cant_insumo']; ?>		
		</h5>
		<input type="text" name="id_insumo" hidden value="<?php echo $fila['id_insumo']; ?>">
		
		<input type="text" name="cant_insumo" hidden value="<?php echo $fila['cant_insumo']; ?>">
			

			<table>
				<tr>
					<td><label>Descripcion: </label></td>
					<td><input type="text" name="desc_insumo" disabled value="<?php echo $fila['desc_insumo']; ?>" ></td>
				</tr>

				<tr>
					<td><label>Marca: </label></td>
					<td><input type="text" name="marca_insumo" disabled value="<?php echo $fila['marca_insumo']; ?>"></td>
				</tr>

				<tr>
					<td><label>Cantidad Entregar: </label></td>
					<td><input type="text" name="cant_surtir"  value="" autofocus></td>
				</tr>

				<tr>
					<td><label>Unidad: </label></td>
					<td><input type="text" name="unidad_insumo" disabled value="<?php echo $fila['unidad_insumo']; ?>"></td>
				</tr>

			</table>
			
		
		<?php endforeach; ?>
		<br><br>
		<input class="button button2" type="submit" name="ok" value="Surtir">
		<a class="button button2" href="buscar.php">Salir</a>
		
	</form>

</body>

