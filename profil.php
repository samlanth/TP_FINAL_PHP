<?php
	session_start();
	
	$bdd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe13;charset=utf8', 'equipe13', 'u2ea2e47');
	$mailErr = $PasswordErr = "";
	$mail = $_SESSION['courriel'];
	$name =  $_SESSION['username'];
	$password = $_SESSION['pass'];
	
	if (isset($_POST['modifier']))
	{
		
	}
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
	<p style="color:white;font-size:25px; padding-left:50px; float:left"> <a class="active" href="login.php">Logout</p></a>
    </div>
	
    </div>
  </div>

<div style="padding-left:16px">
<form method="post" action="profil.php">
  <div><h1 class="infos">Profil de   <?php echo $_SESSION['username']; ?></h1></div>
  <h3 class="infos">Courriel:</h3>
  <input type="text" name="firstname" value=<?php echo $_SESSION['courriel']; ?> class="infos">
  
  <h3 class="infos">Mot de passe:</h3>
  <input type="text" name="lastname" value=<?php echo $_SESSION['pass']; ?> class="infos">
  
  <button class="infos" type="submit" name="modifier">Modifier</button>
</form> 
  

</div>

</body>
</html>