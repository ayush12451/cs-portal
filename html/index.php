<? session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sharda CSE Portal</title>
	<link href="../img/logo.png" rel="icon" sizes="32x32"><!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"><!--Import materialize.css-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css" media="screen,projection" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript">
	</script><!--Let browser know website is optimized for mobile-->
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
</head>
<body style="background-color:lightblue">
	<header>
		<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript">
		</script> 
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js">
		</script> <!--Other element insitialisations-->
		 
		<script language="javascript" type="text/javascript">
		          
                
              $( document ).ready(function(){

              $(".button-collapse").sideNav();//mobile screen menu init

              $('.carousel').carousel(); //carousel init

              $('.slider').slider({full_width: true});//slider init
              });
              $(document).ready(function(){
              $('.sidenav').sidenav();
                
              });

		</script>
		<div class="navbar-fixed">
			<nav class=" white" role="navigation">
				<div class="nav-wrapper">
					<a class="brand-logo" href="index.php" style="color: black"><img src="../img/logo.png" style="height:25% ;width: 25%;"></a>
          <a href="" data-target="mobile-demo" class="sidenav-trigger"><i style="color: black" class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
						<?php  if( @$_SESSION['LoggedIn'] == 1){echo "<li><a style='color: black'>Hello, ".$_SESSION['name']."!</a></li>";} ?>
						<li>
							<a href="user.php"><i class="medium material-icons" style="color: black">account_circle</i></a>
						</li>
						<li>
							<a href="forum.php" style="color: black">Forum</a>
						</li>
						<li>
							<a href="social.html" style="color: black">Social</a>
						</li>
					</ul>
				</div>
      </nav>
    <ul class="sidenav" id="mobile-demo">
            <li>
							<a href="user.php"><i class="medium material-icons" style="color: black">account_circle</i></a>
						</li>
						<li>
							<a href="forum.php" style="color: black">Forum</a>
						</li>
						<li>
							<a href="social.html" style="color: black">Social</a>
						</li>
    </ul>
		</div>
	</header>
	<main>
		<div class="container">
			<div class="carousel carousel-slider z-depth-3">
				<a class="carousel-item"><img src="../img/sharda4.jpg"></a> <a class="carousel-item"><img src="../img/sharda2.png"></a> <a class="carousel-item"><img src="../img/sharda3.jpg"></a> <a class="carousel-item"><img src="../img/sharda5.jpg"></a> <a class="carousel-item"><img src="../img/sharda1.jpg"></a>
			</div>
			<div class="card-panel white z-depth-3" style="align-content: center">
				<a class="twitter-timeline" data-height="600" data-width="80%" href="https://twitter.com/sharda_uni?ref_src=twsrc%5Etfw">Tweets by sharda_uni</a> 
				<script async charset="utf-8" src="https://platform.twitter.com/widgets.js">
				</script><br>
				<br>
			</div>
		</div>
	</main>
	<footer class="page-footer">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<h5 class="white-text">End of page.</h5>
					<p class="grey-text text-lighten-4">Follow this project on Github.</p>
				</div>
				<div class="col l4 offset-l2 s12">
					<h5 class="white-text">Links</h5>
					<ul>
						<li>
							<a class="grey-text text-lighten-3" href="index.php">Home</a>
						</li>
						<li>
							<a class="grey-text text-lighten-3" href="login.php">Login</a>
						</li>
						<li>
							<a class="grey-text text-lighten-3" href="signup.php">Sign Up</a>
						</li>
						<li>
							<a class="grey-text text-lighten-3" href="forum.php">Forum</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				© 2018 <a class="grey-text text-lighten-4 right" href="https://github.com/ayush12451/cs-portal">Github</a>
			</div>
		</div>
	</footer><!--JavaScript at end of body for optimized loading-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js">
	</script>
</body>
</html>