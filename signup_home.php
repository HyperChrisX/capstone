<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Role based Login System</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<style>
		body{
		background-color: #505050;
		}
	</style>
  </head>

<body>
<?php include("nav.php"); ?>
    <div class="container">
      <div class="info">
        <h3 class="bg-primary">SIGN UP</h3>
        <div class="col-md-6 col-md-offset-3">
          <div class="block-margin-top">
 
                      <?php
                      //Associative array to display errors
                        $errors = array( 1=>"Passwords didn't match, please try again.",
										 2=>"Username must be under 15 characters.");
                                
                      //Get the error_id from URL
                      if(isset($_GET['err']))
                      {
                        $error_id = $_GET['err'];
                        if($error_id == 1)
                        {
                          echo'<p class="text-danger">'.$errors[$error_id].'</p>';	
                        }
                        if($error_id == 2)
                        {
                          echo'<p class="text-danger">'.$errors[$error_id].'</p>';
                        }
                      }
                      ?>

                             <form action="signup.php" method="post" class="form-signup col-md-8 col-md-offset-2">
        <br />
        <P style="color:white; font-size: 15px;">Username:</P> <input name="username" type="text" class="form-control" placeholder="Enter Username"  required>
        <br /><br />
        <P style="color:white; font-size: 15px;">Password:</P> <input name="password" type="password" class="form-control" placeholder="Enter Password" required>
        <br /><br />
        <P style="color:white; font-size: 15px;">Confirm Password:</P> <input name="passwordCon" type="password" class="form-control" placeholder="Confirm Password" required>
        <br /><br />
        <P style="color:white; font-size: 15px;">Email ID:</P> <input name="email" type="text" class="form-control" placeholder="example@example.com" required>
        <br /><br />
        <P style="color:white; font-size: 15px;">Phone Number:</P> <input name="phone" type="tel" class="form-control" placeholder="(123) 123-1234" required>
        <br /><br />
          <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit" value="Submit">Submit</button>&nbsp;
          <button class="btn btn-sm btn-warning btn-block" name="clear" type="reset" value="Clear">Clear</button>
         </form>

            </div>

      </div>
      
     
    </div>
  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>