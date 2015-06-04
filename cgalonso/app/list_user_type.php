<?php
include '../encabezado.php';
//session_start();
if (isset($_SESSION['del_usr_type'])){
	$msg=$_SESSION['del_usr_type']['msg'];
}
else {
	$msg="";
}
if (isset($_SESSION['add_usr_type'])){
	$msg=$_SESSION['add_usr_type']['msg'];
}
if (isset($_SESSION['edit_usr_type'])){
	$msg=$_SESSION['edit_usr_type']['msg'];
}


include 'conexion.php';
echo $msg;
unset ($_SESSION['add_usr_type']);
unset ($_SESSION['del_usr_type']);
unset ($_SESSION['edit_usr_type']);
function mostrar_campos(){
	conectar('pp3_db1');
	$query="select * from  user_type";
	$respuesta=mysql_query($query);
	if (!$respuesta){
		echo 'fallo'.mysql_error();
	}
	else {
		while ($fila = mysql_fetch_array($respuesta)){?>
<tr bgcolor='gainsboro'>
	<td><?php echo $fila['name'] ?></td>
	<?php if ($_SESSION['log']['tipo']=='admin'){?>	
	<td><a href='edit_user_type.php?id=" <?php echo $fila['id']?>"'>Editar</a>/<a
		href='delete_user_type.php?id= "<?php echo $fila['id']?>"'>Eliminar</a></td>
	<?php }?>
</tr>
		<?php
		}
	}

}
?>
<html>
<body>
<table align="center" width=80%>
	<tr bgcolor='grey'>
		<td>Nombre</td>
		<td>Acciones</td>
	</tr>
	<?php mostrar_campos();?>
	<?php if ($_SESSION['log']['tipo']=='admin'){?>	
	<tr>
		<td>
		<form id='form_1' class='appnitro' enctype='multipart/form-data'
			method='post' action='add_user_type.php'><input type='hidden'
			name='form_id' value='1' /> <input id='saveForm' class='button_text'
			type='submit' name='submit' value='Nuevo' /></form>
		</td>
	</tr>
	<?php }?>
</table>

</body>
</html>
