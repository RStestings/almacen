<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registrar Nueva Herramienta</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<h1 id="texto_centro">Registrar Nueva Herramienta</h1>
	
		<a href="index.php">Inicio</a>
		<a href="buscar_herramienta.php">Buscar</a>
		<a>Otro</a>
		<hr>

	<br>
	<br>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">

	<table>

		<tr>
			<td>Descripcion: </td>
			<td><input type="text" name="desc_hta" placeholder="Descripcion:" value="<?php if(!$enviado && isset($desc_hta)) echo $desc_hta; ?>"></td>
		</tr>

		<tr>
			<td>Marca: </td>
			<td><input type="text" name="marca_hta" placeholder="Marca:" value="<?php if(!$enviado && isset($marca_hta)) echo $marca_hta; ?>"></td>
		</tr>

		<tr>
			<td>Unidad: </td>
			<td><input type="text" name="unidad_hta" placeholder="Unidad:" value="<?php if(!$enviado && isset($unidad_hta)) echo $unidad_hta; ?>"></td>
		</tr>

		<tr>
			<td>Cantidad: </td>
			<td><input type="text" name="cant_hta" placeholder="Cantidad:" value="<?php if(!$enviado && isset($cant_hta)) echo $cant_hta; ?>"></td>
		</tr>

		<tr>
			<td>Existente: </td>
			<td><input type="text" name="exis_hta" placeholder="Existente" value="<?php if(!$enviado && isset($exis_hta)) echo $exis_hta; ?>"></td>
		</tr>

		<tr>
			<td>Incompleto / Dañada: </td>
			<td><input type="text" name="incompleto_hta" placeholder="Incompleto/Dañado:" value="<?php if(!$enviado && isset($exis_hta)) echo $exis_hta; ?>"></td>
		</tr>

		<tr>
			<td>Faltante: </td>
			<td><input type="text" name="faltante_hta" placeholder="Faltante:" value="<?php if(!$enviado && isset($faltante_hta)) echo $faltante_hta; ?>"></td>
		</tr>

	</table>

		<?php if(!empty($errores)): ?>
				<div class="alert error">
					<?php echo '<br>'.$errores; ?>
				</div>
		<?php elseif($enviado): ?>
				<div class="alert success">
					<p>Enviado Correctamente</p>
				</div>
		<?php endif ?>

		<br><br>
		<input type="submit" class="button button2" name="crear_ok" value="Guardar">
		<a class="button button2" href="buscar_herramienta.php">Salir</a>
	</form>
	<div>
		
	</div>

</body>
</html>