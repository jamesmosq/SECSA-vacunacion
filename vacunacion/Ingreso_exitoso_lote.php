<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
session_start();


require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);





  $insertSQL = ("INSERT INTO tbl_lote (Lote, 
													Insumo, 
													Presentacion, 
													Fecha_vencimiento, 
													Laboratorio, 
													Saldo, 
													Estado,
													Observacion)
										VALUES                  
												('".$_POST['Lote']."',
												'".$_POST['Insumo']."',
												'".$_POST['Presentacion']."',
												'".$_POST['Fecha_vencimiento']."',
												'".$_POST['Laboratorio']."',
												'".$_POST['Saldo']."',
												'".$_POST['Estado']."',
												'".$_POST['Observacion']."')");
					   
					   
					   
					   
					   
					   
					   
					   
					   
//echo "insertSQL:".$insertSQL;



$Result1 = mysqli_query($vacunacion, $insertSQL) or die('La consulta fall&oacute;: ' . mysqli_errno());
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

