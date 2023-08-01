<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Menu</title>
	<link href="https://fonts.googleapis.com/css2?family=Kalam:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/estilosalm.css" media="">
</head>
<body>

	<header>

		<div id="logo"><img src="../imagenes/rs.png">Rseguridad</div>
		<div id="icono1" class="redes"><a href="./profiles/profile_users.php"><img src="../imagenes/usuarios/<?php if(!empty($img_s)){
			echo $img_s;
		}else{
			echo 'no_usuario.png';
		}
		?>"></a></div>
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
                <li><a href="../index.php">Atras</a></li>
            </ul>
	    </aside>

        <aside id="der">
			
	    </aside>
		
		<article>

        <h2>Datos De Perfil</h2>

            <div class="areaprofile">
                
                    <img src="../imagenes/usuarios/<?php echo $img_s ?>">
            
            <div class="profileformularios">
            <br><br> <br><br> <br><br>
                <form>

                <?php foreach($resultado as $fila): ?>

                    <label>ID:</label>
                <br>    
                    <input type="" name="id_usuario" value="<?php echo $fila['id_usuario'] ?>" <?php if($rol_s != 'admin'){echo'disabled';}?>>
                <br><br> 
                    <label>Nombre:</label>
                <br>
                    <input type="" name="nombre" value="<?php echo $fila['nombre']; ?>">
                <br><br> 
                    <label>Login:</label>
                <br>
                    <input type="" name="login" value="<?php echo $fila['login']; ?>">
                <br><br>

            <?php if ($rol_s == 'admin') : ?>
                <label>Login:</label>
                <br>
                    <input type="" name="contraseña" value="<?php echo $fila['password']; ?>">
                <br><br>
            <?php endif; ?>

                    <label>Rol:</label>
                <br>
                    <input type="" name="rol" value="<?php echo $fila['id_rol']; ?>" <?php if($rol_s != 'admin'){echo'disabled';}?>>
                
                <?php endforeach ?>
                
                <br><br> 
                    <label>Imagen:</label>
                <br>
                    <input type="file" name="">
                </form>
            </div>

            <div class="profilebotones">
                    <br>
                    <a class="button button2" href="#">Guardar</a>
                    <br><br>
                    <a class="button button2" href="#">Editar contraseña</a>
                    <br><br>
                    <a class="button button2" href="#">Salir</a>
            </div>
               
            </div>
		</article>

	</section>

    <footer> 
       &copy; Todos los derechos reservados.
	</footer>


</body>
</html>