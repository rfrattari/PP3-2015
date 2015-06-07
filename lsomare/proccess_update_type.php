<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <ul class="navbar">
            <li><a href="form_user.php">Nuevo usuario</a>
            <li><a href="form_type.php"> Nuevo tipo de usuario</a>
            <li><a href="listar_usuario.php">Listado de usuario</a>
            <li><a href="list_type.php">Listado de tipos</a>
            <li><a href="sesion.php">Salir</a>
        </ul>

        <?php
        
        
        include 'funciones.php';
        $link = conectarse();

    session_start();
    ob_start();

    $name = $_POST['name'];
       
        $query = "UPDATE user_type SET name='" . $name ."'  WHERE id=" . $_SESSION['idmodi'] . ";";

        $result = mysql_query($query) or die('error' . mysql_error());
        
        echo "Modificacion exitosa";
        //header('location: list_type.php');

        mysql_close($link);

      ?>

</body>
</html>
