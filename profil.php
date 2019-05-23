<?php
	session_start();
	
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style_signup.css">
<style>

</style>
</head>
<body>

<div class="cachecache">
   <div class="grid-template">
    <div class="header">
    <img src="Images/Logo.png" id="logo">
	
    </div>
	
    <div class="header">
	
    </div>
    <div class="header">
	<p style="color:white;font-size:25px; padding-left:50px; float:left"> <a class="active" href="index.php">Index</p></a>
	<p style="color:white;font-size:25px; padding-left:50px; float:left"> <a class="active" href="login.php">Login</p></a>
    </div>
	
    </div>
  </div>

<div style="padding-left:16px">
  <div><h4>Profil de   <?php echo $_SESSION['username']; ?></h4></div>
  <div><h4>Courriel: <?php echo $_SESSION['courriel']; ?></h4></div>
  <div><h4><?php echo $_SESSION['pass']; ?></h4></div>
  
  

</div>

</body>
</html>