<?php

include('../funciones/funciones.php');
$login = login();

$rol_s = rol($login);

$nombre_s = nombre($login);

$img_s = img($login);

$hoy = hoy();

$conexion = fconexion();

$id = $_GET['id_usuario'];

try {
    $consulta = $conexion -> prepare("SELECT * FROM usuarios WHERE id_usuario = '$id'");
    $consulta -> execute();
    $resultado = $consulta -> fetchAll();

} catch (PDOException $e) {
    echo "Error" . $e->getMessage();
}

require ("./views/profile_users.view.php");

?>