<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo "Nuevo Tipo de Usuario" ?></title>
    </head>
    <body>
        <div id="hide">   <!--color letras BD OK = color fondo-->
            <?php include("conexionbd.php"); ?>
	    </div><!--div hide-->
 
		<?php 
				include("header_pp3.php");
   		?> 

        <div id="centrar">
        	<form  method="post" action="process_form_user_type_pp3.php"> 
            	<br> <br>
                     
            	<label for="name"> Nombre de Tipo de Usuario: </label><br>
            	<input name = "name" type = "text" placeholder = "Escriba tipo de usuario aqui " required autofocus></input>
            	<br> <br>
   
            	<input type = "submit" value = "Aceptar"></input>
            	<br>
            	<input type="reset" value="Resetear Valores"/>
        	</form>
        	<a href="list_user_type_pp3.php">Volver </a>
        </div><!--div centrar-->

        
	</body>
</html>

