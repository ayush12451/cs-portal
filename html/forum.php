<!DOCTYPE html>
<?php @session_start();
 ?>
<html>
<head>
	<title>Discussion Forum</title>
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
						<li>
							<a href="user.php"><i class="medium material-icons" style="color: black">account_circle</i></a>
						</li>
						<li class="active">
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
			<div class="card-panel white z-depth-3">
				<h2 class='orange-text text-accent-3'><strong>Welcome to the discussion forum!</strong></h2><br>
				<br>
				<?php           


				   require 'db_info.php';
				   // Check connection
				   if (!$con) {
				       die('Connection failed: '.mysqli_connect_error());
				   }

				   function answer_final($id)
				  {
				    printf( '
				     <li class="collection-item avatar">
				    <i class="material-icons circle red">account_circle</i>
				    <span class="title"><b>Your Answer:</b></span>
				    <form action="answer.php?q_id=%s" method="post" ><div class="input-field col s12">
				    <textarea name="answer" id="answer" class="materialize-textarea"></textarea>
				    <label for="answer">Answer</label>
				    <button class="btn waves-effect waves-light" type="submit" name="submit-ans">Submit
				        <i class="material-icons left">send</i></button></div>
				      </form>
				    </li>
				    </ul>',$id);

				    
				  }
				 function answer($question_id)
				 {  
				  require "db_info.php";
				     $sql1 = "SELECT answer FROM answer WHERE question_id = '".$question_id."' ";
				     $r="SELECT * FROM answer WHERE question_id = '".$question_id."' ";
				     $pass1 = mysqli_query($con, $sql1);
				     $pass2 = mysqli_query($con, $r);
				     $temp = mysqli_fetch_array(mysqli_query($con, 'SELECT count(*) from answer WHERE question_id = "'.$question_id.'"'));
				     $num=$temp[0];
				     $array = array();
				    while ($row = mysqli_fetch_array($pass2)) {
				        $array[] = $row['answer'];
				        }
				     $row1 = mysqli_fetch_array($pass1,MYSQLI_NUM);
				     foreach($array as $ans){
				     $p1 = sprintf('
				     <li class="collection-item avatar">
				         <i class="material-icons circle green">account_circle</i>
				         <span class="title"> %s </span>
				    </li>',$ans);

				     echo $p1;
				    $num--;}
				 }

				 function question($q_title, $q,$max_q_id)
				 {
				     $p1 = sprintf('<div class="card-panel grey lighten-5 z-depth-1">                     
				    <div class="row">
				       <div class="col s1">
				         <br>  
				           <i class="medium material-icons">account_circle</i>
				       </div>
				         <div class="col s11 ">
				         <h5><strong> %s </strong></h5>
				          <p> %s </p>
				          </div>
				          <div class="col s1">
				          <br>
				          </div>
				          <div class="col s11">
				           <h6><strong>Answers:</strong></h6><ul class="collection">',$q_title,$q);
				     $p4 = '</div>
				          </div>
				          </div>';

				     echo $p1;

				     answer($max_q_id);
				     if(@$_SESSION['LoggedIn']==1){
				     answer_final($max_q_id);}
				     echo $p4;
				 }

				   $temp = mysqli_fetch_array(mysqli_query($con, 'SELECT max(question_id) from question'));
				   $max_q_id=$temp[0];
				  
				   while ($max_q_id != 0) {
				       @$sql = "SELECT * FROM question WHERE question_id = '".$max_q_id."'";
				       $row = mysqli_fetch_array(mysqli_query($con, $sql));

				       $q_title = $row['title'];
				       $q = $row['question'];
				      
				       question($q_title, $q, $max_q_id);
				       $max_q_id-=1;
				   }
        ?>
        <?php 
        if(@$_SESSION['LoggedIn']==1){ ?>
				<div class="card-panel grey lighten-5 z-depth-1">
					<h4><strong>Ask a question:</strong></h4>
					<div class="row valign-wrapper">
						<div class="col s2"><img alt="" class="circle responsive-img small" src="<?=$_SESSION['img'] ?>"></div>
						<div class="row">
							<form action="forum.php" class="col s12" method="post">
								<div class="row">
									<div class="input-field col s12">
										<textarea class="materialize-textarea" data-length="180" id="title" name="title"></textarea> <label for="title">Question Title</label>
									</div>
									<div class="input-field col s12">
										<textarea class="materialize-textarea" data-length="180" id="question" name="question"></textarea> <label for="question">Question</label>
									</div><button class="btn waves-effect waves-light" name="submit" type="submit">Submit <i class="material-icons left">send</i></button>
								</div>
							</form>
						</div>
					</div>
        </div><br>
        <?php } ?>
				<br>
				<p></p>
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
	</script><?php 
	    if(isset($_POST['submit'])){
	        $servername = "localhost";
	        $username = "root";
	        $password = "";
	        $dbname = "userDB";
	        
	        $con = mysqli_connect($servername, $username, $password, $dbname);
	        // Check connection
	        if (!$con) {
	            die("Connection failed: " . mysqli_connect_error());
	        }
	         $title = mysqli_real_escape_string($con, $_POST['title']);
	         $question = mysqli_real_escape_string($con, $_POST['question']);
	         $system_id = $_SESSION['system_id'];

	         $sql="INSERT into question(title,question,system_id) values ('$title','$question','$system_id')";
	         mysqli_query($con,$sql);
	         redirect("forum.php");

	    }
	  ?>
</body>
</html>