<!DOCTYPE HTML>

<html>
<?php
  session_start();
  $uid=$_SESSION["uid"];
  echo $uid;
   $link = mysql_connect('sans-dbinstance.catjk6wybrmd.us-west-2.rds.amazonaws.com:3306', 'sans', 'sans12345');
	if (!$link) {
	    die('Could not connect: ' . mysql_error());
	}
	
	$db = mysql_select_db('sans_schema', $link); 
	if(!$db)
	{
		die('Could not select database.');
	}
	$sql2 = "SELECT M.movieId,M.title,M.photoURL,M.runtime FROM user_predictions as U INNER JOIN movies_table as M ON U.mid = M.movieId WHERE U.uid= ".$uid;
	$retval2 = mysql_query( $sql2, $link );
      
	?>

	<head>
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
						
						echo $retval2;
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
							<p> RUNTIME = <?php print $runtime; ?> minutes</p>
						</article> <?php
							}
					?>
					<!-- Thumbnail -->

						<!---

					        }
				
						<article>
							<a class="thumbnail" href="images/fulls/02.jpg"><img src="images/thumbs/02.jpg" alt="" /></a>
							<h2>Vivamus convallis libero</h2>
							<p>Sed velit lacus, laoreet at venenatis convallis in lorem tincidunt.</p>
						</article>
						<article>
							<a class="thumbnail" href="images/fulls/03.jpg" data-position="top center"><img src="images/thumbs/03.jpg" alt="" /></a>
							<h2>Nec accumsan enim felis</h2>
							<p>Maecenas eleifend tellus ut turpis eleifend, vitae pretium faucibus.</p>
						</article>
						<article>
							<a class="thumbnail" href="images/fulls/04.jpg"><img src="images/thumbs/04.jpg" alt="" /></a>
							<h2>Donec maximus nisi eget</h2>
							<p>Tristique in nulla vel congue. Sed sociis natoque parturient nascetur.</p>
						</article>
						<article>
							<a class="thumbnail" href="images/fulls/05.jpg" data-position="top center"><img src="images/thumbs/05.jpg" alt="" /></a>
							<h2>Nullam vitae nunc vulputate</h2>
							<p>In pellentesque cursus velit id posuere. Donec vehicula nulla.</p>
						</article>
						<article>
							<a class="thumbnail" href="images/fulls/06.jpg"><img src="images/thumbs/06.jpg" alt="" /></a>
							<h2>Phasellus magna faucibus</h2>
							<p>Nulla dignissim libero maximus tellus varius dictum ut posuere magna.</p>
						</article>
						<article>
							<a class="thumbnail" href="images/thumbs/testtiger.jpg"><img src="images/thumbs/testtiger.jpg" alt="" /></a>
							<h2>Proin quis mauris</h2>
							<p>Etiam ultricies, lorem quis efficitur porttitor, facilisis ante orci urna.</p>
						</article>
						<article>
							<a class="thumbnail" href="images/fulls/08.jpg"><img src="images/thumbs/08.jpg" alt="" /></a>
							<h2>Gravida quis varius enim</h2>
							<p>Nunc egestas congue lorem. Nullam dictum placerat ex sapien tortor mattis.</p>
						</article>
						<article>
							<a class="thumbnail" href="images/fulls/09.jpg"><img src="images/thumbs/09.jpg" alt="" /></a>
							<h2>Morbi eget vitae adipiscing</h2>
							<p>In quis vulputate dui. Maecenas metus elit, dictum praesent lacinia lacus.</p>
						</article>
						<article>
							<a class="thumbnail" href="images/fulls/10.jpg"><img src="images/thumbs/10.jpg" alt="" /></a>
							<h2>Habitant tristique senectus</h2>
							<p>Vestibulum ante ipsum primis in faucibus orci luctus ac tincidunt dolor.</p>
						</article>
						<article>
							<a class="thumbnail" href="images/fulls/11.jpg"><img src="images/thumbs/11.jpg" alt="" /></a>
							<h2>Pharetra ex non faucibus</h2>
							<p>Ut sed magna euismod leo laoreet congue. Fusce congue enim ultricies.</p>
						</article>
						<article>
							<a class="thumbnail" href="images/fulls/12.jpg"><img src="images/thumbs/12.jpg" alt="" /></a>
							<h2>Mattis lorem sodales</h2>
							<p>Feugiat auctor leo massa, nec vestibulum nisl erat faucibus, rutrum nulla.</p>
						</article>
					</section>
					-->
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