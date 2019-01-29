<?php
require "functions.php";
session_start();
if(isset($_POST['submit-ans'])){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "userDB";
    
    $con = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
     $answer = mysqli_real_escape_string($con, $_POST['answer']);
     $system_id = $_SESSION['system_id'];
     $q_id=$_GET['q_id'];
     $sql="INSERT into answer(question_id,answer,system_id) values('$q_id','$answer','$system_id')";
     mysqli_query($con,$sql);
     redirect("forum.php");
}
