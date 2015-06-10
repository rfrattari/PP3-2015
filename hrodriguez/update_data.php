<?php
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
    $id = $_POST['txtid'];
    $usuario = $_POST['txtusuario'];
    $usuario_email = $_POST['usuario_email'];
    $password = $_POST['txtpassword'];
    $password = md5($password);
    $type_user_id = $_POST['boxtype_user'];
    $query = "UPDATE user SET name = '".$usuario."', email = '".$usuario_email."', password = '".$password."', type_user_id = '".$type_user_id."' WHERE id = '".$id."' ";
    $result = mysql_query($query);
    if (!$result){
        die("Error: ".mysql_error());
    }
        else {
        $mensaje = "Usuario actualizado con exito";
        print "<script>alert('$mensaje')</script>";
        print("<script>window.location.replace('usuarios.php');</script>"); 
    }
	}
    mysql_close($link);
?>