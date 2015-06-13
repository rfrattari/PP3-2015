<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo "Conexion a la BD"  ?></title>
    </head>
    <body>
        
        <?php
            #$link = mysql_connect('IP_Host','password','administrador');
            $link = mysql_connect('127.0.0.1','root','root')
            
            #or die es lo que sucede si no conecta la a bd
            or die ('Error de conexion:'. mysql_error());
            echo ('Conexion OK. ');
            
            #seleccion de una bd
            mysql_select_db('pp3_db1') 
            or die ('Error en lectura de la BD.');
            echo ('BD seleccionada correctamente.');
                       
            #cerrar conexion
            #mysql_close($link);
        ?>
        
    </body>
</html>
