<?php
require 'funciones.php';
$conexion= conectar();
    $usuario = $_POST['txtusuario'];
    $password = $_POST['txtpassword'];

    $query = "SELECT user.id, user.name, user.password  FROM user INNER JOIN user_type ON name.user_type = user_type.id WHERE user.name = '".$usuario."' AND password = '".$password."' ";

    $result = mysql_query($query);

    if (!$result){
        die($error="Error: ".mysql_error());
        ?>
        <body onload="document.frmerror.submit()">
            <form name="frmerror" action="index.php" method="post" >
                <input value="<?php echo $error; ?>" type="hidden" name="error">
            </form>
        </body>
        <?php
    }
    else {
        $row = mysql_fetch_array($result);
        if ($row['id'] == "") {   ?>
        <body onload="document.frmerror1.submit()">
           <form name="frmerror1" action="index.php" method="post" >
               <input value="Usuario o contraseña incorrecto" type="hidden" name="error1">
            </form>
        </body>
        <?php
        }
        else{
        session_start();
        $_SESSION['id'] = $row['id'];
        $_SESSION['usuario'] = $row['name'];
        $_SESSION['contraseña'] = $row['password'];
        header('Location: usuarios.php');
        }
        }


?>
