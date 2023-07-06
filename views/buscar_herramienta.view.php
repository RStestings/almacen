<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Herramienta Area Tecnica</title>
	<link rel="stylesheet" type="text/css" href="css\estilos.css">
</head>

<script type="text/javascript">
	function confirmacion(){
		var respuesta = confirm("El registro se eliminara permanentemente. \n¿Deseas continuar?");

		if (respuesta == true) {
			return true;
		}else{
			return false;
		}
	}
</script>

<body>
		<h1 id="texto_centro">Herramienta Area Tecnica</h1>
		<a href="index.php">Inicio</a>
		<a href="herramienta.php">Ver Todo</a>
		<a href="crear_herramienta.php">Crear Nuevo</a>
		<hr>

		<br>
		<br>	

	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
		Buscar:
		<input type="text" name="buscar_herramienta" value="">
		<input type="submit" name="" value="Buscar">
	</form>
	<div class="contenedor">
		<table class="contenidos">
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
			foreach ($resultado as $fila): ?>
			<tr>
				<td class="centro"><?php echo $fila['id']; ?></td>
				<td class="izq"><?php echo $fila['desc_hta']; ?></td>
				<td class="izq"><?php echo $fila['marca_hta']; ?></td>
				<td class="centro"><?php echo $fila['unidad_hta']; ?></td>
				<td class="centro"><?php echo $fila['cant_hta']; ?></td>
				<td class="centro"><?php echo $fila['exis_hta']; ?></td>
				<td class="centro"><?php echo $fila['incompleto_hta']; ?></td>
				<td class="centro"><?php echo $fila['faltante_hta']; ?></td>
				<td ><a class="button button2" href="salida_herramienta.php?id=<?php echo $fila['id']; ?>">Salida</a></td>
				<td ><a class="button button2" href="surtir_herramienta.php?id=<?php echo $fila['id']; ?>">Surtir</a></td>
			<?php if($rol == 'admin'): ?>
				<td ><a class="button button2" href="">Editar</a></td>
				<td ><a class="button button2" href="delete_herramienta_process.php?id=<?php echo $fila['id']; ?>" onclick='return confirmacion()'>Eliminar</a></td>
			<?php endif; ?>
			</tr>
			<?php endforeach; ?>


		</table>
		<?php 
			if($fila == false){
				echo 'No existen coincidencias';
			}
		?>
		</div>



</body>
</html>