<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <meta http-equiv= "content-type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="dist/css/bootstrap.css">


    <body>
        <ul class="navbar">
            
                </br>
            <li><a href="form_user.php">Nuevo usuario</a>
            <li><a href="form_type.php"> Nuevo tipo de usuario</a>
            <li><a href="listar_usuario.php">Listado de usuario</a>
            <li><a href="list_type.php">Listado de tipos</a>
            <li><a href="sesion.php">Salir</a>
        </ul>

        <?php
        session_start();

        if ($_SESSION['logueado']) {
            echo '<h3>Bienvenido : ' . $_SESSION['name'].' ', $_SESSION['lastname'];
            ?></h3>

    <center><H2>Listado de usuarios cargados</H2></center>

    <?php
    include("funciones.php");


    $link = conectarse();
    $query = "SELECT user.id,user.name,user.lastname,user.password,user.password_again,user_type.name,user.email FROM user
            INNER JOIN user_type
            ON user.user_type_id=user_type.id ";
    

    $result = mysql_query($query) or die('No se pudo ejecutar');
    session_start();
    ob_start();

    
echo"
<center><table border=3 class='table table-bordered'>
<tr>
<td><h4> NOMBRE </h4></td>
<td><h4> APELLIDO </h4></td>
<td><h4> PASSWORD </h4></td>
<td><h4> TIPO </h4></td>
<td><h4> EMAIL </h4></td>
<td><h4> ACCION </h4></td>
</tr>";
    while ($row = mysql_fetch_row($result)) {
        echo "<tr class='tr_type1'> <td>$row[1]</td>";
        echo "<td>$row[2]</td>";
        echo "<td>$row[3]</td>";
        echo "<td>$row[5]</td>";
        echo "<td>$row[6]</td>";
        //comparo si es admin, que me muestre los links
        if ($_SESSION['tipo'] === 'admin') {
            echo "<td><a href='update.php?id=$row[0]'>Editar</a> ";
            echo "<a href='delete_user.php?id=$row[0]'>Borrar</a></td></tr> \n";
        }
        else {
            echo "<td>--</td>";
            echo "<td>--</td>";
        }
    }
    echo "</table> \n ";

    mysql_close($link);
    
} else {
    echo 'No estas logueado';
}
?>


</body>

</html>
