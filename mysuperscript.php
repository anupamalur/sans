<html>
<?php
	if( $_GET["username"] && $_GET["password"] )
   {
      
      $link = mysql_connect('sans-dbinstance.catjk6wybrmd.us-west-2.rds.amazonaws.com:3306', 'sans', 'sans12345');
	if (!$link) {
	    die('Could not connect: ' . mysql_error());
	}
	
	$db = mysql_select_db('sans_schema', $link); 
	if(!$db)
	{
		die('Could not select database.');
	}
	
	$sql = 'SELECT * FROM user';
    $retval = mysql_query( $sql, $link );
    while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
   {
   		if (strcmp($row["username"] ,$_GET["username"]) ==0)
   			{
   				if (strcasecmp($_GET["password"], $row["passwd"]) == 0) {?>
   					<meta http-equiv="refresh" content="0;URL= ./html5up-lens/index.php">
   					You are being automatically redirected to a new location.<br />
    				If your browser does not redirect you in few seconds, or you do
    				not wish to wait, <a href="index.html">CLICK HERE !!!</a>. 

   					<?php
   					break;
   				}
   				else
   				{
   					echo "Wrong Password";	?>
   					<html>
   					<meta http-equiv="refresh" content="0;URL= wrong_index.html">
   					</html> <?php
   					break;
   				}
   			}
   			else
   			{
   				echo "Wrong Login Credentials";	?>
   				<html>
   				<meta http-equiv="refresh" content="0;URL= wrong_index.html">
   				</html> <?php
   				break;	
   			}
   		
   }
	mysql_close($link);
   }
?>
</html>

