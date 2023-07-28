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
<<<<<<< HEAD
				<li><a href="buscar.php">Atras</a></li>
				<li><a href="insumos.php">Ver Todos</a></li>

			<?php //if($rol_s == 'admin') :  ?>
				<li><a href="creacion.php">Crear Nuevo</a></li>
=======
				<li><a href="buscar.php">Insumos</a></li>
				<li><a href="herramienta.php">Herramienta</a></li>

			<?php //if($rol_s == 'admin') :  ?>
				<li><a href="#">Tecnicos</a></li>
				<li><a href="#">Movimientos</a></li>
				<li><a href="adm/usuarios.php">Usuarios</a></li>
>>>>>>> fc32f1bfe696ac8769beba975885a79acc19a2c6
			<?php //endif; ?>

			</ul>
		</aside>
		
		<article>

			<h2>Edicion Insumo:</h2>

			<p>
				<br>
			</p>

			<div class="formularios">
				<?php foreach ($resultado as $fila) : ?>

				<br>

				<form class="" action="editar_insumo_process.php" method="post">

					<input id="forms" type="text" name="id_insumo" hidden value="<?php echo $fila['id_insumo']; ?>">
					
				<table>
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
<<<<<<< HEAD
					<a class="button button2" href="insumos.php">Salir</a>
=======
					<a class="button button2" href="buscar.php">Salir</a>
>>>>>>> fc32f1bfe696ac8769beba975885a79acc19a2c6
					<?php endforeach; ?>


				</form>
			</div>

		</article>

	</section>


</body>
</html>
