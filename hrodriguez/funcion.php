<?php

function conectarlocal() {
    require 'class_php_mysql.php';
    $coneccion = new Connection('localhost', 'data4_pp3', 'data42015php', 'data4_pp3_db');
}

function combobox($name, $tabla, $campo, $filtro = "null", $order = "null") {
    ?>
    <select name= "<?php echo $name; ?>">
        <?php
        $query = "SELECT * FROM $tabla";
        $res = mysql_query($query);
        while ($row = mysql_fetch_array($res)) {
            if ($row['id'] == $filtro) {
                echo "<option value= " . $row['id'] . " selected>" . $row[$campo] . "</option>";
            } else {
                echo "<option value= " . $row['id'] . ">" . $row[$campo] . "</option>";
            }
        }
        echo "</select>";
    }

    function valida_email($correo) {
        if (preg_match('/^[A-Za-z0-9-_.+%]+@[A-Za-z0-9-.]+\.[A-Za-z]{2,4}$/', $correo))
            return true;
        else
            return false;
    }

    function lista($consulta, $fieldarray, $view) {
        $res = mysql_query($consulta);
        echo "<table WIDTH='100%' BORDER='1'>";
        for ($x = 0; $x < count($fieldarray); $x++) {
            echo "<td align='center'>" . $fieldarray[$x] . "</td>";
        }
        while ($row = mysql_fetch_array($res)) {
            echo "<tr>";
            for ($i = 0; $i < mysql_num_fields($res); $i++) {
                echo "<td align='center'>" . $row[$i] . "</td>";
            }
            ?>
            <td><a style="<?php echo $view; ?>" href="<?php echo 'editar.php?id=' . $row['id']; ?>">Editar</a>
            <td><a style="<?php echo $view; ?>" href="<?php echo 'eliminar.php?id=' . $row['id']; ?>">Eliminar</a> 
            <?php
                echo "</tr>";
            }
            echo "</table>";
        }

?>