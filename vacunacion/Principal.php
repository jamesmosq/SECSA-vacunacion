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
	echo"usuario o contrase&ntildea no valido";
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

<body>
<B><center>MUNICIPIO DE ENVIGADO
<br />
SECRETAR&IacuteA DE SALUD
<br />

VACUNACI&OacuteN
<br /></B>
<br /><br /></center>

<?php

// obtener opciones de acceso

$sql = utf8_decode("select opcion, Pagina, Orden FROM usuario_opcion where login='".$_SESSION['vusuario']."' ORDER BY Orden");
$idcon = mysqli_query($vacunacion, $sql);

if (mysqli_num_rows($idcon)==0)
{
	echo "No tiene opciones no disponibles";
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
	while ($res= mysqli_fetch_row($idcon))
	{
	?>
		<a href="<?php echo utf8_decode("$res[1]") ?>" target="_parent"><?php echo utf8_decode("$res[0]") ?></a></p>
	<?php
	}

}

?>



</form>





</p>
<p>&nbsp;</p>
</body>
</html>
