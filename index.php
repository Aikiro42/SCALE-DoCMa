<?php
   include("config.php");
   include("ChromePhp.php");
   session_start();
   $error = "";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
	  ChromePhp::log('[index.php] : Request method is "post".');
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($dbc,$_POST['username']);
      $mypassword = mysqli_real_escape_string($dbc,$_POST['password']); 
      
      $sql = "SELECT * FROM Users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($dbc,$sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
		 ChromePhp::log('[index.php] : Login credentials match.');
         $_SESSION['login_user'] = $myusername;
         $_SESSION['user_id'] = $row['user_id'];
         header("location: main.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
	<head>
		<title>Scale DocMa</title>
		<link href="css/var.css" rel="stylesheet" type="text/css" />
		<link href="css/main.css" rel="stylesheet" type="text/css" />
		<link href="css/login.css" rel="stylesheet" type="text/css" />
		<script src="jquery-3.3.1.min.js"></script>
	</head>
	<body>
	<div id="wrapper">
	
		<header>
			<h1>SCALE DoCMa</h1>
		</header>
		
		<div id="login">
			<form action="" method="post">
				<div class="fields">
					<span class="fieldLabels">
						Username
					</span>
					<input type="text" class="credentials" id="username" name="username" />
				</div>
				<div class="fields">
					<span class="fieldLabels">
						Password
					</span>
					<input type="password" class="credentials" id="password" name="password" />
				</div>
				<div id="buttons">
					<input type="submit" class="buttons" id="submit" value="Login"/>
				</div>
				<?php echo '<br /><span id="errorMessage">'.$error.'</span>'; ?>
			</form>
		</div>
		
		
		<footer>
			<p>Copyright (c) DBServer</p>
			<br />
			<p>Disclaimer: This system is for the collection of forms and for visual interface that will help people involved in the SCALE
	program manage their activities and achievements.</p>
		</footer>
		
		</div>
	</body>
</html>