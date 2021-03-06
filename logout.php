<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>MOVIE MANIA - LOG IN</title>
    <!--    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" /> -->
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <header>
                <h1><font = 3 color = "white">Log in To Movie Mania</font></h1>
			</header>
            <section>				
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="mysuperscript.php" autocomplete="on" method="GET"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your email or username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="anupamalur@gmail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. moviemania123" /> 
                                </p>
                               <p>
                                    <a href="./html5up-lens/fbconfig.php" color:"black">Login with Facebook</a>
                                </p>
                                <p class="login button"> 
                                    <input type="submit" value="Login" /> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Join us</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  action="mysuperscript_register.php" autocomplete="on" method="GET" onSubmit="return validate()"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your Username</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="sansmoviedb" />
                                </p>
                                <p> 
                                    <label for="fullnamesignup" class="uname" data-icon="u">Your Full Name</label>
                                    <input id="fullnamesignup" name="fullnamesignup" required="required" type="text" placeholder="Anupam Alur" />
                                </p>
                                <p> 
                                    <label for="dobsignup" class="uname" data-icon="e" > Your Date of Birth</label>
                                    <input id="dobsignup" name="dobsignup" required="required" type="text" placeholder="2015-07-15"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. moviemania123"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. moviemania123"/>
                                </p>
                                <p class="signin button"> 
									<input type="submit" value="Sign up"/> 
								
									<script>
									function validate()
										{
										     var new_password = document.getElementById("passwordsignup").value;
										     var confirm_new_password = document.getElementById("passwordsignup_confirm").value;

										     if ( new_password != confirm_new_password)
										     {
										         alert("Passwords do not match.");
										         return false;
										     }
										     else
										     {
										          return true;
										     }
										 }
									</script>	
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
<?php
session_destroy();
?>
</html>