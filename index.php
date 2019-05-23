<?php
	session_start();
	$bdd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe13;charset=utf8', 'equipe13', 'u2ea2e47');
	
			
?>
<html>
<style>

  #searchBar{
  width:60%;
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
</head>
<body>
  <div class="grid-template">
    <div class="header">
    <img src="Images/Logo.png" id="logo">
    </div>
    <div class="header">
	
 
	  
	  
    </div>
    <div class="header">
      <p style="color:white;font-size:25px; padding-left:50px; float:left"> <a class="active" href="login.php">Login</p></a>
      <p style="color:white;font-size:25px; padding-left:50px; float:left"> <a class="active" href="signup.php">S'inscrire</p></a>
	  
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
				
				$NbCom = $get1->execute();
				
				while($i = $get1->fetch())
				{
					$NbCom = $i[0];
					
				}

				
				?>
				<h3 align="middle"><?php echo $NbCom ?><h3/>
				<h3 align="middle"><?php echo $Alias ?><h3/>
				<h3 align="middle"><?php echo $Titre ?><h3/>
				<img src= "Images/<?php echo $Url ?>" height="150" width="200" class="photosIMG">
				<br><br><br><br>

				
				
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
</html>
