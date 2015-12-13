<html>
<?php
  session_start();
	if( $_GET["usernamesignup"] && $_GET["passwordsignup_confirm"] && $_GET["dobsignup"] && $_GET["fullnamesignup"])
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
	
	$uname = $_GET["usernamesignup"];
  $fname = $_GET["fullnamesignup"];
  
  $dob = $_GET["dobsignup"];
  $pwd = $_GET["passwordsignup_confirm"];
  $sql = "INSERT INTO user ". "(username,fullname, dob, passwd) ". "VALUES('$uname','$fname','$dob', '$pwd')";
  $sql2 = "SELECT userId FROM user WHERE username='$uname'";
    $retval = mysql_query( $sql, $link );
      if(!$retval)
      {
        echo mysql_error($link);
        die('Sorry we Could not create an account for you :(');     
      }
    $retval2 = mysql_query( $sql2, $link );
      
      if(!$retval2)
      {
        echo mysql_error($link);
        die('Cannot obtain User ID');     
      }

      if($retval2 && $retval)
      {
        while($row = mysql_fetch_array($retval2, MYSQL_ASSOC))
        {
             $uid =  $row['userId'];
             $_SESSION['uid'] = $uid;
             echo $_SESSION['uid'];
             break;
        }
       ?>
        <meta http-equiv="refresh" content="0;URL= indexnewusermovies.php">
            You are being automatically redirected to a new location.<br />
            If your browser does not redirect you in few seconds, or you do
            not wish to wait, <a href="indexnewusermovies.php">CLICK HERE !!!</a>. 

            <?php
  
      }
	mysql_close($link);
   }
?>
</html>

