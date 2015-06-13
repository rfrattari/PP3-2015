<?php
//creamos la sesion
session_start();
//validamos si se ha hecho o no el inicio de sesion correctamente
//si no se ha hecho la sesion nos regresará a login.php
if(!isset($_SESSION['usuario'])) 
{
  header('Location: login.php'); 
  exit();
}
 ?>

<link rel="stylesheet" href="css/bootstrap.min.css">

 <script src="js/bootstrap.min.js"></script>




<?php

include ("conexion.php");

$sql = "select * from user_type";
$cs = mysql_query($sql, $link);
echo"<left>
<table border='3' class=' table table-condensed'>
<tr class='danger'>

<td>tipo</td>
<td>Accion</td>

</tr>";
while($resul = mysql_fetch_array($cs)){


    
    echo '<tr>';
    echo '<td>';
    echo $resul['name'];
    echo '</td>';
    echo '<td>';
    echo '<a href="borrartiposdeusuario.php?id='.$resul['user_type_id'].'">borrar</a> <br>';
    echo '<a href="modificartipo.php?id='.$resul['user_type_id'].'&name='.$resul['name'].'">editar</a> <br>';

    echo '</td>';
    echo '</tr>';

}

    ?>
 
 
  <form action="index.php"> 
        <button type="submit" class="btn btn-primary">volver</button>
        </form>
 <form action="logout.php"> 
        <button type="submit" class="btn btn-primary">Cerrar sesion</button>
        </form>
