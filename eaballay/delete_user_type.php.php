<?php

include 'pp3_db.php';

$id=$_GET['id'];
var_dump($id);
$query = "DELETE FROM user WHERE id= '".$id."'";
mysql_query($query,$link2);

header('location:listarUsuario.php');

	
 
?>