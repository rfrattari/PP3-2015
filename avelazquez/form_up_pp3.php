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
	            $consulta = "SELECT * FROM USER_TYPE";
	            $allusers = mysql_query($consulta);
	        ?> 
        </div><!--div hide-->
		
		<?php 
			include("header_pp3.php");
	    	$nombre=$_GET['nombre'];
		    $apellido=$_GET['apellido'];
		    $email=$_GET['email'];
		    $modificar = $_GET['id'];		        
			$nameutpost=$_GET['ut'];
		?> 
        <div id="centrar2"> 
			<br>             
			<form action="list_user_pp3.php" method="post" enctype="multipart/form-data">
                         
                <label for="name"> Nombre: </label> <br>
		        <input  type="text"  name="name" value="<?php echo $nombre; ?>"/>
            	<br> <br>
			
                <label for="lastname"> Apellido: </label><br>
                <input  type="text"  name="lastname" value="<?php echo $apellido; ?>"/>
                <br> <br>
            
                <label for="email"> Mail: </label><br>
                <input  type="email"  name="email" value="<?php echo $email ; ?>"/>
                <br> <br>
            
              	<select name="usertype">
                <option value="">Tipo de Usuario</option>
                    <?php
                        while ($fila = mysql_fetch_row($allusers)){ ?>
				           <option value="<?php echo $fila[0] ?>" <?php if ($fila['0']==$nameutpost){ ?> selected <?php }?>> <?php echo $fila['1'] ?> </option>
						<?php }?>
                </select>
      
                <br><br>
                <!--<input type="reset" value="Resetear Valores"></input>-->
				<!-- Paso el campo id oculto a la otra pagina (list_user_pp3)-->
                <input type="hidden" name="id1" value="<?php echo $modificar ; ?>"></input>		            
				<input name="Submit1" type = "Submit" value = "Aceptar" ></input>

                <br>
        
            </form>
        </div><!--div centrar2-->	
		<?php include("footer_pp3.php"); ?>
	</body>
</html>
