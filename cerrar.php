<?php


include('funciones/funciones.php');
$login = login($login_s);

$hoy = hoy();

echo $login .' - ' . $hoy;

/* L O C A L I Z A  U S U A R I O */
include('funciones/funcion_conexion.php');
$conexion = fconexion();

$consulta = $conexion -> prepare("SELECT * FROM usuarios WHERE login = '$login' ");
$consulta -> execute();
$resultado = $consulta -> fetchAll();

foreach ($resultado as $fila) {
	$id = $fila['id_usuario'];
}

/* E S C R I B E  E N  B I T A C O R A  U S U A R I O  Q U E  C I E R R A  S E S I O N */

$consulta_bitacora = $conexion -> prepare ("INSERT INTO bitacora_login VALUES (null, '$id', '$hoy', 'Cerrar Sesion')");
$consulta_bitacora -> execute();


session_destroy();
$_SESSION = array();

header('Location: login.php')

?>