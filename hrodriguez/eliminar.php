<?php

require 'funcion.php';
$link = conectarlocal();
$id = $_GET['id'];
$eliminar = "DELETE FROM user WHERE id = $id";
$result = mysql_query($eliminar);
if (!$result) {
    die("Error: " . mysql_error());
} else {
    $mensaje = "Usuario eliminado con exito";
    print "<script>alert('$mensaje')</script>";
    print("<script>window.location.replace('usuarios.php');</script>");
}
mysql_close($link);
?>