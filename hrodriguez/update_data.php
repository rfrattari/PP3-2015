<?php

require 'funcion.php';
$link = conectarlocal();
$patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";

$url = "editar.php?id=". $_POST['txtid'];;
$sin_espacios = count_chars($_POST['txtusuario'], 1);
if (empty($_POST['txtusuario'])) { // compruebo que el campo txtusuario no esté vacío
    $mensaje = "No haz ingresado tu usuario.";
    print "<script>alert('$mensaje')</script>";
    print("<script>window.location.replace('$url');</script>");
} elseif (!preg_match($patron_texto, $_POST['txtusuario'])) { // compruebo que el campo txtusuario no esté vacío
    $mensaje = "Nombre no valido.";
    print "<script>alert('$mensaje')</script>";
    print("<script>window.location.replace('$url');</script>");
} elseif (empty($_POST['txtapellido'])) { // compruebo que el campo txtusuario no esté vacío
    $mensaje = "No haz ingresado tu apellido.";
    print "<script>alert('$mensaje')</script>";
    print("<script>window.location.replace('$url');</script>");
} elseif (!preg_match($patron_texto, $_POST['txtapellido'])) { // compruebo que el campo txtusuario no esté vacío
    $mensaje = "Apellido no valido.";
    print "<script>alert('$mensaje')</script>";
    print("<script>window.location.replace('$url');</script>");
} elseif (empty($_POST['txtpassword'])) { // compruebo que el campo txtpassword no esté vacío
    $mensaje = "No haz ingresado contraseña.";
    print "<script>alert('$mensaje')</script>";
    print("<script>window.location.replace('$url');</script>");
} elseif ($_POST['txtpassword'] != $_POST['txtpassword_conf']) { // compruebo que las contraseñas ingresadas coincidan
    $mensaje = "Las contraseñas ingresadas no coinciden.";
    print "<script>alert('$mensaje')</script>";
    print("<script>window.location.replace('$url');</script>");
} elseif (!valida_email($_POST['usuario_email'])) { // verifico que el email ingresado sea correcto
    $mensaje = "El email ingresado no es válido.";
    print "<script>alert('$mensaje')</script>";
    print("<script>window.location.replace('$url');</script>");
} else {
    $id = $_POST['txtid'];
    $usuario = $_POST['txtusuario'];
    $apellido = $_POST['txtapellido'];
    $usuario_email = $_POST['usuario_email'];
    $password = $_POST['txtpassword'];
    $password = md5($password);
    $type_user_id = $_POST['boxtype_user'];
    $query = "UPDATE user SET name = '" . $usuario . "', lastname = '" . $apellido . "', email = '" . $usuario_email . "', password = '" . $password . "', user_type_id = '" . $type_user_id . "' WHERE id = '" . $id . "' ";
    $result = mysql_query($query);
    if (!$result) {
        die("Error: " . mysql_error());
    } else {
        $mensaje = "Usuario actualizado con exito";
        print "<script>alert('$mensaje')</script>";
        print("<script>window.location.replace('usuarios.php');</script>");
    }
}
mysql_close($link);
?>