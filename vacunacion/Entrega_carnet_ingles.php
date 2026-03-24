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
mysqli_select_db($vacunacion, $database_vacunacion);


$editFormAction = "Actualiza_red_2.php";

$query_Recordset1 = "SELECT * FROM carnet WHERE Codigo='".$_POST["recordID"]."'";
$Recordset1 = mysqli_query($vacunacion, $query_Recordset1) or die(mysql_error());
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<img src="Images\Encabezado.png">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CERTIFICACION SECRETARIA DE SALUD ENVIGADO</title>



</head>
<body>
<!--<p>&nbsp;</p> -->


<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" autocomplete = "off">
    
     <FONT FACE="raro, Ariel" SIZE=5 >
	  
	   
   <div align="center"><strong>CERTIFIES</strong></div>
 </BR>
 </BR>

 

 
 That Mrs.<B> <?php echo ($row_Recordset1['Nombres']); ?> </B>
 </p> 
 Identified with <B> <?php echo ($row_Recordset1['Tipo_id']); ?> </B> number <B><?php echo ($row_Recordset1['Numero_id']); ?></B> of  <B><?php echo ($row_Recordset1['Expedicion_id']); ?></B> 

is not susceptible to vaccination with the biologics of Yellow Fever, SR (Measles and Rubella) since she presents a high risk of adverse effects. 

 </P>

In addition, the Ministry of Health and the laboratory producing the vaccine do not recommend the application to the population over 60 years of age and pregnant women. 

</P>

Expedition date: <B><?php echo ($row_Recordset1['Fecha']); ?> </B>

</BR>

 

Sincerely, 
</P>
 
 
 

 </BR>
 </BR>
 
_________________________________________ 
</br>
<B><?php echo ($row_Recordset1['Persona_expide']); ?></B>
</br>
Public health
</br>
Health Secretary    
</br>
3394000 Ext 4037 
</br>
</FONT>

   
 <img src="Images\Pie_pagina.png">
 
 
 
 <!--
 
  <table align="center">
     
      <tr valign="baseline">
       <td width="188" align="right" nowrap="nowrap"><div align="left"><strong>Fecha:</strong></div></td>
     
      <td><input type="text" name="Fecha" id="Fecha" value="<?php echo ($row_Recordset1['Fecha']); ?>" readOnly="readOnly" size="40" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Fecha"/>
   </tr>
  
<tr valign="baseline">
      <td nowrap="nowrap" align="right"><div align="left"><strong>Tipo Identificacion:</strong></div></td>

          <td><input type="TEXT" id="Tipo_id" name="Tipo_id" value="<?php echo ($row_Recordset1['Tipo_id']); ?>"  readOnly="readOnly" size="40"  title="Tipo_id"/> 
       </td>
    </tr> 

<tr valign="baseline">
      <td nowrap="nowrap" align="right"><div align="left"><strong>Numero Identificacion:</strong></div></td>

          <td><input type="TEXT" id="Numero_id" name="Numero_id" value="<?php echo ($row_Recordset1['Numero_id']); ?>"  readOnly="readOnly" size="40"  title="Numero_id"/> 
       </td>
    </tr> 

<tr valign="baseline">
      <td nowrap="nowrap" align="right"><div align="left"><strong>Expedicion identificacion:</strong></div></td>

          <td><input type="TEXT" id="Expedicion_id" name="Expedicion_id" value="<?php echo ($row_Recordset1['Expedicion_id']); ?>"  readOnly="readOnly" size="40"  title="Expedicion_id"/> 
       </td>
    </tr> 

<tr valign="baseline">
      <td nowrap="nowrap" align="right"><div align="left"><strong>Nombres:</strong></div></td>

          <td><input type="TEXT" id="Nombres" name="Nombres" value="<?php echo ($row_Recordset1['Nombres']); ?>"  readOnly="readOnly" size="40"  title="Nombres"/> 
       </td>
    </tr> 


<tr valign="baseline">
      <td nowrap="nowrap" align="right"><div align="left"><strong>Persona Expide:</strong></div></td>

          <td><input type="TEXT" id="Persona_expide" name="Persona_expide" value="<?php echo ($row_Recordset1['Persona_expide']); ?>"  readOnly="readOnly" size="40"  title="Persona_expide"/> 
       </td>
    </tr> 



	
	<!--
	<tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
    <td><input type="Button" value="ACTUALIZAR REGISTRO" onClick="ok()" />  </td>  </tr>
	

 </TABLE>

-->

   

  <input type="hidden" name="MM_insert" value="form1" />

 <!-- <p><a href="Principal.php">principal</a></p>-->

</form>



</body>
</html>
<?php
//mysql_free_result($Recordset1);
?>

