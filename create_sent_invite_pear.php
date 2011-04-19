<?php
session_start();
 
$email=sqlite_escape_string(stripslashes($_POST['username']));
$message=sqlite_escape_string(stripslashes($_POST['message']));


$set_by_user = $_SESSION['SESS_MEMBER_ID'];

// creation code

$len = 16;
$base='ABCDEFGHKLMNOPQRSTWXYZabcdefghjkmnpqrstwxyz123456789';
$max=strlen($base)-1;
$activatecode='';
mt_srand((double)microtime()*1000000);
while (strlen($activatecode)<$len+1)
  $activatecode.=$base{mt_rand(0,$max)};


// create invitation
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



//send email
  require_once "Mail.php";
 
 $from = $set_by_user;
 $to = $email;
 $subject = "invitation code";
 $body = "$message http://calloptimizer.com/create_account_link.php?string=$activatecode";
 
 $host = "mail.trick.ca";
 $username = "rw+trick.ca";
 $password = "tatetate";
 
 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'auth' => true,
     'username' => $username,
     'password' => $password));
 
 $mail = $smtp->send($to, $headers, $body);
 
 if (PEAR::isError($mail)) {
   echo("<p>" . $mail->getMessage() . "</p>");


  } else {


//create invitation
	$sql =("insert into invitation (count_invite, status, date_set, set_by_user, sent_to_user, code) values (((select count(*) from invitation where set_by_user  = '$set_by_user') +1 ),'sent', date('now'),'$set_by_user', '$email', '$activatecode')");
	$db->exec($sql);
//update database
	$update=("update user set num_invite = (num_invite - 1) where username = '$set_by_user'");
	$db->exec($update);
      
   	header('location: invitesent_confirm.php');
	
  }



?>
