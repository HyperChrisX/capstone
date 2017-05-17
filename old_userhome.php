<?php
session_start();
$role = $_SESSION['sess_userrole'];

if(!isset($_SESSION['sess_username']) && $role != "User")
{
	header('location: index.php?err=2');	
}
?>
<?php include('database-config.php');
		$result = $db->prepare(" SELECT users.id
								, users.ProjectName
								, users.Indate
								, users.comment
								 FROM caps
								 INNER JOIN users 
								 ON caps.username = users.username
								 WHERE users.username ='"	.	$_SESSION['sess_username']. "'");
		$result->execute();
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
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-change">
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
    </div>

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
	<div class="form-container">
	<table border="1" cellspacing="0" cellpadding="4" >
	
	<thead>
		<tr>
			<th> NumberID </th>
			<th> ProjectName </th>
			<th> IN-DATE </th>
			<th> Comments </th>
		</tr>
	</thead>
		<form name="" method="post" action="zip_download.php">
		<?php
			while($row=$result->fetch(PDO::FETCH_ASSOC))
			{ 
				?>
						<tr class="record">
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['ProjectName']; ?></td>
								<td><?php echo $row['Indate']; ?></td>
								<td><?php echo $row['comment']; ?></td>
							<!--<a href="edit.php?id=<?php echo $row['id']; ?>"> edit </a>&nbsp;
							| &nbsp; <a href="delete.php?id=<?php echo $row['id']; ?>"> delete </a></td>
							<td>
								<a href = "download.php?filename=<?php echo $filename; ?>" >
								<img src="files/download-icon.png" align="left" width="28" height="28"/>
								</a>
							</td>-->
						</tr>
		<?php } ?>
				</br></br>
				<tr>
					<td colspan="4" align="center">
						<input type="submit" name="download_zip" value="Download">
							&nbsp; 
						<input type="reset" value="reset">
					</td>
				</tr>
		</form>
	</div>
	
	
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    </body>  <!-- HTML entities for Page Display -->
</html>


