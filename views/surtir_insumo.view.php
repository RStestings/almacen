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
				<li><a href="buscar.php">Insumos</a></li>
				<li><a href="herramienta.php">Herramienta</a></li>

			<?php //if($rol_s == 'admin') :  ?>
				<li><a href="#">Tecnicos</a></li>
				<li><a href="#">Movimientos</a></li>
				<li><a href="adm/usuarios.php">Usuarios</a></li>
			<?php //endif; ?>

			</ul>
		</aside>
		
		<article>

			<h2>Registrar Ingreso De Insumo</h2>

			<p>
				<br>
			</p>

			<div class="formularios">
				<?php foreach ($resultado as $fila) : ?>
				
				<h5>
					Existencias: <?php echo $fila['cant_insumo']; ?>:
				</h5>

				<br>

				<form class="" action="surtir_insumo_process.php" method="post">

					<input id="forms" type="text" name="id_insumo" hidden value="<?php echo $fila['id_insumo']; ?>">
					<input type="text" name="cant_insumo" hidden value="<?php echo $fila['cant_insumo']; ?>">
					
				<table>
					<tr>
						<td><label>Descripcion: </label></td>
						<td><input type="text" name="desc_insumo" disabled value="<?php echo $fila['desc_insumo']; ?>" ></td>
					</tr>
					
					<tr>
						<td><label>Marca: </label></td>
						<td><input type="text" name="marca_insumo" disabled value="<?php echo $fila['marca_insumo']; ?>"></td>
					</tr>	

					<tr>
						<td><label>Cantidad Ingresa: </label></td>
						<td><input type="text" name="cant_surtir"  value="" autofocus></td>
					</tr>

					<tr>
						<td><label>Unidad: </label></td>
						<td><input type="text" name="unidad_insumo" disabled value="<?php echo $fila['unidad_insumo']; ?>"></td>
					</tr>

				</table>

				<br><br>
					<input class="button button2" type="submit" name="ok" value="Surtir">
					<a class="button button2" href="buscar.php">Salir</a>
					<?php endforeach; ?>
			</div>

<!-- Para registrar salida en tabla movimientos -->
			<div class="formcomp">

				<br>
				<br>
				<br>
					
				<table>
					<p>Datos de quien registra: </p>
					<tr>
						<td><label>Tecnico: </label></td>
						<td><input type="text" name="tecnico" value="<?php echo $login; ?>" disabled></td>
					</tr>	

					<tr>
						<td><label>Fecha: </label></td>
						<td><input disabled type="text" name="hoy"  value="<?php echo $hoy; ?>"></td>
					</tr>

				</table>
					<?php  ?>
				</form>
			</div>

		</article>

	</section>


</body>
</html>