<?php
session_start(); //start session

include("database-config.php");

if(!isset($_SESSION['sess_user_id']))
{
    header('location: login_home.php?err=2');
}

if(isset($_GET['id']))
{
    $proj_id = $_GET['id'];
    if($_SESSION['sess_userrole']=='Admn')
    {
        $current_user = $_GET['uid'];
    }
    else
    {
        $current_user = $_SESSION['sess_username'];
    }

    $q = "SELECT * FROM users WHERE ProjID =:proj_id AND username=:user";
    $query = $db->prepare($q);
    $query -> bindParam(':proj_id', $proj_id, PDO::PARAM_INT);
    $query -> bindParam(':user', $current_user, PDO::PARAM_STR);
    $query->execute();

    $return = $query->fetch(PDO::FETCH_ASSOC);

    $proj_id = $return['ProjID'];
    $proj_name = $return['ProjectName'];
    $proj_date = $return['Indate'];
    $comment = $return['comment'];
    $current_user = $return['username'];
}

elseif(isset($_GET['cid']) && $_GET['cid']!=0)
{
    $proj_id = $_GET['cid'];
    $proj_name = $_POST['name'];
	$date = $_POST['date'];
    $comm = $_POST['comment'];
    if($_SESSION['sess_userrole'] == 'Admn')
    {
        $current_user = $_POST['user'];
    }
    else
    {
        $current_user = $_SESSION['sess_username'];
    }

    $query = $db->prepare("UPDATE users SET ProjectName=:name Indate=:pdate comment=:comm WHERE ProjID=:proj_id AND username=:user");
    $query -> bindParam(':user', $current_user, PDO::PARAM_STR);
    $query -> bindParam(':name', $proj_name, PDO::PARAM_STR);
    $query -> bindParam(':pdate', $date, PDO::PARAM_STR);
    $query -> bindParam(':comm', $comm, PDO::PARAM_STR);
    $query -> bindParam(':proj_id', $proj_id, PDO::PARAM_INT);
    $query -> execute();

    if($_SESSION['sess_userrole'] == 'Admn')
    {
        header("location: adminhome.php?err=2&id=$proj_id");
    }
    else
    {
        header("location: userhome.php?err=2&id=$proj_id");
    }
}

elseif(isset($_POST['submit']))
{

	try
    {

		$proj_name = $_POST['name'];
        
		$proj_id = $_POST['id'];

        $current_user = $_SESSION['sess_username'];

        $q = "SELECT * FROM users WHERE ProjID = :proj_id AND username = '$current_user' ";
        $query = $db->prepare($q);
        $query -> bindParam(':proj_id', $proj_id, PDO::PARAM_INT);
        $query->execute();

        if($query->rowCount() != 0)
        {

            header("location: add_edit.php?err=2&id=$proj_id");	
            exit;

        }

		$date = $_POST['date'];
        $comm = $_POST['comment'];

        $insQ = "INSERT INTO users (ProjID, username, Indate, ProjectName, comment) VALUES (:proj_id, '$current_user', :pdate, :name, :comm) ";
		$insQuery = $db->prepare($insQ);
        $insQuery -> bindParam(':name', $proj_name, PDO::PARAM_STR);
        $insQuery -> bindParam(':pdate', $date, PDO::PARAM_STR);
        $insQuery -> bindParam(':comm', $comm, PDO::PARAM_STR);
        $insQuery -> bindParam(':proj_id', $proj_id, PDO::PARAM_INT);
		$insQuery->execute(); 

		if($_SESSION['sess_userrole'] == 'Admn')
        {
            header("location: adminhome.php?err=0&id=$proj_id");
        }
        else
        {
            header("location: userhome.php?err=0&id=$proj_id");
        }

	}

    catch(PDOException $e) {echo 'Error: ' . $e->getMessage(); }

}

elseif(isset($_GET['remid']))
{
    try
    {
        $appt_to_remove = $_GET['remid'];
        if($_SESSION['sess_userrole']=='Admn')
        {
            $current_user = $_GET['uid'];
        }
        else
        {
            $current_user = $_SESSION['sess_username'];
        }


        $remQ = "DELETE FROM users WHERE ProjID=:appt_to_remove AND username=:user";
        $remove_appt = $db->prepare($remQ);
        $remove_appt -> bindParam(':user', $current_user, PDO::PARAM_STR);
        $remove_appt -> bindParam(':appt_to_remove', $appt_to_remove, PDO::PARAM_INT);
        $remove_appt -> execute();

        if($_SESSION['sess_userrole'] == 'Admn')
        {
            header("location: adminhome.php?err=1");
        }
        else
        {
            header("location: userhome.php?err=1");
        }

    }
    catch(PDOException $e) {echo 'Error: ' . $e->getMessage();}
}
?>

<!DOCTYPE html>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

   <div class="container homepage">
		<div class="user">
		  <div class="row">
			 <div class="col-md-3"></div>
				<div class="col-md-6 welcome-page">
				  <h2> Add a project... </h2>
				</div>
			  <div class="col-md-3"></div>
			</div>
		</div>
    </div> 

    <div class="container">
      <div class="info">
        <div class="col-md-6 col-md-offset-3">
          <div class="block-margin-top">
 
                      <?php
                      //Associative array to display errors
                        $errors = array( 0=>"Part added successfully.",
                                         1=>"Part removed successfully. Add a new part?",
										 2=>"A project with that id already exists. <br/> You may edit it below.",
										 3=>"Upload Failure. Image too large (must be under 2MB).",
                                         4=>"Upload Failure. Please try again.");
                                
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
                          echo'<p class="text-warning">'.$errors[$error_id].'</p>';	
                        }
                        if($error_id == 2)
                        {
                          echo'<p class="text-danger">'.$errors[$error_id].'</p>';
                        }
                        if($error_id == 3)
                        {
                          echo'<p class="text-danger">'.$errors[$error_id].'</p>';
                        }
                        if($error_id == 4)
                        {
                          echo'<p class="text-danger">'.$errors[$error_id].'</p>';
                        }
                      }
                      ?>

                             <form action="add_edit.php?cid=<?php if(isset($_GET['id'])){ echo $proj_id; } else{echo '0';} ?>" method="post" class="form-signup col-md-8 col-md-offset-2" enctype="multipart/form-data">
        <br />
        <p>Project Name:</p>
            <input name="name" type="text" class="form-control" placeholder="Enter Name" value="<?php if(isset($_GET['id'])){ echo $proj_name; }?>" required>
        <br />
        <p>Project ID#:</p> 
            <input name="id" type="number" class="form-control" placeholder="Enter ID #" value="<?php if(isset($_GET['id'])){ echo $proj_id; }?>" required>
        <br />
        <p>Date:</p> 
            <input type="date" name="date" class="form-control" value="<?php if(isset($_GET['id'])){ echo $proj_date; }?>">
        <br />
        <?php 
            if(isset($_GET['id']) && $_SESSION['sess_userrole']=='Admn')
            {?>
            <p>User:</p> 
                <input type="text" name="user" class="form-control" value="<?php if(isset($_GET['id'])){ echo $current_user; }?>" disabled>
            <br />
            <?php } ?>

        <p>Comment:</p> 
            <textarea name="comment" class="form-control" placeholder="Description goes here..." rows="4" cols="50"><?php if(isset($_GET['id'])){ echo $comment; }?></textarea>
        <br />
        
        <br />
          <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit" value="Submit">Submit</button>&nbsp;
          <button class="btn btn-sm btn-warning btn-block" name="clear" type="reset" value="Clear">Clear</button>
          <br/><br/>
         </form>

            </div>

      </div>
      
     
    </div>
</div>


</body>

</html>
