<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"

        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8"></meta>

	<title>create account</title>
         <link rel="stylesheet" type="text/css" media="screen" href="screen.css"></link>

</head>
<body>
<? 
$code = $_GET['string'];
?>
<div id="wrapper">

<div id="logininfo">
<p> you are not logged in  </p>
</div>

<div id="header" class="clearFloat">
<h1>Welcome to thimbl me</h1>
</div>

<div id="content" class="clearFloat" >
<div class="box">
<form id="signin" action="create_account.php" method="post">
<fieldset>
<legend> Create an Account </legend>
<label> Name: </label>
<input type="text" id="name" name="name" value="" />
<label> Username(valid email address): </label>
<input type="text" id="username" name="username"/>
<label> Password: <label>
<input type="password" id="pass" name="pass"/>
<label> Retype-Password: <label>
<input type="password" id="repass"/>
<label> Invitation Code: <label>
<input type="text" id="code" name="code" value="<? echo $code ?> " READONLY/>
<input type="submit" value="Valider"></button>
<p>You already have an account? Please signin <a href="index.php"> here </a></p>
</fieldset>
</form>
</div>
</div>
</div>
</body>
</html>
