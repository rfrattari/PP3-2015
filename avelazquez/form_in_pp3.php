<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo "Nuevo Usuario" ?></title>

    </head>
    <body>
        <div id="hide">   <!--color letras BD OK = color fondo-->
            <?php include("conexionbd.php"); 
		        $consulta = "SELECT * FROM USER_TYPE ";
                $allusers = mysql_query($consulta);?>
	    </div><!--div hide-->
 
		<?php 
				include("header_pp3.php");
   		?> 

        <div id="centrar2">
        <form  method="post" action="process_form_pp3.php"> 
            <br> <br>
            
            <label for="name"> Nombre: </label>
            <input name = "name" type = "text" placeholder = "Escriba su nombre aqui " required autofocus></input>
            <br> <br>
            
            <label for="lastname"> Apellido: </label>
            <input name = "lastname" type = "text" placeholder = "Escriba su apellido aqui" required autofocus></input>
            <br> <br>
            
            <label for="pass"> Password: </label>
            <input name = "pass" type = "password" placeholder = "Escriba su password aqui " required></input>
            <br> <br>
            
            <label for="repeatpass"> Repita Password: </label>
            <input name = "repeatpass" type = "password" placeholder = "Escriba su password aqui " required></input>
            <br> <br>
            
            <label for="email"> Mail: </label>
            <input name = "email" type = "email" placeholder = "Escriba su email aqui " required></input>
            <br> <br>
            
            <select name="usertype">
                <option value="">Tipo de Usuario</option>
                    <?php
                        while ($fila = mysql_fetch_row($allusers))
                        echo "<option value='" . $fila['0'] . "'>" . $fila ['1'] . "</option>";
                    ?>
            </select>
           
            <br> <br><br>
            <input type = "submit" value = "Aceptar"></input>
            
            <input type="reset" value="Resetear Valores"/>
        </form><br>
        <a href="list_user_pp3.php">Volver </a>
        </div><!--div centrar2-->
         <?php include("footer_pp3.php"); ?>
        
        
        

    </body>


</html>
