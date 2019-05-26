<?php
	session_start();
	$bdd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe13;charset=utf8', 'equipe13', 'u2ea2e47');

				if (isset($_POST['del_btn']))
				{
					$Num = $_POST['del_btn'];
					echo $Num;
					$Del = $bdd->prepare("CALL SupprimerPhotosNum(?)");
					$Del->bindParam(1,$Num);
					$Del->execute();
					header("Location: index.php");
				}


if (isset($_SESSION['Connecter']))
{
    $co = $_SESSION['Connecter'];
}
else
{
	$_SESSION['Connecter'] = "false";
	$co = "false";
}
if (isset($_SESSION['Admin']))
{
    $ad = $_SESSION['Admin'];
}
else
{
	$_SESSION['Admin'] = "false";
	$ad = "false";
}

	//$co = $_SESSION['Connecter'];
	//$ad = $_SESSION['Admin'];

	$get2 = $bdd->prepare("CALL GetComm(?)");
	$get2->bindParam(1,$B);
	$B = 1;
	$NbComa = $get2->execute();
				
	while($a = $get2->fetch())
	{
		$NbComTest = $a[0];
	}
	$get2->closeCursor();
			
?>
<html>
<style>



  #searchBar{
  width:25%;
  height: 75%;
  }

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
    margin-left: auto;
    margin-right: auto;
    width: 50%;
    border-bottom: 2px solid grey;
  }
  .grid-template{
    display: grid;
    grid-template-columns: 25% 50% 25%;
  }
</style>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="styleshhet" href="style.css">
</head>
<body>
  <div class="grid-template">
    <div class="header">
    <img src="Images/Logo.png" id="logo">
    </div>
    <div class="header">
	<?php if ($co == "true") { ?>
      <input value ="" id="searchBar">
	  <button>Rechercher</button>

	  <p style="color:white;font-size:25px; padding-left:25px; float:right"> <a class="active" href="ajouter.php">Ajouter</p></a>
	  
	  <p style="color:white;font-size:25px; padding-left:50px; float:right"> <a class="active" href="profil.php"><?php echo $_SESSION['username']; ?></p></a>
	<?php } else { ?>
	
	  <p style="color:white;font-size:25px; padding-left:50px; float:right"> <a class="active" href="signup.php">S'inscrire</p></a>
	<?php } ?>
	<?php if ($ad == "true") { ?>
	  	  <p style="color:white;font-size:25px; padding-left:20px; float:right"> <a class="active" href="admin.php">Administrator</p></a>
		  <?php } ?>
	
 



	  
	  
    </div>
    <div class="header">
	<?php if ($co == "true") { ?>
	<p style="color:white;font-size:25px; padding-left:85px; float:left"> <a class="active" href="login.php">Logout</p></a>
	<?php } else { ?>
	
	<p style="color:white;font-size:25px; padding-left:50px; float:left"> <a class="active" href="login.php">Login</p></a>
	<?php } ?>
	
	  
    </div>
  </div>
  <div class="grid-template">
    <div class="main">
    </div>
    <div>
      <div class="photos">
		<?php 
			$get = $bdd->prepare("CALL GetAllPhotos()");
			


			$tot = $get->execute();
			while ($d = $get->fetch())
			{
				$get1 = $bdd->prepare("CALL GetComm(?)");
				$get1->bindParam(1,$Numero);
				$Numero = $d[0];
				
				$Titre = $d[1];
				$Description = $d[2];
				$Url = $d[3];
				$Alias = $d[4];
				$Date = $d[5];
				
				$NbCom = $get1->execute();
				
				while($i = $get1->fetch())
				{
					$NbCom = $i[0];
					
				}

				$_SESSION['nume'] = $Numero;
				$_SESSION['u'] = $Url;
				$_SESSION['a'] = $Alias;
				$_SESSION['d'] = $Description;
				$_SESSION['t'] = $Titre;
				?>
				

				
				
				<form method="post" action="index.php">
				<?php 
				$Al = strtoupper($Alias); 
				$Upper = strtoupper($_SESSION['username']);
				if($Al == $Upper || $Upper == "ADMIN") :?>
				<button  value="<?php echo $Numero ?>" class="infos" type="submit" name="del_btn">SupprimerImage <?php echo $Numero ?></button>
				<?php endif ?>
				</form>
				
				
				
				
				<h6 align="middle">La photo a ete publie par <?php echo $Alias ?><h6/>
				<h6 align="middle"><?php echo $Description ?><h6/>
				<h6 align="middle"><?php echo $Titre ?><h6/>
				
				<a href="gestimage.php?num=<?php echo $Numero ?>">
				<img src= "Images/<?php echo $Url ?>" height="150" width="200" class="photosIMG">
				</a>
				
				<!--
				<a href="gestimage.php">
				<img src= "Images/<?php echo $Url ?>" height="150" width="200" class="photosIMG">
				</a>
				-->
				<?php if($Numero == 1) :?>
					<h6 align="middle"><?php echo $NbComTest ?><h6/>
				<?php endif ?>
				<h6 align="middle">Il y a <?php echo $NbCom ?> Commentaires<h6/>
				<h6 align="middle">Publie le <?php echo $Date ?><h6/>
				<br>

				
				
			<?php
			}
			$get1->closeCursor();
			$get->closeCursor();
		?>
		
      </div>
    </div>
    <div class="main">
    </div>
  </div>
  <script>
document.getElementById("date").innerHTML = Date();
document.getElementById("date2").innerHTML = Date();
document.getElementById("date3").innerHTML = Date();
document.getElementById("date4").innerHTML = Date();
</script>
</body>
<?php include 'footer.php' ?>
</html>
