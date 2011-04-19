<html>
<body>
<?php
$user = 'rica';

try
{
  //create or open the database
	    $db = new PDO('sqlite:base');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
  die($error);
}


$update=("update user set num_invite = (num_invite - 1) where username = '$user'");
$db->exec($update);
echo 'done';


?>



</body>
</html>
