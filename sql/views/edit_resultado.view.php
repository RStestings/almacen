<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Consultar Empleados</title>
</head>
<body>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
		Resultado Consulta:
		<br>
		<br>
		<table>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Edad</th>
			</tr>
			<form>
				<?php foreach ($resultado as $fila): ?>
				<tr>
					<td><?php echo $fila['id']; ?></td>
					<td><input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>" autofocus></td>
					<td><input type="text" name="edad" value="<?php echo $fila['edad']; ?>"></td>
				</tr>
				<?php endforeach ?>
			</form>
		</table>
		<br>
		<input type="submit" value="Editar">
	</form>

	<div><?php echo $errores; ?></div>

</body>
</html>