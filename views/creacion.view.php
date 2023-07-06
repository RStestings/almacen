<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<h1 id="texto_centro">Registrar nuevo producto</h1>
	
		<a href="index.php">Inicio</a>
		<a href="buscar.php">Buscar</a>
		<a>Otro</a>
		<hr>

	<br>
	<br>
	
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">

		<table>
			<tr>
				<td>Descripcion: </td>
				<td><input type="text" name="desc_insumo" placeholder="Descripcion:" value="<?php if(!$enviado && isset($desc_insumo)) echo $desc_insumo; ?>"></td>
			</tr>

			<tr>
				<td>Marca: </td>
				<td><input type="text" name="marca_insumo" placeholder="Marca:" value="<?php if(!$enviado && isset($marca_insumo)) echo $marca_insumo; ?>"></td>
			</tr>

			<tr>
				<td>Cantidad: </td>
				<td><input type="text" name="cant_insumo" placeholder="Cantidad:" value="<?php if(!$enviado && isset($cant_insumo)) echo $cant_insumo; ?>"></td>
			</tr>

			<tr>
				<td>Unidad: </td>
				<td><input type="text" name="unidad_insumo" placeholder="Unidad:" value="<?php if(!$enviado && isset($unidad_insumo)) echo $unidad_insumo; ?>"></td>
			</tr>

			<tr>
				<td>Stock: </td>
				<td><input type="text" name="stock_insumo" placeholder="Stock" value="<?php if(!$enviado && isset($stock_insumo)) echo $stock_insumo; ?>"></td>
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

		<br><input type="submit" class="button button2" name="crear_ok" value="Guardar"> <a class="button button2" href="buscar.php">Salir</a>
	</form>
	<div>
		
	</div>

</body>
</html>