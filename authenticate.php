<?php 

require 'database-config.php'; //Database connection

session_start(); //start the session



if(isset($_POST['username']))

{

	$username = $_POST['username'];	

}



if(isset($_POST['password']))

{

	$password = $_POST['password'];

}



// Check whether entered username pass combo exist in database

$q = 'SELECT * FROM caps WHERE username=:username';

$query = $db->prepare($q);

$query -> bindParam(':username', $username, PDO::PARAM_STR);

$query->execute();



if($query->rowCount() == 0)

{

	header('location: login_home.php?err=1');	

}



else

{

	//fetch the result as associative array

	$row = $query->fetch(PDO::FETCH_ASSOC);



	if(!password_verify($password, $row['password']))

	{

		header('location: login_home.php?err=1');

		exit();

	}

	else

	{

		//Store the fetched details into $_SESSION

		$_SESSION['sess_user_id'] = $row['id'];

		$_SESSION['sess_username'] = $row['username'];

		$_SESSION['sess_userrole'] = $row['role'];

		

		if($_SESSION['sess_userrole'] == 'suadmin')

		{

			header('location:suadminhome.php');

		}

		elseif($_SESSION['sess_userrole'] == 'Admn')

		{

			header('location:adminhome.php');

		}

		else

		{

			header('location:userhome.php');

		}

	}

}





?>	