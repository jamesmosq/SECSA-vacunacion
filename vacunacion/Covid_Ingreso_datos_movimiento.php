<!--   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />  -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<html>
<style type="text/css">
<!--
.Estilo1 {color: #FF0000}
.Estilo2 {font-weight: bold}
-->
</style>
<body>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
		if (document.getElementById('Fecha_movimiento').value == "")
		{
			alerta(document.getElementById('Fecha_movimiento'));
					return false;
		}

	if (document.getElementById('Temperatura').value == "")
		{
			alerta(document.getElementById('Temperatura'));
					return false;
		}



// Validacion par que los ingresos y las salidas no esten en blanco ""


		if (document.getElementById('MODERNA_Ingreso').value == "")
		{
			alerta(document.getElementById('MODERNA_Ingreso'));
					return false;
		}
	
		if (document.getElementById('MODERNA_Salida').value == "")
		{
			alerta(document.getElementById('MODERNA_Salida'));
					return false;
		}

		if (document.getElementById('PFIZER_Ingreso').value == "")
		{
			alerta(document.getElementById('PFIZER_Ingreso'));
					return false;
		}
	
		if (document.getElementById('PFIZER_Salida').value == "")
		{
			alerta(document.getElementById('PFIZER_Salida'));
					return false;
		}


		if (document.getElementById('ASTRAZENECA_Ingreso').value == "")
		{
			alerta(document.getElementById('ASTRAZENECA_Ingreso'));
					return false;
		}
	
		if (document.getElementById('ASTRAZENECA_Salida').value == "")
		{
			alerta(document.getElementById('ASTRAZENECA_Salida'));
					return false;
		}


		if (document.getElementById('CARNE_Ingreso').value == "")
		{
			alerta(document.getElementById('CARNE_Ingreso'));
					return false;
		}
	
		if (document.getElementById('CARNE_Salida').value == "")
		{
			alerta(document.getElementById('CARNE_Salida'));
					return false;
		}


		if (document.getElementById('DILUYENTE_Ingreso').value == "")
		{
			alerta(document.getElementById('DILUYENTE_Ingreso'));
					return false;
		}
	
		if (document.getElementById('DILUYENTE_Salida').value == "")
		{
			alerta(document.getElementById('DILUYENTE_Salida'));
					return false;
		}


		if (document.getElementById('JANSSEN_Ingreso').value == "")
		{
			alerta(document.getElementById('JANSSEN_Ingreso'));
					return false;
		}
	
		if (document.getElementById('JANSSEN_Salida').value == "")
		{
			alerta(document.getElementById('JANSSEN_Salida'));
					return false;
		}


		if (document.getElementById('JERINGA22_Ingreso').value == "")
		{
			alerta(document.getElementById('JERINGA22_Ingreso'));
					return false;
		}
	
		if (document.getElementById('JERINGA22_Salida').value == "")
		{
			alerta(document.getElementById('JERINGA22_Salida'));
					return false;
		}


		if (document.getElementById('JERINGA23_Ingreso').value == "")
		{
			alerta(document.getElementById('JERINGA23_Ingreso'));
					return false;
		}
	
		if (document.getElementById('JERINGA23_Salida').value == "")
		{
			alerta(document.getElementById('JERINGA23_Salida'));
					return false;
		}


		if (document.getElementById('MODERNA_BIVALENTE_Ingreso').value == "")
		{
			alerta(document.getElementById('MODERNA_BIVALENTE_Ingreso'));
					return false;
		}
	
		if (document.getElementById('MODERNA_BIVALENTE_Salida').value == "")
		{
			alerta(document.getElementById('MODERNA_BIVALENTE_Salida'));
					return false;
		}

		if (document.getElementById('MODERNA_PEDIATRICA_Ingreso').value == "")
		{
			alerta(document.getElementById('MODERNA_PEDIATRICA_Ingreso'));
					return false;
		}
	
		if (document.getElementById('MODERNA_PEDIATRICA_Salida').value == "")
		{
			alerta(document.getElementById('MODERNA_PEDIATRICA_Salida'));
					return false;
		}

		if (document.getElementById('SINOVAC_Ingreso').value == "")
		{
			alerta(document.getElementById('SINOVAC_Ingreso'));
					return false;
		}
		
		if (document.getElementById('SINOVAC_Salida').value == "")
		{
			alerta(document.getElementById('SINOVAC_Salida'));
					return false;
		}
		
		if (document.getElementById('MODERNA_XBB_1_5_Ingreso').value == "")
		{
			alerta(document.getElementById('MODERNA_XBB_1_5_Ingreso'));
					return false;
		}
		
		if (document.getElementById('MODERNA_XBB_1_5_Salida').value == "")
		{
			alerta(document.getElementById('MODERNA_XBB_1_5_Salida'));
					return false;
		}
		
		



//  Termina Validacion par que los ingresos y las salidas no esten en blanco ""

				
		vsumaMODERNA = parseInt(document.getElementById('MODERNA_Ingreso').value) + parseInt(document.getElementById('MODERNA_Salida').value);
		
							
		if  ((document.getElementById('MODERNA_lote').value == "") && vsumaMODERNA > 0)
		{
			alerta(document.getElementById('MODERNA_lote'));
					return false;
		}

		
		
		vsumaPFIZER = parseInt(document.getElementById('PFIZER_Ingreso').value) + parseInt(document.getElementById('PFIZER_Salida').value);
							
		if  ((document.getElementById('PFIZER_lote').value == "") && vsumaPFIZER > 0)
		{
			alerta(document.getElementById('PFIZER_lote'));
					return false;
		}
		
		

		vsumaASTRAZENECA = parseInt(document.getElementById('ASTRAZENECA_Ingreso').value) + parseInt(document.getElementById('ASTRAZENECA_Salida').value);
							
		if  ((document.getElementById('ASTRAZENECA_lote').value == "") && vsumaASTRAZENECA > 0)
		{
			alerta(document.getElementById('ASTRAZENECA_lote'));
					return false;
		}

		vsumaCARNE = parseInt(document.getElementById('CARNE_Ingreso').value) + parseInt(document.getElementById('CARNE_Salida').value);
							
		if  ((document.getElementById('CARNE_lote').value == "") && vsumaCARNE > 0)
		{
			alerta(document.getElementById('CARNE_lote'));
					return false;
		}


		vsumaDILUYENTE = parseInt(document.getElementById('DILUYENTE_Ingreso').value) + parseInt(document.getElementById('DILUYENTE_Salida').value);
							
		if  ((document.getElementById('DILUYENTE_lote').value == "") && vsumaDILUYENTE > 0)
		{
			alerta(document.getElementById('DILUYENTE_lote'));
					return false;
		}



		vsumaJANSSEN = parseInt(document.getElementById('JANSSEN_Ingreso').value) + parseInt(document.getElementById('JANSSEN_Salida').value);
							
		if  ((document.getElementById('JANSSEN_lote').value == "") && vsumaJANSSEN > 0)
		{
			alerta(document.getElementById('JANSSEN_lote'));
					return false;
		}
		

		vsumaJERINGA22 = parseInt(document.getElementById('JERINGA22_Ingreso').value) + parseInt(document.getElementById('JERINGA22_Salida').value);
							
		if  ((document.getElementById('JERINGA22_lote').value == "") && vsumaJERINGA22 > 0)
		{
			alerta(document.getElementById('JERINGA22_lote'));
					return false;
		}
		
		

		vsumaJERINGA23 = parseInt(document.getElementById('JERINGA23_Ingreso').value) + parseInt(document.getElementById('JERINGA23_Salida').value);
							
		if  ((document.getElementById('JERINGA23_lote').value == "") && vsumaJERINGA23 > 0)
		{
			alerta(document.getElementById('JERINGA23_lote'));
					return false;
		}



		vsumaMODERNA_BIVALENTE = parseInt(document.getElementById('MODERNA_BIVALENTE_Ingreso').value) + parseInt(document.getElementById('MODERNA_BIVALENTE_Salida').value);
							
		if  ((document.getElementById('MODERNA_BIVALENTE_lote').value == "") && vsumaMODERNA_BIVALENTE > 0)
		{
			alerta(document.getElementById('MODERNA_BIVALENTE_lote'));
					return false;
		}

		vsumaMODERNA_PEDIATRICA = parseInt(document.getElementById('MODERNA_PEDIATRICA_Ingreso').value) + parseInt(document.getElementById('MODERNA_PEDIATRICA_Salida').value);
							
		if  ((document.getElementById('MODERNA_PEDIATRICA_lote').value == "") && vsumaMODERNA_PEDIATRICA > 0)
		{
			alerta(document.getElementById('MODERNA_PEDIATRICA_lote'));
					return false;
		}

		vsumaSINOVAC = parseInt(document.getElementById('SINOVAC_Ingreso').value) + parseInt(document.getElementById('SINOVAC_Salida').value);
					
		if  ((document.getElementById('SINOVAC_lote').value == "") && vsumaSINOVAC > 0)
		{
			alerta(document.getElementById('SINOVAC_lote'));
					return false;
		}	
	
		
		
		vsumaMODERNA_XBB_1_5 = parseInt(document.getElementById('MODERNA_XBB_1_5_Ingreso').value) + parseInt(document.getElementById('MODERNA_XBB_1_5_Salida').value);
					
		if  ((document.getElementById('MODERNA_XBB_1_5_lote').value == "") && vsumaMODERNA_XBB_1_5 > 0)
		{
			alerta(document.getElementById('MODERNA_XBB_1_5_lote'));
					return false;
		}	
		
		
		
	
		document.form1.submit();
	}
	
	function validar()
	{

		if (document.getElementById('Identificacion').value == "")
		{
			alerta(document.getElementById('Identificaci?n no puede ser vac?a'));
					return false;
		}
		document.form1.submit();
	}

// function Fedad(){
//	fecha = new Date(document.getElementById('Fecha_nacimiento').value);
//	hoy = new Date(document.getElementById('Fecha').value);
//	ed = parseInt((hoy -fecha)/365/24/60/60/1000);
//	if (isNaN(ed)) return null; else return ed;
// }
		
		
</script>
</head>

<?php
//session_start();
require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);
$editFormAction = "Covid_Ingreso_exitoso_datos_movimiento.php"; 



if(empty($_POST["Institucion"])) 
	$Institucion = $_GET["vid"];
else
	$Institucion = $_POST["Institucion"];


//$query_Recordset1 = ("SELECT * FROM movimiento WHERE Institucion='".$cbo_institucion."'");
$query_Recordset1 = ("SELECT Nombre_institucion FROM institucion_covid WHERE Nombre_institucion='".$Institucion."'");
$Recordset1 = mysqli_query($vacunacion, $query_Recordset1) or die(mysql_error());
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

//ECHO "<br> NUMERO DE institucion:".$Institucion

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>INGRESO MOVIMIENTO VACUNACION</title>
</head>
<body>
<p>&nbsp;</p>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
   <P>
  <div align="center"><strong>MOVIMIENTO VACUNACION</strong></div>
 
  <table align="center">
       	<tr valign="baseline">
			<td nowrap="nowrap" align="right"><div align="left"><strong>Institucion:</strong></div></td>
			  <td><input type="text" name="Institucion" id="Institucion" value="<?php echo ($row_Recordset1['Nombre_institucion']); ?>" readOnly="readOnly" size="32" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Institucion"/>
		   </tr>
					  
			<tr valign="baseline">
				<td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Fecha de movimiento:</strong></div></td>
				<td><input type="date" name="Fecha_movimiento" id="Fecha_movimiento" value="" size="32" title="Fecha_movimiento"/></td>
			</tr>	   
			   
			 <tr valign="baseline">
				<td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>Temperatura:</strong></div></td>
				<td><input type="text" name="Temperatura" id="Temperatura" value="" size="32" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Temperatura"/>
		   </tr>
			   
			   
			  
		<!-- Consulta para hacer el consecutivo para el numero de pedido -->
			 <?php  
				$consulta= ("SELECT * FROM pedido_covid"); 
				$resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
				$numero = mysqli_num_rows($resultado);
			 ?> 
		  
			<tr valign="baseline">
				<td nowrap="nowrap" align="right"><div align="left"><strong>Numero pedido:</strong></div></td>
				<td><input type="int" name="Nro_pedido" id="Nro_pedido" value="<?php echo ($numero+1); ?>" readOnly="readOnly" size="32" title="Nro_pedido"/></td>
			</tr>	   
			   
	 </table>


<!-------------------------------------------------------------------------MODERNA ------------------------------------------------------->

   <table>
   
   <tr valign="baseline">
   <td nowrap="nowrap" align="right"><div align="center"><strong>Biológico</strong></div></td>
   <td nowrap="nowrap" align="right"><div align="center"><strong>Lote</strong></div></td>
   <td nowrap="nowrap" align="right"><div align="center"><strong>Ingreso a cava</strong></div></td>
    <td nowrap="nowrap" align="right"><div align="center"><strong>Asignación a IPS</strong></div></td>
	<!--<td nowrap="nowrap" align="right"><div align="center"><strong>Tipo Id</strong></div></td>
	<td nowrap="nowrap" align="right"><div align="center"><strong>Identificación:</strong></div></td>
	<td nowrap="nowrap" align="right"><div align="center"><strong>Nombres y apellidos:</strong></div></td> -->
	
    </tr>	
   
	 <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>MODERNA:</strong></div></td>
		<td><select input type="text" name="MODERNA_lote" id="MODERNA_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="MODERNA_lote"> 
		<?php  
		
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote, saldo FROM `tbl_lote_covid` WHERE insumo='MODERNA' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['MODERNA_lote']."\">".$row_Recordset1['MODERNA_lote']."</option>\n";   
			 			      
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
			 }
	 
		  ?> 
      </select> 

 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="MODERNA_Ingreso" id="MODERNA_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="MODERNA_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="MODERNA_Salida" id="MODERNA_Salida" value="0" size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="MODERNA_Salida"/>
      </td>
   
     </tr>	
  
	 
	 
	 <!-------------------------------------------------------------------------PFIZER ------------------------------------------------------->

 
	 <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>PFIZER:</strong></div></td>
		<td><select input type="text" name="PFIZER_lote" id="PFIZER_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="PFIZER_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote_covid` WHERE insumo='PFIZER' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['PFIZER_lote']."\">".$row_Recordset1['PFIZER_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td>  -->
         <td><input type="number" name="PFIZER_Ingreso" id="PFIZER_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="PFIZER_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="PFIZER_Salida" id="PFIZER_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="PFIZER_Salida"/>
      </td>
   
     </tr>	
	 
	 
	 
	  <!-------------------------------------------------------------------------ASTRAZENECA ------------------------------------------------------->

 
	 <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>ASTRAZENECA:</strong></div></td>
		<td><select input type="text" name="ASTRAZENECA_lote" id="ASTRAZENECA_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="ASTRAZENECA_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote_covid` WHERE insumo='ASTRAZENECA' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['ASTRAZENECA_lote']."\">".$row_Recordset1['ASTRAZENECA_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

      <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="ASTRAZENECA_Ingreso" id="ASTRAZENECA_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="ASTRAZENECA_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="ASTRAZENECA_Salida" id="ASTRAZENECA_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="ASTRAZENECA_Salida"/>
      </td>
   
     </tr>	
	 
	 
	  <!-------------------------------------------------------------------------CARNÉ DE VACUNACIÓN COVID-19 ------------------------------------------------------->

 
	 <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>CARNÉ DE VACUNACIÓN COVID-19:</strong></div></td>
		<td><select input type="text" name="CARNE_lote" id="CARNE_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="CARNE_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote_covid` WHERE insumo='CARNÉ DE VACUNACIÓN COVID-19' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['CARNE_lote']."\">".$row_Recordset1['CARNE_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="CARNE_Ingreso" id="CARNE_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="CARNE_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td>  -->
		 <td><input type="number" name="CARNE_Salida" id="CARNE_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="CARNE_Salida"/>
      </td>
   
     </tr>	
	 
	
	<!-------------------------------------------------------------------------DILUYENTE ------------------------------------------------------->

 	 <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>DILUYENTE COVID PFIZER:</strong></div></td>
		<td><select input type="text" name="DILUYENTE_lote" id="DILUYENTE_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="DILUYENTE_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote_covid` WHERE insumo='DILUYENTE COVID PFIZER' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['DILUYENTE_lote']."\">".$row_Recordset1['DILUYENTE_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td>  -->
         <td><input type="number" name="DILUYENTE_Ingreso" id="DILUYENTE_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="DILUYENTE_Ingreso"/>
      </td>

      <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td>  -->
		 <td><input type="number" name="DILUYENTE_Salida" id="DILUYENTE_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="DILUYENTE_Salida"/>
      </td>
   
     </tr>	
	 
	 
	 <!-------------------------------------------------------------------------JANSSEN ------------------------------------------------------->

 	 <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>JANSSEN:</strong></div></td>
		<td><select input type="text" name="JANSSEN_lote" id="JANSSEN_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="JANSSEN_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote_covid` WHERE insumo='JANSSEN' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['JANSSEN_lote']."\">".$row_Recordset1['JANSSEN_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td>  -->
         <td><input type="number" name="JANSSEN_Ingreso" id="JANSSEN_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="JANSSEN_Ingreso"/>
      </td>

      <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="JANSSEN_Salida" id="JANSSEN_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="JANSSEN_Salida"/>
      </td>
   
     </tr>	
	
	 
	 
	  <!-------------------------------------------------------------------------JERINGA 22G1 1/2 CONVENCIONAL COVID-19 ------------------------------------------------------->

 	 <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>JERINGA 22G1 1/2 CONVENCIONAL COVID-19:</strong></div></td>
		<td><select input type="text" name="JERINGA22_lote" id="JERINGA22_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="JERINGA22_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote_covid` WHERE insumo='JERINGA 22G1 1/2 CONVENCIONAL COVID-19' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['JERINGA22_lote']."\">".$row_Recordset1['JERINGA22_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td>  -->
         <td><input type="number" name="JERINGA22_Ingreso" id="JERINGA22_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="JERINGA22_Ingreso"/>
      </td>

      <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="JERINGA22_Salida" id="JERINGA22_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="JERINGA22_Salida"/>
      </td>
   
     </tr>	
	 
	 
	 
	  <!-------------------------------------------------------------------------JERINGA 23G1 CONVENCIONAL COVID-19------------------------------------------------------->

 	 <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>JERINGA 23G1 CONVENCIONAL COVID-19:</strong></div></td>
		<td><select input type="text" name="JERINGA23_lote" id="JERINGA23_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="JERINGA23_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote_covid` WHERE insumo='JERINGA 23G1 CONVENCIONAL COVID-19' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['JERINGA23_lote']."\">".$row_Recordset1['JERINGA23_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="JERINGA23_Ingreso" id="JERINGA23_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="JERINGA23_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="JERINGA23_Salida" id="JERINGA23_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="JERINGA23_Salida"/>
      </td>
   
     </tr>	
	 
	 
	 <!-------------------------------------------------------------------------MODERNA BIVALENTE------------------------------------------------------->

 	 <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>MODERNA BIVALENTE:</strong></div></td>
		<td><select input type="text" name="MODERNA_BIVALENTE_lote" id="MODERNA_BIVALENTE_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="MODERNA_BIVALENTE_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote_covid` WHERE insumo='MODERNA BIVALENTE' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['MODERNA_BIVALENTE_lote']."\">".$row_Recordset1['MODERNA_BIVALENTE_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="MODERNA_BIVALENTE_Ingreso" id="MODERNA_BIVALENTE_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="MODERNA_BIVALENTE_Ingreso"/>
      </td>

      <!--<td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="MODERNA_BIVALENTE_Salida" id="MODERNA_BIVALENTE_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="MODERNA_BIVALENTE_Salida"/>
      </td>
   
     </tr>	
	 
	 
	  <!-------------------------------------------------------------------------MODERNA PEDIATRICA------------------------------------------------------->

 	 <tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>MODERNA PEDIATRICA:</strong></div></td>
		<td><select input type="text" name="MODERNA_PEDIATRICA_lote" id="MODERNA_PEDIATRICA_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="MODERNA_PEDIATRICA_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote_covid` WHERE insumo='MODERNA PEDIATRICA' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['MODERNA_PEDIATRICA_lote']."\">".$row_Recordset1['MODERNA_PEDIATRICA_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="MODERNA_PEDIATRICA_Ingreso" id="MODERNA_PEDIATRICA_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="MODERNA_PEDIATRICA_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="MODERNA_PEDIATRICA_Salida" id="MODERNA_PEDIATRICA_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="MODERNA_PEDIATRICA_Salida"/>
		 </td>
   
    </tr>	
	 
	 
	  <!-------------------------------------------------------------------------SINOVAC------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>SINOVAC:</strong></div></td>
		<td><select input type="text" name="SINOVAC_lote" id="SINOVAC_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="SINOVAC_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote_covid` WHERE insumo='SINOVAC' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['SINOVAC_lote']."\">".$row_Recordset1['SINOVAC_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="SINOVAC_Ingreso" id="SINOVAC_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="SINOVAC_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="SINOVAC_Salida" id="SINOVAC_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="SINOVAC_Salida"/>
		 </td>
   
    </tr>	
	 
	

  <!-------------------------------------------------------------------------MODERNA_XBB_1_5------------------------------------------------------->

 	<tr valign="baseline">
        <td nowrap="nowrap" align="right"><div align="left"><strong><p style="color:#FF0000";>MODERNA XBB 1.5:</strong></div></td>
		<td><select input type="text" name="MODERNA_XBB_1_5_lote" id="MODERNA_XBB_1_5_lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="MODERNA_XBB_1_5_lote"> 
		<?php  
             $consulta= ("SELECT concat(lote,'*Saldo: ',saldo) as todos, lote FROM `tbl_lote_covid` WHERE insumo='MODERNA XBB 1.5' and Estado='Activo'");            
			 $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
			 echo " <option value=\"".$row_Recordset1['MODERNA_XBB_1_5_lote']."\">".$row_Recordset1['MODERNA_XBB_1_5_lote']."</option>\n";             
			 while($linea = mysqli_fetch_array($resultado))
			 { 
		      echo " <option value=\"".$linea[1]."\">".$linea[0]."</option>\n";
             } 
		  ?> 
      </select> 

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Ingreso:</strong></div></td> -->
         <td><input type="number" name="MODERNA_XBB_1_5_Ingreso" id="MODERNA_XBB_1_5_Ingreso" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="MODERNA_XBB_1_5_Ingreso"/>
      </td>

     <!-- <td nowrap="nowrap" align="right"><div align="left"><strong>Salida:</strong></div></td> -->
		 <td><input type="number" name="MODERNA_XBB_1_5_Salida" id="MODERNA_XBB_1_5_Salida" value="0"  size="10" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();"title="MODERNA_XBB_1_5_Salida"/>
		 </td>
   
    </tr>	

	 
   </table> 
	 	

 <!-------------------------------------------------------------------------Observaciones------------------------------------------------------->

		
		   
		   <table>
	
	<tr valign="baseline">
					<td nowrap="nowrap" align="right"><div align="left"><strong>Observaciones:</strong></div></td>
					<td> <textarea cols="90" rows="2" maxlength="500" name="Observaciones"  id="Observaciones"  style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" title="Observaciones" /></textarea>	
	</tr>
	
	</table> 
	
		
       <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
    <td><input type="button" value="Ingresar registro" onClick="ok()" />    </tr>
       

<!--  <input	type="button" onclick="calcular_edad('04/29/1975');"> -->
  <input type="hidden" name="MM_insert" value="form1" />
</form>
  <p><a href="Principal.php">principal</a></p>

</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>