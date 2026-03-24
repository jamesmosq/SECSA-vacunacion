<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html"; charset=utf-8" />



<title>CONSULTA DE USUARIOS</title>
</head>

<body>
<center><b>MUNICIPIO DE ENVIGADO</b></center>
<center><b>SECRETARIA DE SALUD</b></center>
<center><b>INFORME POR PERIODO</b></center>


<!----------------------  -->
 <form name="fini" action="Saldo_1.php" method="post">
  
  
  
  <?php
  
  session_start();

//echo "htxt_tipo:".$_POST["txt_tipo"];  

require_once('../Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);
  


?>

	
<!--

	<p><strong><p style="color:#FF0000";>FECHA PEDIDO INICIAL:</strong>
  <input type="DATE" name="txt_fecha_inicial" id="txt_fecha_inicial" size="32" title="txt_fecha_inicial" required>
</p>
	
	<p><strong><p style="color:#FF0000";>FECHA PEDIDO FINAL:</strong>
  <input type="DATE" name="txt_fecha_final" id="txt_fecha_final" size="32" title="txt_fecha_final" required>
</p>
	
-->
	
	
	
	
	<br>
	<br>
	<br>
	<br>
	
	
	<div class="col-md-4">
<p><strong>Ejemplo usando PHP y MySQL.</strong></p>
<button id="GenerarMysql" class="btn btn-default">Crear PDF MySQL</button>
<br>
</div>

	
	
	
    <input id="destino" name="destino" type="radio" value="pantalla" checked /> Pantalla
    <input id="destino" name="destino" type="radio" value="excel"/>excel
	<input id="destino" name="destino" type="radio" value="pdf"/>pdf
    
    <input type="submit" value="Generar" />


</form>


<!----------------------  -->




 <p><a href="/vacunacion/principal.php">principal</a></p>



</body>
</html>
