<?php
//session_start();
if (isset($_SESSION['log'])){
	$mail=$_SESSION['log']['mail'];
	$nombre=$_SESSION['log']['name'];
	$apellido=$_SESSION['log']['lastname'];
	$tip=$_SESSION['log']['tipo'];
}

include 'conexion.php';
include '../encabezado.php';
if (isset($_GET['id'])){
	echo $msg;
	if ($_GET['id']==0){
		$id=$_GET['id'];
	}
	else{
		if (isset($_SESSION['del_usr_type'])){
			$msg=$_SESSION['del_usr_type']['msg'];
		}
		else {
			$msg="";
		}

		unset ($_SESSION['del_usr_type']);
	}
}

function mostrar_user_type($ids){
	conectar('pp3_db1');
	$qry="select * from  user_type where id=$ids";
	$rta=mysql_query($qry);
	if (!$rta){
		echo 'fallo'.mysql_error();
	}
	else {
		while ($fil = mysql_fetch_array($rta)){
			return $fil['name'];
		}
	}
}

function mostrar_campos(){
	conectar('pp3_db1');
	/////////////////////Paginacion/////////////////////////////////////
	$largo=10;
	if (isset($_GET['var'])){
	$p=$_GET['var'];
	$val=(($p-1)*$largo);
}
else 
{
	$val=0;
	$p=1;
}

$query="SELECT  count(user.id)as cantidad FROM user";
	$respuesta=mysql_query($query);
	
while($fila = mysql_fetch_array($respuesta))
{
	$cant= $fila['cantidad'];
}
	$pag=$cant%$largo;
	$pag=(($cant-$pag)/$largo)+1;
	//echo "Registros:".$cant." pagina: ";
$z=1;
//while ($z<=$pag){
//	echo "<a href=list_user.php?var=$z>".$z."-</a>";
///	$z=$z+1;
//}
	
	///////////////////////////////////////////////////////////////////////////
	$query="select * from  user limit $val,$largo";
	$respuesta=mysql_query($query);
	if (!$respuesta){
		echo 'fallo'.mysql_error();
	}
	else {
		while ($fila = mysql_fetch_array($respuesta)){?>
<tr bgcolor='gainsboro'>
	<td><?php echo $fila['name'] ?></td>
	<td><?php echo $fila['lastname'] ?></td>
	<td><?php echo $fila['email'] ?></td>
	<td><?php echo mostrar_user_type($fila['user_type_id']) ?></td>
	<?php if ($_SESSION['log']['tipo']=='admin'){?>		
	<td>
		<a href='add_user.php?id= "<?php echo $fila['id']?>"'>Editar</a>/
		<a href='delete_user.php?id= "<?php echo $fila['id']?>"'>Eliminar</a>
	</td>
	<?php }?>
</tr>
		<?php
		}?>
		<tr><td><?php echo "Registros:".$cant;?></td><td>
		<?php $z=1;
		echo "Pagina:".$p." </td><td>";
while ($z<=$pag){
	echo "<a href=list_user.php?var=$z>".$z."-</a>";
	$z=$z+1;
}?>
		</td></tr>
	<?php }

}
?>
<html>
<body>
<table align="center" width=80%>
	<tr bgcolor='grey'>
		<td width=20%>Nombre</td><td width=20%>Apellido</td><td width=20%>Mail</td><td width=20%>Tipo Usuario</td><td width=20%>Acciones</td>
	</tr>
	<?php mostrar_campos();?>
	<?php if ($_SESSION['log']['tipo']=='admin'){?>	
	<tr>
		<td>
		<form id='form_1' class='appnitro' enctype='multipart/form-data'
			method='post' action='add_user.php'><input type='hidden'
			name='form_id' value='1' /> <input id='saveForm' class='button_text'
			type='submit' name='submit' value='Nuevo' /></form>
		</td>
	</tr>
	<?php }?>
</table>


</body>
</html>
