<?php
session_start();
$username = $_SESSION['SESS_MEMBER_ID'];
//echo $username;
try {
require_once('dbconnect.php');

$res = $db->query("SELECT COUNT(*) FROM invitation where set_by_user ='$username'");
$result=$db->query("SELECT num_invite_max from user where username ='$username'");
foreach($result as $row){
$numDefault= $row['num_invite_max'];}
$num= $res->fetchColumn(); 
//echo $num;
//echo $numDefault;


if ($num == $numDefault)

{header('location: home_noinvitations_avail_all_sent.php');}

else if($num == 0)
{header('location: home_invitations_avail_none_sent.php');}

else
{header('location: home_invitations_avail_some_sent.php');}



    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }

?>
