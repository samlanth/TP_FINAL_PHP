<?php
	session_start();

		$bdd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe13;charset=utf8', 'equipe13', 'u2ea2e47');
		if (isset($_POST['login_btn']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			// create user
			$log = $bdd->prepare("SELECT alias FROM Users where alias = '$username'");
			
			
			$totalSS = $insert->execute();
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $username;
			header("location: home.php"); // redirect to home.php
		}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style_login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
    </div>
  </div>
  <div class="grid-template">
    <div class="main">
    </div>
    <div>
	<h2 class="infos" align="middle">Login</h2>
      <div style="height:100%;">
        <input placeholder="Username" type="text" name="username" class="infos"> <br>
        <input placeholder="Password" type="text" name="password" class="infos"><br>
        <button class="infos" type="submit" name="login_btn">Login</button>
        <button class="infos" name="inscrip_btn" >S'inscrire</button>

      </div>
    </div>
    <div class="main">
    </div>
  </div>
</div>
</body>
</html>
 