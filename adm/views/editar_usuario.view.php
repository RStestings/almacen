<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<<<<<<< HEAD
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

=======
	<title>Insumos Tecnicos</title>
	<link href="https://fonts.googleapis.com/css2?family=Kalam:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/estilosalm.css" media="">
</head>
<body>

	<header>

		<div id="logo"><img src="../imagenes/rs.png">Rseguridad</div>
		<div id="icono1" class="redes"><img src="../imagenes/usuarios/<?php if(!empty($img_s)){
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
				<li><a href="usuarios.php">Regresar</a></li>
			</ul>
		</aside>
		
		<article>

			<h2>Editar Usuario:</h2>

			<p>
				<br>
			</p>

			<div class="formularios">
				<br>

				<form action="edit_usuario_process.php" method="post">
					
				<table>
					<?php foreach ($resultado as $fila) : ?>
					<tr>
						<td><label>Login: </label></td>
						<td><input autofocus type="text" name="login_b" placeholder="Login:" value="<?php echo $fila['login']; ?>"></td>
					</tr>
					
					<tr>
						<td><label>Nombre: </label></td>
						<td><input type="text" name="nombre" placeholder="Nombre:" value="<?php echo $fila['nombre']; ?>">
						</td>
					</tr>	

					<tr>
						<td><label>Contraseña:</label></td>
						<td><input type="text" name="cant_insumo" placeholder="Nueva contraseña:" value="<?php if(!$enviado && isset($pass)) echo $pass; ?>"></td>
					</tr>

					<tr>
						<td><label>Rol: </label></td>
						
						<td>
							<select name="rol" placeholder="" value="">
							<?php foreach ($resultado_rol as $fila_rol) : ?>	
								<option></label><?php $rol_n = $fila_rol['id_rol']; 
									echo $fila_rol['rol_usuario']; ?><label><?php echo ' - '.$rol_n;  ?></option>
							<?php endforeach; ?>	
							</select>
						</td>
					</tr>

					<tr>
						<td><label>Imagen usuario: </label></td>
						<td><input type="text" name="img" placeholder="Imagen usuario" value="<?php echo $fila['img_usuario'];?>"></td>
					</tr>
				<?php endforeach; ?>

				</table>

				<br><br>
					<input class="button button2" type="submit" class="btn" name="crear_ok" value="Guardar">
					<a class="button button2" href="usuarios.php">Salir</a>

					<?php if(!empty($errores)): ?>
				<div class="alert error">
					<?php echo '<br>'.$errores; ?>
				</div>
					<?php elseif($enviado): ?>
				<div class="alert success">
					<p>Se agregó correctamente</p>
				</div>
					<?php endif ?>

				</form>
			</div>
					

		</article>


	</section>


</body>
</html>
>>>>>>> fc32f1bfe696ac8769beba975885a79acc19a2c6
