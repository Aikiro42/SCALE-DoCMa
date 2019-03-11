<?php
	
	include('config.php');

<<<<<<< HEAD
   //use for ubuntu,
   //may default path ang wamp pero wala ung ubuntu
   session_save_path('\tmp');
=======
>>>>>>> parent of 7c09f9f... Deployment to Heroku
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($dbc,"select username from users where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
   }
?>