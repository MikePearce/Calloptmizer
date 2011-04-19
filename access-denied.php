<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="fr" xmlns="http://www.w3.org/1999/xhtml" lang="fr"><head>




	<meta name="" http-equiv="content-type" content="text/html; charset=UTF-8">

	<title>Login again</title>
         <link rel="stylesheet" type="text/css" media="screen" href="screen.css">

</head><body>
<div id="wrapper">
<div id="logininfo">
<p> you are not logged in </p>
</div>

<div id="header" class="clearFloat">
<h1>Welcome to thimbl me</h1>
</div>
<div id="content" class="clearFloat">
<form id="signin" action="authentication.php" method="POST">
<fieldset>
<legend> Signin </legend>
<p>To access this page you have to login below or to create an account.</p>
<label> Username (email address): </label>
<input id="username" name="username" type="text">
<label> Password: </label><label>
<input id="pass" name="pass" value="" type="password">
<input id="submit" value="login" type="submit">
<a href="create_account_link.php"> create an account </a>
</label></fieldset>
</form>
</div>
</div>
</body></html>
