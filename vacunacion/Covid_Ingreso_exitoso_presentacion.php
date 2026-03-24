<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
session_start();




require_once('Connections/vacunacion.php');
mysqli_select_db($vacunacion, $database_vacunacion);



if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = ("INSERT INTO presentacion_covid (Descripcion)
													VALUES 
  													('".$_POST['Descripcion']."')");
					   
					   
						   
					   
echo "insertSQL:".$insertSQL;


}

$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<p>El registro ya se encuentra insertado</p>
<!--<p><a href="Nuevo.php" target="_blank">pagina principal </a></p>  -->
<p><a href="Principal.php" target="_parent">Principal</a></p>

</body>
</html>
