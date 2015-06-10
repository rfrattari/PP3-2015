<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo "Alta de Usuario" ?></title>
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
            $lastname = $_POST['lastname'];
            $pass = $_POST['pass'];
            $repeatpass = $_POST['repeatpass'];
            $email = $_POST['email'];
            $tipo =$_POST['usertype'];
                       
            #si cant de caraceteres del pass es <8, FAIL.PHP, sino PROCESSFORM.PHP
            #strlen arroja cantidad de caracteres
            #si contraseña es menor a 8 digitos o son distintas con el repeatpass
            if ((($pass)!=($repeatpass) || (strlen($pass)<8)) || (($pass)!=($repeatpass) & (strlen($pass)<8))) {
                session_start();
                $_SESSION['sesionuno'] = array('name' == $name,
                                                'email' == $email);
                                                #'error' == $passerror);
                header('location: fail_pp3.php'); 
                md5($pass);
                      #$_GET['$name']
            }
            else{
                echo "<br><br>Su nombre es: $name<br>";
                echo "Su apellido es: $lastname<br>";
                echo "Su contaseña es: $pass<br>";
                echo "Su mail es: $email<br><br><br>";
                
                $consulta = "INSERT INTO USER (Name,Lastname,Password,Password_Again,Email,Id_User_Type) VALUES ('".$name."','".$lastname."','".$pass."','".$repeatpass."','".$email."','".$tipo."')";
                $respuesta = mysql_query($consulta);
                if (!$respuesta) {
                echo ('fallo' . mysql_error());
                } 
                else;
                echo "Agregado con exito los formularios a la BD<br><br><br>";
                end;
                            
            }
                
		mysql_close($link);
        ?>
        
         <a href="form_in_pp3.php">Volver </a>
    </body>
</html>


