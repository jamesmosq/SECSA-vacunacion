<!--<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />  -->
<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
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
		
	
		if (document.getElementById('Lote').value == "")
		{
			alerta(document.getElementById('Lote'));
					return false;
		}

		if (document.getElementById('Insumo').value == "")
		{
			alerta(document.getElementById('Insumo'));
						return false;
		}
		
		
		if (document.getElementById('Presentacion').value == "")
		{
			alerta(document.getElementById('Presentacion'));
						return false;
		}
		
		
	
	//	if (document.getElementById('Estado').value == "")
	//	{
	//		alerta(document.getElementById('Estado'));
	//					return false;
	//	}
	
	
	
	
	
		
		document.form1.submit();
	}

	
	
</script>
</head>

<?php
//session_start();
require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);

$editFormAction = $_SERVER['PHP_SELF'];
 $editFormAction = "Ingreso_exitoso_lote.php";
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

//$query_Recordset1 = "SELECT * FROM tbl_usuario";

$query_Recordset1 =("SELECT * FROM tbl_lote WHERE Lote='".$_POST["Lote"]."'");
$Recordset1 = mysqli_query($vacunacion, $query_Recordset1) or die(mysql_error());
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

//echo "$_POST[Identificacion]";


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>INGRESO DE LOTE</title>
</head>
<body>
<p>&nbsp;</p>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" autocomplete="off">
   <P>
  <div align="center"><strong>INGRESO DE LOTE</strong></div>
 
  <table align="center">
   
   
        	 <tr valign="baseline">
				<td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Lote:</strong></div></td>
				<td><input type="text" name="Lote" id="Lote" value= <?php echo "$_POST[Lote]" ?>  readOnly="readOnly" size="32" title="Lote"/>  
			 </tr>
	
			<tr valign="baseline">
				<td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Insumo:</strong></div></td>
				<td><select input type="text" name="Insumo" id="Insumo" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Insumo"> 
						<?php  
							$consulta= ("SELECT * FROM insumo order by Nombre asc");
							$resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
							echo (" <option value=\"".$row_Recordset1['Insumo']."\">".$row_Recordset1['Insumo']."</option>\n");
							while($linea = mysqli_fetch_array($resultado))
							{ 
								echo ( " <option value=\"".$linea[1]."\">".$linea[1]."</option>\n");
							} 
						?> 
					</select> 
			</tr>
   
			<tr valign="baseline">
				<td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Presentaci&oacute;n:</strong></div></td>
				<td><select input type="text" name="Presentacion" id="Presentacion" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Presentacion"> 
						<?php  
							$consulta= ("SELECT * FROM presentacion order by Descripcion asc");
							$resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
							echo (" <option value=\"".$row_Recordset1['Presentacion']."\">".$row_Recordset1['Presentacion']."</option>\n");
							while($linea = mysqli_fetch_array($resultado))
							{ 
								echo (" <option value=\"".$linea[1]."\">".$linea[1]."</option>\n");
							} 
						?> 
					</select> 
			</tr>
   
   
   
			<tr valign="baseline">
					<td nowrap="nowrap" align="right"><div align="left"><strong>Fecha de vencimiento:</strong></div></td>
					<td><input type="date" id="Fecha_vencimiento" name="Fecha_vencimiento" value="" size="32" title="Fecha de vencimiento"/> 
  			</tr> 
			
			
   
			<tr valign="baseline">
				<td nowrap="nowrap" align="right"><div align="left"><strong>Laboratorio:</strong></div></td>
				<td><select input type="text" name="Laboratorio" id="Laboratorio" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Laboratorio"> 
						<?php  
							$consulta= utf8_decode("SELECT * FROM Laboratorio order by Nombre asc");
							$resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
							echo (" <option value=\"".$row_Recordset1['Laboratorio']."\">".$row_Recordset1['Laboratorio']."</option>\n");
							while($linea = mysqli_fetch_array($resultado))
							{ 
								echo (" <option value=\"".$linea[1]."\">".$linea[1]."</option>\n");
							} 
						?> 
					</select> 
			</tr>
   
   
			<tr valign="baseline">
					<td nowrap="nowrap" align="right"><div align="left"><strong>Saldo:</strong></div></td>
					<td><input type="int" id="Saldo" name="Saldo" value="0"  readOnly="readOnly" size="32" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Saldo"/> 
  			</tr> 
   
   
			<tr valign="baseline">
					<td width="188" align="right" nowrap="nowrap"><div align="left"><strong><p style="color:#FF0000";>Estado:</strong></div></td>
					<td width="208"><select name="Estado" title=<?php echo ('"Estado"') ?> id="Tipo_id" value="<?php echo $row_Recordset1['Estado'];?>" />
	  									<option value=""selected></option>
										<option value="Activo"><?php echo ("Activo");?></option>
										<option value="Inactivo"><?php echo ("Inactivo");?></option>
     								</select> 
					</td>
			</tr>
   
  
			
   
   
			<tr valign="baseline">
					<td nowrap="nowrap" align="right"><div align="left"><strong>Observaciones:</strong></div></td>
					<td> <textarea cols="90" rows="2" maxlength="500" name="Observacion"  id="Observacion"  style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Observacion" /></textarea>	
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
