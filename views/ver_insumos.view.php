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
				<li><a href="insumos.php">Regresar</a></li>
				<li><a href="buscar.php">Buscar</a></li>
			<?php if($rol_s == 'admin' OR $rol_s == 'almacen') : ?>
				<li><a href="creacion.php">Nuevo Insumo</a></li>
				<li><a href="creacion_categoria.php">Nueva Categoria</a></li>
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
						<th>Clave</th>
						<th>Descripcion</th>
						<th>Marca</th>
						<th>Categoria</th>
						<th>Cantidad</th>
						<th>Unidad</th>
						<th>Stock</th>
						<th>Status</th>
					</tr>

					<?php 
						$fila = isset($fila) ? $fila : false;
							foreach ($resultado as $fila): 
					?>
					<tr>
						<td id="centro"><?php echo $fila['id_insumo']; ?></td>
						<td><?php echo $fila['numparte_insumo']; ?></td>
						<td><?php echo $fila['desc_insumo']; ?></td>
						<td><?php echo $fila['marca_insumo']; ?></td>
						<td><?php 
							$id_cat = $fila['id_cate'];
							$consulta_cat = $conexion -> prepare("SELECT * FROM cate_insumo WHERE id_cate = '$id_cat' ");
							$consulta_cat -> execute();
							$resultado2 = $consulta_cat -> fetchAll();

							foreach($resultado2 as $fila_cat){

								echo $fila_cat['desc_cat'];

							} ?>
						</td>
						<td id="centro"><?php echo $fila['cant_insumo']; ?></td>
						<td id="centro"><?php echo $fila['unidad_insumo']; ?></td>
						<td id="centro"><?php echo $fila['stock_insumo']; ?></td>
					<?php
					$limite = $fila['cant_insumo']-$fila['stock_insumo'];
						if($limite >= 6) { ?>
							<td class="centro" bgcolor="#OOFF7F">OK</td>

					<?php
						}elseif($limite < 6 && $limite >0) { ?>
							<td class="centro" bgcolor="#FF8C00">Por Agotar</td>
					<?php }else{ ?>
							<td class="centro" bgcolor="red">Pedir</td>
					<?php } ?>
				</tr>

				<?php endforeach; ?>

			</table>
		</form>

			<div class="navtable">
				
			</div>

			<br>
			<br>

		</article>

	</section>

	<!- <footer> <?php // fragmento comentado&copy; Todos los derechos reservados. ?>
		
	</footer> ->

</body>
</html>
