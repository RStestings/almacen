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
				<a href="creacion.php"><li>Nuevo Insumo</li></a>
				<a href="creacion_categoria.php"><li>Nueva Categoria</li></a>
			<?php endif; ?>

			<?php if($rol_s == 'logistica') : ?>
				<a href="ver_categorias.php"><li>Ver Categorias</li></a>
			<?php endif; ?>
			</ul>
		</aside>
		
		<article>

		
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">

		<p>
			
		</p>
						
			<table class="tablebds">
				<tr>
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
					<td id="centro"><?php echo $fila['numparte_insumo']; ?></td>
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
					<td><?php echo $fila['unidad_insumo']; ?></td>
					<td id="centro"><?php echo $fila['stock_insumo']; ?></td>
					
				<?php
					$limite = $fila['cant_insumo']-$fila['stock_insumo'];
					if($limite >= 6) { 
				?>
					<td class="centro" bgcolor="#OOFF7F">OK</td>

				<?php
					}elseif($limite < 6 && $limite >0) { ?>
					<td class="centro" bgcolor="#FF8C00">Por Agotar</td>
				<?php }else{ ?>
					<td class="centro" bgcolor="red">Pedir</td>
				<?php } ?>

				<?php if($rol_s == 'admin' OR $rol_s == 'almacen') : ?>
					<td ><a class="button button2" href="salida_insumo.php?id_insumo=<?php echo $fila['id_insumo']; ?>">Salida</a></td>
					<td ><a class="button button2" href="surtir_insumo.php?id_insumo=<?php echo $fila['id_insumo']; ?>">Ingreso</a></td>
				<?php endif; ?>
				
				<?php if($rol_s == 'admin') : ?>
					<td ><a class="button button4" href="editar_insumo.php?id_insumo=<?php echo $fila['id_insumo']; ?>">Editar</a></td>
					<td ><a class="button button3" href="delete_process.php?id_insumo=<?php echo $fila['id_insumo']; ?>" onclick ='return confirmacion()'>Eliminar</a></td>
				<?php endif; ?>
				</tr>

				<?php endforeach; ?>

				
				<?php if($fila == false) :?>
				
					<tr>
						<td><div class="alert"><?php echo 'Lo sentimos, ocurrio un error '; ?><a href="./insumos.php">Cargar datos</a></div></td>
					</tr>
				<?php endif; ?>

		</table>

		
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