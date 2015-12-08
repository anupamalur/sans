<!DOCTYPE html>
<?php
  session_start(); ?>
    <head>
        <meta charset="UTF-8" />
        <title>MOVIE MANIA - SELECT MOVIES</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" /> 
       <!-- <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css-num/demo.css" />
        <link rel="stylesheet" type="text/css" href="css-num/style.css" />
		<link rel="stylesheet" type="text/css" href="css-num/animate-custom.css" />  -->
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
    	echo $_GET['mid'];
   // 	foreach($_GET['mid'] as $mid){
    		$mid = $_GET['mid'];
  			$sql = "INSERT INTO user_movies VALUES(".$uid.",".$mid.")";
  			echo $sql;
    		$retval = mysql_query( $sql, $link );
      		if(!$retval)
      		{
        		echo mysql_error($link);
        		die('Error fetching movies');     
      		}	
  	//	}

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
		<form action="" method="GET"> <?php
            
        while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
        {
             echo $row['title'];   
            ?>
                <input color = "black" type="checkbox" name="mid" value=<?php "{$row['movieId']}" ?>> <?php $row['title'] ?> </input><br/>
             	
            <?php
        }
        ?>
        <input type="submit" value="submit">
        </form> <?php
      }
    mysql_close($link);
    if(isset($_GET['mid']))
    { 
    	insert_into_userMovies();
	}
	
    ?>
    </body>
</html>