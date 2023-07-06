<?php 

$rol = '';

include('funciones/funcion_rol.php');

$rol_usuario = rol($rol);


require('views/index.view.php')

?>