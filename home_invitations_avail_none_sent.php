<? require_once('auth.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"

 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8"></meta>

	<title>main</title>
         <link rel="stylesheet" type="text/css" media="screen" href="screen.css"></link>

</head>
<?php
session_start();
$user = $_SESSION['SESS_MEMBER_ID'];
$name = $_SESSION['SESS_NAME'];

require_once('dbconnect.php');
	$result = $db->query("SELECT num_invite FROM user where username = '$user'");
	    	foreach($result as $row)
	    {
	 	      $num_invite = $row['num_invite'];
	    	
	    }

?>
<body>
<div id="wrapper">

<div id="logininfo">
<p> you are logged in as: <? echo $name; ?> <a href="deconnexion.php">logout</a> </p>
</div>

<div id="header" class="clearFloat">
<h1>Welcome to thimbl me</h1>
</div>

<div id="content" class="clearFloat" >
<div id="invitation"|>
<div class="box">

<h2>Invitations</h2>
<p>You have <input class="InputInvite" type="text" id="Invitations" readonly="readonly" value="<? echo $num_invite; ?> "/> inivitations available.</p>

</div>


<div class="box">
<h2>Sent Invitations</h2>
<form id="invite" action="create_sent_invite.php" method="POST">
<fieldset>
<div id="InviteSent">
<label> address email </label>
<input type="text" id="username"  name="username" value="" />
<label> message </label>
<input type="text" id="message" name=" message" value="" />
<input type="submit" id="submit" value="sent"/>
</div>	
</fieldset>
</form>
</div>


<div class="clearFloat"> </div>
</div>


</div>
</div></body>
</html>
