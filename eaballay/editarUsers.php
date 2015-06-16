<?php
include 'pp3_db.php';
$link2 = $link2;
session_start();
$id=$_GET['id'];
var_export($id);

/*$name = $_SESSION[];
$qry = "update users set name='"$name"' lastname= '"$lastname "' password_again= '" $pass"' email= '" $email "' user_type_id= '" $user_type"'";
*/
$qry = "select * from users where id = '" .$id."'";
$result = mysql_query($qry,$link2);
$fila = mysql_fetch_array($result);
	$name = $fila['1'];
	$_SESSION['form'] = array('name' => $name,
							  'email' => $fila['email'],
							  'lastname' => $fila['lastname'],	
							  'FAccion' => true,
		);
	
	header('location: users.php');

