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
        $_SESSION['idmodificar'] = $id;


        $query = mysql_query("SELECT * FROM user WHERE id=" . $id, $link) or die(mysql_error());


        while ($fila = mysql_fetch_array($query)) {
            $name = $fila['name'];
            $lastname = $fila['lastname'];
            $password = $fila['password'];
            $password_again = $fila['password_again'];
            //$id_type=$fila['id_type'];
            $email = $fila['email'];
        }
        ?>
        <center><form class='alta' method="POST" action="process_update.php">
            

                        <div><label for ="name">Name </label>
                        <input name="name" type="text" value="<?php echo $name ?>"required></div>
                    
                        <div><label for ="lastname">Lastname </label>
                        <input name="lastname" type="text" value="<?php echo $lastname ?>" placeholder="Escriba su apellido" required></div>
                    
                        <div><label for ="password">Password </label>
                        <input name="password" type="password" value="<?php echo $password ?>" placeholder="Escriba su password" required></div>
                   
                        <div><label for ="password_again">Password </label>
                        <input name="password_again" type="password" value="<?php echo $password_again ?>"placeholder="Repita su password" required></div>
                   
                        <div><label for ="email">Email </label>
                        <input name="email" type="text" value="<?php echo $email ?>" placeholder="Escriba su email" required></div>
                    
                        <div><label> Tipo de Usuario
                        <select name="tipo"   >

                                <?php
                                require_once 'funciones.php';
                                $link = conectarse();
                                $campo = "name";
                                $tabla = "user_type";
                                cargarcombo($campo, $tabla);
                                ?>

                            </select></div>
                        </label>
            <center><input type="submit" value="Guardar cambios" ></center>
    </br>
                    
           

            <?php
        } else {
            echo 'No estas logueado';
        }
        ?>

</form>
</body>
</head>
</html>
