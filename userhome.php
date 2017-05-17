<?php
session_start();
$role = $_SESSION['sess_userrole'];

if(!isset($_SESSION['sess_username']) && $role != "User")
{
	header('location: login_home.php?err=2');	
}

else
{
    include('database-config.php');
    $result = $db->prepare(" SELECT users.id
                                    , users.ProjectName
                                    , users.Indate
                                    , users.comment
                                    FROM caps
                                    INNER JOIN users 
                                    ON caps.username = users.username
                                    WHERE users.username ='"	.	$_SESSION['sess_username']. "'");
    $result->execute();
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
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

                        $errors = array( 0=>"Service scheduled successfully, you may edit or remove it below.",

									   	 1=>"Duplicate service attempted. Please check below.",

										 2=>"Service status changed successfully.");

                                

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

                          echo'<p class="text-danger">'.$errors[$error_id].'</p>';

                        }

                      }

                      ?>

                    <h2>Your current schedule:</h2>

                </div>

            </div>
            <div class="row">
                <br />
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <td>Date Scheduled</td>
                                    <td>Part/Service for install</td>
                                    <td>Cost*</td>
                                    <td>Completed?</td>
                                    <td>Edit|Delete</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    #Populate Table
                                    /*Create Arrays*/
                                    $current_user = $_SESSION["sess_user_id"];
                                    $query = $db->prepare("SELECT * FROM APPT_SCHEDULE WHERE USER_ID = '$current_user'");
                                    $query -> execute();
                                
                                    while($data = $query->fetch(PDO::FETCH_ASSOC))
                                    { 
                                        $date = $data['DATE_TIME'];
                                        $sched_id = $data['SCHED_ID'];

                                        $part = $data['PART_ID'];
                                        $part_match = $db->prepare("SELECT * FROM PARTS WHERE PART_ID = '$part'");
                                        $part_match -> execute();
                                        $part_return = $part_match->fetch(PDO::FETCH_ASSOC);

                                        $part_name = $part_return['PART'];
                                        $part_cost = $part_return['COST'];

                                        if($completed = $data['COMPLETE'] == 'Y')
				                        {
                                            $completed = "Complete";
                                        }
                                        elseif($completed = $data['COMPLETE'] == 'N')
                                        {
                                            $completed = "Incomplete";
                                        }
                                    ?>
                                    <tr <?php if(isset($_GET['err']) && $_GET['err']==1 && $_GET['sched']==$sched_id)
                                              { 
                                                  echo "class='danger'"; 
                                              } 
                                              elseif(isset($_GET['err']) && ($_GET['err']==0 || $_GET['err']==2) && $_GET['sched']==$sched_id)
                                              {
                                                  echo 'class="success"';
                                              }
                                        ?>>
                                        <td><?php echo $date; ?></td>
                                        <td><?php echo $part_name; ?></td>
                                        <td><?php echo money_format('%.2n', $part_cost); ?></td>
                                        <td><?php echo $completed; ?></td>
                                        <td>
                                            <div class="btn-group btn-group-md">
                                                    <?php 
                                                    
                                                        $editjs = "window.location.href='editAppt.php?sched=$sched_id'"; 
                                                        $remjs = "window.location.href='deletePart.php?sched=$sched_id'"; 
                                                    
                                                    ?>
                                                    <button type='button' class='btn btn-primary' onclick="<?php echo $editjs; ?>">Change</button>
                                                    <button type='button' class='btn btn-danger' onclick="<?php echo $remjs; ?>">Cancel</button>
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


