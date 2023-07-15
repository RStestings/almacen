<?php session_start();

if(isset($_SESSION['login'])){
	header('Location: index.php');
}

$errores = '';
$enviado = '';



if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$usuario = filter_var(strtolower($_POST['login']), FILTER_SANITIZE_STRING);
	$password = $_POST['password'];
	$password = hash('sha512', $password);
	
	try {

		$conexion = new PDO('mysql: host=localhost; dbname=almacen', 'root', '');

	} catch (PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}

	$consulta = $conexion -> prepare("SELECT * FROM usuarios WHERE login = :login AND password = :password");
	$consulta -> execute(array(
							':login' => $usuario,
							':password' => $password));
	$resultado = $consulta -> fetch();

	if($resultado !== false) {

		$consulta_u = $conexion -> prepare("SELECT * FROM usuarios WHERE login = '$usuario'");
		$consulta_u -> execute();
		$resultado2 = $consulta_u -> fetchAll();


		date_default_timezone_set('America/Mexico_City');
		$hoy = date('Y-m-d h:i:s');

		foreach ($resultado2 as $fila) {
			$id = $fila['id_usuario'];
		}

		$consulta_bitacora = $conexion -> prepare ("INSERT INTO bitacora_login VALUES (null, '$id', '$hoy', 'Login')");
		$consulta_bitacora -> execute();

		$_SESSION['login'] = $usuario;

		header('Location: index.php');

	} else{
		$errores .= 'Usuario o Contraseña Incorrectos' ;
	}

	

}


require('views\login.view.php');
	
?>