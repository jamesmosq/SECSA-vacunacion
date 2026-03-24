<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">




<style type="text/css">
<!--
.Estilo2 {font-size: 18px}
--> 

</style>

<head>
<!--  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />  -->
<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8" />
<title>SECRETARIA DE SALUD</title>

<link rel="stylesheet" href="style.css"/>

</style>
</head>
<?php
session_start();
session_destroy();

require('Connections/vacunacion.php');
mysqli_select_db($vacunacion, $database_vacunacion);
header('Access-Control-Allow-Origin: *'); 

?>


<body>

<!-- <div class="container"></div> -->
<p align="center"><B>MUNICIPIO DE ENVIGADO</B></p>
<p align="center"><B>SECRETAR&IacuteA DE SALUD</B></p>
<p align="center"><B>VACUNACI&OacuteN</B></p>


<p>
  <form name="fini" action="Ingreso.php" method="post">
  
  
   <!-- <img src="Imagen/envigado_fondo.jpg">  -->

  
  <?php
  
  $consulta= ("SELECT DISTINCT tipo FROM usuarios order by tipo asc"); 
	 
  ?>
 Tipo de Usuario:
<select input type="text" name="txt_tipo" id="txt_tipo" value="" title="txt_tipo">
        <option value=""></option>
          <?php
              $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 
			  
              while($linea = mysqli_fetch_array($resultado))
			  { 
		      	echo " <option value=\"".$linea[0]."\">".$linea[0]."</option>\n";
              } 
			  mysqli_free_result ($resultado);
              ?>
        </select>
        <input type="submit" value="Ingresar" />
    </form>

</body>





</html>

