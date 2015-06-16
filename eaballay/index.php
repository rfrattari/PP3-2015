<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


</head>
<body>
 <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    
    <div class="col-md-4">
      <section class="login-form">
        <form method="post" action = 'logg.php'>
          <input type="email" name="email" placeholder="Email" required class="form-control input-lg" value="" />
          
          <input type="password" class="form-control input-lg" id="password" name= "pass" placeholder="Password" required />
          
          
          <div class="pwstrength_viewport_progress"></div>
          
          
          <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Sign in</button>

          
        </form>
        

  
<form class="login-form" action= 'users.php'>
		<input type="submit" class="btn btn-lg btn-primary btn-block" value	="Registrarse"/>
</form>
      </section>  
      </div>
      
      <div class="col-md-4"></div>
      

  </div>
  <?php 
  $error = '';
  if(isset($_GET['error'])){
  	$error = $_GET['error'];
  }

  if ($error == 1){
  	echo 'usuario incorrecto';
  }?>	
</body>	
</html>