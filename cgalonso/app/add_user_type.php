<?php
include '../encabezado.php';
//session_start();
if (isset($_SESSION['form'])){
	$ut=$_SESSION['form']['ut'];

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
		<form method="post" action="prosses_add_user_type.php">
		<fieldset><legend> <b>Registro</b> </legend> <label for="type">Tipo de
		usuario: </label><br />
		<input name="type" type="text" placeholder="Ingrese tipo de usuario"
			value="<?php echo $ut;?>" required autofocus><br />
		</fieldset>
		<br />
		<input type="submit" value="Enviar"><br />
		<br />
		</form>
		</td>
	</tr>
</table>
</body>
</html>
