<?php 
//define database related variables
	$host = 'localhost';
	$user = 'saltness_suadman';
	$pass = '$implePa$$word';
	$database = 'saltness_capstone_userbase';
	
//try to connect to database
$db = new PDO('mysql:host='.$host.'; dbname='.$database, $user, $pass);

if(!$db)
{
	echo "unable to connect to database";
}

/*End config*/
?>