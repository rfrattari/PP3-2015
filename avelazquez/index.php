<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo "INDEX" ?></title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
    </head>
    
	<body>
		<div id="hide">   <!--color letras BD OK = color fondo-->
            <?php include("conexionbd.php"); ?>
	    </div><!--div hide-->
        
		<div id="container">   
			<div id="menu">
			<nav>
            	<a><img src="img/win.png" id="img_logo"></a>
                <ul>
					<div id="titulo">
						<h1><b>SYSTEM USERS AND TYPES</b></h1>

					</div>
					<h1><id="titulo" align="center"><b>- LOGIN -</b></h1>
               </ul>
            </nav>
		</div><!--div container-->
			
		

        <div id="container2"> 
			
		</div><!--div container2-->

        
        <div id="centrar">
            <form  method="post" action="login_pp3.php"> 
            <br> <br>                     
			  
            <label for="name"> Nombre: </label>
            <input name = "name" type = "text" placeholder = "Escriba su nombre aqui " required autofocus ></input>
            <br> <br>

			<label for="pass"> Password: </label>
            <input name = "pass" type = "password" placeholder = "Escriba su password aqui " required autofocus ></input>
            <br> <br><br> <br>
   
            <input type = "submit" value = "Ingresar" ></input>

	    </div><!--div centrar-->

   </body>
</html>
