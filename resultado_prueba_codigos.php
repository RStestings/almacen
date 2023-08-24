<?php
include_once "./funciones/funciones.php";

$conexion = fconexion();

    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $cat = isset($_POST['Categoria']) ? $_POST['Categoria'] : false;
    $i = 0;

// QUERY BUSQUEDA
if(empty($resultado)){
    echo 'Resultado vacio';
}
if(empty($_POST['ok'])){

    $consulta = $conexion -> prepare("SELECT * FROM insumos WHERE id_cate LIKE '$cat'");
    $consulta -> execute();
    $resultado = $consulta -> fetchAll();

        echo 'Bienvenido '.$nombre;
        echo "
            <br>
            <br> Resultado de la Busqueda:
            <br>
            ";

        foreach($resultado as $fila){
            $i++;

            echo $i .' - '. $fila['desc_insumo'].'<br>';
    }
   
}




?>