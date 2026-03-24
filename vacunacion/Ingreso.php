<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<html>
<style type="text/css">
<!--
.Estilo1 {color: #FF0000}
.Estilo2 {font-weight: bold}
-->
</style>
<body>
<head>
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
	
		if (document.getElementById('Fecha_visita').value == "")
		{
			alerta(document.getElementById('Fecha_visita'));
					return false;
		}
	if (document.getElementById('Edad').value == "")
		{
			alerta(document.getElementById('Edad'));
					return false;
		}
	
	
	if (document.getElementById('Programa').value == "")
		{
			alerta(document.getElementById('Programa'));
					return false;
		}
	
	
	if (document.getElementById('Programa').value == "Cero caries" && document.getElementById('Institucion_educativa').value == "")
		{
			alerta(document.getElementById('Institucion_educativa'));
					return false;
		}
	
	if (document.getElementById('Programa').value == "Cero caries" && document.getElementById('Grado').value == "")
		{
			alerta(document.getElementById('Grado'));
					return false;
		}

	if (document.getElementById('Programa').value == "Cuidadores" && document.getElementById('Institucion_educativa').value == "")
		{
			alerta(document.getElementById('Institucion_educativa'));
					return false;
		}
	
	if (document.getElementById('Programa').value == "Cuidadores" && document.getElementById('Grado').value == "")
		{
			alerta(document.getElementById('Grado'));
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

function Fedad(){
	fecha = new Date(document.getElementById('Fecha_nacimiento').value);
	hoy = new Date(document.getElementById('Fecha_visita').value);
	ed = parseInt((hoy -fecha)/365/24/60/60/1000);
	if (isNaN(ed)) return null; else return ed;
}


		
</script>
</head>
<p align="center"><B>MUNICIPIO DE ENVIGADO</B></p>
<p align="center"><B>SECRETAR&Iacute;A DE SALUD</B></p>
<p align="center"><B>VACUNACI&OacuteN</B></p>
<p align="center"><B>AUTENTICACI&Oacute;N DE USUARIOS</B></p>
<?php
session_start();

//echo "htxt_tipo:".$_POST["txt_tipo"];  

require_once('Connections/vacunacion.php');
//echo "SELECT login FROM `usuarios` WHERE tipo ='".$_POST["txt_tipo"]."'";
mysqli_select_db($vacunacion, $database_vacunacion);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AUTENTICACION</title>
</head>
<body>
<p>&nbsp;</p>
<!-- <p><strong>AUTENTICACION DE USUARIOS</strong></p> -->
<form id="form1" name="form1" method="post" action="principal.php">
<td nowrap="nowrap" align="center">&nbsp;	</td>         
<!--<form id="form1" name="form1" method="post" action="principal.php"><td nowrap="nowrap" align="center">&nbsp;</td>    -->     
       
      <td nowrap="nowrap" align="right"><div align="left">Usuarios:     
          <select input type="text" name="txt_usuario" id="txt_usuario" value="" title="txt_usuario">
          <?php  
		  mysqli_select_db($vacunacion, $database_vacunacion);
		  	  $consulta= ("SELECT login FROM `usuarios` WHERE tipo ='".$_POST["txt_tipo"]."'"); 
              $resultado = mysqli_query($vacunacion, $consulta) or die('La consulta fall&oacute;: ' . mysql_errno());
              while($linea = mysqli_fetch_array($resultado)){ 
		      echo " <option value=\"".$linea[0]."\">".$linea[0]."</option>\n";
             
			  } 
              ?>
        </select>
      </div></td>
  <td><label><br/>
  Contrase&ntildea: 
  <input type="password" name="txt_clave" />
  </label>

<input type="hidden" name="hid_tipo" id="hid_tipo" value="<?php echo $_POST["txt_tipo"]?>" />
  <label>
  <P>
  <input type="submit" name="btn_ok" value="Enviar" />
  </label>
</form>
 <!-- <p><a href="Principal.php">principal</a></p>  -->

   
  

</body>
</html>
<?php
//mysql_free_result($Recordset1);
?>

