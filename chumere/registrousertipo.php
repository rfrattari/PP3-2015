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


$tipodeusuario = $_POST['tipo'];


//insercion de datos en la tabla tipo

mysql_query("INSERT INTO  user_type (name) VALUES ('$tipodeusuario')", $link) or die("no se ingreso ningun dato");
mysql_close($link);

echo "registro cargado correctamente" ;
 header("location:index.php");
?> 
