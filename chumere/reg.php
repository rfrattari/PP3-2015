<?php
//creamos la sesion
session_start();
//validamos si se ha hecho o no el inicio de sesion correctamente
//si no se ha hecho la sesion nos regresará a login.php
if(!isset($_SESSION['usuario'])) 
{
  header('Location: login.php'); 
  exit();
}
 ?>
<?php

//conexion con la base de datos y servidor o 

include("conexion.php");


//obtenemos los valores del formulario


$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$tipo =$_POST['user'];

$passencri = md5($pass);

//insercion de datos en la tabla registro

mysql_query("INSERT INTO user (name,lastname,email,password,user_type_id) VALUES ('$nombre','$apellido','$email','$passencri' ,'$tipo')", $link) or die("no se ingreso ningun dato");
mysql_close($link);

echo "registro cargado correctamente" ;
 header("location:login.php");
?> 

