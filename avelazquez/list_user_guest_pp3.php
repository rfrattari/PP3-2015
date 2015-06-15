<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo "Lista Usuarios_Vista Guest" ?></title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<script src="js/sorttable.js"></script><!--Uso de JS para ordenar las columnas-->
    </head>
    
	<body>
		<div id="hide">   <!--color letras BD OK = color fondo-->
        	<?php include("conexionbd.php"); ?>
		</div><!--div hide-->

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
			<div id="datos2" align="right">
				<a id="salir" href="logout_pp3.php"><b>SALIR</b></a>
			</div><!--div datos2-->
    	</div><!--div container2-->

		<p class="titulopestania" align="center">LISTA DE USUARIOS</p>
       <div id="centrar">
			
			<?php
				$consulta = "SELECT * FROM USER";
				$allusers = mysql_query($consulta);
			?>
				<table class="sortable">
				<tr>
					<th>NOMBRE</th>
					<th>APELLIDO</th>
					<th>EMAIL</th>
				</tr>
		<?php			
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
			</table>
		</div><!--div centrar-->
		<p align="center">Haga click en la cabecera de cada columna para ordenar alfabeticamente.</p>
		<?php include("footer_pp3.php"); ?>
    </body>
</html>
