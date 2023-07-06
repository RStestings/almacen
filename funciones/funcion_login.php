<?php


function login($login_s){


	//inicio session
	session_start();
	//igualar usuario a dato almacenado en variable global $_SESSION['']
	$login_s = $_SESSION['login'];


	//Definicion, si no hay sesion redirige al login
	if(!isset($_SESSION['login'])){
		header('Location: login.php');
	}
	
//conexion a bd

return $login_s;
}

?>