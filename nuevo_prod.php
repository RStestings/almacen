<?php

$errores = '';
$enviado = '';

require('nuevo_prod.view.php');


if (isset($_POST['ok'])){
	$nom_prod = $_POST['nom_prod'];
	$desc_prod = $_POST['desc_prod'];
	$cant_prod = $_POST['cant_prod'];
	$stock_prod = $_POST['stock_prod'];
	$unidad_prod = $_POST['unidad_prod'];

	if(!empty($nom_prod)){
		$nom_prod = trim($nom_prod);
		$nom_prod = filter_var($nom_prod, FILTER_SANITIZE_STRING);
	}else{
		echo 'Ingrese un nombre <br/>';
	}

	if(!empty($desc_prod)){
		$desc_prod = trim($desc_prod);
		$desc_prod = filter_var($desc_prod, FILTER_SANITIZE_STRING);
	}else{
		echo 'Ingrese una descripcion <br/>';
	}

	if(!empty($cant_prod)){
		$cant_prod = trim($cant_prod);

		if(!filter_var($cant_prod, FILTER_VALIDATE_INT)){
			echo "La cantidad no es un numero valido <br/>";
		}else{}

	}else{
		echo "La cantidad no puede ser \"0\"<br/>";
	}

	if(!empty($unidad_prod)){
		$unidad_prod = trim($unidad_prod);
		$unidad_prod = filter_var($unidad_prod, FILTER_SANITIZE_STRING);

	}else{
		echo "Ingrese una unidad (PZ, KIT, L, etc..)<br/>";
	}

	if (!empty($stock_prod)){
		$stock_prod = trim($stock_prod);

		if(!filter_var($stock_prod, FILTER_VALIDATE_INT)){
			echo "El numero cantidad de Stock no es valido ";
		}else{}

	}else{
		echo "La cantidad en Stock no puede ser \"0\"";
	}

}


?>