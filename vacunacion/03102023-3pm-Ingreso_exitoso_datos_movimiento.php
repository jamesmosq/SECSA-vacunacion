<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />


<!----------------------------------------------------------------------------------- Bloque de BCG ---------------------------------------------->

<?php 
session_start();
require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


$query_Recordset1 = mysqli_query($vacunacion, "select saldo from tbl_lote where lote =  '".$_POST['BCG_lote']."'");
$row_Recordset1 = mysqli_fetch_assoc($query_Recordset1);


 echo "SALDO"  .$row_Recordset1['saldo'];
 echo "SALIDA" .$_POST['BCG_Salida'];




If (($_POST['BCG_Salida']) > ($row_Recordset1['saldo']))
{
	$_POST['BCG_Salida'] = 0;
	
	echo "La salida es mayor a las existencias del lote en BCG:";
}
ELSE
{

If ((($_POST['BCG_Ingreso'] + $_POST['BCG_Salida']) >= 1 ) AND ($_POST['BCG_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);






		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['BCG_lote']."',
								   '".$_POST['BCG_Ingreso']."',
								   '".$_POST['BCG_Salida']."')");
								  
							  
		//echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}
}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso BCG ---------------------------------------------->
<?php 
//session_start();


If (($_POST['BCG_Salida']) > ($row_Recordset1['saldo']))
{
	//echo "INGRESOSSSSS:";
}
ELSE
{


If ((($_POST['BCG_Ingreso'] + $_POST['BCG_Salida']) >= 1 ) AND ($_POST['BCG_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['BCG_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['BCG_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
}
 ?>


<!-- ---------------------------------------  update del SQL para salida  BCG---------------------------------------------->
<?php 
//session_start();


If (($_POST['BCG_Salida']) > ($row_Recordset1['saldo']))
{
	//echo "INGRESOSSSSS:";
}
ELSE
{


If ((($_POST['BCG_Ingreso'] + $_POST['BCG_Salida']) >= 1 ) AND ($_POST['BCG_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['BCG_Salida']."'   WHERE tbl_lote.lote = '".$_POST['BCG_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
}
 ?>



<!----------------------------------------------------------------------------------- Bloque de VIP ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['VIP_Ingreso'] + $_POST['VIP_Salida']) >= 1 ) AND ($_POST['VIP_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['VIP_lote']."',
								   '".$_POST['VIP_Ingreso']."',
								   '".$_POST['VIP_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso VIP ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['VIP_Ingreso'] + $_POST['VIP_Salida']) >= 1 ) AND ($_POST['VIP_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['VIP_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['VIP_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  VIP---------------------------------------------->
<?php 
//session_start();

If ((($_POST['VIP_Ingreso'] + $_POST['VIP_Salida']) >= 1 ) AND ($_POST['VIP_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['VIP_Salida']."'   WHERE tbl_lote.lote = '".$_POST['VIP_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>


<!----------------------------------------------------------------------------------- Bloque de VOP ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['VOP_Ingreso'] + $_POST['VOP_Salida']) >= 1 ) AND ($_POST['VOP_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['VOP_lote']."',
								   '".$_POST['VOP_Ingreso']."',
								   '".$_POST['VOP_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso VOP ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['VOP_Ingreso'] + $_POST['VOP_Salida']) >= 1 ) AND ($_POST['VOP_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['VOP_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['VOP_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  VOP---------------------------------------------->
<?php 
//session_start();

If ((($_POST['VOP_Ingreso'] + $_POST['VOP_Salida']) >= 1 ) AND ($_POST['VOP_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['VOP_Salida']."'   WHERE tbl_lote.lote = '".$_POST['VOP_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>



<!----------------------------------------------------------------------------------- Bloque de PENTA ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['PENTA_Ingreso'] + $_POST['PENTA_Salida']) >= 1 ) AND ($_POST['PENTA_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['PENTA_lote']."',
								   '".$_POST['PENTA_Ingreso']."',
								   '".$_POST['PENTA_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso PENTA ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['PENTA_Ingreso'] + $_POST['PENTA_Salida']) >= 1 ) AND ($_POST['PENTA_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['PENTA_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['PENTA_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  PENTA---------------------------------------------->
<?php 
//session_start();

If ((($_POST['PENTA_Ingreso'] + $_POST['PENTA_Salida']) >= 1 ) AND ($_POST['PENTA_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['PENTA_Salida']."'   WHERE tbl_lote.lote = '".$_POST['PENTA_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>


<!----------------------------------------------------------------------------------- Bloque de HEXA ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['HEXA_Ingreso'] + $_POST['HEXA_Salida']) >= 1 ) AND ($_POST['HEXA_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['HEXA_lote']."',
								   '".$_POST['HEXA_Ingreso']."',
								   '".$_POST['HEXA_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso HEXA ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['HEXA_Ingreso'] + $_POST['HEXA_Salida']) >= 1 ) AND ($_POST['HEXA_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['HEXA_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['HEXA_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  HEXA---------------------------------------------->
<?php 
//session_start();

If ((($_POST['HEXA_Ingreso'] + $_POST['HEXA_Salida']) >= 1 ) AND ($_POST['HEXA_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['HEXA_Salida']."'   WHERE tbl_lote.lote = '".$_POST['HEXA_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>





<!----------------------------------------------------------------------------------- Bloque de DPT ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['DPT_Ingreso'] + $_POST['DPT_Salida']) >= 1 ) AND ($_POST['DPT_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['DPT_lote']."',
								   '".$_POST['DPT_Ingreso']."',
								   '".$_POST['DPT_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso DPT ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['DPT_Ingreso'] + $_POST['DPT_Salida']) >= 1 ) AND ($_POST['DPT_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['DPT_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['DPT_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  DPT---------------------------------------------->
<?php 
//session_start();

If ((($_POST['DPT_Ingreso'] + $_POST['DPT_Salida']) >= 1 ) AND ($_POST['DPT_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['DPT_Salida']."'   WHERE tbl_lote.lote = '".$_POST['DPT_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>



<!----------------------------------------------------------------------------------- Bloque de DPaTped ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['DPaTped_Ingreso'] + $_POST['DPaTped_Salida']) >= 1 ) AND ($_POST['DPaTped_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['DPaTped_lote']."',
								   '".$_POST['DPaTped_Ingreso']."',
								   '".$_POST['DPaTped_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso DPaTped ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['DPaTped_Ingreso'] + $_POST['DPaTped_Salida']) >= 1 ) AND ($_POST['DPaTped_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['DPaTped_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['DPaTped_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  DPaTped---------------------------------------------->
<?php 
//session_start();

If ((($_POST['DPaTped_Ingreso'] + $_POST['DPaTped_Salida']) >= 1 ) AND ($_POST['DPaTped_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['DPaTped_Salida']."'   WHERE tbl_lote.lote = '".$_POST['DPaTped_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>



<!----------------------------------------------------------------------------------- Bloque de TDped ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['TDped_Ingreso'] + $_POST['TDped_Salida']) >= 1 ) AND ($_POST['TDped_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['TDped_lote']."',
								   '".$_POST['TDped_Ingreso']."',
								   '".$_POST['TDped_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso TDped ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['TDped_Ingreso'] + $_POST['TDped_Salida']) >= 1 ) AND ($_POST['TDped_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['TDped_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['TDped_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  TDped---------------------------------------------->
<?php 
//session_start();

If ((($_POST['TDped_Ingreso'] + $_POST['TDped_Salida']) >= 1 ) AND ($_POST['TDped_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['TDped_Salida']."'   WHERE tbl_lote.lote = '".$_POST['TDped_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>



<!----------------------------------------------------------------------------------- Bloque de HBped ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['HBped_Ingreso'] + $_POST['HBped_Salida']) >= 1 ) AND ($_POST['HBped_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['HBped_lote']."',
								   '".$_POST['HBped_Ingreso']."',
								   '".$_POST['HBped_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso HBped ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['HBped_Ingreso'] + $_POST['HBped_Salida']) >= 1 ) AND ($_POST['HBped_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['HBped_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['HBped_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  HBped---------------------------------------------->
<?php 
//session_start();

If ((($_POST['HBped_Ingreso'] + $_POST['HBped_Salida']) >= 1 ) AND ($_POST['HBped_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['HBped_Salida']."'   WHERE tbl_lote.lote = '".$_POST['HBped_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>






<!----------------------------------------------------------------------------------- Bloque de HBadu ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['HBadu_Ingreso'] + $_POST['HBadu_Salida']) >= 1 ) AND ($_POST['HBadu_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
									(Institucion, 
									Fecha_movimiento,
									Nro_pedido,
									Lote,
									Ingreso,
									Salida,
									Tipo_identificacion,
									Identificacion,
									Nombres_apellidos)
								
									VALUES 
													
								  ('".$_POST['Institucion']."',
								   '".$_POST['Fecha_movimiento']."',
								   '".$_POST['Nro_pedido']."',
								   '".$_POST['HBadu_lote']."',
								   '".$_POST['HBadu_Ingreso']."',
								   '".$_POST['HBadu_Salida']."',
								   '".$_POST['HBadu_tipo_id']."',
								   '".$_POST['HBadu_Id']."',
								   '".$_POST['HBadu_nombres']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso HBadu ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['HBadu_Ingreso'] + $_POST['HBadu_Salida']) >= 1 ) AND ($_POST['HBadu_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['HBadu_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['HBadu_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  HBadu---------------------------------------------->
<?php 
//session_start();

If ((($_POST['HBadu_Ingreso'] + $_POST['HBadu_Salida']) >= 1 ) AND ($_POST['HBadu_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['HBadu_Salida']."'   WHERE tbl_lote.lote = '".$_POST['HBadu_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>




<!----------------------------------------------------------------------------------- Bloque de Rota ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['Rota_Ingreso'] + $_POST['Rota_Salida']) >= 1 ) AND ($_POST['Rota_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['Rota_lote']."',
								   '".$_POST['Rota_Ingreso']."',
								   '".$_POST['Rota_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso Rota ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['Rota_Ingreso'] + $_POST['Rota_Salida']) >= 1 ) AND ($_POST['Rota_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['Rota_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['Rota_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  Rota---------------------------------------------->
<?php 
//session_start();

If ((($_POST['Rota_Ingreso'] + $_POST['Rota_Salida']) >= 1 ) AND ($_POST['Rota_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['Rota_Salida']."'   WHERE tbl_lote.lote = '".$_POST['Rota_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>



<!----------------------------------------------------------------------------------- Bloque de Neumo10 ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['Neumo10_Ingreso'] + $_POST['Neumo10_Salida']) >= 1 ) AND ($_POST['Neumo10_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['Neumo10_lote']."',
								   '".$_POST['Neumo10_Ingreso']."',
								   '".$_POST['Neumo10_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso Neumo10 ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['Neumo10_Ingreso'] + $_POST['Neumo10_Salida']) >= 1 ) AND ($_POST['Neumo10_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['Neumo10_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['Neumo10_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  Neumo10---------------------------------------------->
<?php 
//session_start();

If ((($_POST['Neumo10_Ingreso'] + $_POST['Neumo10_Salida']) >= 1 ) AND ($_POST['Neumo10_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['Neumo10_Salida']."'   WHERE tbl_lote.lote = '".$_POST['Neumo10_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>



<!----------------------------------------------------------------------------------- Bloque de Neumo13 ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['Neumo13_Ingreso'] + $_POST['Neumo13_Salida']) >= 1 ) AND ($_POST['Neumo13_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['Neumo13_lote']."',
								   '".$_POST['Neumo13_Ingreso']."',
								   '".$_POST['Neumo13_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso Neumo13 ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['Neumo13_Ingreso'] + $_POST['Neumo13_Salida']) >= 1 ) AND ($_POST['Neumo13_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['Neumo13_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['Neumo13_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  Neumo13---------------------------------------------->
<?php 
//session_start();

If ((($_POST['Neumo13_Ingreso'] + $_POST['Neumo13_Salida']) >= 1 ) AND ($_POST['Neumo13_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['Neumo13_Salida']."'   WHERE tbl_lote.lote = '".$_POST['Neumo13_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>




<!----------------------------------------------------------------------------------- Bloque de SRP ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['SRP_Ingreso'] + $_POST['SRP_Salida']) >= 1 ) AND ($_POST['SRP_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['SRP_lote']."',
								   '".$_POST['SRP_Ingreso']."',
								   '".$_POST['SRP_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso SRP ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['SRP_Ingreso'] + $_POST['SRP_Salida']) >= 1 ) AND ($_POST['SRP_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['SRP_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['SRP_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  SRP---------------------------------------------->
<?php 
//session_start();

If ((($_POST['SRP_Ingreso'] + $_POST['SRP_Salida']) >= 1 ) AND ($_POST['SRP_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['SRP_Salida']."'   WHERE tbl_lote.lote = '".$_POST['SRP_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>


<!----------------------------------------------------------------------------------- Bloque de FA ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['FA_Ingreso'] + $_POST['FA_Salida']) >= 1 ) AND ($_POST['FA_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['FA_lote']."',
								   '".$_POST['FA_Ingreso']."',
								   '".$_POST['FA_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso FA ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['FA_Ingreso'] + $_POST['FA_Salida']) >= 1 ) AND ($_POST['FA_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['FA_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['FA_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  FA---------------------------------------------->
<?php 
//session_start();

If ((($_POST['FA_Ingreso'] + $_POST['FA_Salida']) >= 1 ) AND ($_POST['FA_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['FA_Salida']."'   WHERE tbl_lote.lote = '".$_POST['FA_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>



<!----------------------------------------------------------------------------------- Bloque de HAped ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['HAped_Ingreso'] + $_POST['HAped_Salida']) >= 1 ) AND ($_POST['HAped_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['HAped_lote']."',
								   '".$_POST['HAped_Ingreso']."',
								   '".$_POST['HAped_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso HAped ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['HAped_Ingreso'] + $_POST['HAped_Salida']) >= 1 ) AND ($_POST['HAped_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['HAped_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['HAped_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  HAped---------------------------------------------->
<?php 
//session_start();

If ((($_POST['HAped_Ingreso'] + $_POST['HAped_Salida']) >= 1 ) AND ($_POST['HAped_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['HAped_Salida']."'   WHERE tbl_lote.lote = '".$_POST['HAped_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>



<!----------------------------------------------------------------------------------- Bloque de Meningo ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['Meningo_Ingreso'] + $_POST['Meningo_Salida']) >= 1 ) AND ($_POST['Meningo_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['Meningo_lote']."',
								   '".$_POST['Meningo_Ingreso']."',
								   '".$_POST['Meningo_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso Meningo ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['Meningo_Ingreso'] + $_POST['Meningo_Salida']) >= 1 ) AND ($_POST['Meningo_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['Meningo_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['Meningo_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  Meningo---------------------------------------------->
<?php 
//session_start();

If ((($_POST['Meningo_Ingreso'] + $_POST['Meningo_Salida']) >= 1 ) AND ($_POST['Meningo_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['Meningo_Salida']."'   WHERE tbl_lote.lote = '".$_POST['Meningo_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>




<!----------------------------------------------------------------------------------- Bloque de Varicela ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['Varicela_Ingreso'] + $_POST['Varicela_Salida']) >= 1 ) AND ($_POST['Varicela_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['Varicela_lote']."',
								   '".$_POST['Varicela_Ingreso']."',
								   '".$_POST['Varicela_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso Varicela ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['Varicela_Ingreso'] + $_POST['Varicela_Salida']) >= 1 ) AND ($_POST['Varicela_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['Varicela_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['Varicela_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  Varicela---------------------------------------------->
<?php 
//session_start();

If ((($_POST['Varicela_Ingreso'] + $_POST['Varicela_Salida']) >= 1 ) AND ($_POST['Varicela_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['Varicela_Salida']."'   WHERE tbl_lote.lote = '".$_POST['Varicela_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>



<!----------------------------------------------------------------------------------- Bloque de SR ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['SR_Ingreso'] + $_POST['SR_Salida']) >= 1 ) AND ($_POST['SR_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['SR_lote']."',
								   '".$_POST['SR_Ingreso']."',
								   '".$_POST['SR_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso SR ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['SR_Ingreso'] + $_POST['SR_Salida']) >= 1 ) AND ($_POST['SR_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['SR_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['SR_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  SR---------------------------------------------->
<?php 
//session_start();

If ((($_POST['SR_Ingreso'] + $_POST['SR_Salida']) >= 1 ) AND ($_POST['SR_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['SR_Salida']."'   WHERE tbl_lote.lote = '".$_POST['SR_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>


<!----------------------------------------------------------------------------------- Bloque de Tdadu ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['Tdadu_Ingreso'] + $_POST['Tdadu_Salida']) >= 1 ) AND ($_POST['Tdadu_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['Tdadu_lote']."',
								   '".$_POST['Tdadu_Ingreso']."',
								   '".$_POST['Tdadu_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso Tdadu ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['Tdadu_Ingreso'] + $_POST['Tdadu_Salida']) >= 1 ) AND ($_POST['Tdadu_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['Tdadu_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['Tdadu_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  Tdadu---------------------------------------------->
<?php 
//session_start();

If ((($_POST['Tdadu_Ingreso'] + $_POST['Tdadu_Salida']) >= 1 ) AND ($_POST['Tdadu_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['Tdadu_Salida']."'   WHERE tbl_lote.lote = '".$_POST['Tdadu_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>






<!----------------------------------------------------------------------------------- Bloque de DPaTadu ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['DPaTadu_Ingreso'] + $_POST['DPaTadu_Salida']) >= 1 ) AND ($_POST['DPaTadu_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['DPaTadu_lote']."',
								   '".$_POST['DPaTadu_Ingreso']."',
								   '".$_POST['DPaTadu_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso DPaTadu ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['DPaTadu_Ingreso'] + $_POST['DPaTadu_Salida']) >= 1 ) AND ($_POST['DPaTadu_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['DPaTadu_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['DPaTadu_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  DPaTadu---------------------------------------------->
<?php 
//session_start();

If ((($_POST['DPaTadu_Ingreso'] + $_POST['DPaTadu_Salida']) >= 1 ) AND ($_POST['DPaTadu_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['DPaTadu_Salida']."'   WHERE tbl_lote.lote = '".$_POST['DPaTadu_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>


<!----------------------------------------------------------------------------------- Bloque de Influenzaped ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['Influenzaped_Ingreso'] + $_POST['Influenzaped_Salida']) >= 1 ) AND ($_POST['Influenzaped_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['Influenzaped_lote']."',
								   '".$_POST['Influenzaped_Ingreso']."',
								   '".$_POST['Influenzaped_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso Influenzaped ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['Influenzaped_Ingreso'] + $_POST['Influenzaped_Salida']) >= 1 ) AND ($_POST['Influenzaped_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['Influenzaped_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['Influenzaped_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  Influenzaped---------------------------------------------->
<?php 
//session_start();

If ((($_POST['Influenzaped_Ingreso'] + $_POST['Influenzaped_Salida']) >= 1 ) AND ($_POST['Influenzaped_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['Influenzaped_Salida']."'   WHERE tbl_lote.lote = '".$_POST['Influenzaped_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>


<!----------------------------------------------------------------------------------- Bloque de Antigripal ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['Antigripal_Ingreso'] + $_POST['Antigripal_Salida']) >= 1 ) AND ($_POST['Antigripal_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['Antigripal_lote']."',
								   '".$_POST['Antigripal_Ingreso']."',
								   '".$_POST['Antigripal_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso Antigripal ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['Antigripal_Ingreso'] + $_POST['Antigripal_Salida']) >= 1 ) AND ($_POST['Antigripal_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['Antigripal_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['Antigripal_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  Antigripal---------------------------------------------->
<?php 
//session_start();

If ((($_POST['Antigripal_Ingreso'] + $_POST['Antigripal_Salida']) >= 1 ) AND ($_POST['Antigripal_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['Antigripal_Salida']."'   WHERE tbl_lote.lote = '".$_POST['Antigripal_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>



<!----------------------------------------------------------------------------------- Bloque de VPH ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['VPH_Ingreso'] + $_POST['VPH_Salida']) >= 1 ) AND ($_POST['VPH_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
									(Institucion, 
									Fecha_movimiento,
									Nro_pedido,
									Lote,
									Ingreso,
									Salida,
									)
								
									VALUES 
													
								  ('".$_POST['Institucion']."',
								   '".$_POST['Fecha_movimiento']."',
								   '".$_POST['Nro_pedido']."',
								   '".$_POST['VPH_lote']."',
								   '".$_POST['VPH_Ingreso']."',
								   '".$_POST['VPH_Salida']."')");

							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso VPH ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['VPH_Ingreso'] + $_POST['VPH_Salida']) >= 1 ) AND ($_POST['VPH_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['VPH_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['VPH_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  VPH---------------------------------------------->
<?php 
//session_start();

If ((($_POST['VPH_Ingreso'] + $_POST['VPH_Salida']) >= 1 ) AND ($_POST['VPH_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['VPH_Salida']."'   WHERE tbl_lote.lote = '".$_POST['VPH_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>



<!----------------------------------------------------------------------------------- Bloque de VAH ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['VAH_Ingreso'] + $_POST['VAH_Salida']) >= 1 ) AND ($_POST['VAH_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
									(Institucion, 
									Fecha_movimiento,
									Nro_pedido,
									Lote,
									Ingreso,
									Salida,
									Tipo_identificacion,
									Identificacion,
									Nombres_apellidos)
								
									VALUES 
													
								  ('".$_POST['Institucion']."',
								   '".$_POST['Fecha_movimiento']."',
								   '".$_POST['Nro_pedido']."',
								   '".$_POST['VAH_lote']."',
								   '".$_POST['VAH_Ingreso']."',
								   '".$_POST['VAH_Salida']."',
								   '".$_POST['VAH_tipo_id']."',
								   '".$_POST['VAH_Id']."',
								   '".$_POST['VAH_nombres']."')");
								  
								  
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso VAH ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['VAH_Ingreso'] + $_POST['VAH_Salida']) >= 1 ) AND ($_POST['VAH_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['VAH_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['VAH_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  VAH---------------------------------------------->
<?php 
//session_start();

If ((($_POST['VAH_Ingreso'] + $_POST['VAH_Salida']) >= 1 ) AND ($_POST['VAH_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['VAH_Salida']."'   WHERE tbl_lote.lote = '".$_POST['VAH_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>



<!----------------------------------------------------------------------------------- Bloque de IAH ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['IAH_Ingreso'] + $_POST['IAH_Salida']) >= 1 ) AND ($_POST['IAH_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
									(Institucion, 
									Fecha_movimiento,
									Nro_pedido,
									Lote,
									Ingreso,
									Salida,
									Tipo_identificacion,
									Identificacion,
									Nombres_apellidos)
								
									VALUES 
								
								  ('".$_POST['Institucion']."',
								   '".$_POST['Fecha_movimiento']."',
								   '".$_POST['Nro_pedido']."',
								   '".$_POST['IAH_lote']."',
								   '".$_POST['IAH_Ingreso']."',
								   '".$_POST['IAH_Salida']."',
								   '".$_POST['IAH_tipo_id']."',
								   '".$_POST['IAH_Id']."',
								   '".$_POST['IAH_nombres']."')");
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso IAH ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['IAH_Ingreso'] + $_POST['IAH_Salida']) >= 1 ) AND ($_POST['IAH_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['IAH_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['IAH_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  IAH---------------------------------------------->
<?php 
//session_start();

If ((($_POST['IAH_Ingreso'] + $_POST['IAH_Salida']) >= 1 ) AND ($_POST['IAH_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['IAH_Salida']."'   WHERE tbl_lote.lote = '".$_POST['IAH_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>




<!----------------------------------------------------------------------------------- Bloque de IHB ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['IHB_Ingreso'] + $_POST['IHB_Salida']) >= 1 ) AND ($_POST['IHB_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		 						  $insertSQL = utf8_decode("INSERT INTO movimiento 
									(Institucion, 
									Fecha_movimiento,
									Nro_pedido,
									Lote,
									Ingreso,
									Salida,
									Tipo_identificacion,
									Identificacion,
									Nombres_apellidos)
								
									VALUES 
										
								  ('".$_POST['Institucion']."',
								   '".$_POST['Fecha_movimiento']."',
								   '".$_POST['Nro_pedido']."',
								   '".$_POST['IHB_lote']."',
								   '".$_POST['IHB_Ingreso']."',
								   '".$_POST['IHB_Salida']."',
								   '".$_POST['IHB_tipo_id']."',
								   '".$_POST['IHB_Id']."',
								   '".$_POST['IHB_nombres']."')");
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso IHB ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['IHB_Ingreso'] + $_POST['IHB_Salida']) >= 1 ) AND ($_POST['IHB_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['IHB_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['IHB_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  IHB---------------------------------------------->
<?php 
//session_start();

If ((($_POST['IHB_Ingreso'] + $_POST['IHB_Salida']) >= 1 ) AND ($_POST['IHB_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['IHB_Salida']."'   WHERE tbl_lote.lote = '".$_POST['IHB_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>



<!----------------------------------------------------------------------------------- Bloque de Iglobulina ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['Iglobulina_Ingreso'] + $_POST['Iglobulina_Salida']) >= 1 ) AND ($_POST['Iglobulina_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
									(Institucion, 
									Fecha_movimiento,
									Nro_pedido,
									Lote,
									Ingreso,
									Salida,
									Tipo_identificacion,
									Identificacion,
									Nombres_apellidos)
								
									VALUES 
												
								  ('".$_POST['Institucion']."',
								   '".$_POST['Fecha_movimiento']."',
								   '".$_POST['Nro_pedido']."',
								   '".$_POST['Iglobulina_lote']."',
								   '".$_POST['Iglobulina_Ingreso']."',
								   '".$_POST['Iglobulina_Salida']."',
								   '".$_POST['Iglobulina_tipo_id']."',
								   '".$_POST['Iglobulina_Id']."',
								   '".$_POST['Iglobulina_nombres']."')");
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso Iglobulina ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['Iglobulina_Ingreso'] + $_POST['Iglobulina_Salida']) >= 1 ) AND ($_POST['Iglobulina_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['Iglobulina_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['Iglobulina_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  Iglobulina---------------------------------------------->
<?php 
//session_start();

If ((($_POST['Iglobulina_Ingreso'] + $_POST['Iglobulina_Salida']) >= 1 ) AND ($_POST['Iglobulina_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['Iglobulina_Salida']."'   WHERE tbl_lote.lote = '".$_POST['Iglobulina_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>


<!----------------------------------------------------------------------------------- Bloque de Antitetanica ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['Antitetanica_Ingreso'] + $_POST['Antitetanica_Salida']) >= 1 ) AND ($_POST['Antitetanica_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
			
			 $insertSQL = utf8_decode("INSERT INTO movimiento 
									(Institucion, 
									Fecha_movimiento,
									Nro_pedido,
									Lote,
									Ingreso,
									Salida,
									Tipo_identificacion,
									Identificacion,
									Nombres_apellidos)
								
									VALUES 
								
												
								  ('".$_POST['Institucion']."',
								   '".$_POST['Fecha_movimiento']."',
								   '".$_POST['Nro_pedido']."',
								   '".$_POST['Antitetanica_lote']."',
								   '".$_POST['Antitetanica_Ingreso']."',
								   '".$_POST['Antitetanica_Salida']."',
								   '".$_POST['Antitetanica_tipo_id']."',
								   '".$_POST['Antitetanica_Id']."',
								   '".$_POST['Antitetanica_nombres']."')");
			
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso Antitetanica ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['Antitetanica_Ingreso'] + $_POST['Antitetanica_Salida']) >= 1 ) AND ($_POST['Antitetanica_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['Antitetanica_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['Antitetanica_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  Antitetanica---------------------------------------------->
<?php 
//session_start();

If ((($_POST['Antitetanica_Ingreso'] + $_POST['Antitetanica_Salida']) >= 1 ) AND ($_POST['Antitetanica_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['Antitetanica_Salida']."'   WHERE tbl_lote.lote = '".$_POST['Antitetanica_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>


<!----------------------------------------------------------------------------------- Bloque de Antidifterica ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['Antidifterica_Ingreso'] + $_POST['Antidifterica_Salida']) >= 1 ) AND ($_POST['Antidifterica_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  
		   $insertSQL = utf8_decode("INSERT INTO movimiento 
									(Institucion, 
									Fecha_movimiento,
									Nro_pedido,
									Lote,
									Ingreso,
									Salida,
									Tipo_identificacion,
									Identificacion,
									Nombres_apellidos)
								
									VALUES 
								
												
								  ('".$_POST['Institucion']."',
								   '".$_POST['Fecha_movimiento']."',
								   '".$_POST['Nro_pedido']."',
								   '".$_POST['Antidifterica_lote']."',
								   '".$_POST['Antidifterica_Ingreso']."',
								   '".$_POST['Antidifterica_Salida']."',
								   '".$_POST['Antidifterica_tipo_id']."',
								   '".$_POST['Antidifterica_Id']."',
								   '".$_POST['Antidifterica_nombres']."')");
		  
		  
		 
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso Antidifterica ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['Antidifterica_Ingreso'] + $_POST['Antidifterica_Salida']) >= 1 ) AND ($_POST['Antidifterica_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['Antidifterica_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['Antidifterica_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  Antidifterica---------------------------------------------->
<?php 
//session_start();

If ((($_POST['Antidifterica_Ingreso'] + $_POST['Antidifterica_Salida']) >= 1 ) AND ($_POST['Antidifterica_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['Antidifterica_Salida']."'   WHERE tbl_lote.lote = '".$_POST['Antidifterica_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>




<!----------------------------------------------------------------------------------- Bloque de DBCG ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['DBCG_Ingreso'] + $_POST['DBCG_Salida']) >= 1 ) AND ($_POST['DBCG_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['DBCG_lote']."',
								   '".$_POST['DBCG_Ingreso']."',
								   '".$_POST['DBCG_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso DBCG ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['DBCG_Ingreso'] + $_POST['DBCG_Salida']) >= 1 ) AND ($_POST['DBCG_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['DBCG_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['DBCG_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  DBCG---------------------------------------------->
<?php 
//session_start();

If ((($_POST['DBCG_Ingreso'] + $_POST['DBCG_Salida']) >= 1 ) AND ($_POST['DBCG_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['DBCG_Salida']."'   WHERE tbl_lote.lote = '".$_POST['DBCG_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>




<!----------------------------------------------------------------------------------- Bloque de DSRP ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['DSRP_Ingreso'] + $_POST['DSRP_Salida']) >= 1 ) AND ($_POST['DSRP_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['DSRP_lote']."',
								   '".$_POST['DSRP_Ingreso']."',
								   '".$_POST['DSRP_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso DSRP ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['DSRP_Ingreso'] + $_POST['DSRP_Salida']) >= 1 ) AND ($_POST['DSRP_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['DSRP_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['DSRP_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  DSRP---------------------------------------------->
<?php 
//session_start();

If ((($_POST['DSRP_Ingreso'] + $_POST['DSRP_Salida']) >= 1 ) AND ($_POST['DSRP_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['DSRP_Salida']."'   WHERE tbl_lote.lote = '".$_POST['DSRP_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>



<!----------------------------------------------------------------------------------- Bloque de DSR ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['DSR_Ingreso'] + $_POST['DSR_Salida']) >= 1 ) AND ($_POST['DSR_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['DSR_lote']."',
								   '".$_POST['DSR_Ingreso']."',
								   '".$_POST['DSR_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso DSR ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['DSR_Ingreso'] + $_POST['DSR_Salida']) >= 1 ) AND ($_POST['DSR_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['DSR_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['DSR_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  DSR---------------------------------------------->
<?php 
//session_start();

If ((($_POST['DSR_Ingreso'] + $_POST['DSR_Salida']) >= 1 ) AND ($_POST['DSR_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['DSR_Salida']."'   WHERE tbl_lote.lote = '".$_POST['DSR_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>


<!----------------------------------------------------------------------------------- Bloque de DFA ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['DFA_Ingreso'] + $_POST['DFA_Salida']) >= 1 ) AND ($_POST['DFA_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['DFA_lote']."',
								   '".$_POST['DFA_Ingreso']."',
								   '".$_POST['DFA_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso DFA ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['DFA_Ingreso'] + $_POST['DFA_Salida']) >= 1 ) AND ($_POST['DFA_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['DFA_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['DFA_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  DFA---------------------------------------------->
<?php 
//session_start();

If ((($_POST['DFA_Ingreso'] + $_POST['DFA_Salida']) >= 1 ) AND ($_POST['DFA_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['DFA_Salida']."'   WHERE tbl_lote.lote = '".$_POST['DFA_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>



<!----------------------------------------------------------------------------------- Bloque de Dvaricela ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['Dvaricela_Ingreso'] + $_POST['Dvaricela_Salida']) >= 1 ) AND ($_POST['Dvaricela_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['Dvaricela_lote']."',
								   '".$_POST['Dvaricela_Ingreso']."',
								   '".$_POST['Dvaricela_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso Dvaricela ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['Dvaricela_Ingreso'] + $_POST['Dvaricela_Salida']) >= 1 ) AND ($_POST['Dvaricela_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['Dvaricela_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['Dvaricela_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  Dvaricela---------------------------------------------->
<?php 
//session_start();

If ((($_POST['Dvaricela_Ingreso'] + $_POST['Dvaricela_Salida']) >= 1 ) AND ($_POST['Dvaricela_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['Dvaricela_Salida']."'   WHERE tbl_lote.lote = '".$_POST['Dvaricela_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>



<!----------------------------------------------------------------------------------- Bloque de DVAH ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['DVAH_Ingreso'] + $_POST['DVAH_Salida']) >= 1 ) AND ($_POST['DVAH_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		   $insertSQL = utf8_decode("INSERT INTO movimiento 
									(Institucion, 
									Fecha_movimiento,
									Nro_pedido,
									Lote,
									Ingreso,
									Salida,
									Tipo_identificacion,
									Identificacion,
									Nombres_apellidos)
								
									VALUES 
								
												
								  ('".$_POST['Institucion']."',
								   '".$_POST['Fecha_movimiento']."',
								   '".$_POST['Nro_pedido']."',
								   '".$_POST['DVAH_lote']."',
								   '".$_POST['DVAH_Ingreso']."',
								   '".$_POST['DVAH_Salida']."',
								   '".$_POST['DVAH_tipo_id']."',
								   '".$_POST['DVAH_Id']."',
								   '".$_POST['DVAH_nombres']."')");
		  
		  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso DVAH ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['DVAH_Ingreso'] + $_POST['DVAH_Salida']) >= 1 ) AND ($_POST['DVAH_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['DVAH_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['DVAH_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  DVAH---------------------------------------------->
<?php 
//session_start();

If ((($_POST['DVAH_Ingreso'] + $_POST['DVAH_Salida']) >= 1 ) AND ($_POST['DVAH_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['DVAH_Salida']."'   WHERE tbl_lote.lote = '".$_POST['DVAH_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>
 
 <!----------------------------------------------------------------------------------- Bloque de Smeningo ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['Smeningo_Ingreso'] + $_POST['Smeningo_Salida']) >= 1 ) AND ($_POST['Smeningo_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['Smeningo_lote']."',
								   '".$_POST['Smeningo_Ingreso']."',
								   '".$_POST['Smeningo_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso Smeningo ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['Smeningo_Ingreso'] + $_POST['Smeningo_Salida']) >= 1 ) AND ($_POST['Smeningo_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['Smeningo_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['Smeningo_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  Smeningo---------------------------------------------->
<?php 
//session_start();

If ((($_POST['Smeningo_Ingreso'] + $_POST['Smeningo_Salida']) >= 1 ) AND ($_POST['Smeningo_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['Smeningo_Salida']."'   WHERE tbl_lote.lote = '".$_POST['Smeningo_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>



<!----------------------------------------------------------------------------------- Bloque de J22auto ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['J22auto_Ingreso'] + $_POST['J22auto_Salida']) >= 1 ) AND ($_POST['J22auto_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['J22auto_lote']."',
								   '".$_POST['J22auto_Ingreso']."',
								   '".$_POST['J22auto_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso J22auto ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['J22auto_Ingreso'] + $_POST['J22auto_Salida']) >= 1 ) AND ($_POST['J22auto_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['J22auto_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['J22auto_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  J22auto---------------------------------------------->
<?php 
//session_start();

If ((($_POST['J22auto_Ingreso'] + $_POST['J22auto_Salida']) >= 1 ) AND ($_POST['J22auto_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['J22auto_Salida']."'   WHERE tbl_lote.lote = '".$_POST['J22auto_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>


<!----------------------------------------------------------------------------------- Bloque de J22con ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['J22con_Ingreso'] + $_POST['J22con_Salida']) >= 1 ) AND ($_POST['J22con_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['J22con_lote']."',
								   '".$_POST['J22con_Ingreso']."',
								   '".$_POST['J22con_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso J22con ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['J22con_Ingreso'] + $_POST['J22con_Salida']) >= 1 ) AND ($_POST['J22con_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['J22con_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['J22con_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  J22con---------------------------------------------->
<?php 
//session_start();

If ((($_POST['J22con_Ingreso'] + $_POST['J22con_Salida']) >= 1 ) AND ($_POST['J22con_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['J22con_Salida']."'   WHERE tbl_lote.lote = '".$_POST['J22con_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>



<!----------------------------------------------------------------------------------- Bloque de J23auto ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['J23auto_Ingreso'] + $_POST['J23auto_Salida']) >= 1 ) AND ($_POST['J23auto_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['J23auto_lote']."',
								   '".$_POST['J23auto_Ingreso']."',
								   '".$_POST['J23auto_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso J23auto ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['J23auto_Ingreso'] + $_POST['J23auto_Salida']) >= 1 ) AND ($_POST['J23auto_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['J23auto_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['J23auto_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  J23auto---------------------------------------------->
<?php 
//session_start();

If ((($_POST['J23auto_Ingreso'] + $_POST['J23auto_Salida']) >= 1 ) AND ($_POST['J23auto_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['J23auto_Salida']."'   WHERE tbl_lote.lote = '".$_POST['J23auto_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>


<!----------------------------------------------------------------------------------- Bloque de J23con ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['J23con_Ingreso'] + $_POST['J23con_Salida']) >= 1 ) AND ($_POST['J23con_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['J23con_lote']."',
								   '".$_POST['J23con_Ingreso']."',
								   '".$_POST['J23con_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso J23con ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['J23con_Ingreso'] + $_POST['J23con_Salida']) >= 1 ) AND ($_POST['J23con_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['J23con_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['J23con_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  J23con---------------------------------------------->
<?php 
//session_start();

If ((($_POST['J23con_Ingreso'] + $_POST['J23con_Salida']) >= 1 ) AND ($_POST['J23con_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['J23con_Salida']."'   WHERE tbl_lote.lote = '".$_POST['J23con_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>




<!----------------------------------------------------------------------------------- Bloque de J25auto ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['J25auto_Ingreso'] + $_POST['J25auto_Salida']) >= 1 ) AND ($_POST['J25auto_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['J25auto_lote']."',
								   '".$_POST['J25auto_Ingreso']."',
								   '".$_POST['J25auto_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso J25auto ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['J25auto_Ingreso'] + $_POST['J25auto_Salida']) >= 1 ) AND ($_POST['J25auto_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['J25auto_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['J25auto_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  J25auto---------------------------------------------->
<?php 
//session_start();

If ((($_POST['J25auto_Ingreso'] + $_POST['J25auto_Salida']) >= 1 ) AND ($_POST['J25auto_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['J25auto_Salida']."'   WHERE tbl_lote.lote = '".$_POST['J25auto_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>



<!----------------------------------------------------------------------------------- Bloque de J25con ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['J25con_Ingreso'] + $_POST['J25con_Salida']) >= 1 ) AND ($_POST['J25con_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['J25con_lote']."',
								   '".$_POST['J25con_Ingreso']."',
								   '".$_POST['J25con_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso J25con ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['J25con_Ingreso'] + $_POST['J25con_Salida']) >= 1 ) AND ($_POST['J25con_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['J25con_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['J25con_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  J25con---------------------------------------------->
<?php 
//session_start();

If ((($_POST['J25con_Ingreso'] + $_POST['J25con_Salida']) >= 1 ) AND ($_POST['J25con_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['J25con_Salida']."'   WHERE tbl_lote.lote = '".$_POST['J25con_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>




<!----------------------------------------------------------------------------------- Bloque de J26auto ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['J26auto_Ingreso'] + $_POST['J26auto_Salida']) >= 1 ) AND ($_POST['J26auto_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['J26auto_lote']."',
								   '".$_POST['J26auto_Ingreso']."',
								   '".$_POST['J26auto_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso J26auto ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['J26auto_Ingreso'] + $_POST['J26auto_Salida']) >= 1 ) AND ($_POST['J26auto_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['J26auto_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['J26auto_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  J26auto---------------------------------------------->
<?php 
//session_start();

If ((($_POST['J26auto_Ingreso'] + $_POST['J26auto_Salida']) >= 1 ) AND ($_POST['J26auto_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['J26auto_Salida']."'   WHERE tbl_lote.lote = '".$_POST['J26auto_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>



<!----------------------------------------------------------------------------------- Bloque de J26con ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['J26con_Ingreso'] + $_POST['J26con_Salida']) >= 1 ) AND ($_POST['J26con_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['J26con_lote']."',
								   '".$_POST['J26con_Ingreso']."',
								   '".$_POST['J26con_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso J26con ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['J26con_Ingreso'] + $_POST['J26con_Salida']) >= 1 ) AND ($_POST['J26con_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['J26con_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['J26con_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  J26con---------------------------------------------->
<?php 
//session_start();

If ((($_POST['J26con_Ingreso'] + $_POST['J26con_Salida']) >= 1 ) AND ($_POST['J26con_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['J26con_Salida']."'   WHERE tbl_lote.lote = '".$_POST['J26con_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>


<!----------------------------------------------------------------------------------- Bloque de J27 ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['J27_Ingreso'] + $_POST['J27_Salida']) >= 1 ) AND ($_POST['J27_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['J27_lote']."',
								   '".$_POST['J27_Ingreso']."',
								   '".$_POST['J27_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso J27 ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['J27_Ingreso'] + $_POST['J27_Salida']) >= 1 ) AND ($_POST['J27_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['J27_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['J27_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  J27---------------------------------------------->
<?php 
//session_start();

If ((($_POST['J27_Ingreso'] + $_POST['J27_Salida']) >= 1 ) AND ($_POST['J27_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['J27_Salida']."'   WHERE tbl_lote.lote = '".$_POST['J27_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>




<!----------------------------------------------------------------------------------- Bloque de Gotero ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['Gotero_Ingreso'] + $_POST['Gotero_Salida']) >= 1 ) AND ($_POST['Gotero_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['Gotero_lote']."',
								   '".$_POST['Gotero_Ingreso']."',
								   '".$_POST['Gotero_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso Gotero ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['Gotero_Ingreso'] + $_POST['Gotero_Salida']) >= 1 ) AND ($_POST['Gotero_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['Gotero_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['Gotero_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  Gotero---------------------------------------------->
<?php 
//session_start();

If ((($_POST['Gotero_Ingreso'] + $_POST['Gotero_Salida']) >= 1 ) AND ($_POST['Gotero_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['Gotero_Salida']."'   WHERE tbl_lote.lote = '".$_POST['Gotero_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>


<!----------------------------------------------------------------------------------- Bloque de Cinfantil ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['Cinfantil_Ingreso'] + $_POST['Cinfantil_Salida']) >= 1 ) AND ($_POST['Cinfantil_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['Cinfantil_lote']."',
								   '".$_POST['Cinfantil_Ingreso']."',
								   '".$_POST['Cinfantil_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso Cinfantil ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['Cinfantil_Ingreso'] + $_POST['Cinfantil_Salida']) >= 1 ) AND ($_POST['Cinfantil_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['Cinfantil_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['Cinfantil_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  Cinfantil---------------------------------------------->
<?php 
//session_start();

If ((($_POST['Cinfantil_Ingreso'] + $_POST['Cinfantil_Salida']) >= 1 ) AND ($_POST['Cinfantil_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['Cinfantil_Salida']."'   WHERE tbl_lote.lote = '".$_POST['Cinfantil_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>




<!----------------------------------------------------------------------------------- Bloque de Cadulto ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['Cadulto_Ingreso'] + $_POST['Cadulto_Salida']) >= 1 ) AND ($_POST['Cadulto_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['Cadulto_lote']."',
								   '".$_POST['Cadulto_Ingreso']."',
								   '".$_POST['Cadulto_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso Cadulto ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['Cadulto_Ingreso'] + $_POST['Cadulto_Salida']) >= 1 ) AND ($_POST['Cadulto_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['Cadulto_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['Cadulto_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  Cadulto---------------------------------------------->
<?php 
//session_start();

If ((($_POST['Cadulto_Ingreso'] + $_POST['Cadulto_Salida']) >= 1 ) AND ($_POST['Cadulto_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['Cadulto_Salida']."'   WHERE tbl_lote.lote = '".$_POST['Cadulto_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>



<!----------------------------------------------------------------------------------- Bloque de Cinternacional ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['Cinternacional_Ingreso'] + $_POST['Cinternacional_Salida']) >= 1 ) AND ($_POST['Cinternacional_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['Cinternacional_lote']."',
								   '".$_POST['Cinternacional_Ingreso']."',
								   '".$_POST['Cinternacional_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso Cinternacional ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['Cinternacional_Ingreso'] + $_POST['Cinternacional_Salida']) >= 1 ) AND ($_POST['Cinternacional_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['Cinternacional_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['Cinternacional_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  Cinternacional---------------------------------------------->
<?php 
//session_start();

If ((($_POST['Cinternacional_Ingreso'] + $_POST['Cinternacional_Salida']) >= 1 ) AND ($_POST['Cinternacional_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['Cinternacional_Salida']."'   WHERE tbl_lote.lote = '".$_POST['Cinternacional_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>


<!----------------------------------------------------------------------------------- Bloque de Tadulto ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['Tadulto_Ingreso'] + $_POST['Tadulto_Salida']) >= 1 ) AND ($_POST['Tadulto_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['Tadulto_lote']."',
								   '".$_POST['Tadulto_Ingreso']."',
								   '".$_POST['Tadulto_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso Tadulto ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['Tadulto_Ingreso'] + $_POST['Tadulto_Salida']) >= 1 ) AND ($_POST['Tadulto_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['Tadulto_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['Tadulto_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  Tadulto---------------------------------------------->
<?php 
//session_start();

If ((($_POST['Tadulto_Ingreso'] + $_POST['Tadulto_Salida']) >= 1 ) AND ($_POST['Tadulto_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['Tadulto_Salida']."'   WHERE tbl_lote.lote = '".$_POST['Tadulto_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>




<!----------------------------------------------------------------------------------- Bloque de Tnino ---------------------------------------------->

<?php 
//session_start();
If ((($_POST['Tnino_Ingreso'] + $_POST['Tnino_Salida']) >= 1 ) AND ($_POST['Tnino_lote']<>""))
{

		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO movimiento 
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
								   '".$_POST['Tnino_lote']."',
								   '".$_POST['Tnino_Ingreso']."',
								   '".$_POST['Tnino_Salida']."')");
								  
							  
		echo "insertSQL:".$insertSQL;

		}
		$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());


}

 ?>


<!-- ---------------------------------------  update del SQL para ingreso Tnino ---------------------------------------------->
<?php 
//session_start();
If ((($_POST['Tnino_Ingreso'] + $_POST['Tnino_Salida']) >= 1 ) AND ($_POST['Tnino_lote']<>""))
{

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
{
  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` + '".$_POST['Tnino_Ingreso']."'   WHERE tbl_lote.lote = '".$_POST['Tnino_lote']."' ");
					  
//echo "insertSQL:".$insertSQL;

}
$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());

}
 ?>


<!-- ---------------------------------------  update del SQL para salida  Tnino---------------------------------------------->
<?php 
//session_start();

If ((($_POST['Tnino_Ingreso'] + $_POST['Tnino_Salida']) >= 1 ) AND ($_POST['Tnino_lote']<>""))
{
	
			require_once('Connections/vacunacion.php');
			$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


			if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
			{
			  $insertSQL = utf8_decode(" UPDATE `tbl_lote` SET `Saldo`=`Saldo` - '".$_POST['Tnino_Salida']."'   WHERE tbl_lote.lote = '".$_POST['Tnino_lote']."' ");
								  
			//echo "insertSQL:".$insertSQL;

			}
			$Result1 = mysqli_query($vacunacion, $insertSQL) or die(mysql_error());
}
 ?>








































<!-- ---------------------------------------------------------------------------------------------------------->
<!-- ---------------------------------------  Ingreso de pedidos ---------------------------------------------->
<!-- ---------------------------------------------------------------------------------------------------------->
<?php 

	If (($_POST['BCG_Ingreso'] + $_POST['BCG_Salida']+
		$_POST['VIP_Ingreso'] + $_POST['VIP_Salida']+
		$_POST['VOP_Ingreso'] + $_POST['VOP_Salida']+
		$_POST['PENTA_Ingreso'] + $_POST['PENTA_Salida']+
		$_POST['HEXA_Ingreso'] + $_POST['HEXA_Salida']+
		$_POST['DPT_Ingreso'] + $_POST['DPT_Salida']+
		$_POST['DPaTped_Ingreso'] + $_POST['DPaTped_Salida']+
		$_POST['TDped_Ingreso'] + $_POST['TDped_Salida']+
		$_POST['HBped_Ingreso'] + $_POST['HBped_Salida']+
		$_POST['HBadu_Ingreso'] + $_POST['HBadu_Salida']+
		$_POST['Rota_Ingreso'] + $_POST['Rota_Salida']+
		$_POST['Neumo10_Ingreso'] + $_POST['Neumo10_Salida']+
		$_POST['Neumo13_Ingreso'] + $_POST['Neumo13_Salida']+
		$_POST['SRP_Ingreso'] + $_POST['SRP_Salida']+
		$_POST['FA_Ingreso'] + $_POST['FA_Salida']+
		$_POST['HAped_Ingreso'] + $_POST['HAped_Salida']+
		$_POST['Meningo_Ingreso'] + $_POST['Meningo_Salida']+
		$_POST['Varicela_Ingreso'] + $_POST['Varicela_Salida']+
		$_POST['SR_Ingreso'] + $_POST['SR_Salida']+
		$_POST['Tdadu_Ingreso'] + $_POST['Tdadu_Salida']+
		$_POST['DPaTadu_Ingreso'] + $_POST['DPaTadu_Salida']+
		$_POST['Influenzaped_Ingreso'] + $_POST['Influenzaped_Salida']+
		$_POST['Antigripal_Ingreso'] + $_POST['Antigripal_Salida']+
		$_POST['VPH_Ingreso'] + $_POST['VPH_Salida']+
		$_POST['VAH_Ingreso'] + $_POST['VAH_Salida']+
		$_POST['IAH_Ingreso'] + $_POST['IAH_Salida']+
		$_POST['IHB_Ingreso'] + $_POST['IHB_Salida']+
		$_POST['Iglobulina_Ingreso'] + $_POST['Iglobulina_Salida']+
		$_POST['Antitetanica_Ingreso'] + $_POST['Antitetanica_Salida']+
		$_POST['Antidifterica_Ingreso'] + $_POST['Antidifterica_Salida']+
		$_POST['DBCG_Ingreso'] + $_POST['DBCG_Salida']+
		$_POST['DSRP_Ingreso'] + $_POST['DSRP_Salida']+
		$_POST['DSR_Ingreso'] + $_POST['DSR_Salida']+
		$_POST['DFA_Ingreso'] + $_POST['DFA_Salida']+
		$_POST['Dvaricela_Ingreso'] + $_POST['Dvaricela_Salida']+
		$_POST['DVAH_Ingreso'] + $_POST['DVAH_Salida']+
		$_POST['Smeningo_Ingreso'] + $_POST['Smeningo_Salida']+
		$_POST['J22auto_Ingreso'] + $_POST['J22auto_Salida']+
		$_POST['J22con_Ingreso'] + $_POST['J22con_Salida']+
		$_POST['J23auto_Ingreso'] + $_POST['J23auto_Salida']+
		$_POST['J23con_Ingreso'] + $_POST['J23con_Salida']+
		$_POST['J25auto_Ingreso'] + $_POST['J25auto_Salida']+
		$_POST['J25con_Ingreso'] + $_POST['J25con_Salida']+
		$_POST['J26auto_Ingreso'] + $_POST['J26auto_Salida']+
		$_POST['J26con_Ingreso'] + $_POST['J26con_Salida']+
		$_POST['J27_Ingreso'] + $_POST['J27_Salida']+
		$_POST['Gotero_Ingreso'] + $_POST['Gotero_Salida']+
		$_POST['Cinfantil_Ingreso'] + $_POST['Cinfantil_Salida']+
		$_POST['Cadulto_Ingreso'] + $_POST['Cadulto_Salida']+
		$_POST['Cinternacional_Ingreso'] + $_POST['Cinternacional_Salida']+
		$_POST['Tadulto_Ingreso'] + $_POST['Tadulto_Salida']+
		$_POST['Tnino_Ingreso'] + $_POST['Tnino_Salida'] ) >= 1 )
{


		require_once('Connections/vacunacion.php');
		$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);


		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
		{
		  $insertSQL = utf8_decode("INSERT INTO pedido 
									(Nro_pedido, 
									Observaciones)
								
									VALUES 
														
								  ('".$_POST['Nro_pedido']."',
								   '".$_POST['Observaciones']."')");
							  
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
<p>El registro ya se encuentra insertado</p>
<!--<p><a href="Nuevo.php" target="_blank">pagina principal </a></p>  -->
<p><a href="Principal.php" target="_parent">Principal</a></p>

</body>
</html>

