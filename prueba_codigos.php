

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        
        <input type="text" name="nombre" placeholder="Nombre:">
        
        <select name="Categoria" id="cat">
            
            <?php 
            
            $conexion = new PDO("mysql: host='localhos'; dbname=almacen", 'root', '');
            $consulta = $conexion -> prepare("SELECT * FROM cate_insumo");
            $consulta -> execute();
            $resultado = $consulta -> fetchAll();

            foreach($resultado as $fila): ?>
            <option value="<?php echo $fila['id_cate']; ?>"><?php echo $fila['desc_cat']; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" name="Buscar" value="Buscar">
    </form>

   
    
</body>
</html>

<?php 

require "./resultado_prueba_codigos.php";

?>