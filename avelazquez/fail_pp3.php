<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo "Error de Passwords" ?></title>

    </head>
    <body>
		<div id="hide">   <!--color letras BD OK = color fondo-->
            <?php include("conexionbd.php"); ?>
	    </div><!--div hide-->
 
		<?php 
				include("header_pp3.php");
   		?> 

		<div id="centrar">
        	<?php
        		echo 'Ingreso Passwords distintos o con menos de 8 caracteres.';
        	?>
			<a href="form_in_pp3.php"><br>Volver a intenarlo </a>
   		</div><!--div centrar-->
		<?php include("footer_pp3.php"); ?>
    </body>
</html>
