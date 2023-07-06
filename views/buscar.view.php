<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Insumos Area Tecnica</title>
	<link rel="stylesheet" type="text/css" href="css\estilos.css">
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
	
		<h1 id="texto_centro"> Insumos Area Tecnica </h1>
		<a href="index.php">Inicio</a>
		<a href="insumos.php">Ver Todos</a>
		<?php if($rol_usuario == 'admin' OR $rol_usuario == 'almacen') : ?>
			<a href="creacion.php">Crear Nuevo</a>
		<?php endif; ?>
		<a class="cerrar" href="cerrar.php">Cerrar Sesion</a>
		<hr class="linea">

		<br>
		<br>
	
	Buscar:
	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
		<input type="text" name="buscar_insumo" value="">
		<input type="submit" name="ok" value="Ok">
	
	<div class="contenedor">
		<table class="contenidos">
			<tr>
			<th>ID</th>
			<th>Descripcion</th>
			<th>Marca</th>
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
				<td class="centro"><?php echo $fila['id_insumo']; ?></td>
				<td class="izq"><?php echo $fila['desc_insumo']; ?></td>
				<td class="izq"><?php echo $fila['marca_insumo']; ?></td>
				<td class="centro"><?php echo $fila['cant_insumo']; ?></td>
				<td class="centro"><?php echo $fila['unidad_insumo']; ?></td>
				<td class="centro"><?php echo $fila['stock_insumo']; ?></td>
				<?php
				$limite = $fila['cant_insumo']-$fila['stock_insumo'];
					if($limite >= 6) { ?>
						<td class="centro" bgcolor="#OOFF7F">OK</td>

				<?php
					}elseif($limite < 6 && $limite >0) { ?>
						<td class="centro" bgcolor="#FF8C00">Pedir</td>
				<?php }else{ ?>
						<td class="centro" bgcolor="red">No hay</td>
				<?php } ?>

				<?php if($rol_usuario == 'admin' OR $rol_usuario == 'almacen') : ?>
				<td ><a class="button button2" href="salida_insumo.php?id_insumo=<?php echo $fila['id_insumo']; ?>">Salida</a></td>
				<td ><a class="button button2" href="surtir_insumo.php?id_insumo=<?php echo $fila['id_insumo']; ?>">Surtir</a></td>
				<?php endif; ?>

				<?php if($rol_usuario == 'admin') : ?>
				<td ><a class="button button2" href="editar_insumo.php?id_insumo=<?php echo $fila['id_insumo']; ?>">Editar</a></td>
				<td ><a class="button button2" href="delete_process.php?id_insumo=<?php echo $fila['id_insumo']; ?>" onclick ='return confirmacion()'>Eliminar</a></td>
				<?php endif; ?>
				</tr>

			
			<?php endforeach; ?>
		</table>

		<?php



		if($fila == false){
			echo 'No existen coincidencias';
		} ?>

	</div>
	</form>
</body>
</html>