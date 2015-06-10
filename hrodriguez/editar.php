<!DOCTYPE html>
<html lang = es-AR>
    <head>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <meta charset=UTF-8 >
        <title> Usuarios </title>
    </head>
<body>
<div class="grid">
            <?php
        session_start();
        if (!isset($_SESSION['usuario_nombre'])){
            header('Location: index.php');
        } else {?>
            <div class='usuario'> 
            <?php
            echo("<H4>Bienvenido, ".$_SESSION['usuario_nombre']."</H4>");
            ?>
            <form action="menu.php"><input type="submit" value="Menu" /></form>
            <form action="logout.php"><input type="submit" value="Cerrar sesion" /></form>
            </div> 
<?php
    require 'funcion.php';
    $link = conectarlocal();
    $id=$_GET['id'];
    $consulta=sprintf("SELECT id, name, email, type_user_id FROM user WHERE id = '%s'",mysql_real_escape_string($id));
    $datos = mysql_query($consulta);
    if (!$datos) {
        $mensaje  = 'Consulta no válida: ' . mysql_error() . "\n";
        $mensaje .= 'Consulta completa: ' . $consulta;
        die($mensaje);
    }
?>
<form name="actualizarusuario" action="update_data.php" method="post" >
<h3>Modificar usuario </h3>
<?php $ver = mysql_fetch_array($datos); ?>
<input value="<?php echo $id; ?>" type="hidden" name="txtid">
<label name="txtusuario">Nombre </label><input value="<?php echo $ver['name']; ?>" type="text" name="txtusuario" size="20">
<br>
<label name="txtusuario">Email</label><input value="<?php echo $ver['email']; ?>" type="text" name="usuario_email" size="20">
<br>
<label name="txtpassword">Contraseña </label><input type="password" name="txtpassword" size="20">
<br>
<label>Confirmar Contraseña:</label><input type="password" name="txtpassword_conf" maxlength="15" />
<br />
<?php
    $value= $ver[type_user_id];
    $namecombo = "boxtype_user";  
    combobox("$namecombo","type_user","name","$value");
?>
<br>
<input class="botones" type="submit"  name="btnactualizar" value="Actualizar">
</form>
<?php
    mysql_close($link);}
?>
</div>
</body>
</html>