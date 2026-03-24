<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
session_start();

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);



$updateSQL = ("UPDATE pedido_covid SET 
						Tipo_pedido='".$_POST["Tipo_pedido"]."',
						Radicado_paiweb='".$_POST["Radicado_paiweb"]."' WHERE Id=".$_POST["Id"]);



					
//echo $updateSQL;

$Result1 = mysqli_query($vacunacion, $updateSQL) or die(mysql_error());
echo "Actualizaci&oacuten exitosa!";

?>

<form id="actualizado" name="actualizado" action="Principal.php" method="post">
	<input type="submit" id="ok" name="ok" value="Volver">
</form>
