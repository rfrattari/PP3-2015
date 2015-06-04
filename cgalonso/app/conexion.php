<?php
function conectar($base){
	$link=mysql_connect('localhost','root','') or die('Error de conexion '.mysql_error());
	mysql_selectdb($base) or die('No se encuentra la base de datos');
}

?>