<?php 
session_start();
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Account</title>
	<link href="../img/logo.png" rel="icon" sizes="32x32"><!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"><!--Import materialize.css-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css" media="screen,projection" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript">
	</script><!--Let browser know website is optimized for mobile-->
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
</head>
<body style="background-color:lightblue">
<script language="javascript" type="text/javascript">
		          

              $(document).ready(function(){
              $('.sidenav').sidenav();
              $(".button-collapse").sideNav();
            });

  </script>
	<header>
		<div class="navbar-fixed">
			<nav class=" white" role="navigation">
				<div class="nav-wrapper">
					<a class="brand-logo" href="index.php" style="color: black"><img src="../img/logo.png" style="height:25% ;width: 25%;"></a>
          <a href="" data-target="mobile-demo" class="sidenav-trigger"><i style="color: black" class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
						<?php  if( @$_SESSION['LoggedIn'] == 1){echo "<li><a style='color: black'>Hello, ".$_SESSION['name']."!</a></li>";} ?>
						<li class="active">
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
      <br>
		</div>
	</header>
	<main>
		<?php
		        
		        
		          
		          if(!empty($_SESSION['LoggedIn']))
		            {
		          ?>
		<div class="container">
			<div class="card-panel white z-depth-3" style="text-align: center">
				<div style='text-align:centre'><img class="circle"  src="<?=$_SESSION['img'] ?>"></div>
				<h2>Welcome <?=$_SESSION['name']?>!</h2><br>
				<br>
				<form action="upload.php" enctype="multipart/form-data" method="post">
					<h4>Upload profile picture:</h4><br>
					<input id="fileToUpload" name="fileToUpload" type="file"> <input name="submit" type="submit" value="Upload Image">
				</form><br>
				<br>
				<br>
				<br>
				<br>
				<?php  
				              function my_question($q_title,$q){
				              printf('<div class="row">
				               <div class="col ">
				                <div class="card grey lighten-4"><div class="card-content ">
				                 <h5><strong>%s</strong></h5>
				                 <p>%s</p>
				                </div></div>
				               </div>
				              </div>',$q_title,$q);}

				              require 'db_info.php';
				        // Check connection
				        if (!$con) {
				            die("Connection failed: " . mysqli_connect_error());
				        }
				            ?>
				<form action="user.php" method="post">
					<button class="btn waves-effect waves-light" name="logout" type="submit">Log-Out</button> <?php if(isset($_POST['logout'])){session_destroy(); header('Location: index.php'); } ?><br>
					<br>
					<br>
					<br>
					<?php
					          }
					          else{header('Location: login.php');}     
					        
					      ?>
				</form>
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
							<a class="grey-text text-lighten-3" href="user.php">Login</a>
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
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript">
	</script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js">
	</script>
</body>
</html>