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

  </head>

<body>
<?php include("nav.php"); ?>
    <div class="container">
      <div class="info">
        <h3 class="bg-primary">Login to your account</h3>
        <div class="col-md-6 col-md-offset-3">
        <h4></span>Log in with your credentials<span class="glyphicon glyphicon-user"></h4><br/>
          <div class="block-margin-top">
 
                      <?php
                      //Associative array to display errors
                        $errors = array( 0=>"Account created successfully. You may now sign in.",
                                  1=>"Invalid username or password, Try again.",
                                  2=>"Please Login to access this area!");
                                
                      //Get the error_id from URL
                      if(isset($_GET['err']))
                      {
                        $error_id = $_GET['err'];
                        if($error_id == 0)
                        {
                          echo'<p class="text-warn">'.$errors[$error_id].'</p>';	
                        }
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

                              <form action="authenticate.php" method="POST" 
                              class="form-signin col-md-8 col-md-offset-2" role="form">  
                                <input type="text" name="username" class="form-control" 
                                        placeholder="Username" required autofocus><br/>
                                <input type="password" name="password" class="form-control" 
                                        placeholder="Password" required><br/>
                                <button class="btn btn-lg btn-primary btn-block" 
                                          type="submit">Sign in</button>
                              </form>
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