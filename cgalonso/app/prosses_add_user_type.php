<html>
<body>
<?php

include 'conexion.php';
conectar('pp3_db1');
session_start();
$ut=$_POST['type'];




if ((strlen ($ut )>=0)&& ($ut!=" ")){
	$query="insert into user_type (name) values ('$ut')";
	$respuesta=mysql_query($query);
	if (!$respuesta){
		$error= 'fallo'.mysql_error();

	}
	else {
		$error= 'Registro Agregado';
	}


}
$_SESSION['add_usr_type']=array('ut'=>$ut,'msg'=>$error);
header('location: list_user_type.php');



?>

</body>
</html>
