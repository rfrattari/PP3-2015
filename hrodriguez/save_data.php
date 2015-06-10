<?php
    session_start();
    require 'funcion.php';
    $link = conectarlocal();
    $sin_espacios = count_chars($_POST['txtusuario'], 1);
    if(!empty($sin_espacios[32])) { // compruebo que el campo txtusuario no tenga espacios en blanco
        $mensaje = "El campo usuario no debe contener espacios en blanco.";
        print "<script>alert('$mensaje')</script>";
        print("<script>window.location.replace('cargarusuario.php');</script>");
    }elseif(empty($_POST['txtusuario'])) { // compruebo que el campo txtusuario no esté vacío
        $mensaje = "No haz ingresado tu usuario.";
        print "<script>alert('$mensaje')</script>";
        print("<script>window.location.replace('cargarusuario.php');</script>");
    }elseif(empty($_POST['txtpassword'])) { // compruebo que el campo txtpassword no esté vacío
        $mensaje = "No haz ingresado contraseña.";
        print "<script>alert('$mensaje')</script>";
        print("<script>window.location.replace('cargarusuario.php');</script>");
    }elseif($_POST['txtpassword'] != $_POST['txtpassword_conf']) { // compruebo que las contraseñas ingresadas coincidan
        $mensaje = "Las contraseñas ingresadas no coinciden.";
        print "<script>alert('$mensaje')</script>";
        print("<script>window.location.replace('cargarusuario.php');</script>");
    }elseif(!valida_email($_POST['usuario_email'])) { // verifico que el email ingresado sea correcto
        $mensaje = "El email ingresado no es válido.";
        print "<script>alert('$mensaje')</script>";
        print("<script>window.location.replace('cargarusuario.php');</script>");
    }else {
    $txtusuario = $_POST['txtusuario'];
    $txtpassword = $_POST['txtpassword'];
    $usuario_email = $_POST['usuario_email'];
    $type_user = $_POST['boxtype_user'];
    // verifico que el usuario ingresado no haya sido registrado antes
    $sql = mysql_query("SELECT name FROM user WHERE name='".$txtusuario."'");
    if(mysql_num_rows($sql) > 0) {
        $mensaje = "El nombre usuario elegido ya ha sido registrado anteriormente.";
        print "<script>alert('$mensaje')</script>";
        print("<script>window.location.replace('cargarusuario.php');</script>");
    }else {
        $txtpassword = md5($txtpassword); // encriptamos la contraseña con md5
        // insertamos los datos a la BD
        $reg = mysql_query("INSERT INTO user (name, password, email, type_user_id) VALUES ('".$txtusuario."', '".$txtpassword."', '".$usuario_email."','".$type_user."')");
        if($reg) {
            $mensaje = "Datos ingresados correctamente.";
            print "<script>alert('$mensaje')</script>";
            print("<script>window.location.replace('usuarios.php');</script>"); 
        }else {
            $mensaje = "ha ocurrido un error y no se registraron los datos.";
            print "<script>alert('$mensaje')</script>";
            print("<script>window.location.replace('cargarusuario.php');</script>");
        }
    }
    }
    mysql_close($link);
?>