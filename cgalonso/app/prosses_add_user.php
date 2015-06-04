<html>
<body>
<?php
include 'conexion.php';
session_start();
$nombre=$_POST['name'];
if (isset($_POST['email']))
{
	$mail=$_POST['email'];
}
if (isset($_POST['apellido']))
{
	$apellido=$_POST['apellido'];
}
$tu=$_POST['uno'];
$pas=$_POST['pass'];
//$pas=md5($pas);
$pas1=$_POST['pass1'];
//$pas1=md5($pas1);
$func=$_POST['func'];
if (isset($_POST['id']))
{
	$id=$_POST['id'];
}

$error="";

function existe($mail) {
	$query="select email from user where email='$mail'";
	$respuesta=mysql_query($query);
	if (!$respuesta){
		return true;
	}
	else {
		$fila = mysql_fetch_array($respuesta);
	}
		if (!empty($fila)){
			return true;
		}
		else {
			return false;
		}
}


if ((strlen($pas)>=8)&&($pas==$pas1)){

	conectar('pp3_db1');
	if ($func==1){
		if (existe($mail)==true){
			$error="E-mail ya registrado";
			$_SESSION['form']=array('nombre'=>$nombre,'mail'=>$mail,'apellido'=>$apellido,'text'=>$text,'pas'=>$pas,'pas1'=>$pas1,'error'=>$error,'id'=>0,'tu'=>$tu);
			header('location: add_user.php');
		}
		else 
		{
			$pwd=md5($pas1);
			$query="insert into user (name,lastname,password,password_again,user_type_id,email) values ('$nombre','$apellido','$psw','$psw',$tu,'$mail')";
			$respuesta=mysql_query($query);
	if (!$respuesta){
		echo 'fallo'.mysql_error();
	}
	else {

		header('location: list_user.php');
	}
	unset ($_SESSION['form']);
		}
	}
	else {
		$query="update user set name='$nombre', lastname='$apellido',password='$psw',password_again='$psw',user_type_id=$tu,email='$mail' where id=$id";
		$respuesta=mysql_query($query);
	if (!$respuesta){
		echo 'fallo'.mysql_error();
	}
	else {

		header('location: list_user.php');
	}
	unset ($_SESSION['form']);
	}

	//$respuesta=mysql_query($query);
	//if (!$respuesta){
	//	echo 'fallo'.mysql_error();
	//}
	//else {

	//	header('location: list_user.php');
	//}
	//unset ($_SESSION['form']);
}
else
{
	if (strlen ($pas )<8){
		$error= "La contraseña debe tener al menos 8 caracteres";
	}
	else {
		$error="Las contraseñas no coinciden";
	}
	$_SESSION['form']=array('nombre'=>$nombre,'mail'=>$mail,'apellido'=>$apellido,'text'=>$text,'pas'=>$pas,'pas1'=>$pas1,'error'=>$error,'id'=>0,'tu'=>$tu);
	header('location: add_user.php');
}
?>
</body>
</html>
