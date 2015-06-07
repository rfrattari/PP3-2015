<html>
    <head>
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
        session_start();

        if ($_SESSION['logueado']) {
            echo '<h3>Bienvenido : ' . $_SESSION['name'] . ' ', $_SESSION['lastname'];
            ?></h3></br>



        <?php
        include("funciones.php");

        $link = conectarse();
        $id = $_GET["id"];
        //guardar el id a modificar
        session_start();
        ob_start();
        $_SESSION['idmodi'] = $id;


        $query = mysql_query("SELECT * FROM user_type WHERE id=" . $id, $link) or die(mysql_error());


        while ($fila = mysql_fetch_array($query)) {
            $name = $fila['name'];
        }
        ?>

    <center><h2> Modificar un tipo de usuario </h2></center>
    <center><form class='alta' method="POST" action="proccess_update_type.php">

            <div><label for ="name">Name </label>
                <input name="name" type="text" value="<?php echo $name ?>" required="autofocus"></div>


            <center><input type="submit" value="Modificar tipo" ></center>
            </br></br>
            <?php
        } else {
            echo 'No estas logueado';
        }
        ?>


        </body>
        </head>
        </html>
