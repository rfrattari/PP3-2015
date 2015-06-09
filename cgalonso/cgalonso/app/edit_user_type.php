<?php
include '../encabezado.php';
include 'conexion.php';
//conectar('pp3_db1');
$id=$_GET['id'];
$query="select * from user_type where id=$id";
//$respuesta=mysql_query($query);
$respuesta=conectar($query);
if (!$respuesta){
	echo 'fallo'.mysql_error();
}
else {
	while ($fila = mysql_fetch_array($respuesta)){
		$name=$fila['name'];
	}
}

//session_start();
if (isset($_SESSION['edit_usr_type'])){
	$ut=$_SESSION['edit_usr_type']['ut'];

}
else {
	$ut="";

}
?>

<html>
<head>
<title>Tipo de usuario</title>
</head>
<body>
<table width=50% align="center" bgcolor="Gainsboro">
	<tr>
		<td>
		<form method="post" action="prosses_edit_user_type.php">
		<fieldset><legend> <b>Registro</b> </legend> <label for="type">Tipo de
		usuario: </label><br />
		<input name="type" type="text" placeholder="Ingrese tipo de usuario"
			value="<?php echo $name;?>" required autofocus ><br />
		</fieldset>
		<input name="id" type="text" value=<?php echo $id;?> required style="visibility: hidden"
			><br />
		<br />
		<input type="submit" value="Enviar"><br />
		<br />
		</form>
		</td>
	</tr>
</table>
</body>
</html>
