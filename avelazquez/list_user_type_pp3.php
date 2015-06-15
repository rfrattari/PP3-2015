<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo "Lista de tipos de usuarios" ?></title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<script src="js/sorttable.js"></script><!--Uso de JS para ordenar las columnas-->
    </head>
    
	<body>
		<div id="hide">   <!--color letras BD OK = color fondo-->
        	<?php include("conexionbd.php"); ?>
		</div><!--div hide-->

        <?php 
			include("header_pp3.php");
			#SI SE HIZO CLICK EN SUBMIT DE FORM_UP_USER_TYPE_PP3
   			if (isset($_POST['Submit2'] ) ) { 
			$consulta1 = "UPDATE USER_TYPE SET Name='".$_POST['name']."' WHERE Id='".$_POST['id1']."'";		  
			$resultado1 = mysql_query($consulta1);	
			}   
   	    ?> 
        
		<p class="titulopestania" align="center">LISTA DE TIPO DE USUARIOS</p>
        <div id="centrar">

		<?php
        	$consulta = "SELECT * FROM USER_TYPE";
            $alltypes = mysql_query($consulta, $link);
        ?>   
		
		<table class="sortable">
        	<tr>
            	<th>TIPO</th>
                <th>ACCION</th>
            </tr>
		<?php             
			while($resultado = mysql_fetch_array($alltypes)){
                echo '<tr>';
                echo '<td>';
                echo $resultado['Name'];
                echo '</td>';
                echo '<td>';
                #siguiente redirecciona a delete_user_type_pp3 donde borra registro seleccionado y vuelve a esta misma pagina
                echo '<a href="delete_user_type_pp3.php?id='.$resultado['Id'].'">Borrar..../</a> ';
                #siguiente redirecciona a form_up_type_pp3 
		        echo '<a href="form_up_user_type_pp3.php?id='.$resultado['Id'].'&nombre='.$resultado['Name'].'">....Editar</a> <br>';
                echo '</td>';
                echo '</tr>';
            }
		?>
        </table>
		<p>Ingrese <a href='form_in_user_type_pp3.php' >AQUI</a> un nuevo tipo de usuario.</p>
        <p>Haga click en la cabecera de cada columna para ordenar alfabeticamente.</p>
		</div><!--div centrar-->
		<?php include("footer_pp3.php"); ?>
    </body>
</html>
