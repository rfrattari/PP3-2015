<?php
include 'pp3_db.php';
session_start();
$name = $_POST['name'];
$pass = $_POST['pass'];
$email = $_POST['email'] ;
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$for = $_SESSION['form'];
$combo = $_POST['nameCombo'];
$edit = $for['FAccion'];

if ($edit){
	$qry = "update user set name ='".$name. "', lastname = '".$lastname. "', email= '".$email. "', password= '" .$pass. "', user_type_id= '".$combo."'";	
	$fila = mysql_query($qry,$link2);
	header('location:listarUsuario.php');
}
else{
	$query = "insert into user(name, lastname, password, email, user_type_id) values ('".$name."','".$lastname."', '".$pass."', '".$email."', '".$combo."')" ;
	$fila = mysql_query($query,$link2);
	header('location:index.php');
}