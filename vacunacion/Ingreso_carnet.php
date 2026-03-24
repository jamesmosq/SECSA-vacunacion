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
		
		 if (document.getElementById('Fecha').value == "")
		{
			alerta(document.getElementById('Fecha'));
					return false;
		}

		
		if (document.getElementById('Tipo_id').value == "")
		{
			alerta(document.getElementById('Tipo_id'));
					return false;
		}
	
		if (document.getElementById('Numero_id').value == "")
		{
			alerta(document.getElementById('Numero_id'));
					return false;
		}
	
	if (document.getElementById('Expedicion_id').value == "")
		{
			alerta(document.getElementById('Expedicion_id'));
					return false;
		}
	
	if (document.getElementById('Nombres').value == "")
		{
			alerta(document.getElementById('Nombres'));
					return false;
		}
	
	if (document.getElementById('Persona_expide').value == "")
		{
			alerta(document.getElementById('Persona_expide'));
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




$editFormAction = $_SERVER['PHP_SELF'];
 $editFormAction = "Ingreso_exitoso_carnet.php";
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
<title>INGRESO CARNET</title>
</head>
<body>
<p>&nbsp;</p>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" autocomplete="off">
   <P>
  <div align="center"><strong>INGRESO CARNET</strong></div>
 
  <table align="center">
   
 <!--   <tr valign="baseline">
     <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>CODIGO:</strong></div></td>
      <td><input type="text" name="Codigo" id="Codigo" value="" size="50" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Codigo"/> 
    </tr>


-->
   
    <tr valign="baseline">
     <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>FECHA:</strong></div></td>
      <td><input type="date" name="Fecha" id="Fecha" value="" size="32" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Fecha"/> 
    </tr>
   
      
   
   
   
   
    <tr valign="baseline">
       <td width="188" align="right" nowrap="nowrap"><div align="left"><strong><p style="color:#FF0000";>TIPO IDENTIFICACION:</strong></div></td>
      <td width="208"><select name="Tipo_id" title=<?php echo ('"Tipo_id"') ?> id="Tipo_id" value="<?php echo utf8_decode($row_Recordset1['Tipo_id']);?>" />
	  
	  <Option value="" selected></option>
      <option value="Registro civil"><?php echo ("Registro civil");?></option>
      <option value="Tarjeta de identidad"><?php echo "Tarjeta de identidad";?></option>
	  <option value="Cedula de ciudadanía"><?php echo "Cedula de ciudadanía";?></option>
	  <option value="Cedula de extranjería"><?php echo "Cedula de extranjería";?></option>
	  <option value="Carnet diplomatico"><?php echo "Carnet diplomatico";?></option>
	  <option value="Adulto sin identificación"><?php echo "Adulto sin identificación";?></option>
	  <option value="Menor sin identificación"><?php echo "Menor sin identificación";?></option>
	  <option value="Salvoconducto"><?php echo "Salvoconducto";?></option>
	  <option value="Permisos especial de permanencia"><?php echo "Permisos especial de permanencia";?></option>
	  <option value="Permiso por protección temporal"><?php echo "Permiso por protección temporal";?></option>
	  <option value="Pasaporte"><?php echo "Pasaporte";?></option>

	  
	 			 
      </select> 
	</td>
 </tr>
   
   
   
   
    <tr valign="baseline">
     <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>NUMERO IDENTIFICACION:</strong></div></td>
      <td><input type="text" name="Numero_id" id="Numero_id" value="" size="50" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Numero_id"/> 
    </tr>
   
   
    <tr valign="baseline">
     <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>LUGAR EXPEDICION DEL DOCUMENTO:</strong></div></td>
      <td><input type="text" name="Expedicion_id" id="Expedicion_id" value="" size="50" title="Expedicion_id"/> 
    </tr>
   
   
   
   
   
    <tr valign="baseline">
     <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>NOMBRES DEL SOLICITANTE:</strong></div></td>
      <td><input type="text" name="Nombres" id="Nombres" value="" size="50" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Nombres"/> 
    </tr>
   
   
   
   
   
  <tr valign="baseline">
       <td width="188" align="right" nowrap="nowrap"><div align="left"><strong><p style="color:#FF0000";>PERSONA QUE EXPIDE EL CERTIFICADO:</strong></div></td>
      <td width="208"><select name="Persona_expide" title=<?php echo ('"Persona_expide"') ?> id="Persona_expide" value="<?php echo $row_Recordset1['Persona_expide'];?>" />
	  
	  <option value=""selected></option>
      	<option value="ANGELA MARIA ARROYAVE TORRES"><?php echo ("ANGELA MARIA ARROYAVE TORRES");?></option>
      	<option value="ISABEL CRISTINA RESTREPO ZULUAGA"><?php echo ("ISABEL CRISTINA RESTREPO ZULUAGA");?></option>
	<option value="OSCAR ALONSO ARTEAGA ESTRADA"><?php echo ("OSCAR ALONSO ARTEAGA ESTRADA");?></option>
	<option value="LORENA SANCHEZ DIOSA"><?php echo ("LORENA SANCHEZ DIOSA");?></option>
	<option value="CESAR CAMILO MESA VELEZ"><?php echo ("CESAR CAMILO MESA VELEZ");?></option>
	<option value="SANDRA JANNETH OSPINA OROZCO"><?php echo ("SANDRA JANNETH OSPINA OROZCO");?></option>
	
	 			 
	 			 
      </select> 
	</td>
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


$query_Recordset1 = "SELECT * FROM carnet order by Codigo desc";
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

 




<form id="forma1" name="forma1" method="POST" action="Entrega_carnet.php">
<table border="1" align="center">
  <tr>
				<!--<td colspan="8"><center><B>RED</center></td>-->
				
				
				
	</tr>
  
  
  <tr>
  <td><center><B>CODIGO</td>
  <td><center><B>FECHA</td>
  <td><center><B>TIPO IDENTIFICACION</td>
  <td><center><B>NUMERO IDENTIFICACION</td>
  <td><center><B>EXPEDICION IDENTIFICACION</td>
  <td><center><B>NOMBRES</td>
  <td><center><B>PERSONA QUE EXPIDE</td>
  
   
	
    	
   </tr>
  <?php do { ?>
    <tr>
 

<!-- <a href="javascript:enviar(<?php echo $row_Recordset1['Codigo']; ?>)"> <?php echo $row_Recordset1['Codigo']; ?>&nbsp; </a> -->

       
      
    <td><a href="javascript:enviar(<?php echo $row_Recordset1['Codigo']; ?>)"> <?php echo ($row_Recordset1['Codigo']); ?>&nbsp; </td>  
      <td><?php echo ($row_Recordset1['Fecha']); ?>&nbsp; </td>
	  <td><?php echo ($row_Recordset1['Tipo_id']); ?>&nbsp; </td>
	  <td><?php echo ($row_Recordset1['Numero_id']); ?>&nbsp; </td>
	  <td><?php echo ($row_Recordset1['Expedicion_id']); ?>&nbsp; </td>
	  <td><?php echo ($row_Recordset1['Nombres']); ?>&nbsp; </td>
	  <td><?php echo ($row_Recordset1['Persona_expide']); ?>&nbsp; </td>
	      
    </tr>
    <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
    
  
  
</table>

<!-- cierra DIV -->
</div>   

 <input type="hidden" id="recordID" name="recordID" VALUE="<?php echo $row_Recordset1['Codigo']; ?>" >  

</form>

<?php require_once('Connections/vacunacion.php'); ?>
<?php

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);

$query_Recordset1 = "SELECT * FROM carnet ";
//$query_Recordset1 = "SELECT * FROM punto_red where Infraestructura='".$_SESSION['punto_red']."'";
//$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
//$Recordset1 = mysqli_query($secretaria, $query_Recordset1) or die(mysql_error());
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);

mysqli_free_result($Recordset1);
?>

 <p><a href="Principal.php">principal</a></p>
 
