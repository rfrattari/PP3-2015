<?php // 
function conectarse() {
    if (!($link = mysql_connect("localhost", "root", "nutrifood"))) {
        echo "conexion exitosa";
        exit();
    }
    if (!mysql_select_db("pp3_db", $link)) {
        echo "Error seleccionando la base de datos.";
        exit();
    }
    return $link;
}
?>

<?php

//function conectarse() {
//    if (!($link = mysql_connect("localhost", "data4_pp3", "data42015php"))) {
//        echo "conexion exitosa";
//        exit();
//    }
//    if (!mysql_select_db("data4_pp3_db", $link)) {
//        echo "Error seleccionando la base de datos.";
//        exit();
//    }
//    return $link;
//}
//?>

<?php

function cargarcombo($campo, $tabla) { //recargar combo
    $link = conectarse();


    $sql = "SELECT $campo FROM $tabla ";
    $result = mysql_query($sql);
   $i=0;
    while ($row = mysql_fetch_row($result))
        echo "<option  value=" . $row[$i] . ">" . $row[$i] . "</option>\n" ;
}

return $combo;
?>



