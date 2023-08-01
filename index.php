<?php 

include('funciones/funciones.php');
$login = login();

$id_s = id_s($login);

$rol_s = rol($login);

$nombre_s = nombre($login);

$img_s = img($login);

$hoy = hoy();

if($rol_s == 'postventa'){
    header("Location: ./postventa/index.php");
}

require('views/index.view.php')

?>