<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css\estilos.css">
</head>
<body>
		<h1 id="texto_centro">Herramienta Area Tecnica</h1>
		<a href="index.php">Inicio</a>
		<a href="buscar_herramienta.php">Buscar</a>
		<a href="crear_herramienta.php">Crear Nuevo</a>
		<hr>
	
	<br>
	<br>

	Ordenar:
	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
		<input class="button button2" type="submit" name="" value="Actualizar">
		<input class="button button2" type="submit" name="asc" value="Menor">
		<input class="button button2" type="submit" name="desc" value="Mayor">
	</form>
	<div class="contenido">
		<article class="contenido">
		<table class="contenidos">
			<tr>
			<th>ID</th>
			<th>Descripcion</th>
			<th>Marca</th>
			<th>Unidad</th>
			<th>Cantidad</th>
			<th>Existente</th>
			<th>Incompleto / Dañada</th>
			<th>Faltante</th>
			</tr>
			<?php foreach ($resultado as $fila): ?>
			<tr>
				<td class="centro"><?php echo $fila['id']; ?></td>
				<td class="izq"><?php echo $fila['desc_hta']; ?></td>
				<td class="izq"><?php echo $fila['marca_hta']; ?></td>
				<td class="centro"><?php echo $fila['unidad_hta']; ?></td>
				<td class="centro"><?php echo $fila['cant_hta']; ?></td>
				<td class="centro"><?php echo $fila['exis_hta']; ?></td>
				<td class="centro"><?php echo $fila['incompleto_hta']; ?></td>
				<td class="centro"><?php echo $fila['faltante_hta']; ?></td>
			</tr>
			<?php endforeach; ?>
		</table>
		</article>
	</div>
</body>
</html>