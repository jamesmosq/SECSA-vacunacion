<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
<title>INSTITUCION</title>

<?php 

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


//echo "USUARIO:".$_SESSION['vusuario'];


//echo "Mes seleccionado:".$_POST['cbo_mes'];


if (!Empty($_POST['Institucion'])) $_SESSION["Institucion"] = $_POST['Institucion'];

//ECHO "<br> NUMERO DE institucion:".$_SESSION["Institucion"]

?>

<?php



require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);
$query_Recordset1 = mysqli_query($vacunacion, "SELECT * FROM movimiento_covid, tbl_lote_covid where Institucion='".$_SESSION['Institucion']."' and movimiento_covid.lote = tbl_lote_covid.lote order by Id desc");
$row_Recordset1 = mysqli_fetch_assoc($query_Recordset1);



If ($row_Recordset1 == NULL)
	
	{
		echo "No hay datos";
		
	}
	else
	{		
?>



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

<!-- 
Es para hacer la tabla con desplegables para arriba y los lados  -->
 <div align="center" id="tabla" style="width:100%; height:700; position:static; overflow:auto">  

 
 



<form id="forma1" name="forma1" method="POST" action="Actualiza_cuentas_aplicativo.php">
<table border="1" align="center">
  <tr>
				<td colspan="10"><center>MOVIMIENTO DE INSUMOS</center></td>
				
				
				
	</tr>
   <tr>
    <td><a href="Covid_Ingreso_datos_movimiento.php?vid=<?php echo $_SESSION["Institucion"]; ?>">Nuevo</a></td>
    <td colspan="39"></td>
    </tr>
  
  <tr>
  <tr>
   <td>Id</td>
  <!--  <td>Institucion</td> -->
    <td>Fecha de movimiento</td>
	<td>Nro Pedido</td>
	<td>Insumo</td>
	<td>Lote</td>
	<td>Ingreso a cava</td>
	<td>Asignación a IPS</td>

	<!--<td>Tipo identificación</td>
	<td>Identificación</td>
	<td>Nombres y Apellidos</td>-->
	
	
   </tr>
   </tr>
  <?php do { ?>
    <tr>
 <td>

<!--<a href="javascript:enviar(<?php echo $row_Recordset1['Id']; ?>)"> <?php echo $row_Recordset1['Id']; ?>&nbsp; </a> -->

<?php echo $row_Recordset1['Id']; ?>&nbsp; </a>

 </td> 
      
      
    <!-- <td><?php echo utf8_decode($row_Recordset1['Institucion']); ?>&nbsp; </td> -->
      <td><?php echo ($row_Recordset1['Fecha_movimiento']); ?>&nbsp; </td>
	  <td><?php echo ($row_Recordset1['Nro_pedido']); ?>&nbsp; </td>
	  <td><?php echo ($row_Recordset1['Insumo']); ?>&nbsp; </td>
	  <td><?php echo ($row_Recordset1['Lote']); ?>&nbsp; </td>
      <td><?php echo ($row_Recordset1['Ingreso']); ?>&nbsp; </td>
	  <td><?php echo ($row_Recordset1['Salida']); ?>&nbsp; </td>
  <!-- <td><?php echo ($row_Recordset1['Tipo_identificacion']); ?>&nbsp; </td>
	   <td><?php echo ($row_Recordset1['Identificacion']); ?>&nbsp; </td>
	   <td><?php echo ($row_Recordset1['Nombres_apellidos']); ?>&nbsp; </td>-->
	   
	 
	<!------------------------------------------------------------------------------------------------------------------------ -->		
    <!------------------------------------------------------------------------------------------------------------------------ -->	
      
	  </tr>
	
    <?php } 
	
	while ($row_Recordset1 = mysqli_fetch_assoc($query_Recordset1)); ?>
    
	<?php } ?>	
	  

    
    <tr>
    <td><a href="Covid_Ingreso_datos_movimiento.php?vid=<?php echo $_SESSION["Institucion"]; ?>">Nuevo</a></td>
    <td colspan="39"></td>
    </tr>
    
    
</table>

<!-- cierra DIV -->
</div>   


<input type="hidden" id="recordID" name="recordID" VALUE="<?php echo $row_Recordset1['Institucion']; ?>">

</form>



<?php require_once('Connections/vacunacion.php'); ?>
<?php

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);

$query_Recordset1 = "SELECT * FROM movimiento_covid where institucion='".$_SESSION['Institucion']."'";
$Recordset1 = mysqli_query($vacunacion, $query_Recordset1) or die(mysql_error());
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);

//ECHO "<br> selecctttttt:".$query_Recordset1;


$totalRows_Recordset1 = mysqli_num_rows($Recordset1);



mysqli_free_result($Recordset1);
?>



<p><a href="Principal.php">principal</a></p>
 






