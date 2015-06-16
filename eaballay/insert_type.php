<?php
include_once 'pp3_db.php';
$link2 = $link2;
$name = $_POST['name'];
$query = "insert into user_type(name) values ('".$name."')";
$resp = mysql_query($query, $link2) or die ('error'.  mysql_error());

if (!$resp){
	echo 'fallo';
}
else{
 header('location:listarUsuario.php');
	
}
?>