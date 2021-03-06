<?php
session_start();
$role = $_SESSION['sess_userrole'];

if(!isset($_SESSION['sess_username']))
{
	header('location: login_home.php?err=2');	
}
elseif($_SESSION['sess_userrole'] != 'Admn')
{
    header('location: userhome.php');
}

else
{
    include('database-config.php');
    
}
?>
<!DOCTYPE html> 
<!-- HTML entities for Page Display -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Users Page </title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/userhome.css" rel="stylesheet">
  </head>
  <body>
    
    <?php include("nav_login.php"); ?>

    <div class="container homepage">
		<div class="user">
		  <div class="row">
			 <div class="col-md-3"></div>
				<div class="col-md-6 welcome-page">
				  <h2> Welcome <?php echo $_SESSION['sess_username'];?> </h2>
				</div>
			  <div class="col-md-3"></div>
			</div>
		</div>
    </div>    
	<div class="container">

            <div class="row">

                <div class="col-lg-12 text-center">

                <?php

                      //Associative array to display errors

                        $errors = array( 0=>"Project added successfully, you may edit or remove it below.",

									   	 1=>"Project removed successfully.",

										 2=>"Project changed successfully.");

                                

                      //Get the error_id from URL

                      if(isset($_GET['err']))

                      {

                        $error_id = $_GET['err'];

                        if($error_id == 0)

                        {

                          echo'<p class="text-warning">'.$errors[$error_id].'</p>';	

                        }

                        if($error_id == 1)

                        {

                          echo'<p class="text-danger">'.$errors[$error_id].'</p>';	

                        }

                        if($error_id == 2)

                        {

                          echo'<p class="text-success">'.$errors[$error_id].'</p>';

                        }

                      }

                      ?>
                </div>

            </div>
            <div class="row">
                <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Project Name</td>
                                    <td>Created by (username)</td>
                                    <td>Indate</td>
                                    <td>Comment</td>
                                    <td>Edit|Delete</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    #Populate Table
                                    /*Create Arrays*/
                                    $result = $db->prepare("SELECT * FROM users");
                                    $result->execute();
                                
                                    while($data = $result->fetch(PDO::FETCH_ASSOC))
                                    { 
                                        $proj_indate = $data['Indate'];
                                        $proj_id = $data['ProjID'];
                                        $proj_uname = $data['username'];
                                        $proj_name = $data['ProjectName'];
                                        $proj_comment = $data['comment'];

                                    ?>
                                    <tr <?php if(isset($_GET['err']) && $_GET['err']==1 && $_GET['id']==$proj_id)
                                              { 
                                                  echo "class='danger'"; 
                                              } 
                                              elseif(isset($_GET['err']) && ($_GET['err']==0 || $_GET['err']==2) && $_GET['id']==$proj_id)
                                              {
                                                  echo 'class="success"';
                                              }
                                        ?>>
                                        <td><?php echo $proj_id; ?></td>
                                        <td><?php echo $proj_name; ?></td>
                                        <td><?php echo $proj_uname; ?></td>
                                        <td><?php echo $proj_indate; ?></td>
                                        <td><?php echo $proj_comment; ?></td>
                                        <td>
                                            <div class="btn-group btn-group-md">
                                                    <?php 
                                                    
                                                        $editjs = "window.location.href='add_edit.php?id=$proj_id&uid=$proj_uname'"; 
                                                        $remjs = "if (confirm('Are you sure you want to delete this?') == true) {
                                                                window.location.href='add_edit.php?remid=$proj_id&uid=$proj_uname';
                                                                }"; 
                                                    
                                                    ?>
                                                    <button type='button' class='btn btn-primary' onclick="<?php echo $editjs; ?>">Change</button>
                                                    <button type='button' class='btn btn-danger' onclick="<?php echo $remjs; ?>">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                  <?php  }
                                ?>
                            </tbody>
                        </table>
                    </div>     
                </div>
            </div>

        </div>
	
	
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    </body>  <!-- HTML entities for Page Display -->
</html>


