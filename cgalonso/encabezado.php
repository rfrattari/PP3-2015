<?php
session_start();
if (isset($_SESSION['log'])){
	$mail=$_SESSION['log']['mail'];
	$nombre=$_SESSION['log']['name'];
	$apellido=$_SESSION['log']['lastname'];
	$tipo=$_SESSION['log']['tipo'];
	$id=$_SESSION['log']['id'];
	?>

<table border=1 width=80% align="center">
	<tr>
		<td>Bienvenido : <?php echo $apellido;?>, <?php echo $nombre;?>
			<br>
			<?php echo $tipo;?>
		</td>
		<td align="center">
		<table><tr><td>
		<form id='form_1' class='appnitro' enctype='multipart/form-data'method='post' action='principal.php'>
		
		<input id='saveForm' class='button_text' style='FONT-SIZE: 20px; color: white; background: url("../img/boton1.jpg") left center no-repeat; padding-left: 20px;'
			type='submit' name='submit' value='Inicio' /></form></td>
		<td>
		<form id='form_1' class='appnitro' enctype='multipart/form-data' method='post' action='add_user.php?id=<?php echo $id?>'> 
			<input id='saveForm' class='button_text' style='FONT-SIZE: 20px; color: white; background: url("../img/boton2.jpg") right center no-repeat; padding-right: 20px;'
			type='submit' name='submit' value='Perfil' /></form></td>
		<tr></table>
		<form id='form_1' class='appnitro' enctype='multipart/form-data' method='post' action='../cerrar_sesion.php'>
			 <input id='saveForm' class='button_text' style='FONT-SIZE: 20px; color: white; background: url("../img/boton3.jpg") center center no-repeat; padding-left: 22px;'
			type='submit' name='submit' value='      Salir         .' /></form>

		</td>
	</tr>

</table>

	<?php
}
else {
	header('location: ../login.php');
}
?>