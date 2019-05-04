<?php
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
			if ($password == $password2)
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
				$_SESSION['message'] = "The two passwords do not match";
			}
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
	<h1>Register</h1>
</div>

<form method="post" action="signup.php">
	<table>
		<tr>
			<td>Username:</td>
			<td><input type="text" name="username" class="textInput"></td>
		</tr>
		<tr>
			<td>Nom:</td>
			<td><input type="text" name="nom" class="textInput"></td>
		</tr>
		<tr>
			<td>Prenom:</td>
			<td><input type="text" name="prenom" class="textInput"></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="text" name="password" class="textInput"></td>
		</tr>
		<tr>
			<td>Password again:</td>
			<td><input type="text" name="password2" class="textInput"></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="text" name="email" class="textInput"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="register_btn" value="Register"></td>
		</tr>
	</table>
</form>
</body>
</html>
 