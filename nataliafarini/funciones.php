

//<?php

//function conectarse() {
//    if (!($link = mysql_connect("localhost", "data4_pp3", "data42015php"))) {
//        echo "conexion exitosa";
//        exit();
//    }
//    if (!mysql_select_db("data4_pp3_db", $link)) {
//        echo "Error seleccionando la base de datos.";
//        exit();
//    }
//    return $link;
//}
//?>




<?php
function conectar(){
	$conexion = mysql_connect('nutrifood.localhost.com','root','nutrifood')or die('no se pudo conectar:' .mysql_error());
	mysql_select_db('pp3-2015') or die ('no selecciono nada');
	return $conexion;
}
?>


