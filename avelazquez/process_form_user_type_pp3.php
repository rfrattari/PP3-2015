<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo "Alta de Tipo de Usuario" ?></title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
    </head>
    <body>
		
		<div id="hide">   <!--color letras BD OK = color fondo-->
        	<?php include("conexionbd.php");   ?>
    	</div><!--div hide-->
		
		<?php 
				include("header_pp3.php");
   		?> 

		<?php
            $name = $_POST['name'];
            echo "<br><br>El tipo de usuario nuevo es: $name<br>";
            $consulta = "INSERT INTO USER_TYPE (Name) VALUES ('".$name."') ";
            $respuesta = mysql_query($consulta);
            if (!$respuesta) {
            echo ('fallo' . mysql_error());
            } 
            else;
            echo "Agregado con exito los formularios a la BD<br><br><br>";
            end;
            mysql_close($link);
        ?>
        
         <a href="form_in_user_type_pp3.php">Volver </a>
    </body>
</html>


