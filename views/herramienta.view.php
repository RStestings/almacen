<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Insumos Tecnicos</title>
	<link href="https://fonts.googleapis.com/css2?family=Kalam:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/estilosalm.css" media="">
</head>

<script type="text/javascript">
	function confirmacion(){
		var respuesta = confirm("El registro se eliminara permanentemente. \n¿Deseas continuar?");

			if (respuesta == true) {
				return true;
			} else {
				return false;
			}
	}
</script>

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
		<div id="iconocerrar" class="redes"><a href="cerrar.php">Cerrar</a></div>
	</header>
	
	<nav>
		<p>
			<?php echo $hoy . ' - ' . $nombre_s . " | " .$login; ?>
		</p>
	</nav>

	<section>
		<aside id="izq">
			<ul>
				<a href="index.php"><li>Inicio</li></a>
				<a href="buscar.php"><li>Buscar</li></a>
				<a href="ver_insumos.php"><li>Ver Todos</li></a>
			<?php if($rol_s == 'admin' OR $rol_s == 'almacen') : ?>
				<a href="creacion.php"><li>Crear Nuevo</li></a>
			<?php endif; ?>
			</ul>
		</aside>
		
		<article>

		
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
						
			<table class="tablebds">
				<tr>
					<th>ID</th>
					<th>Descripcion</th>
					<th>Marca</th>
					<th>Unidad</th>
					<th>Cantidad</th>
					<th>Existente</th>
					<th>Incompleto / Dañada</th>
					<th>Faltante</th>
				</tr>

				<?php 
					$fila = isset($fila) ? $fila : false;
						foreach ($resultado as $fila): 
				?>
	
				<tr>
				<td><?php echo $fila['id']; ?></td>
				<td class="izq"><?php echo $fila['desc_hta']; ?></td>
				<td class="izq"><?php echo $fila['marca_hta']; ?></td>
				<td><?php echo $fila['unidad_hta']; ?></td>
				<td id="centro"><?php echo $fila['cant_hta']; ?></td>
				<td><?php echo $fila['exis_hta']; ?></td>
				<td><?php echo $fila['incompleto_hta']; ?></td>
				<td><?php echo $fila['faltante_hta']; ?></td>
		
				<?php if($rol_s == 'admin' OR $rol_s == 'almacen') : ?>
					<td ><a class="button button2" href="salida_herramienta.php?id=<?php echo $fila['id']; ?>">Salida</a></td>
					<td ><a class="button button2" href="surtir_herramienta.php?id=<?php echo $fila['id']; ?>">Ingreso</a></td>
				<?php endif; ?>

				<?php if($rol_s == 'admin') : ?>
					<td ><a class="button button4" href="editar_herramienta.php?id=<?php echo $fila['id']; ?>">Editar</a></td>
					<td ><a class="button button3" href="delete_herramienta_process.php?id<?php echo $fila['id']; ?>" onclick ='return confirmacion()'>Eliminar</a></td>
				<?php endif; ?>
				</tr>

				<?php endforeach; ?>

		</table>

		<?php
			if($fila == false){
				echo 'No existen coincidencias'; 
			} 
		?>
		</form>

			<div class="navtable">
				
				<ul>
					
					<?php if($pagina == 1): ?>
					<li id="navdisabled">&laquo;</li>
					<?php else: ?>
					<li id="navboton"><a href="?pagina=<?php echo $pagina - 1 ?>">&laquo;</a></li>
					<?php endif; ?>

					<!--Ejecucion de ciclo para mostrar pagina anterior -->
					<?php
					for($i=1; $i <= $numeroPaginas; $i++){
						if($pagina == $i){
							echo "<li id='navboton'><a href='?pagina=$i'>$i</a></li>";
						}else{ echo "<li id='navboton'><a href='?pagina=$i'>$i</a></li>";}
					}
					?>

				<!--Establece cuando deshabilitar el boton siguiente -->
					<?php if ($pagina == $numeroPaginas): ?>
					<li id="navdisabled">&raquo;</li>
					<?php else: ?>
					<li id="navboton"><a href="?pagina=<?php echo $pagina + 1 ?>">&raquo;</a></li>
					<?php endif; ?>
				</ul>

			</div>

			<br>
			<br>

		</article>

	</section>

	<!-- <footer> <?php // fragmento comentado&copy; Todos los derechos reservados. ?>
		
	</footer> -->

</body>
</html>