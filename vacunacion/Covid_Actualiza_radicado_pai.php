<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<html>
<style type="text/css">
<!--
.Estilo1 {color: #FF0000}
-->
</style>
<body>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>INGRESO ATENCION</title>
 
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
		
	//	if (Fedad() < 9 || Fedad() > 19)
	//	{
	//		
	//		alert('Edad incorrecta');
	//	document.getElementById('Fecha_aplicacion').focus();
	//		return false;
	//	}
				
	
	
		document.form1.submit();
	}

	function Fedad(){
	fecha = new Date(document.getElementById('Fecha_nacimiento').value);
	hoy = new Date(document.getElementById('Fecha').value);
	ed = parseInt((hoy -fecha)/365/24/60/60/1000);
	if (isNaN(ed)) return null; else return ed;
}
		
</script>
</head>

<?php
session_start();
require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


$editFormAction = "Covid_Actualiza_radicado_pai_2.php";


//echo "htxt_tipo:".$_POST["Id"]; 
//ECHO "NRO PEDIDO =".$_POST[Id];


$query_Recordset1 =  ("SELECT * FROM pedido_covid WHERE Id='".$_POST["recordID"]."'");
$Recordset1 = mysqli_query($vacunacion, $query_Recordset1) or die(mysql_error());
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$cantReg = $totalRows_Recordset1; // numero de registros que cump

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>INGRESO DE USUARIOS</title>
</head>
<body>
<p>&nbsp;</p>


<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
    
    
   <div align="center"><strong>DATOS GENERALES</strong></div>
 
  <table align="center">
     
      <tr valign="baseline">
       <td width="188" align="right" nowrap="nowrap"><div align="left"><strong>Id:</strong></div></td>
     
      <td><input type="text" name="Id" id="Id" value="<?php echo utf8_encode($row_Recordset1['Id']); ?>" readOnly="readOnly" size="40" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Id"/>
   </tr>
  


  
<tr valign="baseline">
      <td nowrap="nowrap" align="right"><div align="left"><strong>Nro Pedido:</strong></div></td>

          <td><input type="TEXT" id="Nro_pedido" name="Nro_pedido" value="<?php echo utf8_encode($row_Recordset1['Nro_pedido']); ?>"  readOnly="readOnly" size="40"  title="Nro_pedido"/> 
       </td>
    </tr> 

	 
<tr valign="baseline">
					<td width="188" align="right" nowrap="nowrap"><div align="left"><strong><p style="color:#FF0000";>Tipo de pedido:</strong></div></td>
					<td width="208"><select name="Tipo_pedido" title=<?php echo utf8_encode('"Tipo_pedido"') ?> id="Tipo_id" value="<?php echo $row_Recordset1['Tipo_pedido'];?>" />
	  									<option value="<?php echo $row_Recordset1['Tipo_pedido'];?>"selected><?php echo $row_Recordset1['Tipo_pedido'];?></option>
										<option value="Pedido"><?php echo utf8_encode("Pedido");?></option>
										<option value="Traslado"><?php echo utf8_encode("Traslado");?></option>
     								</select> 
					</td>
			</tr>
   






	 <tr valign="baseline">
      <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Radicado_paiweb:</strong></div></td>

          <td><input type="TEXT" id="Radicado_paiweb" name="Radicado_paiweb" value="<?php echo utf8_encode($row_Recordset1['Radicado_paiweb']); ?>" size="40"  title="Radicado_paiweb"/> 
       </td>
    </tr> 

	 
	 
	 
	 
	 
	 
	   
	
	  </TABLE>
	

	  


	
	
	<tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
    <td><input type="Button" value="ACTUALIZAR REGISTRO" onClick="ok()" />  </td>  </tr>
	

 </TABLE>



   

  <input type="hidden" name="MM_insert" value="form1" />

  <p><a href="Principal.php">principal</a></p>

</form>



</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>

