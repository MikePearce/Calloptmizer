<?php
//Start session
session_start();
//Unset the variable SESS_MEMBER_ID stored in session
unset($_SESSION['SESS_MEMBER_ID']);
header("location: logout.php");
		exit();

?>
