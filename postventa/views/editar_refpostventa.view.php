<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Insumos Tecnicos</title>
	<link href="https://fonts.googleapis.com/css2?family=Kalam:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../postventa/css/estilosalm.css" media="">
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
				<li><a href="creacion.php">Crea Nuevo</a></li>

			</ul>
		</aside>
		
		<article>

			<h2>Edicion Refaccion:</h2>

			<p>
				
				<br>
			</p>

			<div class="formularios">
				<?php foreach ($resultado as $fila) : ?>

				<br>

				<form class="" action="editar_refpostventa_process.php" method="post" autocomplete="off">

					<input id="forms" type="text" name="id_refpostventa" hidden value="<?php echo $fila['id_refpostventa']; ?>">
					
				<table>

					<tr>
						<td><label>Numero Parte: </label></td>
						<td><input type="text" name="numparte_refpostventa" value="<?php echo $fila['numparte_refpostventa']; ?>" ></td>
					</tr>

					<tr>
						<td><label>Descripcion: </label></td>
						<td><input  type="text" name="desc_refpostventa" value="<?php echo $fila['desc_refpostventa']; ?>" ></td>
					</tr>

					<tr>
						<td><label>Cantidad: </label></td>
						<td><input type="text" name="cant_refpostventa" value="<?php echo $fila['cant_refpostventa']; ?>" ></td>
					</tr>

					<tr>
						<td><label>Precio: </label></td>
						<td><input  type="text" name="costo_refpostventa" value="<?php echo $fila['costo_refpostventa']; ?>" ></td>
					</tr>

				</table>

				<br><br>
					<input class="button button2" type="submit" name="ok" value="Guardar">
					<a class="button button2" href="refpostventa.php">Salir</a>
					<?php endforeach; ?>

				</form>
			</div>

		</article>

	</section>


</body>
</html>
