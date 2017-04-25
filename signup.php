 <?php
		 if(isset($_POST['submit']))
		 {
			 try
			 {
				 include("database-config.php");
				 $username = $_POST['username'];
				 $password = $_POST['password'];
				 $conf_pass = $_POST['passwordCon'];
				 $email = $_POST['email'];
                 $phone = $_POST['phone'];
				 
				 /*echo "<html><head></head><body>".$username."<br />".$password."<br />".$conf_pass."<br />".$phone."<br />".$email."<br />".$enc_pass."<br /></body></html>"; */
				 
				 if($password!=$conf_pass)
				 {
					 header('location: signup_home.php?err=1');
				 }
				 elseif(strlen($username) > 15)
				 {
					 header('location: signup_home.php?err=2');
				 }
				 else
				 {
					 $enc_pass = password_hash($password, PASSWORD_DEFAULT);
					 $insQuery = $db->prepare("INSERT INTO caps (username, password, phone, email) VALUES ('$username', '$enc_pass', '$phone', '$email') ");
				 	 $insQuery->execute(); 
				 	 header('location: login_home.php?err=0'); 
				 }
			 }
			 catch(PDOException $e) {echo 'Error: ' . $e->getMessage(); }
		 }
		?>