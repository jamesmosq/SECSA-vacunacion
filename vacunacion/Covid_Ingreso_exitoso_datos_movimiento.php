<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


<!----------------------------------------------------------------------------------- Bloque de MODERNA ---------------------------------------------->

<?php 
session_start();
require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


$query_Recordset1 = mysqli_query($vacunacion, "select saldo from tbl_lote_covid where lote =  '".$_POST['MODERNA_lote']."'");
$row_Recordset1 = mysqli_fetch_assoc($query_Recordset1);

 //echo "SALDO"  .$row_Recordset1['saldo'];
 
 //echo "SALIDA" .$_POST['BCG_Salida'];


IF (($_POST['MODERNA_lote']<>""))
	
	{
		If (($_POST['MODERNA_Salida']) > ($row_Recordset1['saldo']))
		{
	
			echo " -----------------------------------------------------------<p>";
			echo "La salida es mayor a las existencias del lote en MODERNA: <p> ";
			echo "Saldo:<b> "  .$row_Recordset1['saldo'] ."</b> <p>" ;
			echo "    Salida:<b>" .$_POST['MODERNA_Salida']."</b> <p>";
			echo "    El movimiento para este insumo no se realiza con exito<p>";
			echo " -----------------------------------------------------------<p>";
			
			$_POST['MODERNA_Salida'] = 0;
		}
		ELSE
		{
				If ((($_POST['MODERNA_Ingreso'] + $_POST['MODERNA_Salida']) >= 1 ) AND ($_POST['MODERNA_lote']<>""))
				{

						require_once('Connections/vacunacion.php');
						$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);

						if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
						{
						  $insertSQL = ("INSERT INTO movimiento_covid 
													(Institucion, 
													Fecha_movimiento,
													Nro_pedido,
													Lote,
													Ingreso,
													Salida)
												
													VALUES 
																	
												  ('".$_POST['Institucion']."',
												   '".$_POST['Fecha_movimiento']."',
												   '".$_POST['Nro_pedido']."',
												   '".$_POST['MODERNA_lote']."',
												   '".$_POST['MODERNA_Ingreso']."',
												   '".$_POST['MODERNA_Salida']."')");
						  
						//echo "insertSQL:".$insertSQL;
						}
						$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

				}
		}
	}
 ?>


<!-- ---------------------------------------  update del SQL para ingreso MODERNA ---------------------------------------------->
<?php 
//session_start();



IF (($_POST['MODERNA_lote']<>""))
	
	{


If (($_POST['MODERNA_Salida']) > ($row_Recordset1['saldo']))
{
	//echo "INGRESOSSSSS:";
}
ELSE
{


If ((($_POST['MODERNA_Ingreso'] + $_POST['MODERNA_Salida']) >= 1 ) AND ($_POST['MODERNA_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = (" UPDATE `tbl_lote_covid` SET `Saldo`=`Saldo` + '".$_POST['MODERNA_Ingreso']."'   WHERE tbl_lote_covid.lote = '".$_POST['MODERNA_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
}
}
 ?>


<!-- ---------------------------------------  update del SQL para salida  MOderna---------------------------------------------->
<?php 
//session_start();



IF (($_POST['MODERNA_lote']<>""))
	
{


If (($_POST['MODERNA_Salida']) > ($row_Recordset1['saldo']))
{
	//echo "INGRESOSSSSS:";
}
ELSE
{


If ((($_POST['MODERNA_Ingreso'] + $_POST['MODERNA_Salida']) >= 1 ) AND ($_POST['MODERNA_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = (" UPDATE `tbl_lote_covid` SET `Saldo`=`Saldo` - '".$_POST['MODERNA_Salida']."'   WHERE tbl_lote_covid.lote = '".$_POST['MODERNA_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
}
}
 ?>




<!----------------------------------------------------------------------------------- Bloque de PFIZER ---------------------------------------------->

<?php 
//session_start();
require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


$query_Recordset1 = mysqli_query($vacunacion, "select saldo from tbl_lote_covid where lote =  '".$_POST['PFIZER_lote']."'");
$row_Recordset1 = mysqli_fetch_assoc($query_Recordset1);

 //echo "SALDO"  .$row_Recordset1['saldo'];
 
 //echo "SALIDA" .$_POST['PFIZER_Salida'];


IF (($_POST['PFIZER_lote']<>""))
	
	{
		If (($_POST['PFIZER_Salida']) > ($row_Recordset1['saldo']))
		{
	
			echo " -----------------------------------------------------------<p>";
			echo "La salida es mayor a las existencias del lote en PFIZER: <p> ";
			echo "Saldo:<b> "  .$row_Recordset1['saldo'] ."</b> <p>" ;
			echo "    Salida:<b>" .$_POST['PFIZER_Salida']."</b> <p>";
			echo "    El movimiento para este insumo no se realiza con exito<p>";
			echo " -----------------------------------------------------------<p>";
			
			$_POST['PFIZER_Salida'] = 0;
		}
		ELSE
		{
				If ((($_POST['PFIZER_Ingreso'] + $_POST['PFIZER_Salida']) >= 1 ) AND ($_POST['PFIZER_lote']<>""))
				{

						require_once('Connections/vacunacion.php');
						$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);

						if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
						{
						  $insertSQL = ("INSERT INTO movimiento_covid 
													(Institucion, 
													Fecha_movimiento,
													Nro_pedido,
													Lote,
													Ingreso,
													Salida)
												
													VALUES 
																	
												  ('".$_POST['Institucion']."',
												   '".$_POST['Fecha_movimiento']."',
												   '".$_POST['Nro_pedido']."',
												   '".$_POST['PFIZER_lote']."',
												   '".$_POST['PFIZER_Ingreso']."',
												   '".$_POST['PFIZER_Salida']."')");
						  
						//echo "insertSQL:".$insertSQL;
						}
						$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

				}
		}

	

	}
	


 ?>


<!-- ---------------------------------------  update del SQL para ingreso PFIZER ---------------------------------------------->
<?php 
//session_start();



IF (($_POST['PFIZER_lote']<>""))
	
	{


If (($_POST['PFIZER_Salida']) > ($row_Recordset1['saldo']))
{
	//echo "INGRESOSSSSS:";
}
ELSE
{


If ((($_POST['PFIZER_Ingreso'] + $_POST['PFIZER_Salida']) >= 1 ) AND ($_POST['PFIZER_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = (" UPDATE `tbl_lote_covid` SET `Saldo`=`Saldo` + '".$_POST['PFIZER_Ingreso']."' WHERE tbl_lote_covid.lote = '".$_POST['PFIZER_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
}
}
 ?>


<!-- ---------------------------------------  update del SQL para salida  PFIZER---------------------------------------------->
<?php 
//session_start();



IF (($_POST['PFIZER_lote']<>""))
	
{


If (($_POST['PFIZER_Salida']) > ($row_Recordset1['saldo']))
{
	//echo "INGRESOSSSSS:";
}
ELSE
{


If ((($_POST['PFIZER_Ingreso'] + $_POST['PFIZER_Salida']) >= 1 ) AND ($_POST['PFIZER_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = (" UPDATE `tbl_lote_covid` SET `Saldo`=`Saldo` - '".$_POST['PFIZER_Salida']."'   WHERE tbl_lote_covid.lote = '".$_POST['PFIZER_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
}
}
 ?>



<!----------------------------------------------------------------------------------- Bloque de ASTRAZENECA ---------------------------------------------->

<?php 
//session_start();
require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


$query_Recordset1 = mysqli_query($vacunacion, "select saldo from tbl_lote_covid where lote =  '".$_POST['ASTRAZENECA_lote']."'");
$row_Recordset1 = mysqli_fetch_assoc($query_Recordset1);

 //echo "SALDO"  .$row_Recordset1['saldo'];
 
 //echo "SALIDA" .$_POST['ASTRAZENECA_Salida'];


IF (($_POST['ASTRAZENECA_lote']<>""))
	
	{
		If (($_POST['ASTRAZENECA_Salida']) > ($row_Recordset1['saldo']))
		{
	
			echo " -----------------------------------------------------------<p>";
			echo "La salida es mayor a las existencias del lote en ASTRAZENECA: <p> ";
			echo "Saldo:<b> "  .$row_Recordset1['saldo'] ."</b> <p>" ;
			echo "    Salida:<b>" .$_POST['ASTRAZENECA_Salida']."</b> <p>";
			echo "    El movimiento para este insumo no se realiza con exito<p>";
			echo " -----------------------------------------------------------<p>";
			
			$_POST['ASTRAZENECA_Salida'] = 0;
		}
		ELSE
		{
				If ((($_POST['ASTRAZENECA_Ingreso'] + $_POST['ASTRAZENECA_Salida']) >= 1 ) AND ($_POST['ASTRAZENECA_lote']<>""))
				{

						require_once('Connections/vacunacion.php');
						$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);

						if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
						{
						  $insertSQL = ("INSERT INTO movimiento_covid 
													(Institucion, 
													Fecha_movimiento,
													Nro_pedido,
													Lote,
													Ingreso,
													Salida)
												
													VALUES 
																	
												  ('".$_POST['Institucion']."',
												   '".$_POST['Fecha_movimiento']."',
												   '".$_POST['Nro_pedido']."',
												   '".$_POST['ASTRAZENECA_lote']."',
												   '".$_POST['ASTRAZENECA_Ingreso']."',
												   '".$_POST['ASTRAZENECA_Salida']."')");
						  
						//echo "insertSQL:".$insertSQL;
						}
						$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

				}
		}

	

	}
	


 ?>


<!-- ---------------------------------------  update del SQL para ingreso ASTRAZENECA ---------------------------------------------->
<?php 
//session_start();



IF (($_POST['ASTRAZENECA_lote']<>""))
	
	{


If (($_POST['ASTRAZENECA_Salida']) > ($row_Recordset1['saldo']))
{
	//echo "INGRESOSSSSS:";
}
ELSE
{


If ((($_POST['ASTRAZENECA_Ingreso'] + $_POST['ASTRAZENECA_Salida']) >= 1 ) AND ($_POST['ASTRAZENECA_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = (" UPDATE `tbl_lote_covid` SET `Saldo`=`Saldo` + '".$_POST['ASTRAZENECA_Ingreso']."' WHERE tbl_lote_covid.lote = '".$_POST['ASTRAZENECA_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
}
}
 ?>


<!-- ---------------------------------------  update del SQL para salida  ASTRAZENECA---------------------------------------------->
<?php 
//session_start();



IF (($_POST['ASTRAZENECA_lote']<>""))
	
{


If (($_POST['ASTRAZENECA_Salida']) > ($row_Recordset1['saldo']))
{
	//echo "INGRESOSSSSS:";
}
ELSE
{


If ((($_POST['ASTRAZENECA_Ingreso'] + $_POST['ASTRAZENECA_Salida']) >= 1 ) AND ($_POST['ASTRAZENECA_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = (" UPDATE `tbl_lote_covid` SET `Saldo`=`Saldo` - '".$_POST['ASTRAZENECA_Salida']."'   WHERE tbl_lote_covid.lote = '".$_POST['ASTRAZENECA_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
}
}
 ?>



<!----------------------------------------------------------------------------------- Bloque de CARNE ---------------------------------------------->

<?php 
//session_start();
require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


$query_Recordset1 = mysqli_query($vacunacion, "select saldo from tbl_lote_covid where lote =  '".$_POST['CARNE_lote']."'");
$row_Recordset1 = mysqli_fetch_assoc($query_Recordset1);

 //echo "SALDO"  .$row_Recordset1['saldo'];
 
 //echo "SALIDA" .$_POST['CARNE_Salida'];


IF (($_POST['CARNE_lote']<>""))
	
	{
		If (($_POST['CARNE_Salida']) > ($row_Recordset1['saldo']))
		{
	
			echo " -----------------------------------------------------------<p>";
			echo "La salida es mayor a las existencias del lote en CARNE: <p> ";
			echo "Saldo:<b> "  .$row_Recordset1['saldo'] ."</b> <p>" ;
			echo "    Salida:<b>" .$_POST['CARNE_Salida']."</b> <p>";
			echo "    El movimiento para este insumo no se realiza con exito<p>";
			echo " -----------------------------------------------------------<p>";
			
			$_POST['CARNE_Salida'] = 0;
		}
		ELSE
		{
				If ((($_POST['CARNE_Ingreso'] + $_POST['CARNE_Salida']) >= 1 ) AND ($_POST['CARNE_lote']<>""))
				{

						require_once('Connections/vacunacion.php');
						$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);

						if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
						{
						  $insertSQL = ("INSERT INTO movimiento_covid 
													(Institucion, 
													Fecha_movimiento,
													Nro_pedido,
													Lote,
													Ingreso,
													Salida)
												
													VALUES 
																	
												  ('".$_POST['Institucion']."',
												   '".$_POST['Fecha_movimiento']."',
												   '".$_POST['Nro_pedido']."',
												   '".$_POST['CARNE_lote']."',
												   '".$_POST['CARNE_Ingreso']."',
												   '".$_POST['CARNE_Salida']."')");
						  
						//echo "insertSQL:".$insertSQL;
						}
						$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

				}
		}

	

	}
	


 ?>


<!-- ---------------------------------------  update del SQL para ingreso CARNE ---------------------------------------------->
<?php 
//session_start();



IF (($_POST['CARNE_lote']<>""))
	
	{


If (($_POST['CARNE_Salida']) > ($row_Recordset1['saldo']))
{
	//echo "INGRESOSSSSS:";
}
ELSE
{


If ((($_POST['CARNE_Ingreso'] + $_POST['CARNE_Salida']) >= 1 ) AND ($_POST['CARNE_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = (" UPDATE `tbl_lote_covid` SET `Saldo`=`Saldo` + '".$_POST['CARNE_Ingreso']."' WHERE tbl_lote_covid.lote = '".$_POST['CARNE_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
}
}
 ?>


<!-- ---------------------------------------  update del SQL para salida  CARNE---------------------------------------------->
<?php 
//session_start();



IF (($_POST['CARNE_lote']<>""))
	
{


If (($_POST['CARNE_Salida']) > ($row_Recordset1['saldo']))
{
	//echo "INGRESOSSSSS:";
}
ELSE
{


If ((($_POST['CARNE_Ingreso'] + $_POST['CARNE_Salida']) >= 1 ) AND ($_POST['CARNE_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = (" UPDATE `tbl_lote_covid` SET `Saldo`=`Saldo` - '".$_POST['CARNE_Salida']."'   WHERE tbl_lote_covid.lote = '".$_POST['CARNE_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
}
}
 ?>



<!----------------------------------------------------------------------------------- Bloque de DILUYENTE ---------------------------------------------->

<?php 
//session_start();
require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


$query_Recordset1 = mysqli_query($vacunacion, "select saldo from tbl_lote_covid where lote =  '".$_POST['DILUYENTE_lote']."'");
$row_Recordset1 = mysqli_fetch_assoc($query_Recordset1);

 //echo "SALDO"  .$row_Recordset1['saldo'];
 
 //echo "SALIDA" .$_POST['DILUYENTE_Salida'];


IF (($_POST['DILUYENTE_lote']<>""))
	
	{
		If (($_POST['DILUYENTE_Salida']) > ($row_Recordset1['saldo']))
		{
	
			echo " -----------------------------------------------------------<p>";
			echo "La salida es mayor a las existencias del lote en DILUYENTE: <p> ";
			echo "Saldo:<b> "  .$row_Recordset1['saldo'] ."</b> <p>" ;
			echo "    Salida:<b>" .$_POST['DILUYENTE_Salida']."</b> <p>";
			echo "    El movimiento para este insumo no se realiza con exito<p>";
			echo " -----------------------------------------------------------<p>";
			
			$_POST['DILUYENTE_Salida'] = 0;
		}
		ELSE
		{
				If ((($_POST['DILUYENTE_Ingreso'] + $_POST['DILUYENTE_Salida']) >= 1 ) AND ($_POST['DILUYENTE_lote']<>""))
				{

						require_once('Connections/vacunacion.php');
						$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);

						if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
						{
						  $insertSQL = ("INSERT INTO movimiento_covid 
													(Institucion, 
													Fecha_movimiento,
													Nro_pedido,
													Lote,
													Ingreso,
													Salida)
												
													VALUES 
																	
												  ('".$_POST['Institucion']."',
												   '".$_POST['Fecha_movimiento']."',
												   '".$_POST['Nro_pedido']."',
												   '".$_POST['DILUYENTE_lote']."',
												   '".$_POST['DILUYENTE_Ingreso']."',
												   '".$_POST['DILUYENTE_Salida']."')");
						  
						//echo "insertSQL:".$insertSQL;
						}
						$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

				}
		}

	

	}
	


 ?>


<!-- ---------------------------------------  update del SQL para ingreso DILUYENTE ---------------------------------------------->
<?php 
//session_start();



IF (($_POST['DILUYENTE_lote']<>""))
	
	{


If (($_POST['DILUYENTE_Salida']) > ($row_Recordset1['saldo']))
{
	//echo "INGRESOSSSSS:";
}
ELSE
{


If ((($_POST['DILUYENTE_Ingreso'] + $_POST['DILUYENTE_Salida']) >= 1 ) AND ($_POST['DILUYENTE_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = (" UPDATE `tbl_lote_covid` SET `Saldo`=`Saldo` + '".$_POST['DILUYENTE_Ingreso']."' WHERE tbl_lote_covid.lote = '".$_POST['DILUYENTE_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
}
}
 ?>


<!-- ---------------------------------------  update del SQL para salida  DILUYENTE---------------------------------------------->
<?php 
//session_start();



IF (($_POST['DILUYENTE_lote']<>""))
	
{


If (($_POST['DILUYENTE_Salida']) > ($row_Recordset1['saldo']))
{
	//echo "INGRESOSSSSS:";
}
ELSE
{


If ((($_POST['DILUYENTE_Ingreso'] + $_POST['DILUYENTE_Salida']) >= 1 ) AND ($_POST['DILUYENTE_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = (" UPDATE `tbl_lote_covid` SET `Saldo`=`Saldo` - '".$_POST['DILUYENTE_Salida']."'   WHERE tbl_lote_covid.lote = '".$_POST['DILUYENTE_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
}
}
 ?>




<!----------------------------------------------------------------------------------- Bloque de JANSSEN ---------------------------------------------->

<?php 
//session_start();
require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


$query_Recordset1 = mysqli_query($vacunacion, "select saldo from tbl_lote_covid where lote =  '".$_POST['JANSSEN_lote']."'");
$row_Recordset1 = mysqli_fetch_assoc($query_Recordset1);

 //echo "SALDO"  .$row_Recordset1['saldo'];
 
 //echo "SALIDA" .$_POST['JANSSEN_Salida'];


IF (($_POST['JANSSEN_lote']<>""))
	
	{
		If (($_POST['JANSSEN_Salida']) > ($row_Recordset1['saldo']))
		{
	
			echo " -----------------------------------------------------------<p>";
			echo "La salida es mayor a las existencias del lote en JANSSEN: <p> ";
			echo "Saldo:<b> "  .$row_Recordset1['saldo'] ."</b> <p>" ;
			echo "    Salida:<b>" .$_POST['JANSSEN_Salida']."</b> <p>";
			echo "    El movimiento para este insumo no se realiza con exito<p>";
			echo " -----------------------------------------------------------<p>";
			
			$_POST['JANSSEN_Salida'] = 0;
		}
		ELSE
		{
				If ((($_POST['JANSSEN_Ingreso'] + $_POST['JANSSEN_Salida']) >= 1 ) AND ($_POST['JANSSEN_lote']<>""))
				{

						require_once('Connections/vacunacion.php');
						$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);

						if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
						{
						  $insertSQL = ("INSERT INTO movimiento_covid 
													(Institucion, 
													Fecha_movimiento,
													Nro_pedido,
													Lote,
													Ingreso,
													Salida)
												
													VALUES 
																	
												  ('".$_POST['Institucion']."',
												   '".$_POST['Fecha_movimiento']."',
												   '".$_POST['Nro_pedido']."',
												   '".$_POST['JANSSEN_lote']."',
												   '".$_POST['JANSSEN_Ingreso']."',
												   '".$_POST['JANSSEN_Salida']."')");
						  
						//echo "insertSQL:".$insertSQL;
						}
						$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

				}
		}

	

	}
	


 ?>


<!-- ---------------------------------------  update del SQL para ingreso JANSSEN ---------------------------------------------->
<?php 
//session_start();



IF (($_POST['JANSSEN_lote']<>""))
	
	{


If (($_POST['JANSSEN_Salida']) > ($row_Recordset1['saldo']))
{
	//echo "INGRESOSSSSS:";
}
ELSE
{


If ((($_POST['JANSSEN_Ingreso'] + $_POST['JANSSEN_Salida']) >= 1 ) AND ($_POST['JANSSEN_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = (" UPDATE `tbl_lote_covid` SET `Saldo`=`Saldo` + '".$_POST['JANSSEN_Ingreso']."' WHERE tbl_lote_covid.lote = '".$_POST['JANSSEN_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
}
}
 ?>


<!-- ---------------------------------------  update del SQL para salida  JANSSEN---------------------------------------------->
<?php 
//session_start();



IF (($_POST['JANSSEN_lote']<>""))
	
{


If (($_POST['JANSSEN_Salida']) > ($row_Recordset1['saldo']))
{
	//echo "INGRESOSSSSS:";
}
ELSE
{


If ((($_POST['JANSSEN_Ingreso'] + $_POST['JANSSEN_Salida']) >= 1 ) AND ($_POST['JANSSEN_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = (" UPDATE `tbl_lote_covid` SET `Saldo`=`Saldo` - '".$_POST['JANSSEN_Salida']."'   WHERE tbl_lote_covid.lote = '".$_POST['JANSSEN_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
}
}
 ?>




<!----------------------------------------------------------------------------------- Bloque de JERINGA22 ---------------------------------------------->

<?php 
//session_start();
require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


$query_Recordset1 = mysqli_query($vacunacion, "select saldo from tbl_lote_covid where lote =  '".$_POST['JERINGA22_lote']."'");
$row_Recordset1 = mysqli_fetch_assoc($query_Recordset1);

 //echo "SALDO"  .$row_Recordset1['saldo'];
 
 //echo "SALIDA" .$_POST['JERINGA22_Salida'];


IF (($_POST['JERINGA22_lote']<>""))
	
	{
		If (($_POST['JERINGA22_Salida']) > ($row_Recordset1['saldo']))
		{
	
			echo " -----------------------------------------------------------<p>";
			echo "La salida es mayor a las existencias del lote en JERINGA22: <p> ";
			echo "Saldo:<b> "  .$row_Recordset1['saldo'] ."</b> <p>" ;
			echo "    Salida:<b>" .$_POST['JERINGA22_Salida']."</b> <p>";
			echo "    El movimiento para este insumo no se realiza con exito<p>";
			echo " -----------------------------------------------------------<p>";
			
			$_POST['JERINGA22_Salida'] = 0;
		}
		ELSE
		{
				If ((($_POST['JERINGA22_Ingreso'] + $_POST['JERINGA22_Salida']) >= 1 ) AND ($_POST['JERINGA22_lote']<>""))
				{

						require_once('Connections/vacunacion.php');
						$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);

						if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
						{
						  $insertSQL = ("INSERT INTO movimiento_covid 
													(Institucion, 
													Fecha_movimiento,
													Nro_pedido,
													Lote,
													Ingreso,
													Salida)
												
													VALUES 
																	
												  ('".$_POST['Institucion']."',
												   '".$_POST['Fecha_movimiento']."',
												   '".$_POST['Nro_pedido']."',
												   '".$_POST['JERINGA22_lote']."',
												   '".$_POST['JERINGA22_Ingreso']."',
												   '".$_POST['JERINGA22_Salida']."')");
						  
						//echo "insertSQL:".$insertSQL;
						}
						$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

				}
		}

	

	}
	


 ?>


<!-- ---------------------------------------  update del SQL para ingreso JERINGA22 ---------------------------------------------->
<?php 
//session_start();



IF (($_POST['JERINGA22_lote']<>""))
	
	{


If (($_POST['JERINGA22_Salida']) > ($row_Recordset1['saldo']))
{
	//echo "INGRESOSSSSS:";
}
ELSE
{


If ((($_POST['JERINGA22_Ingreso'] + $_POST['JERINGA22_Salida']) >= 1 ) AND ($_POST['JERINGA22_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = (" UPDATE `tbl_lote_covid` SET `Saldo`=`Saldo` + '".$_POST['JERINGA22_Ingreso']."' WHERE tbl_lote_covid.lote = '".$_POST['JERINGA22_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
}
}
 ?>


<!-- ---------------------------------------  update del SQL para salida  JERINGA22---------------------------------------------->
<?php 
//session_start();



IF (($_POST['JERINGA22_lote']<>""))
	
{


If (($_POST['JERINGA22_Salida']) > ($row_Recordset1['saldo']))
{
	//echo "INGRESOSSSSS:";
}
ELSE
{


If ((($_POST['JERINGA22_Ingreso'] + $_POST['JERINGA22_Salida']) >= 1 ) AND ($_POST['JERINGA22_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = (" UPDATE `tbl_lote_covid` SET `Saldo`=`Saldo` - '".$_POST['JERINGA22_Salida']."'   WHERE tbl_lote_covid.lote = '".$_POST['JERINGA22_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
}
}
 ?>






<!----------------------------------------------------------------------------------- Bloque de JERINGA23 ---------------------------------------------->

<?php 
//session_start();
require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


$query_Recordset1 = mysqli_query($vacunacion, "select saldo from tbl_lote_covid where lote =  '".$_POST['JERINGA23_lote']."'");
$row_Recordset1 = mysqli_fetch_assoc($query_Recordset1);

 //echo "SALDO"  .$row_Recordset1['saldo'];
 
 //echo "SALIDA" .$_POST['JERINGA23_Salida'];


IF (($_POST['JERINGA23_lote']<>""))
	
	{
		If (($_POST['JERINGA23_Salida']) > ($row_Recordset1['saldo']))
		{
	
			echo " -----------------------------------------------------------<p>";
			echo "La salida es mayor a las existencias del lote en JERINGA23: <p> ";
			echo "Saldo:<b> "  .$row_Recordset1['saldo'] ."</b> <p>" ;
			echo "    Salida:<b>" .$_POST['JERINGA23_Salida']."</b> <p>";
			echo "    El movimiento para este insumo no se realiza con exito<p>";
			echo " -----------------------------------------------------------<p>";
			
			$_POST['JERINGA23_Salida'] = 0;
		}
		ELSE
		{
				If ((($_POST['JERINGA23_Ingreso'] + $_POST['JERINGA23_Salida']) >= 1 ) AND ($_POST['JERINGA23_lote']<>""))
				{

						require_once('Connections/vacunacion.php');
						$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);

						if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
						{
						  $insertSQL = ("INSERT INTO movimiento_covid 
													(Institucion, 
													Fecha_movimiento,
													Nro_pedido,
													Lote,
													Ingreso,
													Salida)
												
													VALUES 
																	
												  ('".$_POST['Institucion']."',
												   '".$_POST['Fecha_movimiento']."',
												   '".$_POST['Nro_pedido']."',
												   '".$_POST['JERINGA23_lote']."',
												   '".$_POST['JERINGA23_Ingreso']."',
												   '".$_POST['JERINGA23_Salida']."')");
						  
						//echo "insertSQL:".$insertSQL;
						}
						$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

				}
		}

	

	}
	


 ?>


<!-- ---------------------------------------  update del SQL para ingreso JERINGA23 ---------------------------------------------->
<?php 
//session_start();



IF (($_POST['JERINGA23_lote']<>""))
	
	{


If (($_POST['JERINGA23_Salida']) > ($row_Recordset1['saldo']))
{
	//echo "INGRESOSSSSS:";
}
ELSE
{


If ((($_POST['JERINGA23_Ingreso'] + $_POST['JERINGA23_Salida']) >= 1 ) AND ($_POST['JERINGA23_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = (" UPDATE `tbl_lote_covid` SET `Saldo`=`Saldo` + '".$_POST['JERINGA23_Ingreso']."' WHERE tbl_lote_covid.lote = '".$_POST['JERINGA23_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
}
}
 ?>


<!-- ---------------------------------------  update del SQL para salida  JERINGA23---------------------------------------------->
<?php 
//session_start();



IF (($_POST['JERINGA23_lote']<>""))
	
{


If (($_POST['JERINGA23_Salida']) > ($row_Recordset1['saldo']))
{
	//echo "INGRESOSSSSS:";
}
ELSE
{


If ((($_POST['JERINGA23_Ingreso'] + $_POST['JERINGA23_Salida']) >= 1 ) AND ($_POST['JERINGA23_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = (" UPDATE `tbl_lote_covid` SET `Saldo`=`Saldo` - '".$_POST['JERINGA23_Salida']."'   WHERE tbl_lote_covid.lote = '".$_POST['JERINGA23_lote']."' ");
								  
			//echo "insertSQL____:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
}
}
 ?>





<!----------------------------------------------------------------------------------- Bloque de MODERNA_BIVALENTE ---------------------------------------------->

<?php 
//session_start();
require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


$query_Recordset1 = mysqli_query($vacunacion, "select saldo from tbl_lote_covid where lote =  '".$_POST['MODERNA_BIVALENTE_lote']."'");
$row_Recordset1 = mysqli_fetch_assoc($query_Recordset1);

 //echo "SALDO"  .$row_Recordset1['saldo'];
 
 //echo "SALIDA" .$_POST['MODERNA_BIVALENTE_Salida'];


IF (($_POST['MODERNA_BIVALENTE_lote']<>""))
	
	{
		If (($_POST['MODERNA_BIVALENTE_Salida']) > ($row_Recordset1['saldo']))
		{
	
			echo " -----------------------------------------------------------<p>";
			echo "La salida es mayor a las existencias del lote en MODERNA_BIVALENTE: <p> ";
			echo "Saldo:<b> "  .$row_Recordset1['saldo'] ."</b> <p>" ;
			echo "    Salida:<b>" .$_POST['MODERNA_BIVALENTE_Salida']."</b> <p>";
			echo "    El movimiento para este insumo no se realiza con exito<p>";
			echo " -----------------------------------------------------------<p>";
			
			$_POST['MODERNA_BIVALENTE_Salida'] = 0;
		}
		ELSE
		{
				If ((($_POST['MODERNA_BIVALENTE_Ingreso'] + $_POST['MODERNA_BIVALENTE_Salida']) >= 1 ) AND ($_POST['MODERNA_BIVALENTE_lote']<>""))
				{

						require_once('Connections/vacunacion.php');
						$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);

						if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
						{
						  $insertSQL = ("INSERT INTO movimiento_covid 
													(Institucion, 
													Fecha_movimiento,
													Nro_pedido,
													Lote,
													Ingreso,
													Salida)
												
													VALUES 
																	
												  ('".$_POST['Institucion']."',
												   '".$_POST['Fecha_movimiento']."',
												   '".$_POST['Nro_pedido']."',
												   '".$_POST['MODERNA_BIVALENTE_lote']."',
												   '".$_POST['MODERNA_BIVALENTE_Ingreso']."',
												   '".$_POST['MODERNA_BIVALENTE_Salida']."')");
						  
						//echo "insertSQL:".$insertSQL;
						}
						$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

				}
		}

	

	}
	


 ?>


<!-- ---------------------------------------  update del SQL para ingreso MODERNA_BIVALENTE ---------------------------------------------->
<?php 
//session_start();



IF (($_POST['MODERNA_BIVALENTE_lote']<>""))
	
	{


If (($_POST['MODERNA_BIVALENTE_Salida']) > ($row_Recordset1['saldo']))
{
	//echo "INGRESOSSSSS:";
}
ELSE
{


If ((($_POST['MODERNA_BIVALENTE_Ingreso'] + $_POST['MODERNA_BIVALENTE_Salida']) >= 1 ) AND ($_POST['MODERNA_BIVALENTE_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = (" UPDATE `tbl_lote_covid` SET `Saldo`=`Saldo` + '".$_POST['MODERNA_BIVALENTE_Ingreso']."' WHERE tbl_lote_covid.lote = '".$_POST['MODERNA_BIVALENTE_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
}
}
 ?>


<!-- ---------------------------------------  update del SQL para salida  MODERNA_BIVALENTE---------------------------------------------->
<?php 
//session_start();



IF (($_POST['MODERNA_BIVALENTE_lote']<>""))
	
{


If (($_POST['MODERNA_BIVALENTE_Salida']) > ($row_Recordset1['saldo']))
{
	//echo "INGRESOSSSSS:";
}
ELSE
{


If ((($_POST['MODERNA_BIVALENTE_Ingreso'] + $_POST['MODERNA_BIVALENTE_Salida']) >= 1 ) AND ($_POST['MODERNA_BIVALENTE_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = (" UPDATE `tbl_lote_covid` SET `Saldo`=`Saldo` - '".$_POST['MODERNA_BIVALENTE_Salida']."'   WHERE tbl_lote_covid.lote = '".$_POST['MODERNA_BIVALENTE_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
}
}
 ?>



<!----------------------------------------------------------------------------------- Bloque de MODERNA_PEDIATRICA ---------------------------------------------->

<?php 
//session_start();
require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


$query_Recordset1 = mysqli_query($vacunacion, "select saldo from tbl_lote_covid where lote =  '".$_POST['MODERNA_PEDIATRICA_lote']."'");
$row_Recordset1 = mysqli_fetch_assoc($query_Recordset1);

 //echo "SALDO"  .$row_Recordset1['saldo'];
 
 //echo "SALIDA" .$_POST['MODERNA_PEDIATRICA_Salida'];


IF (($_POST['MODERNA_PEDIATRICA_lote']<>""))
	
	{
		If (($_POST['MODERNA_PEDIATRICA_Salida']) > ($row_Recordset1['saldo']))
		{
	
			echo " -----------------------------------------------------------<p>";
			echo "La salida es mayor a las existencias del lote en MODERNA_PEDIATRICA: <p> ";
			echo "Saldo:<b> "  .$row_Recordset1['saldo'] ."</b> <p>" ;
			echo "    Salida:<b>" .$_POST['MODERNA_PEDIATRICA_Salida']."</b> <p>";
			echo "    El movimiento para este insumo no se realiza con exito<p>";
			echo " -----------------------------------------------------------<p>";
			
			$_POST['MODERNA_PEDIATRICA_Salida'] = 0;
		}
		ELSE
		{
				If ((($_POST['MODERNA_PEDIATRICA_Ingreso'] + $_POST['MODERNA_PEDIATRICA_Salida']) >= 1 ) AND ($_POST['MODERNA_PEDIATRICA_lote']<>""))
				{

						require_once('Connections/vacunacion.php');
						$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);

						if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
						{
						  $insertSQL = ("INSERT INTO movimiento_covid 
													(Institucion, 
													Fecha_movimiento,
													Nro_pedido,
													Lote,
													Ingreso,
													Salida)
												
													VALUES 
																	
												  ('".$_POST['Institucion']."',
												   '".$_POST['Fecha_movimiento']."',
												   '".$_POST['Nro_pedido']."',
												   '".$_POST['MODERNA_PEDIATRICA_lote']."',
												   '".$_POST['MODERNA_PEDIATRICA_Ingreso']."',
												   '".$_POST['MODERNA_PEDIATRICA_Salida']."')");
						  
						//echo "insertSQL:".$insertSQL;
						}
						$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

				}
		}

	

	}
	


 ?>


<!-- ---------------------------------------  update del SQL para ingreso MODERNA_PEDIATRICA ---------------------------------------------->
<?php 
//session_start();



IF (($_POST['MODERNA_PEDIATRICA_lote']<>""))
	
	{


If (($_POST['MODERNA_PEDIATRICA_Salida']) > ($row_Recordset1['saldo']))
{
	//echo "INGRESOSSSSS:";
}
ELSE
{


If ((($_POST['MODERNA_PEDIATRICA_Ingreso'] + $_POST['MODERNA_PEDIATRICA_Salida']) >= 1 ) AND ($_POST['MODERNA_PEDIATRICA_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = (" UPDATE `tbl_lote_covid` SET `Saldo`=`Saldo` + '".$_POST['MODERNA_PEDIATRICA_Ingreso']."' WHERE tbl_lote_covid.lote = '".$_POST['MODERNA_PEDIATRICA_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
}
}
 ?>


<!-- ---------------------------------------  update del SQL para salida  MODERNA_PEDIATRICA---------------------------------------------->
<?php 
//session_start();



IF (($_POST['MODERNA_PEDIATRICA_lote']<>""))
	
{


If (($_POST['MODERNA_PEDIATRICA_Salida']) > ($row_Recordset1['saldo']))
{
	//echo "INGRESOSSSSS:";
}
ELSE
{


If ((($_POST['MODERNA_PEDIATRICA_Ingreso'] + $_POST['MODERNA_PEDIATRICA_Salida']) >= 1 ) AND ($_POST['MODERNA_PEDIATRICA_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = (" UPDATE `tbl_lote_covid` SET `Saldo`=`Saldo` - '".$_POST['MODERNA_PEDIATRICA_Salida']."'   WHERE tbl_lote_covid.lote = '".$_POST['MODERNA_PEDIATRICA_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
}
}
 ?>





<!----------------------------------------------------------------------------------- Bloque de SINOVAC ---------------------------------------------->

<?php 
//session_start();
require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


$query_Recordset1 = mysqli_query($vacunacion, "select saldo from tbl_lote_covid where lote =  '".$_POST['SINOVAC_lote']."'");
$row_Recordset1 = mysqli_fetch_assoc($query_Recordset1);

 //echo "SALDO"  .$row_Recordset1['saldo'];
 
 //echo "SALIDA" .$_POST['SINOVAC_Salida'];


IF (($_POST['SINOVAC_lote']<>""))
	
	{
		If (($_POST['SINOVAC_Salida']) > ($row_Recordset1['saldo']))
		{
	
			echo " -----------------------------------------------------------<p>";
			echo "La salida es mayor a las existencias del lote en SINOVAC: <p> ";
			echo "Saldo:<b> "  .$row_Recordset1['saldo'] ."</b> <p>" ;
			echo "    Salida:<b>" .$_POST['SINOVAC_Salida']."</b> <p>";
			echo "    El movimiento para este insumo no se realiza con exito<p>";
			echo " -----------------------------------------------------------<p>";
			
			$_POST['SINOVAC_Salida'] = 0;
		}
		ELSE
		{
				If ((($_POST['SINOVAC_Ingreso'] + $_POST['SINOVAC_Salida']) >= 1 ) AND ($_POST['SINOVAC_lote']<>""))
				{

						require_once('Connections/vacunacion.php');
						$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);

						if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
						{
						  $insertSQL = ("INSERT INTO movimiento_covid 
													(Institucion, 
													Fecha_movimiento,
													Nro_pedido,
													Lote,
													Ingreso,
													Salida)
												
													VALUES 
																	
												  ('".$_POST['Institucion']."',
												   '".$_POST['Fecha_movimiento']."',
												   '".$_POST['Nro_pedido']."',
												   '".$_POST['SINOVAC_lote']."',
												   '".$_POST['SINOVAC_Ingreso']."',
												   '".$_POST['SINOVAC_Salida']."')");
						  
						//echo "insertSQL:".$insertSQL;
						}
						$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

				}
		}

	

	}
	


 ?>


<!-- ---------------------------------------  update del SQL para ingreso SINOVAC ---------------------------------------------->
<?php 
//session_start();



IF (($_POST['SINOVAC_lote']<>""))
	
	{


If (($_POST['SINOVAC_Salida']) > ($row_Recordset1['saldo']))
{
	//echo "INGRESOSSSSS:";
}
ELSE
{


If ((($_POST['SINOVAC_Ingreso'] + $_POST['SINOVAC_Salida']) >= 1 ) AND ($_POST['SINOVAC_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = (" UPDATE `tbl_lote_covid` SET `Saldo`=`Saldo` + '".$_POST['SINOVAC_Ingreso']."' WHERE tbl_lote_covid.lote = '".$_POST['SINOVAC_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
}
}
 ?>


<!-- ---------------------------------------  update del SQL para salida  SINOVAC---------------------------------------------->
<?php 
//session_start();



IF (($_POST['SINOVAC_lote']<>""))
	
{


If (($_POST['SINOVAC_Salida']) > ($row_Recordset1['saldo']))
{
	//echo "INGRESOSSSSS:";
}
ELSE
{


If ((($_POST['SINOVAC_Ingreso'] + $_POST['SINOVAC_Salida']) >= 1 ) AND ($_POST['SINOVAC_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = (" UPDATE `tbl_lote_covid` SET `Saldo`=`Saldo` - '".$_POST['SINOVAC_Salida']."'   WHERE tbl_lote_covid.lote = '".$_POST['SINOVAC_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
}
}
 ?>









<!----------------------------------------------------------------------------------- Bloque de MODERNA_XBB_1_5 ---------------------------------------------->

<?php 
//session_start();
require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


$query_Recordset1 = mysqli_query($vacunacion, "select saldo from tbl_lote_covid where lote =  '".$_POST['MODERNA_XBB_1_5_lote']."'");
$row_Recordset1 = mysqli_fetch_assoc($query_Recordset1);

 //echo "SALDO"  .$row_Recordset1['saldo'];
 
 //echo "SALIDA" .$_POST['MODERNA_XBB_1_5_Salida'];


IF (($_POST['MODERNA_XBB_1_5_lote']<>""))
	
	{
		If (($_POST['MODERNA_XBB_1_5_Salida']) > ($row_Recordset1['saldo']))
		{
	
			echo " -----------------------------------------------------------<p>";
			echo "La salida es mayor a las existencias del lote en MODERNA_XBB_1_5: <p> ";
			echo "Saldo:<b> "  .$row_Recordset1['saldo'] ."</b> <p>" ;
			echo "    Salida:<b>" .$_POST['MODERNA_XBB_1_5_Salida']."</b> <p>";
			echo "    El movimiento para este insumo no se realiza con exito<p>";
			echo " -----------------------------------------------------------<p>";
			
			$_POST['MODERNA_XBB_1_5_Salida'] = 0;
		}
		ELSE
		{
				If ((($_POST['MODERNA_XBB_1_5_Ingreso'] + $_POST['MODERNA_XBB_1_5_Salida']) >= 1 ) AND ($_POST['MODERNA_XBB_1_5_lote']<>""))
				{

						require_once('Connections/vacunacion.php');
						$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);

						if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
						{
						  $insertSQL = ("INSERT INTO movimiento_covid 
													(Institucion, 
													Fecha_movimiento,
													Nro_pedido,
													Lote,
													Ingreso,
													Salida)
												
													VALUES 
																	
												  ('".$_POST['Institucion']."',
												   '".$_POST['Fecha_movimiento']."',
												   '".$_POST['Nro_pedido']."',
												   '".$_POST['MODERNA_XBB_1_5_lote']."',
												   '".$_POST['MODERNA_XBB_1_5_Ingreso']."',
												   '".$_POST['MODERNA_XBB_1_5_Salida']."')");
						  
						//echo "insertSQL:".$insertSQL;
						}
						$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

				}
		}

	

	}
	


 ?>


<!-- ---------------------------------------  update del SQL para ingreso MODERNA_XBB_1_5 ---------------------------------------------->
<?php 
//session_start();



IF (($_POST['MODERNA_XBB_1_5_lote']<>""))
	
	{


If (($_POST['MODERNA_XBB_1_5_Salida']) > ($row_Recordset1['saldo']))
{
	//echo "INGRESOSSSSS:";
}
ELSE
{


If ((($_POST['MODERNA_XBB_1_5_Ingreso'] + $_POST['MODERNA_XBB_1_5_Salida']) >= 1 ) AND ($_POST['MODERNA_XBB_1_5_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = (" UPDATE `tbl_lote_covid` SET `Saldo`=`Saldo` + '".$_POST['MODERNA_XBB_1_5_Ingreso']."' WHERE tbl_lote_covid.lote = '".$_POST['MODERNA_XBB_1_5_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
}
}
 ?>























<!-- ---------------------------------------  update del SQL para salida  MODERNA_XBB_1_5---------------------------------------------->
<?php 
//session_start();



IF (($_POST['MODERNA_XBB_1_5_lote']<>""))
	
{


If (($_POST['MODERNA_XBB_1_5_Salida']) > ($row_Recordset1['saldo']))
{
	//echo "INGRESOSSSSS:";
}
ELSE
{


If ((($_POST['MODERNA_XBB_1_5_Ingreso'] + $_POST['MODERNA_XBB_1_5_Salida']) >= 1 ) AND ($_POST['MODERNA_XBB_1_5_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = (" UPDATE `tbl_lote_covid` SET `Saldo`=`Saldo` - '".$_POST['MODERNA_XBB_1_5_Salida']."'   WHERE tbl_lote_covid.lote = '".$_POST['MODERNA_XBB_1_5_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
}
}
 ?>















<!-- ---------------------------------------------------------------------------------------------------------->
<!-- ---------------------------------------  Ingreso de pedidos ---------------------------------------------->
<!-- ---------------------------------------------------------------------------------------------------------->
<?php 

	If (($_POST['MODERNA_Ingreso'] + $_POST['MODERNA_Salida']+
		$_POST['PFIZER_Ingreso'] + $_POST['PFIZER_Salida']+
		$_POST['ASTRAZENECA_Ingreso'] + $_POST['ASTRAZENECA_Salida']+
		$_POST['CARNE_Ingreso'] + $_POST['CARNE_Salida']+
		$_POST['DILUYENTE_Ingreso'] + $_POST['DILUYENTE_Salida']+
		$_POST['JANSSEN_Ingreso'] + $_POST['JANSSEN_Salida']+
		$_POST['JERINGA22_Ingreso'] + $_POST['JERINGA22_Salida']+
		$_POST['JERINGA23_Ingreso'] + $_POST['JERINGA23_Salida']+
		$_POST['MODERNA_BIVALENTE_Ingreso'] + $_POST['MODERNA_BIVALENTE_Salida']+
		$_POST['MODERNA_PEDIATRICA_Ingreso'] + $_POST['MODERNA_PEDIATRICA_Salida']+
		$_POST['MODERNA_XBB_1_5_Ingreso'] + $_POST['MODERNA_XBB_1_5_Salida']+
		$_POST['SINOVAC_Ingreso'] + $_POST['SINOVAC_Salida'] ) >= 1 )
{


		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = ("INSERT INTO pedido_covid 
									(Nro_pedido, 
									Observaciones, 
									Temperatura)
								
									VALUES 
														
								  ('".$_POST['Nro_pedido']."',
								  '".$_POST['Observaciones']."', 
								   '".$_POST['Temperatura']."')");
							  
		//echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}

 ?>








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<p>!!!!! El movimiento se realizó con exito !!!!!!</p>
<!--<p><a href="Nuevo.php" target="_blank">pagina principal </a></p>  -->
<p><a href="Principal.php" target="_parent">Principal</a></p>

</body>
</html>

