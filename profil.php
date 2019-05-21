<?php
	session_start();
	
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="index.php">Index</a>
  <a href="signup.php">Inscription</a>
</div>

<div style="padding-left:16px">
  <div><h4><?php echo $_SESSION['message']; ?></h4></div>
  <div><h4>Welcome  <?php echo $_SESSION['username']; ?></h4></div>
  <div><h4>Courriel: <?php echo $_SESSION['courriel']; ?></h4></div>
  <div><h4><?php echo $_SESSION['pass']; ?></h4></div>
  
  

</div>

</body>
</html>