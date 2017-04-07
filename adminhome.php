<?php
session_start();
$role = $_SESSION['sess_userrole'];

if(!isset($_SESSION['sess_username']) && $role != "Admin")
{
	header('location: index.php?err=2');	
}
?>

<!DOCTYPE html>
<!-- HTML entities for Page Display -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>
    
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://techyari.in"></a>
        </div>

        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><?php echo $_SESSION['sess_username'];?></a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container homepage">
      <div class="row">
         <div class="col-md-3"></div>
            <div class="col-md-6 welcome-page">
              <h2>This is Admin area.</h2>
            </div>
          <div class="col-md-3"></div>
        </div>
    </div>    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    </body>  
</html>


