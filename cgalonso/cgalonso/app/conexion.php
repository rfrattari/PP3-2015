<?php

function conectar($query){
	///// --Host-- ///
	//$link=mysql_connect('localhost','data4_pp3','data42015php') or die('Error de conexion '.mysql_error());
	//mysql_selectdb('data4_pp3_db') or die('No se encuentra la base de datos');
	///// --Local-- ///
	$link=mysql_connect('localhost','root','') or die('Error de conexion '.mysql_error());
	mysql_selectdb('pp3_db1') or die('No se encuentra la base de datos');
	
	return mysql_query($query);
	mysql_close($link);
}


?>