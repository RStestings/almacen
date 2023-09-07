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
		<div id="icono1" class="redes"><img src="imagenes/usuarios/<?php if(!empty($img_s)){
			echo $img_s;
		}else{
			echo 'no_usuario.png';
		}
		?>"></div>
		<div id="icono2" class="redes"><li><?php echo $rol_s; ?></li></div>
		<div id="iconocerrar" class="redes"><a href="cerrar.php">Salir</a></div>
	</header>
	
	<nav>
		<p>
			<?php echo $hoy . ' - ' . $nombre_s . " | " .$login; ?>
		</p>		
	</nav>

	<section>
		<aside id="izq">
			<ul>
				<a href="buscar.php"><li>Atras</li></a>
				<a href="insumos.php"><li>Ver Todos</li></a>

			<?php //if($rol_s == 'admin') :  ?>
				<li><a href="creacion.php">Crear Nuevo</a></li>
			<?php //endif; ?>

			</ul>
		</aside>
		
		<article>

			<h2>Edicion Insumo:</h2>

			<p>
				<br>
			</p>

			<?php if($rol_s == 'admin') : ?>
			<div class="formularios">
				<?php foreach ($resultado as $fila) : ?>

				<br>

				<form class="" action="editar_insumo_process.php" method="post">

					<input id="forms" type="text" name="id_insumo" hidden value="<?php echo $fila['id_insumo']; ?>">
					
				<table>
					<tr>
						<td><label>Clave</label></td>
						<td><input autofocus type="text" name="numparte_insumo" value="<?php echo $fila['numparte_insumo']; ?>" ></td>
					</tr>

					<tr>
						<td><label>Descripcion: </label></td>
						<td><input autofocus type="text" name="desc_insumo" value="<?php echo $fila['desc_insumo']; ?>" ></td>
					</tr>
					
					<tr>
						<td><label>Marca: </label></td>
						<td><input type="text" name="marca_insumo" value="<?php echo $fila['marca_insumo']; ?>"></td>
					</tr>	

					<tr>
						<td><label>Cantidad:</label></td>
						<td><input type="text" name="cant_insumo"  value="<?php echo $fila['cant_insumo']; ?>"></td>
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

				<br><br>
					<input class="button button2" type="submit" name="ok" value="Guardar">
					<a class="button button2" href="insumos.php">Salir</a>
					<?php endforeach; ?>


				</form>
			</div>
		<?php endif; ?>

		<?php if($rol_s == 'logistica') : ?>
			<div class="formularios">
				<?php foreach ($resultado as $fila) : ?>

				<br>

				<form class="" action="editar_insumo_process.php" method="post">

					<input id="forms" type="text" name="id_insumo" hidden value="<?php echo $fila['id_insumo']; ?>">
					
				<table>
					<tr>
						<td><label># Parte: </label></td>
						<td><input autofocus type="text" name="numparte_insumo" value="<?php echo $fila['numparte_insumo']; ?>" ></td>
					</tr>

					<tr>
						<td><label>Descripcion: </label></td>
						<td><input autofocus type="text" name="desc_insumo" value="<?php echo $fila['desc_insumo']; ?>" ></td>
					</tr>
				</table>

				<br><br>
					<input class="button button2" type="submit" name="ok" value="Guardar">
					<a class="button button2" href="insumos.php">Salir</a>
					<?php endforeach; ?>


				</form>
			</div>
		<?php endif; ?>

		</article>

	</section>


</body>
</html>
