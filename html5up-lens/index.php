<!DOCTYPE HTML>

<html>
<?php
  session_start();
  $uid=$_SESSION["uid"];
  
   $link = mysql_connect('sans-dbinstance.catjk6wybrmd.us-west-2.rds.amazonaws.com:3306', 'sans', 'sans12345');
	if (!$link) {
	    die('Could not connect: ' . mysql_error());
	}
	
	$db = mysql_select_db('sans_schema', $link); 
	if(!$db)
	{
		die('Could not select database.');
	}
	

	$sql2 = "SELECT DISTINCT M.movieId,M.title,M.photoURL,M.runtime FROM user_predictions as U INNER JOIN movies_table as M ON U.mid = M.movieId WHERE U.uid NOT IN ( SELECT uid FROM user_movies WHERE uid = ".$uid.")";

	$retval2 = mysql_query( $sql2, $link );
      
	?>

	<head>
		<script type="text/javascript">
		function getmovieid(ele){
		var movid = ele.id;
		var useridhere = <?php print $uid ?>;
		var connection = new ActiveXObject("ADODB.Connection") ;
		var connectionstring="Data Source='sans-dbinstance.catjk6wybrmd.us-west-2.rds.amazonaws.com:3306';User ID='sans';Password='sans12345';Provider=SQLOLEDB";
		connection.Open(connectionstring);
		var rs = new ActiveXObject("ADODB.Recordset");
		rs.Open("Insert into user_movies values (" + useridhere + "," + movieid + ")", connection);
		rs.close;
		connection.close;	
		}
		</script>		
		<title>MOVIE MANIA</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/mycss.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-loading-0 is-loading-1 is-loading-2">


		<!-- Main -->
			<div id="main">
				<!-- Header -->
					<header id="header">
						<h1>MOVIE MANIA</h1>
						<p>The best place to find movies!</p>
						<ul class="icons">
							<li><a href="https://www.facebook.com/anupam.alur?fref=ts" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="https://www.facebook.com/sajalc14?fref=ts" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="https://www.facebook.com/sneha.rajana?fref=ts" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="https://www.facebook.com/nishant.bindu?fref=ts" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						</ul>
					</header> 
					<section id="thumbnails">

					<?php
					    $movieid ="";
					    $title ="";
					    $photoURL ="";
					    $runtime ="";
						
						while($row = mysql_fetch_array($retval2, MYSQL_ASSOC))
					        {
					             $movieid =  $row['movieId'];
					             $title =  $row['title'];
					             $photoURL =  $row['photoURL'];
					             $runtime =  $row['runtime'];
							?>             
						<article>
							<a class="thumbnail" href= <?php print $photoURL; ?>><img src=<?php print $photoURL; ?> alt="" /></a>
							<h2 text-align: center> <?php print $title; ?> </h2>
							<h3> RUNTIME = <?php print $runtime; ?> minutes</h3>
							<p> <a href = "#" onclick = "getmovieid (this);" id = "<?php print $movieid ?>"> I have already seen this movie </a></p>
							
						</article> <?php
							}
					?>
							
				<!-- Footer -->
					<footer id="footer">
						<ul class="copyright">
							<li>&copy; SANS-CIS550-2015.</li>
						</ul>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>