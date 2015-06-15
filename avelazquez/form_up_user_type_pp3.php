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
	        ?> 
        </div><!--div hide-->
		<?php 
			include("header_pp3.php");
            $nombre=$_GET['nombre'];
            $modificar = $_GET['id'];
         ?>

 		<div id="centrar2"> 
			<br> 
            <form method="POST" action="list_user_type_pp3.php"> 
                         
                <label for="name"> Nombre de Tipo de Usuario: </label> <br>
		        <input  type="text"  name="name" value="<?php echo $nombre; ?>"/>
            	<br><br><br><br>
                
                <!-- Paso el campo id oculto a la otra pagina (list_user_pp3)-->
                <input type="hidden" name="id1" value="<?php echo $modificar ; ?>"></input>		            
				<input name="Submit2" type = "Submit" value = "Aceptar" ></input>
                <br>
			</form>
       </div><!--div centrar2-->
	   <?php include("footer_pp3.php"); ?>
	</body>
</html>
