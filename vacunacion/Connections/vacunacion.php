<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

$hostname_vacunacion = "localhost";
$username_vacunacion = "root";
$password_vacunacion = "";
$database_vacunacion = "vacunacion";
$vacunacion = new mysqli($hostname_vacunacion, $username_vacunacion, $password_vacunacion, $database_vacunacion);
$vacunacion -> set_charset("utf8");


if($vacunacion->connect_errno)
	{
		die("Conexion fallida" . $secretaria->connect_errno);
	}
	else
	{
	//echo "Conectado";
	}	





?>


