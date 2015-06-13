<?php
include("conexion.php");

$cod = $_POST['id'];
$tipo = $_POST['tipo_user'];


$sql = "update user_type set  user_type_id='$cod' ,name='$tipo' where user_type_id='$cod'";

$cs = mysql_query($sql, $link);
header('Location:list_user_type.php');
?>
