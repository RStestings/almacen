<?php 

$login_s = '';

include('funciones/funcion_login.php');
$login = login($login_s);

include('funciones/funcion_rol.php');
$rol_s = rol($login);


require('views/index.view.php')

?>