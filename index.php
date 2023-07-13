<?php 

$login_s = '';

include('funciones/funcion_login.php');
$login = login($login_s);

include('funciones/funcion_rol.php');
$rol_s = rol($login);

include('funciones/funcion_nombre_login.php');
$nombre_s = nombre($login);

require('views/index.view.php')

?>