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
				<li><a href="buscar.php">Atras</a></li>
				<li><a href="ver_categorias.php">Ver Categorias</a></li>
			</ul>
		</aside>
		
		<article>

			<h2>Crear Nuevo Insumo:</h2>

			<p>
				<br>
			</p>

			<div class="formularios">
				<br>

				<form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
				<table>

					<tr>
						<td><label>Nombre Categoria:</label></td>
						<td><input type="text" name="nomb_cat" placeholder="Categoria:" value="<?php if(!$enviado && isset($nomb_categoria)) echo $nomb_categoria; ?>" autocomplete="off"></td>
					</tr>

				</table>

						<br><input type="submit" class="button button2" name="crear_ok" value="Guardar"> <a class="button button2" href="insumos.php">Salir</a>

				</form>
					<?php if(!empty($errores)){
						echo $errores;
					} ?>
					<?php if($enviado): ?>
						<div class="alert success">
							<p>Enviado Correctamente</p>
						</div>
					<?php endif ?>
			</div>

			

		</article>

		

	</section>

	


</body>
</html>