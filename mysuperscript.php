<html>
<?php
	session_start();
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
	
	$uname = $_GET["username"];
	$sql = 'SELECT * FROM user';
	$sql2 = "SELECT userId FROM user WHERE username='$uname'";
    $retval = mysql_query( $sql, $link );

	$retval2 = mysql_query( $sql2, $link );
      
      if(!$retval2)
      {
        echo mysql_error($link);
        die('Cannot obtain User ID');     
      }

 	$uid = "";
 	while($row = mysql_fetch_array($retval2, MYSQL_ASSOC))
        {
             $uid =  $row['userId'];
             break;
        }

        $i = 0;
    while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
   {
   		if (strcmp($row["username"] ,$_GET["username"]) ==0)
   			{
   				if (strcasecmp($_GET["password"], $row["passwd"]) == 0) {

   					$_SESSION["uid"] = $uid;
            $i = 1;

   					?>
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
   }
   if($i == 0)
   {
            echo "Wrong Login Credentials";  ?>
            <html>
            <meta http-equiv="refresh" content="0;URL= wrong_index.html">
            </html> <?php
    
   }
	mysql_close($link);
   }
?>
</html>

