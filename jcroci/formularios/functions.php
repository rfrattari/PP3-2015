<?php

function conectardb($ip, $user, $pass, $db){
	$conexion = mysql_connect($ip, $user, $pass)
            or die('NO SE CONESTO: ' . mysql_error());
    mysql_select_db($db) or die('No se selecciono la base de datos');
	return $conexion;
}

function cargarcombo($conexion, $nombre, $tabla, $campo, $filtro=null, $order=null, $readonly = null){
	$query = "SELECT id, ".$campo." FROM ".$tabla;

	if ($order<> Null ){
		$query = $query.' ORDER BY '.$order;
	}

	$resultado = mysql_query($query,$conexion);

	if ($readonly == null){
		echo "<select name='".$nombre."' class='form-control'>"; 
	} else {
		echo "<select name='".$nombre."' readonly class='form-control'>"; 
	}
    while ($row = mysql_fetch_row($resultado)){ 
    	var_dump($row);
		if ($filtro <> Null){
			if ($row[0] != $filtro){
	    		echo '<option value='.$row[0].'>'.$row[1].'</option>';
	    	} else {
	    		echo '<option value='.$row[0].' selected >'.$row[1].'</option>';
	    	}
		} else {
     		echo '<option value='.$row[0].' selected >'.$row[1].'</option>';
     	}
     }   
    echo '</select>';
}
