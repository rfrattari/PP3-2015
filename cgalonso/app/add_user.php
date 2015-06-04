<?php
//session_start();
if (isset($_SESSION['form'])){
	$nombre=$_SESSION['form']['nombre'];
	$mail=$_SESSION['form']['mail'];
	$web=$_SESSION['form']['web'];
	$text=$_SESSION['form']['text'];
	$error=$_SESSION['form']['error'];
}
else {
	$nombre="";
	$mail="";
	$web="";
	$text="";
	$error="";
}
?>
<!DOCTYPE html>
<html>
<head>

<?php
include '../encabezado.php';
include 'combo.class.php';
if (isset($_SESSION['form'])){
	$id=$_SESSION['form']['id'];
	$nombre=$_SESSION['form']['nombre'];
	$mail=$_SESSION['form']['mail'];
	$apellido=$_SESSION['form']['apellido'];
	$error= $_SESSION['form']['error'];
	$tu=$_SESSION['form']['tu'];
	$func=1;

}
else {
	$nombre="";
	$mail="";
	$apellido="";
	$error="";
	$tu=null;
	$func=1;
}
if(isset($_GET['id'])){
	conectar('pp3_db1');
	$id=$_GET['id'];
	$query="select * from user where id=$id";
	$respuesta=mysql_query($query);
	if (!$respuesta){
		echo 'fallo'.mysql_error();
	}
	else {
		while ($fila = mysql_fetch_array($respuesta)){
			$nombre=$fila['name'];
			$mail=$fila['email'];
			$apellido=$fila['lastname'];
			$tu=$fila['user_type_id'];
			$id=$_GET['id'];
		}
	}
	$func=2;
}

?>
<html>
<head>

</head>
<body>
<br>
<table width=50% align="center" bgcolor="Gainsboro">
	<tr>
		<td>
		<form method="post" action="prosses_add_user.php">
		<fieldset><legend> <b>Registro</b> </legend> <label for="name">Nombre:
		</label><br />
		<input name="name" type="text" placeholder="Escriba su nombre"
			value="<?php echo $nombre;?>" required autofocus><br />
		<label for="url">Apellido :</label><br />
		<input name="apellido" type="text" placeholder="Escriba apellido"
			value="<?php echo $apellido;?>" required autofocus><br />
		<label for="email">E-mail :</label><br />
		<input name="email" type="email" placeholder="Escriba su e-mail"
			value="<?php echo $mail;?>"><br />

		<label for="type">Tipo de usuario: </label><br />
		<?php combo('uno', 'user_type',$tu)?> <br />
		<font color='red'><?php 
		if ($error!=""){
			echo $error;
		}
		unset($_SESSION['form']);
		?></font> <br />
		<label for="pass">Password:</label><br />
		<input name="pass" type="password" placeholder="Escriba su Contraseña"
			required><br />
		<label for="pass1">Reingrese el Password:</label> <br />
		<input name="pass1" type="password"
			placeholder="Reingrese su Contraseña" required><br />
		<br />
		<input name="func" value="<?php echo $func;?>" style="visibility: hidden"><br />
		<?php if(isset($_GET['id'])){ ?> 
			<input name="id" value=<?php echo $id?> style="visibility: hidden"> 
		<?php }?>
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