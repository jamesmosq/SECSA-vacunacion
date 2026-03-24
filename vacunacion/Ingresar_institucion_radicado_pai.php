<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>USUARIO</title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>






</head>
<?php 

require_once('Connections/vacunacion.php');
$db_selected = mysqli_select_db($vacunacion, $database_vacunacion);
session_start();

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
$res= mysqlI_fetch_row($idcon);
//echo "valor:".$res[0]; 

?>

<body>
<B><center>MUNICIPIO DE ENVIGADO
<br />
SECRETAR&IacuteA DE SALUD 
<br />
VACUNACI&OacuteN RADICADO PAIWEB</center>
<br />
<br />
</B>
<br />
<br />


<!--  <form id="mes" name="mes" action="Listar_Registros_usuarios_remision.php" method="post">   -->
<!--  <form id="mes" name="mes" action="Ingreso_usuario_remision.php" method="post"> -->
  <form id="mes" name="mes" action="Actualiza_institucion_radicado_pai.php" method="post">  





<?php
	  $consulta= "SELECT Nombre_institucion FROM institucion where Estado='Activo' order by Nombre_institucion asc";
  ?>
<strong><p style="color:#FF0000";>Nombre de institucion:</strong>
<select input type="text" name="Institucion" id="Institucion" value="" title="Institucion" required >
        <option value=""></option>
          <?php
             
			  $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
              while($linea = mysqli_fetch_array($resultado))
			  { 
		      	echo ( " <option value=\"".$linea[0]."\">".$linea[0]."</option>\n");
              } 
			  mysqli_free_result ($resultado);
              ?>
        </select>








<input type = "submit" value="Consultar" >

</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><a href="principal.php" target="_parent">Principal</a>
  </p>
  </p>
</p>
<p>&nbsp;</p>
</body>
</html>
