<?php
include 'pp3_db.php';
session_start();
$email = $_POST['email'];
$pass = $_POST['pass'];
$query = "SELECT us.*, ut.name AS tipo FROM user  us INNER JOIN user_type  ut ON us.user_type_id = ut.id WHERE (us.email = '".$email."') AND (us.password = '".$pass."')";
$fila = mysql_query($query,$link2);
$login = mysql_fetch_array($fila);
$editar = false;
if (($login['email'] <> '')){
	$editar = true;
	$_SESSION ['form'] = array ('id' => $login['id'], 'name' => $login['name'], 'user_type' => $login['5'], 'email' => $login['email'],'lastname' => $login['lastname'], 'FAccion' => $editar);
	header('location:listarUsuario.php');
	}
else{ 
	header('location:index.php?error=1');
}