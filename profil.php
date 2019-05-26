<?php
	session_start();
	
	$bdd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe13;charset=utf8', 'equipe13', 'u2ea2e47');
	$mailErr = $PasswordErr = "";
	$mail = $_SESSION['courriel'];
	$name =  $_SESSION['username'];
	$password = $_SESSION['pass'];
	

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
  <input class="infos" type="text" name="EMAIL" value=<?php echo $_SESSION['courriel']; ?>>
  
  <h3 class="infos">Mot de passe:</h3>
  <input class="infos" type="password" name="MDP" value=<?php echo $_SESSION['pass']; ?>>
  

  <input class="infos" type="submit" name="Modifier" value="Modifier"></input>
  <?php
			if(isset($_POST['Modifier']))
			{
				$EMAIL = $_POST['EMAIL'];
				$MDP = $_POST['MDP'];
				$getModifier = $bdd->prepare("CALL Modifier(?,?,?)");
				$getModifier->bindParam(1,$name);
				$getModifier->bindParam(2,$MDP);
				$getModifier->bindParam(3,$EMAIL);
				$tot = $getModifier->execute();
				$getModifier->closeCursor();
				$_SESSION['courriel'] = $EMAIL;
				$_SESSION['pass'] = $MDP;
				
				header("Location: profil.php");
			}
			?>
	
</form> 
<form method="post" action="profil.php">
<p class="infos">
<input type="checkbox" name="remember">Rester Connecter</input>
</p>
<input class="infos" type="submit" name="Oui" value="Oui"></input>
</form>
<?php
		if (isset($_POST['remember']))
		{
			//$_SESSION['username'] = $user;
			$token = hash('sha256',$_SESSION['username'] . time(),"/");
			setcookie("authToken", $_SESSION['username'], time()+60*60*24);
			header("Location: profil.php");
		}
?>

</div>

</body>
<?php include 'footer.php' ?>
</html>