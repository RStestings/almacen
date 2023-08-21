<?php

/* CONEXION BD ALMACEN */
function fconexion(){
	try {

		$conexion = new PDO ('mysql: host=localhost; dbname=almacen', 'root', '');
		
	} catch (PDOException $e) {
		echo 'Error: ' .$e -> getMessage();	
		die();	
	}

	return $conexion;
}

/* FUNCION PARA OBTENER ID */
function id_s($login){
	
    //conexion a bd
    try {
    
        $conexion = new PDO ('mysql: host=localhost; dbname=almacen', 'root', '');
        $consulta = $conexion -> prepare("SELECT * FROM usuarios WHERE login = '$login' ");
        $consulta -> execute();
        $resultado = $consulta -> fetchAll();
    
        foreach ($resultado as $fila){
            $id = $fila['id_usuario'];	
        }	
        
    } catch (PDOException $e) {
        echo 'Error ' . $e->getMessage();
    }
    
    return $id;
    
}


/* FUNCION PARA OBTENER LA IMAGEN DE USUARIO */
function img($login){
	
    //conexion a bd
    try {
    
        
    
        $conexion = new PDO ('mysql: host=localhost; dbname=almacen', 'root', '');
        $consulta = $conexion -> prepare("SELECT * FROM usuarios WHERE login = '$login' ");
        $consulta -> execute();
        $resultado = $consulta -> fetchAll();
    
        foreach ($resultado as $fila){
            $img = $fila['img_usuario'];	
        }	
        
    } catch (PDOException $e) {
        echo 'Error ' . $e->getMessage();
    }
    
    return $img;
    
}


/* FUNCION PARA OBTENER LOGIN DE SESSION */
function login(){


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

/* FUNCION PARA OBTENER EL NOMBRE DE USUARIO */
function nombre($login){
	
    //conexion a bd
    try {
    
        $conexion = new PDO ('mysql: host=localhost; dbname=almacen', 'root', '');
        $consulta = $conexion -> prepare("SELECT * FROM usuarios WHERE login = '$login' ");
        $consulta -> execute();
        $resultado = $consulta -> fetchAll();
    
        foreach ($resultado as $fila){
            $nombre = $fila['nombre'];	
        }	
        
    } catch (PDOException $e) {
        echo 'Error ' . $e->getMessage();
    }
    
    return $nombre;
    
}

/* FUNCION PARA OBTENER EL ROL DEL USUARIO */
function rol($login){
	
    //conexion a bd
    try {
    
        $conexion = new PDO ('mysql: host=localhost; dbname=almacen', 'root', '');
        $consulta = $conexion -> prepare("SELECT * FROM usuarios WHERE login = '$login' ");
        $consulta -> execute();
        $resultado = $consulta -> fetchAll();
    
        foreach ($resultado as $fila) {
            $idrol = $fila['id_rol'];	
        }
        
        switch ($idrol) {
            case 1:
                 $rol = 'admin';
                break;
    
            case 2:
                $rol = 'almacen';
                break;
            
            case 3:
                $rol = 'usuario';
                break;
    
            case 4:
                $rol = 'postventa';
                break;

            case 5:
                $rol = 'logistica';
                break;
            
            default:
                break;
        }
    
        //echo "Bienvenido: $usuario <br><br><br> Tu usuario es: $rol";
        
    } catch (PDOException $e) {
        echo 'Error ' . $e->getMessage();
    }
    
    return $rol;
}


/* FUNCION HOY PARA HEADER */
function hoy() {
    date_default_timezone_set('America/Mexico_City');
    $fecha = date('d-m-Y');
    
    return $fecha;
    
}

/* FUNCION HOY PARA BD */
function hoy_hora() {
    date_default_timezone_set('America/Mexico_City');
    $fecha = date('Y-m-d h:i:s');
    
    return $fecha; 
}



?>