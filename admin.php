<?php
	session_start();
	$bdd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe13;charset=utf8', 'equipe13', 'u2ea2e47');
?>
<html>
<style>

.photosIMG{
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
  border-bottom: 2px solid grey;
}

  #logo{
    width: 70%;
    height:40px;
  }

  .infos{
    display: block;
    margin-left: auto;
    margin-right: auto;
    width:50%;
    margin-top: 2%;
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

   #profilPic{
     display: block;
     margin-left: auto;
     margin-right: auto;
     width: 50%;
   }
  .grid-template{
    display: grid;
    grid-template-columns: 25% 50% 25%;
  }
  select{

		 text-align: center;
  }
  fieldset{
  border: 1px solid rgb(255,232,57);
  
  margin:auto;
}
  
</style>
<head>
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
      <div>
        <!--
        <img src="Images/Profil.jpg" id="profilPic">
        <button class="infos"><span class="glyphicon glyphicon-open"></span></button>  -->
        <h1 class="infos" align="middle">Admin</h1>
		<fieldset>
        <form action="#" method="post">
		<select class="infos" name="NomUser" align="middle">
		<?php 
			$get = $bdd->prepare("CALL GetAllUsers()");
			


			$tot = $get->execute();
			while ($d = $get->fetch())
			{
				$Alias = $d[0];
				?>
				<option><?php echo $Alias ?></option>
			
			<?php
			}
			$get->closeCursor();
		?>


		</select>
		<input class="infos" type="submit" name="Delete" value="Supprimer"></input>
		<input class="infos" type="submit" name="MDP" value="Nouveau Mot De Passe"></input>
		</form>
			<?php
			if(isset($_POST['Delete'])){
			$selected_val = $_POST['NomUser'];
			$getdelete = $bdd->prepare("CALL SupprimerUsers(?)");
			$getdelete->bindParam(1,$selected_val);
			$tot = $getdelete->execute();
			$getdelete->closeCursor();
			}
			?>
			<?php
			if(isset($_POST['MDP'])){
			$selected_val = $_POST['NomUser'];
			$getdelete = $bdd->prepare("CALL Generer(?)");
			$getdelete->bindParam(1,$selected_val);
			$tot = $getdelete->execute();
			$getdelete->closeCursor();
			}
			?>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</fieldset>
        
        
      </div>
    </div>
    <div class="main">
    </div>
  </div>
</div>
</body>
</html>
