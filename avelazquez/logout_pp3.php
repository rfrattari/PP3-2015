<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo "Logueo Correcto" ?></title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
    </head>
    
	<body>
		<div id="hide">   <!--color letras BD OK = color fondo-->
            <?php include("conexionbd.php"); ?>
	    </div><!--div hide-->


<?php 
 //Crear sesión
 session_start();
 //Vaciar sesión
 $_SESSION = array();
 //Destruir Sesión
 session_destroy();
 //Redireccionar a login.php
 header("location: index.php");
?>




    </body>
</html>
