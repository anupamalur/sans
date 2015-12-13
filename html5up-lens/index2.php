<html>
<?php
session_start();
$uid = $_SESSION['uid'];
$movieid = $_GET["moid"];
$link = mysql_connect('sans-dbinstance.catjk6wybrmd.us-west-2.rds.amazonaws.com:3306', 'sans', 'sans12345');
	if (!$link) {
	    die('Could not connect: ' . mysql_error());
	}
	
	$db = mysql_select_db('sans_schema', $link); 
	if(!$db)
	{
		die('Could not select database.');
	}
	

	$sql2 = "INSERT into user_movies VALUES(".$uid.",".$movieid.")";

	$retval2 = mysql_query( $sql2, $link );
	if($retval2)
	{ ?>
		<meta http-equiv="refresh" content="0;URL= index.php">
   					You are being automatically redirected to a new location.<br />
    				If your browser does not redirect you in few seconds, or you do
    				not wish to wait, <a href="./index.html">CLICK HERE !!!</a>.
    <?php
	}
	else
	{
		echo mysql_error($link);
        die('Could not insert into user_movies');
	}
?>
</html>