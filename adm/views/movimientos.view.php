<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Insumos Tecnicos</title>
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
				<li><a href="../index.php">Atras</a></li>
				<li><a href="bitacora.php">Bitacora</a></li>
			</ul>
		</aside>
		
		<article>

		
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
			<p>Buscar por tecnico:
				<input type="text" name="buscar_tec" value="">
				<input type="submit" name="ok" value="Ok" class="button button2">
			</p>
			
			<table class="tablebds">
				<tr>
					<th>ID</th>
					<th>Insumo</th>
					<th>Usuario</th>
					<th>Cantidad</th>
					<th>Proyecto</th>
					<th>Tecnico</th>
					<th>Fecha</th>
					<th>Movimiento</th>
				</tr>

				<?php 
					$fila = isset($fila) ? $fila : false;
						foreach ($resultado as $fila): 
				?>
				<tr>
					<td class="centro"><?php echo $fila['id_movi']; ?></td>
					<td class="izq"><?php 
					$id_i = $fila['id_insumo']; 

					$consulta_insumo = $conexion -> prepare("SELECT  * FROM insumos WHERE id_insumo LIKE '$id_i'");
					$consulta_insumo -> execute();
					$resultado_insumo = $consulta_insumo -> fetchAll();

					foreach ($resultado_insumo as $fila_insumo){
						echo $fila_insumo['desc_insumo'];
					}
					?></td>
					<td class="izq"><?php 
					$id_u = $fila['id_usuario']; 

					$consulta_usuario = $conexion -> prepare("SELECT  * FROM usuarios WHERE id_usuario LIKE '$id_u'");
					$consulta_usuario -> execute();
					$resultado_usuario = $consulta_usuario -> fetchAll();

					foreach ($resultado_usuario as $fila_usuario){
						echo $fila_usuario['login'];
					}
					?>	
					</td>
					<td class="centro"><?php echo $fila['cantidad']; ?></td>
					<td class="centro"><?php echo $fila['proyecto']; ?></td>
					<td class="centro"><?php echo $fila['tecnico']; ?></td>
					<td class="centro"><?php echo $fila['fecha']; ?></td>
					<td class="centro"><?php echo $fila['tipo_mov']; ?></td>
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