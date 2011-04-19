<?php
require_once('auth.php');
session_start();
$username = $_SESSION['SESS_MEMBER_ID'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"

        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8"></meta>

	<title>main</title>
         <link rel="stylesheet" type="text/css" media="screen" href="screen.css"></link>

</head>
<body>
<div id="wrapper">

<div id="logininfo">
<p> you are logged in as: <? echo $username; ?> <a href="deconnexion.php">logout</a> </p>
</div>

<div id="header" class="clearFloat">
<h1>Welcome to thimbl me</h1>
</div>

<div id="content" class="clearFloat" >
<div id="invitation"|>
<div class="box center">
<form id="invite" action="redirect.php" method="POST">
<h2>Confirmation</h2>
<p> The invitation has been sent out successfully.</p>
<input id="ok" value="ok" type="submit"/>
</div>


<div class="clearFloat"> </div>
</div>


</div>
</div>
</body>
</html>
