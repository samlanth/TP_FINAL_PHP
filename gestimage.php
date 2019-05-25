<?php 
	session_start();
	$co = $_SESSION['Connecter'];
	$ad = $_SESSION['Admin'];
	$bdd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe13;charset=utf8', 'equipe13', 'u2ea2e47');
	
	// Procedure GetPhoto
	$infos = $bdd->prepare("CALL GetPhoto(?)"); 
	
	// Procedure AjouterCommentaires
	//$commenter = $bdd->prepare("CALL AjouterCommentaires(?,?,?,?)");
	
	// Get le id de la photo
	$url = $_SERVER['REQUEST_URI'];
	preg_match("/[^\/]+$/",$url, $match);
	$id = $match[0];
    $id = $_GET['num'];

$infos = $bdd->prepare("CALL GetPhoto(?)");
$infos->bindParam(1,$id);

$resultat = $infos->execute();
while ($donnees = $infos->fetch())
	{
		$numImage = $donnees[0];
		$titre = $donnees[1];
		$description = $donnees[2];
		$url = $donnees[3];
		$user = $donnees[4];
		if (isset($_SESSION['username']))
{
    $currentUser = $_SESSION['username']; 
}
else
{
	$_SESSION['username'] = "false";
	$currentUser = $_SESSION['username'];
}
		$currentUser = $_SESSION['username']; 
		
	}
$infos->closeCursor();

// Get les comments de la photo
$getcomments = $bdd->prepare("CALL GetAllComments(?)",array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));
$getcomments->bindParam(1,$numImage);

if (isset($_POST['commentbtn']))
{
	$commenter = $bdd->prepare("CALL AjouterCommentaires(?,?,?,?)",array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));
	$commenter->bindParam(1,$description);
	$commenter->bindParam(2,$numImage);
	$commenter->bindParam(3,$user);
	$commenter->bindParam(4,$currentUser);

	$description = $_POST['comment'];
	$numImage = $id;
	//$user = "Sam";
	$currentUser = $_SESSION['username']; 
	
	$total = $commenter->execute();
	$commenter->closeCursor();
}
?>

<!DOCTYPE html>
<html>
<style>
  #logo{
    width: 70%;
    height:40px;
    padding-left:10px;
  }
  .header{
    height:50px;
    background-color: rgb(29, 33, 41);
    padding-top: 5px;
  }

  .main{
    background-color: #e9ebee
  }

  .photos{
    background-color: white;
   }

  .photosIMG{
    display: block;
    margin-right: auto;
    width: 40%;
  }
  .grid-template{
    display: grid;
    grid-template-columns: 25% 50% 25%;
  }

  .infos{
    display: block
    margin-right: auto;
    width:50%;
    margin-top: 2%;
  }
  .infos2 {
	display:block
	margin-right: 80%;
	width 30%;
	margin-top: 2%;
  }
</style>
<head>
	<link rel="stylesheet" type="text/css" href="style_login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
      <div class="grid-template">
			<div class="header">
			<img src="Images/Logo.png" id="logo">
			</div>
				<div class="header">
					  <?php if ($co == "true") { ?>
					  <p style="color:white;font-size:25px; padding-left:50px; float:right"> <a class="active" href="./ajouter.php">Ajouter</p></a>
					  
					  <p style="color:white;font-size:25px; padding-left:50px; float:right"> <a class="active" href="./profil.php"><?php echo $_SESSION['username']; ?></p></a>
					  <?php } else { ?>
					
					  <p style="color:white;font-size:25px; padding-left:50px; float:right"> <a class="active" href="./signup.php">S'inscrire</p></a>
					  <?php } ?>
					  <?php if ($ad == "true") { ?>
					  <p style="color:white;font-size:25px; padding-left:50px; float:right"> <a class="active" href="./admin.php">Administrator</p></a>
					  <?php } ?>
				</div>
					<div class="header">
						<?php if ($co == "true") { ?>
						
						<p style="color:white;font-size:25px; padding-left:50px; float:left"> <a class="active" href="./index.php">Index</p></a>
						<p style="color:white;font-size:25px; padding-left:50px; float:left"> <a class="active" href="./login.php">Logout</p></a>
						<?php } else { ?>
						<p style="color:white;font-size:25px; padding-left:50px; float:left"> <a class="active" href="./index.php">Index</p></a>
						<p style="color:white;font-size:25px; padding-left:50px; float:left"> <a class="active" href="./login.php">Login</p></a>
						<?php } ?>
					</div>
      </div>
      <div class="grid-template">
			<div class="main">
			</div>
				<div>
					  <div>
						  <h3 class="infos" align="middle">Photo de <?php echo $user ?></h3>
						  <h3 class="infos" align="middle"><?php echo $titre ?></h3>
						  <img src="Images/<?php echo $url ?>" height="150" width="200" class="photosIMG">
						  
						  
						  <form method="post" action="gestimage.php?num=<?php echo $id ?>">
						  <textarea class="infos" name="comment" placeholder="Commentaire" cols="40" rows="6" ></textarea>
						  <input class="infos"type="submit" value="comment" name="commentbtn" <?php if ($_SESSION['Connecter'] != "true"){ ?> disabled <?php   }?>>
						  </form>
		  
        <?php
            // Afficher les commentaires
            $getcomments->execute();
            while($c = $getcomments->fetch())
            {
				?>
				
				
             <h3 class="infos"> Commentaire de <?php echo $c[4] ?></h3>
             <h3 class="infos"><?php echo $c[0] ?></h3>
             <h3 class="infos"> Publier le <?php echo $c[5] ?></h3>
			 <?php
           }
		   $getcomments->closeCursor();
          ?>   
		  <div id="respond">
		  </div>
						  
				    </div>
			 </div>
        <div class="main">
        </div>
      </div>
  </body>
<script>
</script>
</html>
