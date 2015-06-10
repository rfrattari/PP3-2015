<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo "Lista de tipos de usuarios" ?></title>
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
			<p>LISTA DE TIPO DE USUARIOS</p>
            <?php
                $consulta = "SELECT * FROM USER_TYPE";
                $alltypes = mysql_query($consulta, $link);
                echo"<br><br><br><left>
                <table border='3'>
                <tr>
                    <td>TIPO</td>
                    <td>ACCION</td>
                </tr>";
                while($resultado = mysql_fetch_array($alltypes)){
                echo '<tr>';
                echo '<td>';
                echo $resultado['Name'];
                echo '</td>';
                echo '<td>';
                echo '<a href="delete_user_type_pp3.php?id='.$resultado['Id'].'">Borrar..../</a> ';
		echo '<a href="form_up_user_type_pp3.php?id='.$resultado['Id'].'&nombre='.$resultado['Name'].'">....Editar</a> <br>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
            <a href='form_in_user_type_pp3.php'>Nuevo Tipo de Usuario</a>
		</div><!--div centrar-->
    </body>
</html>
