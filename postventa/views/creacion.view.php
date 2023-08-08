<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Insumos Tecnicos</title>
	<link href="https://fonts.googleapis.com/css2?family=Kalam:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./css/estilosalm.css" media="">
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
		<div id="iconocerrar" class="redes"><a href="../cerrar.php">Salir</a></div>
	</header>
	
	<nav>
		<p>
			<?php echo $hoy . ' - ' . $nombre_s . " | " .$login; ?>
		</p>		
	</nav>

	<section>
		<aside id="izq">
			<ul>
				<li><a href="refpostventa.php">Atras</a></li>
			</ul>
		</aside>
		
		<article>

			<h2>Crear Nuevo Insumo:</h2>

			<p>
				<br>
			</p>

			<div class="formularios">
				<br>

				<form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" autocomplete="off">
				<table>

					<tr>
						<td><label># Parte: </label></td>
						<td><input type="text" name="numparte_refpostventa" placeholder="# Parte:" value="<?php if(!$enviado && isset($numparte)) echo $numparte; ?>"></td>
					</tr>

					<tr>
						<td><label>Descripcion: </label></td>
						<td><input type="text" name="desc_refpostventa" placeholder="Descripcion:" value="<?php if(!$enviado && isset($desc_refpostventa)) echo $desc_refpostventa; ?>"></td>
					</tr>

					<tr>
						<td><label>Cantidad: </label></td>
						<td><input type="text" name="cant_refpostventa" placeholder="Cantidad:" value="<?php if(!$enviado && isset($cant_refpostventa)) echo $cant_refpostventa; ?>"></td>
					</tr>

					<tr>
						<td><label>Precio: </label></td>
						<td><input type="text" name="costo_refpostventa" placeholder="Precio $:" value="<?php if(!$enviado && isset($costo_refpostventa)) echo $costo_refpostventa; ?>"></td>
					</tr>
				</table>
							<?php if(!empty($errores)): ?>
						<div class="alert">
							<li>
								<?php echo $errores; ?>
							</li>
						</div>
							<?php elseif($enviado): ?>
						<div class="success">
						<li>Enviado Correctamente</li>
						</div>
						<?php endif ?>

						<br><input type="submit" class="button button2" name="crear_ok" value="Guardar"> <a class="button button2" href="refpostventa.php">Salir</a>

				</form>
			</div>

		</article>

	</section>


</body>
</html>
