<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Consultar Empleados</title>
</head>
<body>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
		Consultar:
		<input type="text" name="buscar" value="" >
		<input type="submit" name="" value="Buscar" >
		<br>
		<br>
		<table>
			<?php foreach ($resultado as $fila) : ?>
			<tr>
				<td><?php echo $fila['id']; ?></td>
				<td><?php echo $fila['nombre']; ?></td>
				<td><?php echo $fila['edad']; ?></td>
			</tr>
		<?php endforeach; ?>
		</table>
	</form>

	<div><?php echo $errores; ?></div>

</body>
</html>