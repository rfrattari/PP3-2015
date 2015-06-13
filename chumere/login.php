<?php
        include("conexion.php");

    
?> 



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
   

    <title>login usuarios</title>

    
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <link href="css/signin.css" rel="stylesheet">

   
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="POST" action="controllogin.php">
        <h2 class="form-signin-heading">LOGUEATE</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>
       
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">login </button>
        
      </form>
      <form class="form-signin" action="form_user_type.php">
       
      </form> 
        
        
        
    </div> 
  
  </body>
</html>















