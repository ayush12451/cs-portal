<?php 
 session_start();
  ob_start();
  
  if(@$_SESSION['LoggedIn']==1){
	@header('Location: user.php');
  } ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login-Sharda Portal</title>
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
          <ul class="right hide-on-med-and-down" style="color:black">
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
		<div class="container">
			<div class="card-panel white z-depth-3" style="text-align: center">
				<i class="large material-icons" style="color: gray;font-size: 150px">account_circle</i><br>
				<h3>Login</h3><br>
				<br>
				<div class="container">
					<div class="row">
						<form action='login.php' class="col s12" method='post'>
							<div class="row">
								<div class="input-field col s12">
									<input class="validate" id="system-id" name="system_id" type="text"> <label for="system-id">System-id</label>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<input class="validate" id="password" name="password" type="password"> <label for="password">Password</label>
									</div><br>
									<button class="btn waves-effect waves-light" name="submit" type="submit">Submit <i class="material-icons right">send</i></button> <a class="waves-effect waves-light btn" href="signup.php"><i class="material-icons right">account_circle</i>Sign Up</a>
								</div>
							</div>
						</form><?php  
						    						    						    
						        if (isset($_POST['submit'])) {
						          
						        require 'db_info.php';
						        // Check connection
						        if (!$con) {
						            die("Connection failed: " . mysqli_connect_error());
						        }
						        
						         $system_id = mysqli_real_escape_string($con, $_POST['system_id']);
						         $u_password = mysqli_real_escape_string($con, $_POST['password']);
						     
						         $pass=sha1($u_password);
						        $sql = "SELECT * FROM user WHERE system_id = '".$system_id."' AND password = '".$pass."'";
						         $checklogin=mysqli_query($con,$sql);
						      if(mysqli_num_rows($checklogin) == 1)
						        {
						         $row = mysqli_fetch_array($checklogin);
						         $email = $row['email'];
						         $name=$row['first_name'];
						         $img=$row['image_location'];
								 $_SESSION['system_id']=$system_id;
								 $_SESSION['email']=$email;
								 $_SESSION['name']=$name;
								 $_SESSION['img']=$img;
								 $_SESSION['LoggedIn']=1;
						         echo "<h3>Success.</h3>";
						         header('Location: user.php',TRUE);
						        }
						      else{echo "<p>error loging in</p>";}
						      }
						         ?>
					</div>
				</div>
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