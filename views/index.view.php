<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Menu</title>
	<link href="https://fonts.googleapis.com/css2?family=Kalam:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/estilosalm.css" media="">
</head>
<body>

	<header>

		<div id="logo"><img src="imagenes/rs.png">Rseguridad</div>
		<div id="icono1" class="redes"><a href="./profiles/profile_users.php?id_usuario=<?php echo $id_s; ?>"><img src="imagenes/usuarios/<?php if(!empty($img_s)){
			echo $img_s;
		}else{
			echo 'no_usuario.png';
		}
		?>"></a></div>
		<div id="icono2" class="redes"><li><?php echo $rol_s; ?></li></div>
		<div id="iconocerrar" class="redes"><a href="cerrar.php">Salir</a></div>
	</header>
	
	<nav>
		<p>
			<?php echo $hoy . ' - ' . $nombre_s . " | " .$login; ?>
		</p>		
	</nav>

	<section>
		<aside id="izq">
			<ul>
			<a href="insumos.php"><li>Insumos</li></a>
				<a href="herramienta.php"><li>Herramienta</li></a>

			<?php if($rol_s == 'admin') :  ?>
				<a href="#"><li>Tecnicos</li></a>
				<a href="adm/movimientos.php"><li>Movimientos</li></a>
				<a href="adm/usuarios.php"><li>Usuarios</li></a>
				<a href="postventa/index.php"><li>Postventa</li></a>
			<?php endif; ?>

			<!-- PARA LOGISTICA -->
			<?php if($rol_s == 'logistica') :  ?>
				<a href="adm/movimientos.php"><li>Movimientos</li></a>
			<?php endif; ?>

			</ul>
		</aside>
		
		<article>

			<div class="zonamenus">
				<div id="menu1" class="zonamenus"><a href="insumos.php"><img src="imagenes/insumos.png"></a></div>
				<div id="menu2" class="zonamenus"><a a href="herramienta.php"><img src="imagenes/herramientas.png"></a></div>
			
			<?php if($rol_s == 'admin') :  ?>
				<div id="menu3" class="zonamenus"><a a href=""><img src="imagenes/datos_tecnicos.png"></a></div>
				<div id="menu4" class="zonamenus"><a a href="adm/movimientos.php"><img src="imagenes/movimientos.png"></a></div>
				<div id="menu5" class="zonamenus"><a a href="adm/usuarios.php"><img src="imagenes/gestion_usuarios.png"></a></div>
			<?php endif; ?>					
			</div>			

		</article>

	</section>


</body>
</html>
