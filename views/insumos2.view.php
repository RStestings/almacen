<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css\estilos.css">
</head>
<body>
		<h1 id="texto_centro"> Insumos Area Tecnica </h1>

		<a href="index.php">Inicio</a>
		<a href="buscar.php">Buscar</a>
		<?php if($rol_usuario == 'admin' OR $rol_usuario == 'almacen') : ?>
			<a href="creacion.php">Crear Nuevo</a>
		<?php endif; ?>
		<a href="cerrar.php">Cerrar Sesion</a>
		<hr>

	<br>
	<br>
	
	Ordenar:
	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
		<input type="submit" value="Actualizar">
		<input type="submit" name="asc" value="Menor">
		<input type="submit" name="desc" value="Mayor">
	
	<div class="contenedor">
		<table class="contenidos">
			<tr>
			<th>ID</th>
			<th>Descripcion</th>
			<th>Marca</th>
			<th>Cantidad</th>
			<th>Unidad</th>
			<th>Stock</th>
			<th>Status</th>
			</tr>
			<?php foreach ($resultado as $fila): ?>
			<tr>
				<td class="centro"><?php echo $fila['id_insumo']; ?></td>
				<td class="izq"><?php echo $fila['desc_insumo']; ?></td>
				<td class="izq"><?php echo $fila['marca_insumo']; ?></td>
				<td class="centro"><?php echo $fila['cant_insumo']; ?></td>
				<td class="centro"><?php echo $fila['unidad_insumo']; ?></td>
				<td class="centro"><?php echo $fila['stock_insumo']; ?></td>
				<?php
				$limite = $fila['cant_insumo']-$fila['stock_insumo'];
					if($limite >= 6) { ?>
						<td class="centro" bgcolor="#OOFF7F">OK</td>

				<?php
					}elseif($limite < 6 && $limite >0) { ?>
						<td class="centro" bgcolor="#FF8C00">Surtir</td>
				<?php }else{ ?>
						<td class="centro" bgcolor="red">No hay</td>
				<?php } ?>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>

	</form>
</body>
</html>