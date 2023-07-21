<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
					<tr>
						<td><label>Login: </label></td>
						<td><input autofocus type="text" name="login_b" placeholder="Login:" value="<?php if(!$enviado && isset($login_b)) echo $login_b; ?>"></td>
					</tr>
					
					<tr>
						<td><label>Nombre: </label></td>
						<td><input type="text" name="nombre" placeholder="Nombre:" value="<?php if(!$enviado && isset($nombre)) echo $nombre; ?>">
						</td>
					</tr>	

					<tr>
						<td><label>Contraseña:</label></td>
						<td><input type="text" name="cant_insumo" placeholder="pass:" value="<?php if(!$enviado && isset($pass)) echo $pass; ?>"></td>
					</tr>

					<tr>
						<td><label>Rol: </label></td>
						<td><input type="text" name="rol" placeholder="Rol:" value="<?php if(!$enviado && isset($rol)) echo $rol; ?>">
						</td>
					</tr>

					<tr>
						<td><label>Imagen usuario: </label></td>
						<td><input type="text" name="img" placeholder="Imagen usuario" value="<?php if(!$enviado && isset($img)) echo $img; ?>"></td>
					</tr>

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
