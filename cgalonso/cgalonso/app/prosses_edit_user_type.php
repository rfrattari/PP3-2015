<html>
<body>
<?php
include 'conexion.php';
//conectar('pp3_db1');
session_start();
$ut=$_POST['type'];
$id=$_POST['id'];


if ((strlen ($ut )>0)&& ($ut!=" ")){
	$query="update user_type set name='$ut' where id=$id";
	//$respuesta=mysql_query($query);
	$respuesta=conectar($query);
	if (!$respuesta){
		$error= 'fallo'.mysql_error();
	}
	else {
		$error="Registro Editado";
	}

}

$_SESSION['edit_usr_type']=array('ut'=>$ut,'msg'=>$error);
header('location: list_user_type.php');


?>

</body>
</html>
