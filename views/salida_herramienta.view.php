<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<title>Salida Insumo</title>
</head>
<body>

	<h1 id="texto_centro">Registrar Salida De Herramienta</h1>
	<hr>

	<br>
	<br>

	<form action="salida_herramienta_process.php" method="post">

	<table>

		<?php foreach ($resultado as $fila) : ?>
		<h5>
			Existencias: <?php echo $fila['cant_hta']; ?>		
		</h5>	

		<!-- Id oculto para buscar en consulta -->
		<input type="text" name="id" hidden value="<?php echo $fila['id']; ?>">
		<input type="text" name="cant_hta" hidden value="<?php echo $fila['cant_hta']; ?>">
			
		<tr>
			<td>Descripcion: </td>
			<td><input type="text" name="desc_hta" disabled value="<?php echo $fila['desc_hta']; ?>" ></td>
		</tr>

		<tr>
			<td>Marca: </td>
			<td><input type="text" name="marca_hta" disabled value="<?php echo $fila['marca_hta']; ?>" ></td>
		</tr>

		<tr>
			<td>Unidad: </td>
			<td><input type="text" name="unidad_hta" disabled value="<?php echo $fila['unidad_hta']; ?>" ></td>
		</tr>

		<tr>
			<td>Cantidad Salida: </td>
			<td><input type="text" name="cant_salida" autofocus ></td>
		</tr>

		<tr>
			<td>Existente: </td>
			<td><input type="text" name="exis_hta" disabled value="<?php echo $fila['exis_hta']; ?>" ></td>
		</tr>

		<tr>
			<td>Incompleto: </td>
			<td><input type="text" name="incompleto_hta" disabled value="<?php echo $fila['incompleto_hta']; ?>" ></td>
		</tr>

		<tr>
			<td>Faltante: </td>
			<td><input type="text" name="faltante_hta" disabled value="<?php echo $fila['faltante_hta']; ?>" ></td>
		</tr>

		<?php endforeach; ?>		
	</table>
		
		<br><br>

		<input class="button button2" type="submit" name="ok" value="Surtir">
		<a class="button button2" href="buscar_herramienta.php">Salir</a>
	</form>

</body>

