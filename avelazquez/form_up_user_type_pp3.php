<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo "Proceso de Formulario" ?></title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
    </head>
    
	<body>
		<div id="hide">   <!--color letras BD OK = color fondo-->
	        <?php 
		        include("conexionbd.php");
	            #$consulta = "SELECT * FROM USER_TYPE ";
	            #$allusers = mysql_query($consulta);
	        ?> 
        </div><!--div hide-->
		<?php 
				include("header_pp3.php");
                #los siguientes GET para pre-completar formularios
                $nombre=$_GET['nombre'];
                $modificar = $_GET['id'];
                $nombrepost=$_POST['name'];
        ?>

 		<div id="centrar"> 
			<br> 
            <form method="POST" action=""> 
                         
                <label for="name"> Nombre de Tipo de Usuario: </label> <br>
		        <input  type="text"  name="name" value="<?php echo $nombre; ?>"/>
            	<br><br><br>
                <input type="reset"/>
                <br>
                <input type = "submit" value = "Aceptar" href='list_user_type_pp3.php?input=ok'></input>
                <br>
            </form>
            <a href='list_user_type_pp3.php?input=ok'>Volver</a>
		</div><!--div centrar-->

		<?php
 	       $consulta = "UPDATE USER_TYPE SET Name='".$nombrepost."' WHERE Id='".$modificar."'";
           #var_dump: Muestra información sobre una variable
           #var_dump($consulta);
	       $cs = mysql_query($consulta, $link);	       
       ?>
	</body>
</html>
