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

$link = mysql_connect("localhost", "root", "humere") or die("no se encuentra el servidor");
$db = mysql_select_db("data4_pp3_db", $link) or die("error de conexion");

?>


