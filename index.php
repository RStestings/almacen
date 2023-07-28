<?php 

include('funciones/funcion_login.php');
$login = login();

include('funciones/funcion_rol.php');
$rol_s = rol($login);

include('funciones/funcion_nombre_login.php');
$nombre_s = nombre($login);

include('funciones/funcion_img_login.php');
$img_s = img($login);

include('funciones/funcion_hoy.php');
$hoy = hoy();

if($rol_s == 'postventa'){
    header("Location: ./postventa/index.php");
}

require('views/index.view.php')

?>