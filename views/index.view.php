<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Almacen Area Tecnica</title>
	<link rel="stylesheet" type="text/css" href="css\estilos.css">
</head>
<body>

	<h1 align="center">Almacen Area Tecnica:</h1>
	<hr>
	<p><h5>Sitio en construccion...!</h5></p>

	<div class="contenedor">
				<div class="thumb" id="izq">
					<a href="buscar.php"><img src="imagenes/insumos.png"><br>Ver Insumos</a>
				</div>

				<div class="thumb" id="der">
					<a   href="buscar_herramienta.php"><img src="imagenes/herramientas.png"><br>Ver Herramienta</a>
				</div>

				<?php if($rol_s == 'admin') :  ?>
					<div class="" id="">
						<a   href=""><img src="imagenes/datos_tecnicos.png"><br>Datos Tecnicos</a>
					</div>

					<div class="" id="">
						<a   href=""><img src="imagenes/gestion_usuarios.png"><br>Gestion Usuarios</a>
					</div>
				<?php endif; ?>
	</div>

</body>
</html>