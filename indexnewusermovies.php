<!DOCTYPE html>
<?php
  session_start(); ?>
    <head>
        <meta charset="UTF-8" />
        <title>MOVIE MANIA - SELECT MOVIES</title>
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" /> -->
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css-num/demo.css" />
        <link rel="stylesheet" type="text/css" href="css-num/style.css" />
		<link rel="stylesheet" type="text/css" href="css-num/animate-custom.css" />
		<link rel="stylesheet" type="text/css" href="css-num/button.css" />
		<style type="text/css">
		div.box {
			background-color: lightgrey;
			position:absolute;
			width: 300px;
			padding: 25px;
			border: 15px solid navy;
			margin: 15px;
			font-size: 20px;
			top: 20%;
			left: 35%;
		}
		</style>
    </head>
    <body>
        <div class="container">
            <header>
                <h1><font = 3 color = "black">Select the Movies You Have Already Seen</font></h1>
            </header>
            
        </div>
   <?php
    function insert_into_userMovies()
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
    	if(isset($_SESSION['uid']))
    	{
    		$uid = $_SESSION['uid'];
    	}
    	else
    	{
    		$uid=1;
    	}
    	foreach($_GET['mid'] as $mid){
  			$sql = "INSERT INTO user_movies VALUES(".$uid.",".$mid.")";
    		$retval = mysql_query( $sql, $link );
      		if(!$retval)
      		{
        		echo mysql_error($link);
        		die('Error inserting into user_movies table');     
      		}	
  		}
		$sql4 = "INSERT INTO friends_with VALUES(".$uid.",1)";
		$retval4 = mysql_query($sql4, $link);
		if(!$retval4)
      		{
        		echo mysql_error($link);
        		die('Error inserting friend');     
      		}
		$sql5 = "INSERT INTO friends_with VALUES(1,".$uid.")";
		$retval5 = mysql_query($sql5, $link);
		if(!$retval5)
      		{
        		echo mysql_error($link);
        		die('Error inserting friend');     
      		}
		$sql2 = "select distinct movies_table.movieId from movies_table join user_movies on movies_table.movieId = user_movies.mid, (select uid2 from friends_with where uid1 =".$uid.") as temp where user_movies.uid = temp.uid2";
		$retval2 = mysql_query($sql2, $link);
		if(!$retval2)
      		{
        		echo mysql_error($link);
        		die('Error fetching prediction');     
      		}
		while($row = mysql_fetch_array($retval2, MYSQL_ASSOC))
        { 
			$movieid =  $row['movieId'];
            $sql3 = "INSERT INTO user_predictions VALUES(".$uid.",".$movieid.")";
			$retval3 = mysql_query( $sql3, $link );
      		if(!$retval3)
      		{
        		echo mysql_error($link);
        		die('Error inserting into user_predictions table');     
      		}	?>
			<meta http-equiv="refresh" content="0;URL= ./html5up-lens/index.php">
   					You are being automatically redirected to a new location.<br />
    				If your browser does not redirect you in few seconds, or you do
    				not wish to wait, <a href="index.html">CLICK HERE !!!</a>. 
			<?php
        }

    }
    $link = mysql_connect('sans-dbinstance.catjk6wybrmd.us-west-2.rds.amazonaws.com:3306', 'sans', 'sans12345');
    if (!$link) {
        die('Could not connect: ' . mysql_error());
    }
    
    $db = mysql_select_db('sans_schema', $link); 
    if(!$db)
    {
        die('Could not select database.');
    }
    $sql = "SELECT movieId, title FROM movies_table LIMIT 10";
    $retval = mysql_query( $sql, $link );
      if(!$retval)
      {
        echo mysql_error($link);
        die('Error fetching movies');     
      }
      if($retval)
      {
      	?>
		<div class="box">
		<form action="" method="GET"> <?php
            
        while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
        {
             
			 $mid =  $row['movieId'];
            ?>
                <input color = "black" type="checkbox" name="mid[]" value=<?php print $mid; ?>> <?php $row['title'] ?> </input>
             	
            <?php
			 echo $row['title']; ?> <br/> <?php
        }
        ?>
		<br/>
		<center><input type="submit" value="Submit" style="border-top: 1px solid #97b2f7;background: #65a9d7;padding: 5px 10px;color: white;font-size: 20px;"/> </center>
        </form> </div> <?php
      }
    mysql_close($link);
    if(isset($_GET['mid']))
    { 
    	insert_into_userMovies();
	}
	
    ?>
    </body>
</html>