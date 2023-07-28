<?php


function hoy() {
date_default_timezone_set('America/Mexico_City');
$fecha = date('Y-m-d h:i:s');

return $fecha;

}

?>