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
	
		<h1> Insumos Area Tecnica </h1>
		<a href="http://localhost/Almacen2/">Inicio</a>
		<a href="creacion.php">Crear Nuevo</a>
		<a href="http://localhost/Almacen2/cerrar.php">Cerrar Sesion</a>
		<hr>
		<br><?php //echo $nombre_usuario; ?>

		<br>
		<br>
	
	Buscar:
	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
		<input type="text" name="buscar_insumo" value="">
		<input type="submit" name="ok" value="Ok">
	
	<div>
		<table>
			<tr>
				<th>ID</th>
				<th>Login</th>
				<th>Nombre</th>
				<th>Id Rol</th>
			</tr>

			<?php 
				 $fila = isset($fila) ? $fila : false;
				 foreach ($resultado as $fila): 
			?>
			<tr>
				<td><?php echo $fila['id_usuario']; ?></td>
				<td><?php echo $fila['login']; ?></td>
				<td><?php echo $fila['nombre']; ?></td>
				<td><?php  echo $fila['id_rol']; ?></td>
			</tr>
			<?php endforeach; ?>
		
		</table>

		<?php



		if($fila == false){
			//echo 'No existen coincidencias';
		} ?>

	</div>
	</form>
</body>
</html>