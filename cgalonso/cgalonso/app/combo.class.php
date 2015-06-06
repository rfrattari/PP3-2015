<?php
include 'conexion.php';
function combo($name,$tabla,$selected=null){
	conectar('pp3_db1');
	$query="select * from $tabla";
	$respuesta=mysql_query($query);?>
<select name='<?php echo $name ?>'>

<?php
while ($fila=mysql_fetch_array($respuesta)){
	if ($fila['id']==$selected){
		?>
	<option value=" <?php echo $fila['id']; ?>" selected="selected"><?php echo $fila['name'];?></option>
	<?php
	}
	else { ?>
	<option value=" <?php echo $fila['id']; ?>"><?php echo $fila['name'];?></option>
	<?php	}
} ?>
</select>
<br>
<?php }?>