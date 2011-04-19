<?php

$name=sqlite_escape_string(stripslashes($_POST['name']));
$username=sqlite_escape_string(stripslashes($_POST['username']));
$pass=sqlite_escape_string(stripslashes($_POST['pass']));
$code=sqlite_escape_string(stripslashes($_POST['code']));


try
{
  //create or open the database
require_once('dbconnect.php');
}
catch(PDOException $e)
{
  $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
    die($msg);
}

$res = $db->query("SELECT COUNT(*) FROM user where username ='$username'");
$num= $res->fetchColumn(); 



$res_code = $db->query("SELECT COUNT(*) FROM invitation where code = trim('$code')");
$num_code= $res_code->fetchColumn(); 

if ($num == 0 ) {
		if ($num_code == 1){
			
	
		$sql =("insert into user (name, username, pass) values ('$name', '$username', '$pass')");
		$db->exec($sql);

		$update_invitation =("update invitation set date_used = date('now'), status = 'redeemed' where code = trim('$code')");
		$db->exec($update_invitation);


		header('Location: confirm.html');
		}

		else {header('Location: invalid_invitation.html');
		}
	
}


else {

header('Location:badusername.php');
}

?>



