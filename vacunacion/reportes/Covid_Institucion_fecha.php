<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html"; charset=utf-8" />



<title>CONSULTA DE USUARIOS</title>
</head>

<body>
<center><b>MUNICIPIO DE ENVIGADO</b></center>
<center><b>SECRETARIA DE SALUD</b></center>
<center><b>INFORME DE VACUNACION</b></center>


<!----------------------  -->
 <form name="fini" action="Covid_Institucion_fecha_1.php" method="post">
  
  
  
  <?php
  
  session_start();

//echo "htxt_tipo:".$_POST["txt_tipo"];  

require_once('../Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);
  


	  $consulta= "SELECT Nombre_institucion FROM institucion_covid";
			  
  ?>
 <p><strong><p style="color:#FF0000";>NOMBRE INSTITUCION:</strong>
<select input type="text" name="txt_nombre" id="txt_nombre" value="" title="txt_nombre" required>
        <option value="Nombre_institucion LIKE '%'"></option>
          <?php
              $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_error());
			  
              while($linea = mysqli_fetch_array($resultado))
			  { 
		 	echo "<option value=\"".($linea[0])."\">".($linea[0])."</option>\n";
              } 
			  mysqli_free_result ($resultado);
              ?>
        </select>
	<br>
	<br>	
	
	
	
	<p><strong><p style="color:#FF0000";>FECHA PEDIDO:</strong>
  <input type="DATE" name="txt_fecha" id="txt_fecha" size="32" title="txt_fecha" required>
</p>
	
	
	

	
	
	
	
	<br>
	<br>
	<br>
	<br>
	
	
    <input id="destino" name="destino" type="radio" value="pantalla" checked /> Pantalla
    <input id="destino" name="destino" type="radio" value="Excel"/>Excel
    
    <input type="submit" value="Generar" />


</form>


<!----------------------  -->




 <p><a href="/vacunacion/principal.php">principal</a></p>







</body>
</html>
