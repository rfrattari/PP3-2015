<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo "Lista Usuarios_Vista Guest" ?></title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
    </head>
    
	<body>
		<div id="hide">   <!--color letras BD OK = color fondo-->
        	<?php include("conexionbd.php"); ?>
		</div><!--div hide-->

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
					</div>
               </ul>
            </nav>
		</div><!--div container-->
        
        <div id="container2"> 
    	</div><!--div container2-->

       <div id="centrar">
			 <p>LISTA DE USUARIOS</p>
			<?php
			$consulta = "SELECT * FROM USER";
			$allusers = mysql_query($consulta, $link);
			echo"<br><br><br><left>
				<table border='1'>
				<tr>
					<td>NOMBRE</td>
					<td>APELLIDO</td>
					<td>EMAIL</td>
					
				</tr>";
			while($resultado = mysql_fetch_array($allusers)){
   	    		echo '<tr>';
    			echo '<td>';
    			echo $resultado['Name'];
    			echo '</td>';
    			echo '<td>';
    			echo $resultado['Lastname'];
   				echo '</td>';
    			echo '<td>';
    			echo $resultado['Email'];
    		}
			?>
		
		</div><!--div centrar-->
    </body>
</html>
