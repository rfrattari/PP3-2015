<?php

session_start();
require 'funcion.php';
$link = conectarlocal();
$patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";

if (empty($_POST['txtusuario'])) { // compruebo que el campo txtusuario no esté vacío
    $mensaje = "No haz ingresado tu usuario.";
    print "<script>alert('$mensaje')</script>";
    print("<script>window.location.replace('cargarusuario.php');</script>");
} elseif (!preg_match($patron_texto, $_POST['txtusuario'])) { // compruebo que el campo txtusuario no esté vacío
    $mensaje = "Nombre no valido.";
    print "<script>alert('$mensaje')</script>";
    print("<script>window.location.replace('cargarusuario.php');</script>");
} elseif (empty($_POST['txtapellido'])) { // compruebo que el campo txtusuario no esté vacío
    $mensaje = "No haz ingresado tu apellido.";
    print "<script>alert('$mensaje')</script>";
    print("<script>window.location.replace('cargarusuario.php');</script>");
} elseif (!preg_match($patron_texto, $_POST['txtapellido'])) { // compruebo que el campo txtusuario no esté vacío
    $mensaje = "Apellido no valido.";
    print "<script>alert('$mensaje')</script>";
    print("<script>window.location.replace('cargarusuario.php');</script>");
} elseif (empty($_POST['txtpassword'])) { // compruebo que el campo txtpassword no esté vacío
    $mensaje = "No haz ingresado contraseña.";
    print "<script>alert('$mensaje')</script>";
    print("<script>window.location.replace('cargarusuario.php');</script>");
} elseif ($_POST['txtpassword'] != $_POST['txtpassword_conf']) { // compruebo que las contraseñas ingresadas coincidan
    $mensaje = "Las contraseñas ingresadas no coinciden.";
    print "<script>alert('$mensaje')</script>";
    print("<script>window.location.replace('cargarusuario.php');</script>");
} elseif (!valida_email($_POST['usuario_email'])) { // verifico que el email ingresado sea correcto
    $mensaje = "El email ingresado no es válido.";
    print "<script>alert('$mensaje')</script>";
    print("<script>window.location.replace('cargarusuario.php');</script>");
} else {
    $txtusuario = $_POST['txtusuario'];
    $txtapellido = $_POST['txtapellido'];
    $txtpassword = $_POST['txtpassword'];
    $usuario_email = $_POST['usuario_email'];
    $type_user = $_POST['boxtype_user'];
    // verifico que el usuario ingresado no haya sido registrado antes
    $sql = mysql_query("SELECT email FROM user WHERE email='" . $usuario_email . "'");
    if (mysql_num_rows($sql) > 0) {
        $mensaje = "El email de usuario elegido ya ha sido registrado anteriormente.";
        print "<script>alert('$mensaje')</script>";
        print("<script>window.location.replace('cargarusuario.php');</script>");
    } else {
        $txtpassword = md5($txtpassword); // encriptamos la contraseña con md5
        // insertamos los datos a la BD
        $reg = mysql_query("INSERT INTO user (name, lastname, password, email, user_type_id) VALUES ('" . $txtusuario . "', '" . $txtapellido . "', '" . $txtpassword . "', '" . $usuario_email . "','" . $type_user . "')");
        if ($reg) {
            $mensaje = "Datos ingresados correctamente.";
            print "<script>alert('$mensaje')</script>";
            print("<script>window.location.replace('usuarios.php');</script>");
        } else {
            $mensaje = "ha ocurrido un error y no se registraron los datos.";
            print "<script>alert('$mensaje')</script>";
            print("<script>window.location.replace('cargarusuario.php');</script>");
        }
    }
}
mysql_close($link);
?>