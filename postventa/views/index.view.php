<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Menu</title>
	<link href="https://fonts.googleapis.com/css2?family=Kalam:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./css/estilosalm.css" media="">
</head>
<body>

	<header>

		<div id="logo"><img src="../imagenes/rs.png">Rseguridad</div>
		<div id="icono1" class="redes"><a href="./perfil.php?login=<?php echo $login ?>"><img src="../imagenes/usuarios/<?php if($img_s){
				echo $img_s;
			}else{
				echo 'no_usuario.png';
			}
			?>"></a>
		</div>
		<div id="icono2" class="redes"><li><?php echo $rol_s; ?></li></div>
		<div id="iconocerrar" class="redes"><a href="../cerrar.php">Salir</a></div>
	</header>
	
	<nav>
		<p>
			<?php echo $hoy . ' - ' . $nombre_s . " | " .$login; ?>
		</p>		
	</nav>

	<section>
		<aside id="izq">
			<ul>
				<li><a id="botdiv" href="refpostventa.php">Refacciones</a></li>
				<li><a id="botdiv" href="movimientos.php">Registro E/S</a></li>
				<?php if($rol_s == 'admin') : ?>
					<li><a href="../index.php">Regresar Almacen</a></li>
				<?php endif; ?>
			</ul>
		</aside>
		
		<article>

			<div class="zonamenus">
				<div id="menu1" class="zonamenus"><a href="refpostventa.php"><img src="imagenes/insumos.png"></a></div>
				<div id="menu2" class="zonamenus"><a a href="herramienta.php"><img src="imagenes/herramientas.png"></a></div>					
			</div>			

		</article>

	</section>


</body>
</html>
