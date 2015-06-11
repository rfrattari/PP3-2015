<!DOCTYPE html>
<html lang = es-AR>
    <head>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <meta charset=UTF-8 >
        <title> Practico de alumnos </title>
</head>
<body>
<div id="login">
<fieldset class="login">
    <form name="login" action="login.php" method="post" >
	 
            <center>
            <H1>Login</H1>
            </center>
             <fieldset class="input"><label name="txtusuario">Usuario </label><input class="cajas" type="text" name="txtusuario" size="20"></fieldset>
             <br>
            <fieldset class="input"><label name="txtpassword">Contraseña </label><input class="cajas" type="password" name="txtpassword" size="20"</label></fieldset>
            <br>
            <center>
            <input class="botones" type="submit" name="btnlogear" value="Entrar"> 
           
            
           
            </form>
             <form name="cargarusuario" action="cargarusuario.php" method="post" >
			 <center>    
             <input class="botones" type="submit" name="btncargarusuario" value="Registrarse">
             </center>	 
             </form> 
   </fieldset>
</div>
</body>
</html>
