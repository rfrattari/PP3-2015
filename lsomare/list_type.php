<html>
    <head>    
    <body>

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
        echo '<h3>Bienvenido : ' . $_SESSION['name'] . ' ', $_SESSION['lastname'] . '</br>';
        ?></h3>
    <center><h2> Listado de tipos de usuarios </h2></center>  
    </br>
    <?php
    include("funciones.php");

    $link = conectarse();
    $query = "SELECT * FROM user_type";
    $result = mysql_query($query) or die('No se pudo conectar');

    $tipo = $_POST['tipo'];

    echo"
<center><table border='3'>
<tr>
<td><h4> Tipo </h4></td>
<td><h4> Accion </h4></td>
</tr></center>";
    while ($row = mysql_fetch_row($result)) {
        echo "<tr><td>" . $row[1] . "</td>  ";
        if ($_SESSION['tipo'] === 'admin') {
            echo "<td><a href='update_type.php?id=$row[0]'>Editar</a> ";
            echo "<a href='delete_type.php?id=$row[0]'>Borrar</a></td></tr> \n";
        } else {
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
</head>
</html>
