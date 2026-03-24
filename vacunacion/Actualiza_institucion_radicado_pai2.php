<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
<title>USUARIOS</title>

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

//$query_Recordset1 = mysqli_query($vacunacion, "SELECT Nro_pedido, Institucion, Fecha_movimiento, Insumo, Lote, Ingreso, Salida, Tipo_identificacion, Identificacion, Nombres_apellidos  FROM movimiento, tbl_lote where Institucion='".$_SESSION['Institucion']."' and movimiento.lote = tbl_lote.lote order by Id desc");

$query_Recordset1 = mysqli_query($vacunacion, "SELECT distinct(m.Nro_pedido), p.Id as Id, m.Fecha_movimiento, p.Tipo_pedido, p.Radicado_paiweb  
FROM movimiento m, tbl_lote l, pedido p  where m.Institucion='".$_SESSION['Institucion']."' and m.lote = l.lote and m.Nro_pedido = p.Nro_pedido order by Id desc");
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

 
 



<form id="forma1" name="forma1" method="POST" action="Actualiza_radicado_pai.php">
<table border="1" align="center">
  <tr>
				<td colspan="10"><center>MOVIMIENTO DE INSUMOS</center></td>
				
				
				
	</tr>
   <tr>
   <!-- <td><a href="Ingreso_datos_movimiento.php?vid=<?php echo $_SESSION["Institucion"]; ?>">Nuevo</a></td>
    <td colspan="39"></td> -->
    </tr>
  
  <tr>
  
   <td>Id</td>
  <!--  <td>Institucion</td> -->
    <td>Fecha de movimiento</td>
	<td>Nro Pedido</td>
	<td>Tipo Pedido</td>
	<td>Radicado Pai Web</td>
	
	
	
	
	
	
	
	
   </tr>
  <?php do { ?>
    <tr>
 <td>

<a href="javascript:enviar(<?php echo $row_Recordset1['Id']; ?>)"> <?php echo $row_Recordset1['Id']; ?>&nbsp; </a>

<!--<?php echo $row_Recordset1['Id']; ?>&nbsp; </a> -->

 </td> 
      
      
      <td><?php echo ($row_Recordset1['Fecha_movimiento']); ?>&nbsp; </td>
	  <td><?php echo ($row_Recordset1['Nro_pedido']); ?>&nbsp; </td>
	  <td><?php echo ($row_Recordset1['Tipo_pedido']); ?>&nbsp; </td>
	   <td><?php echo ($row_Recordset1['Radicado_paiweb']); ?>&nbsp; </td>
	 
	  
	   
	 
	<!------------------------------------------------------------------------------------------------------------------------ -->		
    
	
	<!------------------------------------------------------------------------------------------------------------------------ -->	
      
	  </tr>
	
    <?php } 
	
	while ($row_Recordset1 = mysqli_fetch_assoc($query_Recordset1)); ?>
    
	<?php } ?>	
	  

  <!--  
    <tr>
    <td><a href="Ingreso_datos_movimiento.php?vid=<?php echo $_SESSION["Institucion"]; ?>">Nuevo</a></td>
    <td colspan="39"></td> 
   
    </tr>
     -->
	 
	 
</table>

<!-- cierra DIV -->
</div>   


<input type="hidden" id="recordID" name="recordID" VALUE="<?php echo $row_Recordset1['Id']; ?>">




</form>

<?php require_once('Connections/vacunacion.php'); ?>

<?php
//  require_once('Connections/vacunacion.php'); 

// $db_selected = mysqli_select_db($vacunacion, $database_vacunacion);

// $query_Recordset1 = mysqli_query($vacunacion, "SELECT distinct(movimiento.Nro_pedido), PEDIDO.Id as Id, Fecha_movimiento, Radicado_paiweb FROM movimiento, tbl_lote, pedido where Institucion='".$_SESSION['Institucion']."' and movimiento.lote = tbl_lote.lote and movimiento.Nro_pedido = pedido.Nro_pedido order by Id desc");
//$row_Recordset1 = mysqli_fetch_assoc($query_Recordset1);


//mysqli_free_result($Recordset1);
?>


<p><a href="Principal.php">principal</a></p>
 






