<?php
session_start();
$user_to_test=sqlite_escape_string(stripslashes($_POST['username']));
$pass_to_test=sqlite_escape_string(stripslashes($_POST['pass']));


try {
try
{
  //create or open the database
	    $db = new PDO('sqlite:base');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
  $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
    die($msg);
}
$res = $db->query("SELECT COUNT(*) FROM user where username ='$user_to_test' AND pass ='$pass_to_test'");
$num= $res->fetchColumn(); 
//echo $num;


		if ($num == 1){ 
	    		session_regenerate_id();
	    		$result = $db->query("SELECT * FROM user where username = '$user_to_test'");
	    	foreach($result as $row)
	    {
 		$_SESSION['SESS_NAME'] = $row['name'];
	 	$_SESSION['SESS_MEMBER_ID'] = $row['username'];  
	 	$_SESSION['SESS_ADMIN'] = ($row['admin'] == 0 ? FALSE : TRUE);
 		 
	    	
	    }
		session_write_close();
	   		 include 'redirect.php';	
		}
	   
		else {

    			header('location: loginfailed.html');
			}

    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
?>
