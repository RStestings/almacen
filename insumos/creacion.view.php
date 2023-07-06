<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	
	
		<a href="index.php">Inicio</a>
		<a href="">Otro</a>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
		<input autofocus type="text" name="desc_insumo" placeholder="Descripcion:" value="<?php if(!$enviado && isset($desc_insumo)) echo $desc_insumo; ?>">
		<br><input type="text" name="marca_insumo" placeholder="Marca:" value="<?php if(!$enviado && isset($marca_insumo)) echo $marca_insumo; ?>">
		<br><input type="text" name="cant_insumo" placeholder="Cantidad:" value="<?php if(!$enviado && isset($cant_insumo)) echo $cant_insumo; ?>">
		<br><input type="text" name="unidad_insumo" placeholder="Unidad:" value="<?php if(!$enviado && isset($unidad_insumo)) echo $unidad_insumo; ?>">
		<br><input type="text" name="stock_insumo" placeholder="Stock" value="<?php if(!$enviado && isset($stock_insumo)) echo $stock_insumo; ?>">

		<?php if(!empty($errores)): ?>
				<div class="alert error">
					<?php echo '<br>'.$errores; ?>
				</div>
		<?php elseif($enviado): ?>
				<div class="alert success">
					<p>Registro guardado correctamente</p>
				</div>
		<?php endif ?>

		<br><input type="submit" name="crear_ok" value="Guardar">
	</form>
	<div>
		
	</div>

</body>
</html>