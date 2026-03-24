<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<html>
<style type="text/css">
<!--
.Estilo1 {color: #FF0000}
-->
</style>
<body>
<head>

<title>INGRESO DE USUARIOS</title>
 
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
		
		if (document.getElementById('Tipo_id').value == "")
		{
			alerta(document.getElementById('Tipo_id'));
					return false;
		}

		if (document.getElementById('Identificacion').value == "")
		{
			alerta(document.getElementById('Identificacion'));
						return false;
		}
		
		
		if (document.getElementById('Primer_nombre').value == "")
		{
			alerta(document.getElementById('Primer_nombre'));
						return false;
		}
		
		if (document.getElementById('Primer_apellido').value == "")
		{
			alerta(document.getElementById('Primer_apellido'));
						return false;
		}
	
		if (document.getElementById('Direccion_pertenece').value == "")
		{
			alerta(document.getElementById('Direccion_pertenece'));
						return false;
		}
	
					
		
	
	if (document.getElementById('Tipo_contrato').value == "")
		{
			alerta(document.getElementById('Tipo_contrato'));
						return false;
		}
	
	if (document.getElementById('Empresa_contratista').value == "")
		{
			alerta(document.getElementById('Empresa_contratista'));
						return false;
		}
	
	if (document.getElementById('Cargo').value == "")
		{
			alerta(document.getElementById('Cargo'));
						return false;
		}
	
	if (document.getElementById('Sexo').value == "")
		{
			alerta(document.getElementById('Sexo'));
						return false;
		}
		
		if (document.getElementById('Fecha_nacimiento').value == "")
		{
			alerta(document.getElementById('Fecha_nacimiento'));
						return false;
		}
		
		//if (document.getElementById('Telefono').value == "" && document.getElementById('Celular').value == "")
			if (document.getElementById('Telefono').value == "")
		{
			alerta(document.getElementById('Telefono'));
						return false;
		}
		
		if (document.getElementById('Aseguradora').value == "")
		{
			alerta(document.getElementById('Aseguradora'));
						return false;
		}

		if (document.getElementById('Grupo_sanguineo').value == "")
		{
			alerta(document.getElementById('Grupo_sanguineo'));
						return false;
		}
	
	if (document.getElementById('Estado').value == "")
		{
			alerta(document.getElementById('Estado'));
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
$editFormAction = "Actualiza_usuarios_cuentas_aplicativo_2.php"; 


$query_Recordset1 =  ("SELECT Nombre_institucion FROM institucion_covid WHERE Nombre_institucion='".$_POST["Institucion"]."'");
$Recordset1 = mysqli_query($vacunacion, $query_Recordset1) or die(mysql_error());
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$cantReg = $totalRows_Recordset1; // numero de registros que cumplen 1 o 0.. si es 1 actualiza , si es 0 ingresa

//echo $_POST["Institucion"];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<body>
<p>&nbsp;</p>

<?php
	
	if ($cantReg > 0)
	{
?>

<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
   <P>
   <div align="center"><strong>MUNICIPIO DE ENVIGADO</strong></div>


<B><center>
SECRETAR&IacuteA DE SALUD 
<br />
VACUNACI&OacuteN RADICADO PAIWEB</center>


  <table align="center">
    
		       

						
					
				   <tr valign="baseline">
				  <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Nombre de la instituci&oacuten:</strong></div></td>
				  <td><input type="text" name="Institucion" id="Institucion" value="<?php echo utf8_encode($row_Recordset1['Nombre_institucion']); ?>"  readOnly="readOnly" size="32" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="Institucion"/>
					
				</tr>
				
				
				 
	 
	 
	 
	 
	  
     
    
   
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
   <!-- <td><input type="button" value="ACTUALIZAR REGISTRO" onClick="ok()" />    </tr>-->
	

  </table>
<!--  <input	type="button" onclick="calcular_edad('04/29/1975');"> 

<td><input type="submit" value="ACTUALIZAR REGISTRO" onClick="ok()" />    </tr>

-->
  <input type="hidden" name="MM_insert" value="form1" />
  <p><a href="Principal.php">principal</a></p>
</form>

<?php
	include "Covid_Actualiza_institucion_radicado_pai2.php";
	
	}  // cierra if ($cantReg > 0)
	else
	{
	// INGRESO
   include "Ingreso_usuario_nuevo.php";
   
	}
	
	//include "Actualiza_usuarios_remision2.php";
?>

</body>
</html>
