<?php

session_start();

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);

$updateSQL = 			("UPDATE tbl_lote_covid SET Lote='".$_POST["Lote"]."', 
													Insumo='".$_POST["Insumo"]."',
													Presentacion='".$_POST["Presentacion"]."', 
													Fecha_vencimiento='".$_POST["Fecha_vencimiento"]."', 
													Laboratorio='".$_POST["Laboratorio"]."', 
													Saldo='".$_POST["Saldo"]."', 
													Estado='".$_POST["Estado"]."',
													Observacion='".$_POST["Observacion"]."' WHERE Lote='".$_POST["Lote"]."'");
									
									
									 
									
//echo $updateSQL;

$Result1 = mysqli_query($vacunacion, $updateSQL) or die(mysql_error());

echo "Actualizaci&oacuten exitosa!";

?>

<form id="actualizado" name="actualizado" action="Principal.php" method="post">
	<input type="submit" id="ok" name="ok" value="Volver">
</form>
