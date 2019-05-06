<?php
	function valid_email($str)
	{
		return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
	}
	session_start();

		$bdd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe13;charset=utf8', 'equipe13', 'u2ea2e47');
		if (isset($_POST['register_btn']))
		{
			$username = $_POST['username'];
			$name = $_POST['nom'];
			$lastname = $_POST['prenom'];
			$password = $_POST['password'];
			$password2 = $_POST['password2'];
			$mail = $_POST['email'];
			if(!valid_email($mail))
			{
				echo "Invalid email address.";
			}
			else if ($password == $password2)
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
			else
			{
				// failed
				$_SESSION['message'] = 'The two passwords do not match';
				echo $_SESSION['message'];
			}
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
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
    </div>
  </div>
  <div class="grid-template">
    <div class="main">
    </div>
    <div>
	<h2 class="infos" align="middle">Inscription</h2>
      <div style="height:100%;">
	  <form method="post" action="signup.php">
        <input placeholder="Nom" type="text" name="nom" class="infos"><br>
        <input placeholder="Prenom" type="text" name="prenom" class="infos"><br>
        <input placeholder="Username" type="text" name="username" class="infos"> <br>
        <input placeholder="Password" type="text" name="password" class="infos"><br>
        <input placeholder="Confirmation password" type="text" name="password2" class="infos"><br>
        <input placeholder="Email" type="text" name="email" class="infos"><br>
        <button class="infos" type="submit" name="register_btn">S'inscrire</button>
		</form>
      </div>
    </div>
    <div class="main">
    </div>
  </div>
</div>


</body>
</html>
 