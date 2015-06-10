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


include("conexion.php");

$sql = "select * from user";
$cs = mysql_query($sql, $link);
?>
<div class="container">  
  <div class="table-responsive"> 
      <table class="table">
<?php

echo"<left>
<table border='3' class=' table table-condensed' >
<tr class='active'>

<td>nombre</td>
<td>apellido</td>
<td>email</td>
<td>acciones</td>
</tr>";
while($resul = mysql_fetch_array($cs)){



echo '<tr>';
echo '<td>';
echo $resul['name'];
echo '</td>';
echo '<td>';
echo $resul['lastname'];
echo '</td>';
echo '<td>';
echo $resul['email'];
echo '</td>';
?>
<?php
if($_SESSION['idtipousuario']== 1){
echo '<td>';
echo '<a href="delete_user_type.php?id='.$resul['id'].'">borrar</a> <br>';
}
?>
<?php
if($_SESSION['idtipousuario']== 1) {

echo '<a href="edit_user_type.php?id='.$resul['id'].'&name='.$resul['name'].'&lastname='.$resul['lastname'].'&email='.$resul['email'].'">editar</a> <br>';
echo '</td>';

}
?>
<?php
echo '</tr>';
  
}

?> 
          </table>
        </div>

</div>

 
            <a href="index.php">volver</a>
            <br>
            <a href="logout.php">cerrar sesion</a>