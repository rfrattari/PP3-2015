<?php
session_start();
$msg="";
$id=$_GET['id'];
include 'conexion.php';
//conectar('pp3_db1');
$query="delete from  user where id=$id";
//$respuesta=mysql_query($query);
$respuesta=conectar($query);
if (!$respuesta){
	$msg= 'fallo'.mysql_error();
}
else {
	$msg= "Registro eliminado";
}
$_SESSION['del_usr_type']=array('msg'=>$msg);
header('location: list_user.php');
?>