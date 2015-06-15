<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo "Header" ?></title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
    </head>
    
	<body>
		<div id="container">   
			<div id="menu">
			  	<img src="img/win.png" id="img_logo">
            	<div id="titulo">
					<h1><id="titulo"><b>SYSTEM USERS AND TYPES</b></h1>
				</div><!--div titulo-->
													
				<div id="datos">
					<!--inicio sesion para recurrir a la variable del nombre del usuario loogueado-->
					<?php	session_start(); 
						echo "Bienvenido   ";
						echo $_SESSION['usuario'];
						$nombre = $_POST['nombre']; 
					?>
                	<p id="estadobd"><b>Estado: <?php include("conexionbd.php") ?></b></p><!--incluyo y evaluo la bd-->
					<p id="fecha"><b>Fecha: <?php echo date('d/m/y')?></b></p>
				</div><!--div datos-->
			</div><!--div menu-->
		
		</div><!--div container-->
		
		<div id="container2"> 
			<a id="list_user" href="list_user_pp3.php"><b>LISTA DE USUARIOS</b></a>
			<a id="list_user_type" href="list_user_type_pp3.php"><b>LISTA DE TIPOS DE USUARIO</b></a><?php echo $_GET["var"]; ?>
			<div id="datos2" align="right">
				<a id="salir" href="logout_pp3.php"><b>SALIR</b></a>
			</div><!--div datos2-->
		</div><!--div container2-->

    </body>
</html>
