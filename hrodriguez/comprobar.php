 <?php
    session_start();
    require('funcion.php');
?>
<!doctype html>
<html lang = es-AR>
<head>
    <meta charset=UTF-8 >
</head>
<?php
    if(isset($_POST['enviar'])) { // compruebo que se hayan enviado los datos del formulario
        // compruebo que los campos usuarios_nombre y usuario_clave no estén vacíos
        if(empty($_POST['usuario_email']) || empty($_POST['usuario_clave'])) {
            $mensaje = "El usuario o la contraseña no han sido ingresados.";
            print "<script>alert('$mensaje')</script>";
            print("<script>window.location.replace('index.php');</script>");
        }else {
            $usuario_email = ($_POST['usuario_email']);
            $usuario_clave = ($_POST['usuario_clave']);
            $usuario_clave = md5($usuario_clave);
            // compruebo que los datos ingresados en el formulario coincidan con los de la BD
            $link = conectarlocal();
            $sql = mysql_query("SELECT id, name, password, email, type_user_id FROM user WHERE email='".$usuario_email."' AND password='".$usuario_clave."'");
            if($row = mysql_fetch_array($sql)) {
                $_SESSION['usuario_id'] = $row['id']; // creo la sesion "usuario_id" y le asignamos como valor el campo id
                $_SESSION['usuario_email'] = $row["email"]; // creamos la sesion "usuario_email" y le asignamos como valor el campo email
                $_SESSION['usuario_nombre'] = $row["name"];
                $type_user_id = $row["type_user_id"];
                $sql = mysql_query("SELECT id, name FROM type_user WHERE id='".$type_user_id."'");
                if ($row = mysql_fetch_array($sql)) {
                    $_SESSION['type'] = $row["name"];
                }
                header("Location: menu.php");
            }else {
                $mensaje = "Error al intentar ingresar";
                print "<script>alert('$mensaje')</script>";
                print("<script>window.location.replace('index.php');</script>");
            }
        }
    }else {
        header("Location: index.php");
    }
    mysql_close($link);
?> 