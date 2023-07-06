<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nuevo Producto</title>
</head>
<body>
	<form action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>' method="post">
		<input type="" name="" placeholder="" value="">
		<br><br>
		<input type="text" name="nom_prod" placeholder="Nombre de producto:" value="">
		<br><br>
		<input type="text" name="desc_prod" placeholder="Descripcion:" value="">
		<br><br>
		<input type="text" name="cant_prod" placeholder="Cantidad:" value="">
		<br><br>
		<input type="text" name="unidad_prod" placeholder="Unidad:" value="">
		<br><br>
		<input type="text" name="stock_prod" placeholder="Stock:" value="">
		<br><input type="submit" name="ok" value="Enviar">
	</form>
</body>
</html>