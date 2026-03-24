<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html"; charset=utf-8" />


<title>APLICATIVO</title>
</head>

<body>
<center><b>MUNICIPIO DE ENVIGADO</b></center>
<center><b>SECRETARIA DE SALUD</b></center>
<center><b>INSUMOS PAI</b></center>


<?php




//echo "texto:".$_POST["txt_tipo_id"];

if ($_POST["destino"] == "Excel") header("Content-Disposition: attachment;  filename=export.xls; ");




session_start();
	
require_once('../Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);

//echo "ASEGURADORA: ".$_SESSION['vusuario'];


$var_nombre = $_POST["txt_nombre"] ?: '%';
$var_pedido = $_POST["txt_pedido"] ?: '%';

echo "<font size='3' face='Arial'><b>INSTITUCIÓN: </b>".$var_nombre; 
echo "<br>";
echo "<font size='3' face='Arial'><b>NUMERO DE PEDIDO: </b>".$var_pedido;


	
	
$condicion="m.institucion ='".$_POST["txt_nombre"]."' and "." m.Nro_pedido='".$_POST["txt_pedido"]."' AND ". "l.Lote = m.Lote" ."   AND ". "m.Nro_pedido = p.Nro_pedido" ." ORDER BY m.Id asc";





//echo $condicion;

	mysqli_select_db($vacunacion, $database_vacunacion);
	$sql = "SELECT m.Id, m.Institucion, m.Fecha_movimiento, m.Lote, m.Ingreso, m.Salida, m.Tipo_identificacion, m.Identificacion, m.Nombres_apellidos, m.Nro_pedido, l.Insumo, p.Observaciones, l.Fecha_vencimiento 
	        FROM `movimiento` m, `tbl_lote` l, `pedido` p 
			WHERE ".$condicion;
	
	$sql1 = "SELECT distinct(m.Nro_pedido), p.Observaciones, p.Temperatura 
	        FROM `movimiento` m, `tbl_lote` l, `pedido` p 
			WHERE ".$condicion;
	
	//echo $sql;
	$regs = mysqli_query($vacunacion, $sql) or die(mysql_error());
	$regs1 = mysqli_query($vacunacion, $sql1) or die(mysql_error());

	?>
    
   
   
   
   
   <table border="1" cellpadding="2" cellspacing="0">
   
	
<!-----	
	<TR>
		<TH bgcolor="#DCDCDC" COLSPAN=12>INSTITUCIÓN </TH> 
		<TH bgcolor="#DCDCDC" COLSPAN=6>INSTITUCIÓN: <?php echo ($var_nombre);?> </TH>
	
		<TH bgcolor="#DCDCDC" COLSPAN=12>INSTITUCIÓN </TH> 
		<TH bgcolor="#DCDCDC" COLSPAN=2>FECHA DEL PEDIDO: <?php echo ($var_fecha);?> </TH>
	</TR>
	
	-->
	
	<p>
		
	<tr>
  
  <!-- usuario  --> 
    <tr bgcolor="#F8F8FF">
	<td><b>Id</td>
	<td><b>Pedido</td>
	<td><b>F. Movimiento</td>
	<td><b>Insumo</td>
	<td><b>Lote</td>
	<td><b>F. Vencimiento</td>
	
	<td><b>Ingreso a cava</td>
	<td><b>Asignación a IPS</td>
	<td><b>Tipo Id</td>
	<td><b>Identificación</td>
	<td><b>Nombres apellidos</td>
	
	
	
	 </tr>
         
    <?php
		while($linea = mysqli_fetch_array($regs))
		{ 
	?>
     <tr>
     <td><?php echo ($linea['Id']);?></td>
  	 <td><?php echo ($linea['Nro_pedido']);?></td>
	 <td><?php echo ($linea['Fecha_movimiento']);?>
	 <td><?php echo ($linea['Insumo']);?></td>
	 <td><?php echo ($linea['Lote']);?></td>
	 <td><?php echo ($linea['Fecha_vencimiento']);?></td>
	 <td><?php echo ($linea['Ingreso']);?></td>
	 <td><?php echo ($linea['Salida']);?></td>
	 <td><?php echo ($linea['Tipo_identificacion']);?></td>
	 <td><?php echo ($linea['Identificacion']);?></td>
	 <td><?php echo ($linea['Nombres_apellidos']);?></td>
	   
	
        </tr>
    <?php
		} 
	?>
    </table>

<p>

<table border="1" cellpadding="4" cellspacing="0">
 
	
	<tr>
   <!-- usuario  --> 
    <tr bgcolor="#F8F8FF">
	<td><b>Nro pedido</td>
	<td><b>Temperatura</td>

	<td><b>Observaciones</td>
	
	
	 </tr>

	  <?php
	
	while($linea2 = mysqli_fetch_array($regs1))
	{ 
		?>
		 <tr>
         <td><?php echo ($linea2['Nro_pedido']);?></td> 
		  <td><?php echo ($linea2['Temperatura']);?></td> 
		 
		 <td><?php echo ($linea2['Observaciones']);?></td>
		  </tr>
        <?php
    } 


	
	?>
	
	
	
	
	
</table>

<p>
<p>
<p>

<table border="1" cellpadding="20" cellspacing="0" >
   
	
	<tr>
   <!-- usuario  --> 
    <tr bgcolor="#F8F8FF">
	<td><b>Recibe:____________________________________________________   Cargo:___________________________________ </td></tr>
	
	
	
		
	 </tr>

	
</table>

<p>

<table border="1" cellpadding="20" cellspacing="0" >
   
	
	
	
	 <tr bgcolor="#F8F8FF">
	 <td><b>Entrega:____________________________________________________   Cargo:___________________________________</td>
	 
	 
	 
	
		
	 </tr>

	
</table>





 <p><p><p><a href="/vacunacion/principal.php">principal</a></p>
</body>
</html>


