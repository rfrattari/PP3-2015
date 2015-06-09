<?php

session_start();
if (isset($_GET['err'])){
	echo $_GET['err'];
	$mail=$_GET['mail'];
}
else {
	$mail="";
}

?>

<html>
<head>
<title>Usuarios</title>
</head>
<body>
<table width=50% align="center" bgcolor="Gainsboro">
	<tr>
		<td>
		<form method="post" action="session.php">
		<fieldset><legend> <b>Login</b> </legend> <label for="type">Usuario: </label><br />
		<input name="mail" type="text" placeholder="Ingrese su e-mail"
			value="<?php echo $mail;?>" required autofocus><br />
		<label for="type">Password: </label><br />
		<input name="pass" type="password" placeholder="Ingrese password"
			required><br />
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
