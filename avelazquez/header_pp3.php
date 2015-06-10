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
			<nav>
            	<a><img src="img/win.png" id="img_logo"></a>
                <ul>
					<div id="titulo">
						<h1><id="titulo"><b>SYSTEM USERS AND TYPES</b></h1>
					</div><!--div titulo-->
					
					<div id="datos01">
						<!--inicio sesion para recurrir a la variable del nombre del usuario loogueado-->
						<?php	session_start(); 
								echo "Bienvenido   ";
								echo $_SESSION['usuario'];
								$nombre = $_POST['nombre']; 
						?>
					</div><!--div datos01-->
					
					<div id="datos">
                		<p id="estadobd"><b>Estado: <?php include("conexionbd.php") ?></b></p><!--incluyo y evaluo la bd-->
						<p id="fecha"><b>Fecha: <?php echo date('d/m/y')?></b></p>

					</div><!--div datos-->
					
					<div id="datos2">
						<li><a id="salir" href="logout_pp3.php"><b>SALIR</b></a></li>
					</div><!--div datos2-->
               </ul>
            </nav>
				</div><!--div menu-->
		
		</div><!--div container-->
			
		<div id="container2"> 
			<ul>
				<a id="list_user" href="list_user_pp3.php"><b>LISTA DE USUARIOS</b></a>
				<a id="list_user_type" href="list_user_type_pp3.php"><b>LISTA DE TIPOS DE USUARIO</b></a><?php echo $_GET["var"]; ?>
			</ul>
		</div><!--div container2-->

    </body>
</html>
