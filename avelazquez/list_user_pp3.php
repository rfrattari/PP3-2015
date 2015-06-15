<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo "List de usuarios" ?></title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<script src="js/sorttable.js"></script><!--Uso de JS para ordenar las columnas-->
    </head>
    
	<body>
		<div id="hide">   <!--color letras BD OK = color fondo-->
        	<?php include("conexionbd.php"); ?>
		</div><!--div hide-->
 
		<?php 
			include("header_pp3.php");
			#SI SE HIZO CLICK EN SUBMIT DE FORM_UP_PP3
   			if (isset($_POST['Submit1'] ) ) { 
			$consulta1 = "UPDATE USER SET Name='".$_POST['name']."', Lastname='".$_POST['lastname']."', Email='".$_POST['email']."', Id_User_Type='".$_POST['usertype']."' WHERE Id='".$_POST['id1']."'";		  
			$resultado1 = mysql_query($consulta1);	
			}    
		?>

		<p class="titulopestania" align="center">LISTA DE USUARIOS</p>
		<div id="centrar">
         
			<?php
				$consulta = "SELECT us.Id_User_Type, us.Id, us.Lastname, us.Email, us.Name AS Nameus, ut.Name AS Nameut FROM `USER` AS us, `USER_TYPE`AS ut WHERE us.Id_User_Type=ut.Id";
				$allusers = mysql_query($consulta);
			?>
		
			<table class="sortable">
				<tr>
					<th>NOMBRE</th>
					<th>APELLIDO</th>
					<th>EMAIL</th>
					<th>TIPO USUARIO</th>
					<th>ACCION</th>
				</tr>
			<?php		
				while($resultado = mysql_fetch_array($allusers)){
		            echo '<tr>';
					echo '<td>';
	   	    		echo $resultado['Nameus'];
					echo '</td >';
					echo '<td>';
					echo $resultado['Lastname'];
	   				echo '</td>';
					echo '<td >';
					echo $resultado['Email'];
					echo '</td>';
	   		 		echo '<td>';
					echo $resultado['Nameut'];
					echo '</td>';
	   		 		echo '<td>';
					#siguiente redirecciona a delete_user_pp3 donde borra registro seleccionado y vuelve a esta misma pagina
		 	 		echo '<a href="delete_user_pp3.php?id='.$resultado['Id'].'">Borrar..../</a> ';
					#siguiente redirecciona a form_up_pp3 
					echo '<a href="form_up_pp3.php?id='.$resultado['Id'].'&nombre='.$resultado['Nameus'].'&apellido='.$resultado['Lastname'].'&email='.$resultado['Email'].'&ut='.$resultado['Id_User_Type'].'">....Editar</a> <br>';
					echo '</td>';
					echo '</tr>';
				}
				?>
				</table>
		
				<p>Ingrese <a href='form_in_pp3.php'>AQUI</a> un nuevo usuario.</p>
				<p>Haga click en la cabecera de cada columna para ordenar alfabeticamente.</p>
			</div><!--div centrar-->
		<?php include("footer_pp3.php"); ?>
    </body>
</html>
