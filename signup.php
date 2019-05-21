<?php
	function valid_email($str)
	{
		return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
	}
	session_start();

		$bdd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe13;charset=utf8', 'equipe13', 'u2ea2e47');
		// define variables and set to empty values
		$usernameErr = $emailErr = $passwordErr = $password2Err = $prenomErr = $nomErr = $pass = $validEmail = "";
		if (isset($_POST['register_btn']))
		{
			$username = $_POST['username'];
			$name = $_POST['nom'];
			$lastname = $_POST['prenom'];
			$password = $_POST['password'];
			$password2 = $_POST['password2'];
			$mail = $_POST['email'];
			if (empty($_POST["username"]))
			{
				$usernameErr = "username is required";
			}

			if (empty($_POST["mail"]))
			{
			$emailErr = "Email is required";
			}

			if (empty($_POST["password"]))
			{
				$passwordErr = "password is required";
			}

			if (empty($_POST["password2"]))
			{
				$passwordErr = "password is required";
			}

			if (empty($_POST["nom"]))
			{
				$nomErr = "nom is required";
			}
			
			if (empty($_POST["prenom"]))
			{
				$prenomErr = "prenom is required";
			}
			if(!valid_email($mail))
			{
				// failed
				$emailErr = "Invalid Email address";
			}
			if ($password != $password2)
			{
				// failed
				$passwordErr = "The two passwords do not match";
			}
			if (valid_email($mail) && $password == $password2)
			{
				// create user
				$insert = $bdd->prepare("CALL AjouterUser(?,?,?,?,?)");
				$insert->bindParam(1,$alias);
				$insert->bindParam(2,$nom);
				$insert->bindParam(3,$prenom);
				$insert->bindParam(4,$email);
				$insert->bindParam(5,$mdp);
				$alias = $username;
				$nom = $name;
				$prenom = $lastname;
				$email = $mail;
				$mdp = $password;
				$totalSS = $insert->execute();
				$_SESSION['message'] = "You are now logged in";
				$_SESSION['username'] = $username;
				header("location: home.php"); // redirect to home.php
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
	<title>Inscription</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style_signup.css">
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
  <div class="grid-template">
    <div class="main">
    </div>
    <div>
	<h2 class="infos">Inscription</h2>
      <div style="height:100%;">
	  <form method="post" action="signup.php">
	  
		  <input class="infos" placeholder="Nom" type="text" name="nom">
		  <span class="error">* <?php echo $nomErr;?></span>
		  <br>
		  
		  <input  class="infos" placeholder="Prenom" type="text" name="prenom">
		  <span class="error">* <?php echo $prenomErr;?></span>
		  <br>
		 
		  <input  class="infos" placeholder="Username" type="text" name="username">
		  <span class="error">* <?php echo $usernameErr;?></span>
		  <br>
		  
		  <input class="infos" placeholder="Password" type="text" name="password">
		  <span class="error">* <?php echo $passwordErr;?></span>
		  <br>
		  
		  <input  class="infos" placeholder="Confirmation" type="text" name="password2">
		  <span class="error">* <?php echo $passwordErr;?></span>
		  <br>
		  
		  <input  class="infos" placeholder="Email" type="text" name="email">
		  <span class="error">* <?php echo $emailErr;?></span>
		  <br>

		  <button class="infos" type="submit" name="register_btn">S'inscrire</button><br>
		</form>
      </div>
    </div>
    <div class="main">
    </div>
  </div>
</div>


</body>
</html>
 