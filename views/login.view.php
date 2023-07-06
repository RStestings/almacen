<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="cssdos/estilos.css">
</head>
<body>
	
	<div class="contenedor">
		<h1 class="titulo">Iniciar Sesion</h1>
		<hr class="border">
	
	

	<br>
	<br>
	
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="formulario">

		<table>
			<tr>
				<td>Usuario: </td>
				<td><input type="text" class="usuario"  name="login" placeholder="Usuario:" value="<?php if(!$enviado && isset($usuario)) echo $usuario; ?>"></td>
			</tr>

			<tr>
				<td>Contraseña: </td>
				<td><input type="password" class="password"  name="password" placeholder="Password:" value=""><input class="button button1" type="submit" name="ok" value=">">

				</td>
			</tr>

		</table>


		<?php if(!empty($errores)): ?>
				<div class="textoerror">
					<?php echo '<br>'.$errores; ?>
				</div>
		<?php elseif($enviado): ?>
				<div class="alert success">
					<p>Enviado Correctamente</p>
				</div>
		<?php endif ?>

	</form>

	<p class="texto-registrate"><a href="">Registrarse</a></p>
	
		
	</div>

</body>
</html>