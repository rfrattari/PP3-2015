








<?php

include ("conexion.php");
$email = $_POST['email'];
$pass = $_POST['pass'];

$passmd5 = md5($pass);



$consulta1 = mysql_query("SELECT * FROM user WHERE email='$email'");
$cs = mysql_query($consulta1, $link);


if ($row = mysql_fetch_array($consulta1)) {
    //Si el usuario es correcto ahora validamos su contraseña
    if ($row["password"] == $passmd5) {
        $idtipousuario = $row["user_type_id"];
        $nombreusuario = $row["name"];
        //Creamos sesión
        session_start();
        //Almacenamos el nombre de usuario en una variable de sesión usuario
        $_SESSION['usuario'] = $email;
        $_SESSION['idtipousuario'] = $idtipousuario;
        $_SESSION['nombreusuario'] = $nombreusuario;

        //Redireccionamos a la pagina: index.php
        header("Location: index.php");
    } else {
        header("Location: login.php");
    }
} else {
    //En caso que la contraseña sea incorrecta redireccionamos a login.php
    header("Location: login.php");
}
?>

































