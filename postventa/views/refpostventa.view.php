<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Insumos Tecnicos</title>
	<link href="https://fonts.googleapis.com/css2?family=Kalam:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../postventa/css/estilosalm.css" media="">
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
		<div id="logo"><img src="../imagenes/rs.png">Rseguridad</div>
		<div id="icono1" class="redes"><img src="../imagenes/usuarios/<?php if(!empty($img_s)){
			echo $img_s;
		}else{
			echo 'no_usuario.png';
		}
		?>"></div>
		<div id="icono2" class="redes"><li><?php echo $rol_s; ?></li></div>
		<div id="iconocerrar" class="redes"><a href="../cerrar.php">Cerrar</a></div>
	</header>
	
	<nav>
		<p>
			<?php echo $hoy . ' - ' . $nombre_s . " | " .$login; ?>
		</p>
	</nav>

	<section>
		<aside id="izq">
			<ul>
				<li><a href="index.php">Atras</a></li>
				<li><a href="creacion.php">Crear Nuevo</a></li>
			</ul>
		</aside>
		
		<article>

		<i class="fa fa-minus-square" aria-hidden="true"></i>
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
						
			<table class="tablebds">
				<tr>
					<th>ID</th>
					<th>Descripcion</th>
				</tr>

				<?php 
					$fila = isset($fila) ? $fila : false;
						foreach ($resultado as $fila): 
				?>
				<tr>
					<td id="centro"><?php echo $fila['id_refpostventa']; ?></td>
					<td class="izq"><?php echo $fila['desc_refpostventa']; ?></td>
				
				<!- Botones Accion -->
					<td ><a class="button button2" href="salida_refpostventa.php?id_refpostventa=<?php echo $fila['id_refpostventa']; ?>">Salida</a></td>
					<td ><a class="button button2" href="surtir_refpostventa.php?id_refpostventa=<?php echo $fila['id_refpostventa']; ?>">Ingreso</a></td>
					<td ><a class="button button4" href="editar_refpostventa.php?id_refpostventa=<?php echo $fila['id_refpostventa']; ?>">Editar</a></td>

				<?php if($rol_s == 'admin') : ?>
					<td ><a class="button button3" href="delete_process.php?id_refpostventa=<?php echo $fila['id_refpostventa']; ?>" onclick ='return confirmacion()'><i class="fa fa-minus-square" aria-hidden="true"></i>Eliminar</a></td>
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