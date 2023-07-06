<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<title>Salida Insumo</title>
</head>
<body>

	<h1 id="texto_centro">Registrar Regreso De Herramienta</h1>
	<hr>

	<br>
	<br>

	<form action="surtir_herramienta_process.php" method="post">
		<?php foreach ($resultado as $fila) : ?>
		<h5>
			Existencias: <?php echo $fila['cant_hta']; ?>		
		</h5>
		<input type="text" name="id" hidden value="<?php echo $fila['id']; ?>">
		<br><input type="text" name="desc_hta" disabled value="<?php echo $fila['desc_hta']; ?>" >
		<br><input type="text" name="marca_hta" disabled value="<?php echo $fila['marca_hta']; ?>" >
		<br><input type="text" name="unidad_hta" disabled value="<?php echo $fila['unidad_hta']; ?>" >
		<input type="text" name="cant_hta" hidden value="<?php echo $fila['cant_hta']; ?>">
		<br><input type="text" name="cant_surtir" autofocus >
		<br><input type="text" name="exis_hta" disabled value="<?php echo $fila['exis_hta']; ?>" >
		<br><input type="text" name="incompleto_hta" disabled value="<?php echo $fila['incompleto_hta']; ?>" >
		<br><input type="text" name="faltante_hta" disabled value="<?php echo $fila['faltante_hta']; ?>" >
		<?php endforeach; ?>
		<br><br>
		<input class="button button2" type="submit" name="ok" value="Surtir">
		<a class="button button2" href="buscar_herramienta.php">Salir</a>
		
	</form>

</body>

