<?php
include("conexion.php");

$cod = $_POST["id"];
$nom = $_POST["nombre"];
$ape = $_POST["apellido"];
$email = $_POST["email"];
$user  =$_POST['user'];

$sql = "update user set id='$cod' ,name='$nom',lastname='$ape',email='$email' ,user_type_id='$user' where id='$cod'";

$cs = mysql_query($sql, $link);
 header('Location:list_usuarios.php');
?>

