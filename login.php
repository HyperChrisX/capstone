<?php session_start(); #starts the session
# Check Login form submitted
	if(isset($_POST['Submit'])){
		# Define username and associated password array
		$user = array('amalan' => '12345', 'amalan1' => '123456', 'amalan2' => '1234567');
		$admin = array('admin' => 'Admin1');
		# Check and assign submitted Username and Password to new variable
		$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
		$Password = isset($_POST['Password']) ? $_POST['Password'] : '';
		
		# Check Username and Password existence in defined array
		if (isset($user[$Username]) && $user[$Username] == $Password)
		{
			# Success: Set session variables and redirect to Protected page
			$_SESSION['UserData']['Username']=$user[$Username];
			header("location:index.php");
			exit;
		}
		
		# Check Username and Password existence in defined array
		if (isset($admin[$Username]) && $admin[$Username] == $Password)
		{
			# Success: Set session variables and redirect to Protected page
			$_SESSION['UserData']['Username']=$admin[$Username];
			header("location:index1.php");
			exit;
		}
		
		else {
			/* Unsuccessful attempt: Set error message */
			$msg = "<span style = 'color:red'>Invalid Login Details</span>";
		}
	}
?>	

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Login</title>
<link href="./css/style.css" rel="stylesheet">
</head>

<body>
<div id="Frame0">
	<h1 align="center"> PHP Login w/out DB </h1>
</div>
<br />
<form action="" method="post" name="Login_Form">
	<table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
    <?php if(isset($msg)){ ?>
    	<tr>
        	<td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
        </tr>
    <?php } ?>
        <tr>
        	<td colspan="2" align="left" valign="top"><h3>Login</h3></td>
        </tr>
        <tr>
        	<td align="right" valign="top">Username</td>
            <td><input name="Usename" type="text" class="Input" placeholder="Enter username" required></td>
        </tr>
        <tr>
        	<td align="right">Password</td>
            <td><input name="Password" type="password" class="Input"></td>
         </tr>
         <tr>
         	<td>&nbsp;</td>
         	<td>
            	<input name="Submit" type="submit" value="Login" class="Button3">
            </td>
         </tr>
      </table>
  </form>
</body>
</html>
