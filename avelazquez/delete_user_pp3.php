<!DOCTYPE html>
<html>  
    <head>  
    	<title><?php echo "Borrar Registro Usuario" ?></title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
    </head>  

    <body>  
        <!-- Recibimos la variable id, borramos y y vuelve a list_user.php--> 

        <?php
 	       include ("conexionbd.php");
	       $borrar = $_GET['id'];
	       $consulta = "DELETE FROM USER WHERE id='$borrar'";
	       #var_dump: Muestra información sobre una variable
               #var_dump($consulta);
	       $cs = mysql_query($consulta, $link);
		header('Location:list_user_pp3.php');
        ?>

    </body> 
</html>
