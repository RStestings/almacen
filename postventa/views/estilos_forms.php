<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Practica Estilos CSS</title>
	<link href="https://fonts.googleapis.com/css2?family=Kalam:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../postventa/css/estilosalm.css" media="">
</head>
<body>

	<header>

		<div id="logo"><img src="imagenes/rs.png">Rseguridad</div>
		<div id="icono1" class="redes"><img src="imagenes/usuarios/<?php //if(!empty($img_s)){
			//echo $img_s;
		//}else{
		//	echo 'no_usuario.png';
		//}
		?>"></div>
		<div id="icono2" class="redes">Almacen</div>
		<div id="iconocerrar" class="redes"><a href="cerrar.php">Salir</a></div>
	</header>
	
	<nav>
		<p>
			<?php //echo $hoy . ' - ' . $nombre_s . " | " .$login; ?>
		</p>		
	</nav>

	<section>
		<aside id="izq">
			<ul>
				<li><a href="buscar.php">Insumos</a></li>
				<li><a href="herramienta.php">Herramienta</a></li>

			<?php //if($rol_s == 'admin') :  ?>
				<li><a href="#">Tecnicos</a></li>
				<li><a href="#">Movimientos</a></li>
				<li><a href="adm/usuarios.php">Usuarios</a></li>
			<?php //endif; ?>

			</ul>
		</aside>
		
		<article>

			<h2>Formularios</h2>

			<div class="formularios">
				Formulario:
				<form>
					<label>Lorem</label><input type="text" name="">
					<br><label>Lorem</label><input type="text" name="">
					<br><label>Lorem</label><input type="text" name="">
					<br><label>Lorem</label><input type="text" name="">
					<br><label>Lorem</label><input type="text" name="">
					<br><label>Lorem</label><input type="text" name="">
					<br><label>Lorem</label><input type="text" name="">
					<br><label>Lorem</label><input type="text" name="">
					<br><label>Lorem</label><input type="text" name="">
					<br><label>Lorem</label><input type="text" name="">
			</div>

			<div class="formcomp">
				Complemento: 
					<br><br><br>
					<label>Lorem</label><input type="text" name="">
					<br><label>Lorem</label><input type="text" name="">
					<br><label>Lorem</label><input type="text" name="">
					<br><label>Lorem</label><input type="text" name="">
					<br><label>Lorem</label><input type="text" name="">
					<br><label>Lorem</label><input type="text" name="">
					<br><label>Lorem</label><input type="text" name="">
				</form>
			</div>

		</article>

	</section>


</body>
</html>
