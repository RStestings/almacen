<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Insumos Tecnicos</title>
	<link href="https://fonts.googleapis.com/css2?family=Kalam:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/estilosalm.css" media="">
</head>
<body>

	<header>
		<div id="logo"><img src="imagenes/rs.png">Rseguridad</div>
		<div id="icono1" class="redes">Foto</div>
		<div id="icono2" class="redes">Funcion</div>
		<div id="iconocerrar" class="redes"><a href="cerrar.php">Salir</a></div>
	</header>
	
	<nav>
		<p>
			<?php echo $nombre_s . " | " .$login; ?>
		</p>
	</nav>

	<section>
		<aside id="izq">
			<ul>
				<li><a href="index.php">Inicio</a></li>
				<li><a href="buscar.php">Buscar</a></li>
			<?php if($rol_s == 'admin' OR $rol_s == 'almacen') : ?>
				<li><a href="creacion.php">Crear Nuevo</a></li>
				<li><a href="#">Movimientos</a></li>
			<?php endif; ?>
			</ul>
		</aside>
		
		<article>

		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
			<p>
				Ordenar:
				<input type="submit" value="Actualizar">
				<input type="submit" name="asc" value="Menor">
				<input type="submit" name="desc" value="Mayor">
			</p>
			

			<table class="tablebds">
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
		</form>

			<div class="navtable">
				<ul>
					<li id="navboton"><</li>
					<li id="navboton">1</li>
					<li id="navboton">2</li>
					<li id="navboton">></li>
				</ul>
			</div>

			<br>
			<br>

		</article>

	</section>

	<!- <footer> <?php // fragmento comentado&copy; Todos los derechos reservados. ?>
		
	</footer> ->

</body>
</html>
