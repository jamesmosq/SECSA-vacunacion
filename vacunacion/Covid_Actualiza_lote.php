<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<html>
<style type="text/css">
<!--
.Estilo1 {color: #FF0000}
-->
</style>
<body>
<head>
<title>INGRESO DE LOTE COVID</title>
 
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
		
		if (document.getElementById('Saldo').value == "")
		{
			alerta(document.getElementById('Saldo'));
						return false;
		}
	
	document.form1.submit();
	}

	
	
			
</script>
</head>

<?php
session_start();

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);
$editFormAction = "Covid_Actualiza_lote_2.php"; 

$query_Recordset1 = ("SELECT * FROM tbl_lote_covid WHERE Lote='".$_POST["Lote"]."'");
$Recordset1 = mysqli_query($vacunacion, $query_Recordset1) or die(mysql_error());
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$cantReg = $totalRows_Recordset1; // numero de registros que cumplen 1 o 0.. si es 1 actualiza , si es 0 ingresa

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<body>
<p>&nbsp;</p>

<?php
	
	if ($cantReg > 0)
	{
?>

<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" autocomplete="off">
   <P>
   <div align="center"><strong>DATOS DEL USUARIO</strong></div>

  <table align="center">
  
   <tr valign="baseline">
		<td nowrap="nowrap" align="right"><div align="left"><strong>Lote:</strong></div></td>
		<td><input type="text" name="Lote" id="Lote" value="<?php echo ($row_Recordset1['Lote']); ?>" readOnly="readOnly" size="32" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Lote"/>
   </tr>
  
   <tr valign="baseline">
       <td width="188" align="right" nowrap="nowrap"><div align="left"><strong><p style="color:#FF0000";>Insumo:</strong></div></td>
      <td width="208"><select name="Insumo" id="Insumo" value="<?php echo ($row_Recordset1['Insumo']);?>" title="Insumo"/>
						<?php  
							$consulta= ("SELECT * FROM insumo_covid order by Nombre asc");
							$resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
							echo (" <option value=\"".$row_Recordset1['Insumo']."\">".$row_Recordset1['Insumo']."</option>\n");
							while($linea = mysqli_fetch_array($resultado))
							  { 
								echo (" <option value=\"".$linea[1]."\">".$linea[1]."</option>\n");
							  }
								//mysqli_free_result($Recordset1);
						?> 
					</select>      
      </tr>
  
	<tr valign="baseline">
       <td width="188" align="right" nowrap="nowrap"><div align="left"><strong><p style="color:#FF0000";>Presentaci&oacute;n:</strong></div></td>
      <td width="208"><select name="Presentacion" id="Presentacion" value="<?php echo ($row_Recordset1['Presentacion']);?>" title="Presentacion"/>
						<?php  
							$consulta= ("SELECT * FROM presentacion_covid order by Descripcion asc");
							$resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
							echo (" <option value=\"".$row_Recordset1['Presentacion']."\">".$row_Recordset1['Presentacion']."</option>\n");
							while($linea = mysqli_fetch_array($resultado))
							  { 
								echo (" <option value=\"".$linea[1]."\">".$linea[1]."</option>\n");
							  }
								//mysqli_free_result($Recordset1);
						?> 
					</select>      
      </tr>
  
  
  
    <tr valign="baseline">
		<td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Fecha de vencimiento:</strong></div></td>
		<td><input type="date" id="Fecha_vencimiento" name="Fecha_vencimiento" value="<?php echo  ($row_Recordset1['Fecha_vencimiento']); ?>"  size="32" title="Fecha de vencimiento"/> 
    </tr> 
	 
  
  <tr valign="baseline">
       <td width="188" align="right" nowrap="nowrap"><div align="left"><strong><p style="color:#FF0000";>Laboratorio:</strong></div></td>
      <td width="208"><select name="Laboratorio" id="Laboratorio" value="<?php echo ($row_Recordset1['Laboratorio']);?>" title="Laboratorio"/>
						<?php  
							$consulta= ("SELECT * FROM laboratorio_covid order by Nombre asc");
							$resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
							echo (" <option value=\"".$row_Recordset1['Laboratorio']."\">".$row_Recordset1['Laboratorio']."</option>\n");
							while($linea = mysqli_fetch_array($resultado))
							  { 
								echo (" <option value=\"".$linea[1]."\">".$linea[1]."</option>\n");
							  }
								//mysqli_free_result($Recordset1);
						?> 
					</select>      
      </tr>
  
  
  
  	<tr valign="baseline">
					<td nowrap="nowrap" align="right"><div align="left"><strong>Saldo:</strong></div></td>
					<td><input type="int" id="Saldo" name="Saldo" value="<?php echo ($row_Recordset1['Saldo']);?>" readOnly="readOnly" size="32" title="Saldo"/> 
  			</tr> 
  
  
  
   <tr valign="baseline">
       <td width="188" align="right" nowrap="nowrap"><div align="left"><strong><p style="color:#FF0000";>Estado:</strong></div></td>
      <td width="208"><select name="Estado" id="Estado" value="<?php echo ($row_Recordset1['Estado']);?>" title="Estado"/>
      <option <?php if($row_Recordset1['Estado']=="Activo") echo "selected='selected'"; ?> value="Activo">Activo</option>
	  <option <?php if($row_Recordset1['Estado']=="Inactivo") echo "selected='selected'"; ?> value="Inactivo">Inactivo</option>
			
        <option <?php if($row_Recordset1['Estado']=="") echo "selected='selected'"; ?> value=""></option>
      </select>      </td>
         </tr>
	 
  
  
  
  <tr valign="baseline">
					<td nowrap="nowrap" align="right"><div align="left"><strong>Observaciones:</strong></div></td>
					<!--<td> <textarea cols="90" rows="2" maxlength="500" name="Observacion"  id="Observacion" value="<?php echo ($row_Recordset1['Observacion']);?>" title="Observacion" /></textarea>	-->
			
			
			<!--<td><input type="text" id="Observacion" name="Observacion" value="<?php echo  ($row_Recordset1['Observacion']); ?>"  size="32" title="Observacion"/> -->
			
			<td> <textarea cols="90" rows="2" maxlength="400" name="Observacion"  id="Observacion"  title="Observacion"><?php echo ($row_Recordset1['Observacion']);?></textarea>
			</tr>
   
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
    <td><input type="button" value="ACTUALIZAR REGISTRO" onClick="ok()" />    </tr>	

  </table>
<!--  <input	type="button" onclick="calcular_edad('04/29/1975');"> 

<td><input type="submit" value="ACTUALIZAR REGISTRO" onClick="ok()" />    </tr>

-->
  <input type="hidden" name="MM_insert" value="form1" />
  <p><a href="Principal.php">principal</a></p>
</form>

<?php
	include "Covid_Actualiza_lote2.php";
	
	}  // cierra if ($cantReg > 0)
	else
	{
	// INGRESO
   include "Covid_Ingreso_lote_nuevo.php";
   
	}
	
	//include "Actualiza_usuarios_remision2.php";
?>

</body>
</html>
