<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html"; charset=utf-8" />


<title>VACUNACION</title>
</head>

<body>
<center><b>MUNICIPIO DE ENVIGADO</b></center>
<center><b>SECRETARIA DE SALUD</b></center>
<center><b>SALDO INSUMOS PAI</b></center>

<?php




//echo "texto:".$_POST["txt_tipo_id"];

if ($_POST["destino"] == "Excel") header("Content-Disposition: attachment;  filename=export.xls; ");




session_start();
	
require_once('../Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);

//echo "ASEGURADORA: ".$_SESSION['vusuario'];


//$var_nombre = $_POST["txt_nombre"] ?: '%';
//$var_fecha_inicial = $_POST["txt_fecha_inicial"] ?: '%';
//$var_fecha_final = $_POST["txt_fecha_final"] ?: '%';




//echo "<font size='3' face='Arial'><b>INSTITUCIÓN: </b>".$var_nombre; 
//echo "<br>";
//echo "<font size='3' face='Arial'><b>FECHA INICIAL: </b>".$var_fecha_inicial;

//echo "<font size='3' face='Arial'><b>FECHA FINAL: </b>".$var_fecha_final;

	
	
$condicion="Saldo >=0 and Estado ='Activo' ORDER BY Insumo asc";





//echo $condicion;

	mysqli_select_db($vacunacion, $database_vacunacion);
	$sql = "SELECT Insumo, Lote, Presentacion, Fecha_vencimiento, Laboratorio, Saldo, Estado
	        FROM `tbl_lote`
			WHERE ".$condicion;
	
	
	
	//echo $sql;
	$regs = mysqli_query($vacunacion, $sql) or die(mysql_error());
	//$regs1 = mysqli_query($vacunacion, $sql) or die(mysql_error());

	?>
    
   <table border="1" cellpadding="2" cellspacing="0">
   
	
<!-----	
	<TR>
		<TH bgcolor="#DCDCDC" COLSPAN=12>INSTITUCIÓN </TH> 
		<TH bgcolor="#DCDCDC" COLSPAN=6>INSTITUCIÓN: <?php echo utf8_encode($var_nombre);?> </TH>
	
		<TH bgcolor="#DCDCDC" COLSPAN=12>INSTITUCIÓN </TH> 
		<TH bgcolor="#DCDCDC" COLSPAN=2>FECHA DEL PEDIDO: <?php echo utf8_encode($var_fecha);?> </TH>
	</TR>
	
	-->
	
	<p>
	
	
	<tr>
    
    <tr bgcolor="#F8F8FF">
	<td><b>Insumo</td>
	<td><b>Lote</td>
	<td><b>Presentacion</td>
	<td><b>Fecha vencimiento</td>
	<td><b>Laboratorio</td>
	<td><b>Saldo</td>
	<!-- <td><b>Estado</td>-->
		
	 </tr>
         
    <?php
	
	while($linea = mysqli_fetch_array($regs))
	{ 
		?>
        <tr>
 	 <td><?php echo ($linea['Insumo']);?></td>
	 <td><?php echo ($linea['Lote']);?></td>
	 <td><?php echo ($linea['Presentacion']);?></td>
	 <td><?php echo ($linea['Fecha_vencimiento']);?></td>
	 <td><?php echo ($linea['Laboratorio']);?></td>
	 <td><?php echo ($linea['Saldo']);?></td>
	 <!-- <td><?php echo ($linea['Estado']);?></td> -->
	   
	
        </tr>
        <?php
    } 


	
?>
    </table>






 <p><p><p><a href="/vacunacion/principal.php">principal</a></p>
</body>
</html>


