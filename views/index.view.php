<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Practica Estilos CSS</title>
	<link href="https://fonts.googleapis.com/css2?family=Kalam:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/estilosalm.css" media="">
</head>
<body>

	<header>
		<div id="logo"><img src="imagenes/rs.png">Rseguridad</div>
		<div id="icono1" class="redes">Foto</div>
		<div id="icono2" class="redes">Almacen</div>
		<div id="iconocerrar" class="redes"><a href="cerrar.php">Salir</a></div>
	</header>
	
	<nav>
		<p>
			<?php echo $nombre_s . " | " .$login; ?>
		</p>		
	</nav>

	<section>
		<aside id="izq">
			<ul>
				<li><a href="buscar.php">Insumos</a></li>
				<li><a href="herramientas.php">Herramienta</a></li>

			<?php if($rol_s == 'admin') :  ?>
				<li><a href="#">Tecnicos</a></li>
				<li><a href="#">Movimientos</a></li>
				<li><a href="adm/usuarios.php">Usuarios</a></li>
			<?php endif; ?>

			</ul>
		</aside>
		
		<article>

			<div class="zonamenus">
				<div id="menu1" class="zonamenus"><a href=""><img src="imagenes/insumos.png"></a></div>
				<div id="menu2" class="zonamenus"><a a href=""><img src="imagenes/herramientas.png"></a></div>
			
			<?php if($rol_s == 'admin') :  ?>
				<div id="menu3" class="zonamenus"><a a href=""><img src="imagenes/datos_tecnicos.png"></a></div>
				<div id="menu4" class="zonamenus"><a a href=""><img src="imagenes/movimientos.png"></a></div>
				<div id="menu5" class="zonamenus"><a a href="adm/usuarios.php"><img src="imagenes/gestion_usuarios.png"></a></div>
			<?php endif; ?>					
			</div>			

		</article>

	</section>


</body>
</html>
