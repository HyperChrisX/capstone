<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Role based Login System</title>
	<style>
		body{
			background: url(img/dell.jpg);
		}
		button:hover{
			background-color: red;
		}
	</style>
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
<body>
<?php

    if(isset($_SESSION['sess_user_id']))
    {
        include('nav_login.php');   
    }

    else
    {
        include('nav.php');
    }

?>
    <div class="container">
      <div class="info">
        <div class="row">
          <div class="col-md-12">
            <br /><br />
            <h1 style="font-size:50px; color: white;"> DELL</h1>
            <h2 class="text-muted"> Please sign-up or login. </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="btn-group">
              <button class="btn btn-lg" onclick="window.location.href='signup_home.php'">Sign Up</button>
              <button class="btn btn-lg" onclick="window.location.href='login_home.php'">Login</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>