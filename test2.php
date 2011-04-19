<?php
$code=sqlite_escape_string(stripslashes($_POST['code']));
echo $code;


try {
	try
		{
 		 //create or open the database
	    	require_once('dbconnect.php');

		}
		catch(PDOException $e)
		{
		  die($error);
    		  echo $e->getMessage();
		}
		$sql =("SELECT COUNT(*) FROM invitation where code = trim('$code')");
		$res = $db->query($sql);
		$num_code= $res->fetchColumn(); 
		echo $num_code;

	    	}
catch(PDOException $e)
    {
    echo $e->getMessage();
    }

?>
