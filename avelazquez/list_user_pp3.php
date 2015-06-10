<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo "List de usuarios" ?></title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
    </head>
    
	<body>
		<div id="hide">   <!--color letras BD OK = color fondo-->
        	<?php include("conexionbd.php"); ?>
		</div><!--div hide-->
 
		<?php 
				include("header_pp3.php");
   		?> 
		
		<div id="centrar">
            <p>LISTA DE USUARIOS</p>
			<?php
			$consulta = "SELECT * FROM USER";
			#$tipousuario = "SELECT Name FROM USER_TYPE INNER JOIN USER ON USER_TYPE.Id = USER.Id_User_Type";
			#$a = mysql_query($tipousuario, $link);
			$allusers = mysql_query($consulta, $link);
			echo"<br><br><br><left>
				<table border='1' >
				<tr>
					<td>NOMBRE</td>
					<td>APELLIDO</td>
					<td>EMAIL</td>
					<td>ACCION</td>
				</tr>";
			while($resultado = mysql_fetch_array($allusers)){
                echo '<tr>';
    			echo '<td>';
   	    		echo $resultado['Name'];
    			echo '</td >';
    			echo '<td>';
    			echo $resultado['Lastname'];
   				echo '</td>';
    			echo '<td >';
    			echo $resultado['Email'];
    			echo '</td>';
   		 		echo '<td>';
				#echo $resultado[$a];
				#echo '</td>';
    			#echo '<td>';
   				#siguiente redirecciona a delete_user donde borra registro seleccionado y vuelve a esta misma pagina
     	 		echo '<a href="delete_user_pp3.php?id='.$resultado['Id'].'">Borrar..../</a> ';
				echo '<a href="form_up_pp3.php?id='.$resultado['Id'].'&nombre='.$resultado['Name'].'&apellido='.$resultado['Lastname'].'&email='.$resultado['Email'].'">....Editar</a> <br>';
				echo '</td>';
    			echo '</tr>';
			}
			?>

		<a href='form_in_pp3.php'>Nuevo Usuario</a>
		</div><!--div centrar-->
    </body>
</html>
