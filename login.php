<?php
	session_start();

		
		$bdd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe13;charset=utf8', 'equipe13', 'u2ea2e47');
		$usernameErr = $passwordErr = "";
		if (isset($_POST['login_btn']))
		{
			
			$resultat ="";
			$aliass = $_POST['alias'];
			$mdpp = $_POST['mdp'];
			if (empty($_POST["alias"]))
			{
				$usernameErr = "Username is required";
			}

			if (empty($_POST["mdp"]))
			{
			$passwordErr = "Password is required";
			}
			
			$get = $bdd->prepare("CALL GetUser(?)",array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));
			
			$get->bindParam(1,$alias);
			$alias = $aliass;
			$tot = $get->execute();
			while ($d = $get->fetch())
			{
				$courriel = $d[0];
				$pass = $d[1];
			}
			$get->closeCursor();
			$_SESSION['courriel'] = $courriel;
			$_SESSION['pass'] = $pass;
			
			
			// check exist
			$exist = $bdd->prepare("CALL Verifier(?,?)",array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));
			
			$exist->bindParam(1,$alias);
			$exist->bindParam(2,$mdp);
			$alias = $aliass;
			$mdp = $mdpp;
			$total = $exist->execute();
			while ($donnees = $exist->fetch())
			{
				$resultat = $donnees[0];
			}
			$exist->closeCursor();
			if ($resultat == 'Y')
			{
				$_SESSION['message'] = "You are now logged in";
				$_SESSION['username'] = $alias;
				
				header("location: home.php"); // redirect to index.php
			}
			else
			{
				// Failed
				$passwordErr = "Password is invalid";
				$usernameErr = "Username is invalid";
			}
		}
		

		
?>
<!DOCTYPE html>
<html>
<head>
<style>
.error {
	color: #FF0000;
}
</style>
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
	  <form method="post" action="login.php">
			<input placeholder="Username" type="text" name="alias" class="infos"> 
			<span class="error">* <?php echo $usernameErr;?></span>
			<input placeholder="Password" type="text" name="mdp" class="infos">
			<span class="error">* <?php echo $passwordErr;?></span>
			<button class="infos" type="submit" name="login_btn">Login</button>
			<input type="button" onclick="window.location='signup.php'" class="infos" value="S'inscrire"/>
		</form>
      </div>
    </div>
    <div class="main">
    </div>
  </div>
</div>
</body>
</html>
 