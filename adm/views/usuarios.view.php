<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<<<<<<< HEAD
	<title>Insumos Tecnicos</title>
=======
	<title>Gestion Usuarios</title>
>>>>>>> fc32f1bfe696ac8769beba975885a79acc19a2c6
	<link href="https://fonts.googleapis.com/css2?family=Kalam:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/estilosalm.css" media="">
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
				<li><a href="../index.php">Inicio</a></li>
			<?php if($rol_s == 'admin' OR $rol_s == 'almacen') : ?>
				<li><a href="creacion.php">Crear Nuevo</a></li>
			<?php endif; ?>
			</ul>
		</aside>
		
		<article>

		
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
			<p>Buscar:
				<input type="text" name="buscar" value="">
				<input type="submit" name="ok" value="Ok" class="button button2">
			</p>
			
			<table class="tablebds">
				<tr>
					<th>ID</th>
					<th>Login</th>
					<th>Nombre</th>
					<th>Rol</th>
					<th>Foto</th>
				</tr>

				<?php 
					$fila = isset($fila) ? $fila : false;
						foreach ($resultado as $fila) : 
				?>
				<tr>
					<td class="centro"><?php echo $fila['id_usuario']; ?></td>
					<td class="izq"><?php echo $fila['login']; ?></td>
					<td class="izq"><?php echo $fila['nombre']; ?></td>
					<td class="centro"><?php 
						$rol_b = $fila['id_rol'];

							$consulta2 = $conexion -> prepare("SELECT * FROM rol_usuario WHERE id_rol LIKE '$rol_b' ");
							$consulta2 -> execute();
							$resultado2 = $consulta2 -> fetchAll();
						
						foreach ($resultado2 as $fila2){
							echo $fila2['rol_usuario'];
						}
						 ?></td>
					<td class="centro"><?php echo $fila['img_usuario']; ?></td>

				<?php if($rol_s == 'admin') : ?>
<<<<<<< HEAD
					<td ><a class="button button2" href="editar_insumo.php?id_usuario=<?php echo $fila['id_usuario']; ?>">Editar</a></td>
=======
					<td ><a class="button button2" href="editar_usuario.php?id_usuario=<?php echo $fila['id_usuario']; ?>">Editar</a></td>
>>>>>>> fc32f1bfe696ac8769beba975885a79acc19a2c6
					<td ><a class="button button2" href="delete_process.php?id_usuario=<?php echo $fila['id_usuario']; ?>" onclick ='return confirmacion()'>Eliminar</a></td>
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
					<li id="navboton"><</li>
					<li id="navboton">1</li>
					<li id="navboton">2</li>
					<li id="navboton">></li>
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