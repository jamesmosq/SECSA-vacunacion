<!-- <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<html>
<style type="text/css">
<!--
.Estilo1 {color: #FF0000}
-->
</style>
<body>
<head>
<script language="javascript" type="application/javascript">



	function alerta(objeto)
	{
		if (objeto.value == "")
		{
			titulo = objeto.title;
			alert('Debe seleccionar o ingresar un valor en ' + titulo);
			objeto.focus();
		}
	}
	
	function ok()
	{
		
		
		if (document.getElementById('Nombre').value == "")
		{
			alerta(document.getElementById('Nombre'));
					return false;
		}

		
			
		document.form1.submit();
	}
	
	
</script>
</head>

<?php
//session_start();


require_once('Connections/vacunacion.php');
mysqli_select_db($vacunacion, $database_vacunacion);



//require_once('Connections/secretaria.php');
//$db_selected = mysqli_select_db($secretaria, $database_secretaria);

$editFormAction = $_SERVER['PHP_SELF'];
 $editFormAction = "Covid_Ingreso_exitoso_insumo.php";
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

//$query_Recordset1 = "SELECT * FROM tbl_usuario";

//$query_Recordset1 =utf8_decode("SELECT * FROM tbl_usuario WHERE Identificacion='".$_POST["Identificacion"]."'");
//$Recordset1 = mysqli_query($secretaria, $query_Recordset1) or die(mysql_error());
//$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
//$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

//echo "$_POST[Identificacion]";


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>INGRESO INSUMO</title>
</head>
<body>
<p>&nbsp;</p>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" autocomplete="off">
   <P>
  <div align="center"><strong>INGRESO INSUMO</strong></div>
 
  <table align="center">
   
     
   
    <tr valign="baseline">
     <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>NOMBRE DEL INSUMO:</strong></div></td>
      <td><input type="text" name="Nombre" id="Nombre" value="" size="50" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Nombre"/> 
    </tr>
   
   
   
     
       
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
    <td><input type="button" value="Ingreso de registro" onClick="ok()" />    </tr>
       
  </table>

  <input type="hidden" name="MM_insert" value="form1" />
</form>
  <p><a href="Principal.php">principal</a></p>

</body>
</html>
<?php
//mysql_free_result($Recordset1);
?>



<!--  --------------------------------------------- -->




<?php

//require_once('Connections/vacunacion.php');
mysqli_select_db($vacunacion, $database_vacunacion);


$query_Recordset1 = "SELECT * FROM insumo_covid";
//$query_Recordset1 = "SELECT * FROM punto_red where Infraestructura='".$_SESSION['punto_red']."'";
//$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysqli_query($vacunacion, $query_Recordset1) or die(mysql_error());
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>

<script language="javascript" type="text/javascript">
	function enviar(indice)
	{
		document.getElementById("recordID").value = indice;
		document.forma1.submit();
	}
</script>
<style type="text/css"> #header { position: fixed; background-color: #ffff00; height: 100px; } #container { margin-top: 100px; } </style> 
</head>

<body>


</B>

  <!--  <href="Principal.php">principal</a></p>  -->


<!-- 
Es para hacer la tabla con desplegables para arriba y los lados  -->
 <div align="center" id="tabla" style="width:90%; height:5000; position:static; overflow:auto">  

 




<form id="forma1" name="forma1" method="POST" action="Actualiza_red.php">
<table border="1" align="center">
  <tr>
				<!--<td colspan="8"><center><B>RED</center></td>-->
				
				
				
	</tr>
  
  
  <tr>
  
   <td><center><B>NOMBRE DEL INSUMO</td>
    
   
	
    	
   </tr>
  <?php do { ?>
    <tr>
 

<!-- <a href="javascript:enviar(<?php echo $row_Recordset1['Id']; ?>)"> <?php echo $row_Recordset1['Id']; ?>&nbsp; </a>  -->
  
      <td><?php echo ($row_Recordset1['Nombre']); ?>&nbsp; </td>
    
    </tr>
    <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
    
  
  
</table>

<!-- cierra DIV -->
</div>   

<!--  <input type="hidden" id="recordID" name="recordID" VALUE="<?php echo $row_Recordset1['Identificacion']; ?>" >  -->

</form>

<?php require_once('Connections/secretaria.php'); ?>
<?php

require_once('Connections/secretaria.php');
$db_selected = mysqli_select_db($secretaria, $database_secretaria);

$query_Recordset1 = "SELECT * FROM insumo_covid ";
//$query_Recordset1 = "SELECT * FROM punto_red where Infraestructura='".$_SESSION['punto_red']."'";
//$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysqli_query($secretaria, $query_Recordset1) or die(mysql_error());
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);

mysqli_free_result($Recordset1);
?>

 <p><a href="Principal.php">principal</a></p>
 

