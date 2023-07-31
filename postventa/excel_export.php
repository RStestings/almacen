<?php


 header("Content-Type: application/xls");
 header("Content-Disposition: attachment; filename=Reporte_Entrada_Salida.xls");
 header("Pragma: no-cache");
 header("Expires: 0");

?>

<?php

try {
	//$var_guarda_conexion = new PDO ('tipo:host=ruta;dbname=nombre_basededatos', 'usuario', 'password');
	//echo 'Conexion OK <br/><br/>';
	
	$_POST['buscar_tec'] = isset($_POST['buscar_tec']) ? $_POST['buscar_tec'] : false;

	//Insertar datos
	//$consulta = $conexion -> prepare('INSET INTO usuarios VALUES(null,"Eder")');
	//$consulta -> execute();

    $conexion = new PDO ('mysql: host=localhost; dbname=almacen', 'root', '');
	$consulta_preparada = $conexion -> prepare("SELECT * FROM movimientos_refpostventa");
	$consulta_preparada -> execute();
	$resultado = $consulta_preparada -> fetchAll();	


} catch (PDOException $e) {
	echo "Error: " . $e -> getMessage();
}

?>
    <table>
				<tr>
					<th>ID</th>
					<th>Insumo</th>
					<th>Usuario</th>
					<th>Cantidad</th>
					<th>Proyecto</th>
					<th>Tecnico</th>
					<th>Fecha</th>
					<th>Movimiento</th>
				</tr>

				<?php 
					$fila = isset($fila) ? $fila : false;
						foreach ($resultado as $fila): 
				?>
				<tr>
					<td align="center"><?php echo $fila['id_movimientopostventa']; ?></td>
					<td><?php 
					$id_i = $fila['id_refpostventa']; 

					$consulta_insumo = $conexion -> prepare("SELECT  * FROM refac_postventa WHERE id_refpostventa LIKE '$id_i'");
					$consulta_insumo -> execute();
					$resultado_insumo = $consulta_insumo -> fetchAll();

					foreach ($resultado_insumo as $fila_insumo){
						echo $fila_insumo['desc_refpostventa'];
					}
					?></td>
					<td><?php 
					$id_u = $fila['id_usuario']; 

					$consulta_usuario = $conexion -> prepare("SELECT  * FROM usuarios WHERE id_usuario LIKE '$id_u'");
					$consulta_usuario -> execute();
					$resultado_usuario = $consulta_usuario -> fetchAll();

					foreach ($resultado_usuario as $fila_usuario){
						echo $fila_usuario['login'];
					}
					?>	
					</td>
					<td align="center"><?php echo $fila['cantidad']; ?></td>
					<td><?php echo $fila['proyecto']; ?></td>
					<td><?php echo $fila['tecnico']; ?></td>
					<td align="center"><?php echo $fila['fecha']; ?></td>
					<td><?php echo $fila['tipo_movimiento']; ?></td>
				</tr>

				<?php endforeach; ?>

		</table>