<!DOCTYPE html>
<html>  
    <head>  
    	<title><?php echo "Borrar Registro Usuario" ?></title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
    </head>  

    <body>  
        <?php
 	       include ("conexionbd.php");
	       $borrar = $_GET['id'];
	       $consulta = "DELETE FROM USER WHERE id='$borrar'";
	       $cs = mysql_query($consulta);
		   header('Location:list_user_pp3.php');
        ?>

    </body> 
</html>
