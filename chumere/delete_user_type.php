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

<html>  
    <head>  
        <title>borrar registros</title>  
    </head>  

    <body>  
        <!-- Recibimos la variable id y la guardamos en la  
        variable registroaborrar y la mostramos como queramos--> 

        <?php
        include ("conexion.php");

        $codigoaborrar = $_GET['id'];

       

        $sql = "delete from user where id='$codigoaborrar'";

        $cs = mysql_query($sql, $link);
        
        header('Location:list_usuarios.php');
        ?>
    </body> 
</html>



