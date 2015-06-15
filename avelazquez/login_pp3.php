<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo "Logueo Correcto" ?></title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
    </head>
    
	<body>
		<div id="hide">   <!--color letras BD OK = color fondo-->
            <?php include("conexionbd.php"); ?>
	    </div><!--div hide-->
		
			<div id="container">   
			<div id="menu">
	          	<img src="img/win.png" id="img_logo">
               
				<div id="titulo">
					<h1><b>SYSTEM USERS AND TYPES</b></h1>
				</div>
				
				<div id="subtitulo">
					<h1><b>- ERROR DE ACCESO -</b></h1>
				</div><!--div subtitulo-->
	        </div><!--div menu-->
		</div><!--div container-->
			
		
        <div id="container2"> 
			
		</div><!--div container2-->		

		<?php
			
			$nombre = $_POST['name'];   
			$password = $_POST["pass"];
 
			$consulta = ("SELECT * FROM USER WHERE Name = '$nombre'");
			$allusers = mysql_query($consulta);

			#traigo el Id_User_Type de USER y veo si el nombre coincide con id=1, es decir, si es de tipo admin  
			$consulta2 = ("SELECT Id_User_Type FROM USER INNER JOIN USER_TYPE ON USER.Id_User_Type=USER_TYPE.Id WHERE USER.Name = '$nombre' AND USER.Id_User_Type='1'");
			$specialquery = mysql_query($consulta2);
 
			#Validamos si el nombre del usuario existe en la base de datos 
			if($row = mysql_fetch_array($allusers)){
				#Validamos si el password es correcto, traido con post
				if($row["Password"] == $password){
 					#Validamos su tipo de usuario, con $specialquery es admin, sino es guest, redirecciono a list correspondientes
					if($row = mysql_fetch_array($specialquery)){
						#Creamos sesión
  						session_start();  
  						#Almacenamos el nombre de usuario en una variable de sesión usuario
  						$_SESSION['usuario'] = $nombre;  
  						header("Location: list_user_pp3.php");    
 					}
					else{#Creamos sesión
  						session_start();  
  						#Almacenamos el nombre de usuario en una variable de sesión usuario
  						$_SESSION['usuario'] = $nombre;  
						header("Location:list_user_guest_pp3.php");}
				}
  			}
			?>
			<!--si falla validacion, mensaje siguiente-->
			<div id="centrar3">
				<?php				
					echo"Error de Logueo: Usuario o password incorrecto.";
				?>
				<a href='index.php'><br>Volver a intentarlo</a>	
			</div><!--div centrar3-->			

    </body>
</html>
