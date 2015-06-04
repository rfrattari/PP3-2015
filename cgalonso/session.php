<?php
include 'app/conexion.php';
conectar('pp3_db1');
session_start();
$mail=$_POST['mail'];
$pass=$_POST['pass'];
$pass=md5($pass);

//$query="select * from user where email='$mail' and password='$pass'";
$query="SELECT `user`.id, `user`.`name`, `user`.lastname, `user`.`password`, `user`.password_again, user_type.`name` as tipo, `user`.email FROM `user` INNER JOIN user_type ON `user`.user_type_id = user_type.id where email='$mail' and password='$pass'";
$respuesta=mysql_query($query);
if (!$respuesta){
	$error= 'error de conexion';
	header("location: login.php?err=$error&mail=$mail");
}
else {
	$fila = mysql_fetch_array($respuesta);
	if (is_null($fila['name'])){
		$error= 'usuario o contaseña eroneo';
		header("location: login.php?err=$error&mail=$mail");
	}
	else{
		$nombre=$fila['name'];
		$apellido=$fila['lastname'];
		$tipo=$fila['tipo'];
		$id=$fila['id'];
		$_SESSION['log']=array('mail'=>$mail,'error'=>$error,'name'=>$nombre,'lastname'=>$apellido,'tipo'=>$tipo,'id'=>$id);
		header('location: app/principal.php');

	}
}

?>