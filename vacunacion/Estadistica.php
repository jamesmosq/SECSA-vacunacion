<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>SEGUIMIENTO</title>
<head>

<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8" />
<title>Documento sin t&iacute;tulo</title>
</head>
<?php 

require_once('Connections/vacunacion.php');
session_start();
// session_destroy();

if (isset($_SESSION['vusuario'])) 
	echo " ";
else
{
	$_SESSION['vusuario'] = trim($_POST["txt_usuario"]);
	$_SESSION['vclave'] = trim($_POST["txt_clave"]);
}

//echo "usuario:".$_SESSION['vusuario'];

$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);
$sql = ("select login FROM usuarios where login='".$_SESSION['vusuario']."' and  clave='".$_SESSION['vclave']."'");
//echo $sql;
$idcon = mysqli_query($vacunacion, $sql);

if (mysqli_num_rows($idcon)==0)
{
	echo"usuario o contraseña no valido";
	session_destroy();
	?>
    <p>
    <p>
	<html>
    <p>
    <p>
     <a href="index.php">Intentar nuevamente</a> </html>
	<?php
    
    return;
}
else
{	
//echo"bien".$_SESSION['vusuario'];

}
$res= mysqli_fetch_row($idcon);
//echo "valor:".$res[0]; 

?>
<!--
<body>
<B><center>MUNICIPIO DE ENVIGADO
<br />
SECRETAR&IacuteA DE SALUD 
<br />
SEGUIMIENTO A LA COHORTE</center>
<br />
<br />
</B>
-->


<!--  <form id="mes" name="mes" action="Listar_Registros_usuarios_remision.php" method="post">   -->
<!--  <form id="mes" name="mes" action="Ingreso_usuario_remision.php" method="post"> -->
 <!-- <form id="mes" name="mes" action="Actualiza_lote.php" method="post" autocomplete="off">  


<p><strong>Lote</strong>:
  <input type="text" name="Lote" id="Lote" value="" style="text-transform:uppercase" onKeyUp="javascript:this.value=this.value.toUpperCase();" size="32" title="Lote" required>
</p>

<input type = "submit" value="Consultar">
</form>
-->

<!--<iframe title="Seguimiento  la cohorte V2" width="1000" height="800" src="https://app.powerbi.com/view?r=eyJrIjoiZTY4NzgyZmEtY2Y2OS00N2MwLTk0YTktZGZkNzJiMzlmN2VjIiwidCI6IjA3MzljZmI3LWJhNTEtNDc3ZS05NWYxLWYxYmRkMWYzMTEzMCIsImMiOjR9" frameborder="0" allowFullScreen="true"></iframe> -->
<!--<iframe title="Seguimiento  la cohorte V2" width="1000" height="800" src="https://app.powerbi.com/links/7t2xczskgB?ctid=0739cfb7-ba51-477e-95f1-f1bdd1f31130&pbi_source=linkShare" frameborder="0" allowFullScreen="true"></iframe>-->

<!--<iframe title="Estadisticas2024" width="1140" height="800" src="https://app.powerbi.com/reportEmbed?reportId=0c37dd53-8341-42e2-a859-1b1b74141a45&autoAuth=true&ctid=0739cfb7-ba51-477e-95f1-f1bdd1f31130" frameborder="0" allowFullScreen="true"></iframe>-->


<!--<iframe title="Estadisticas2024" width="1000" height="800" src="https://app.powerbi.com/view?r=eyJrIjoiNmFhZjc3N2YtYWRjMS00Y2YyLWIxZTQtY2ViNzNkYzFiZDU3IiwidCI6IjA3MzljZmI3LWJhNTEtNDc3ZS05NWYxLWYxYmRkMWYzMTEzMCIsImMiOjR9" frameborder="0" allowFullScreen="true"></iframe>-->
<iframe title="Estadisticas2025" width="1900" height="870" src="https://app.powerbi.com/view?r=eyJrIjoiNGY3MDRhNmQtMjI1Ni00NWNiLWE5MzctOTdkYjE1NzI0N2E5IiwidCI6IjA3MzljZmI3LWJhNTEtNDc3ZS05NWYxLWYxYmRkMWYzMTEzMCIsImMiOjR9" frameborder="0" allowFullScreen="true"></iframe>

 
<p>

<a href="principal.php" target="_parent">Principal</a>


  </p>
  </p>
</p>
<p>&nbsp;</p>
</body>
</html>
