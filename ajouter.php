<?php 
  session_start();

 $bdd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe13;charset=utf8', 'equipe13', 'u2ea2e47');
 $add = $bdd->prepare("CALL AjouterPhotos(?,?,?,?)");
  
	
 if(isset($_POST['addpic']))
 {
	$file = $_FILES['file'];

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
	
	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));
	
	$allowed = array('jpg','jpeg','png','pdf');
	
	if (in_array($fileActualExt, $allowed))
	{
		if ($fileError === 0)
		{
			if ($fileSize < 50000000000)
			{
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination = './Images/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				// Initialisation
				$Titre = $_POST['titre'];
				$Description = $_POST['description'];
				//$fileName = $_POST['file'];
			    $Alias = $_SESSION['username']; 
				
				// Affectation
				$add->bindParam(1,$Titre);
				$add->bindParam(2,$Description);
				$add->bindParam(3,$fileNameNew);
				$add->bindParam(4,$Alias);
				
				// Executation
				$add->execute();
				header("Location: index.php?uploadsuccess");
			}
			else
			{
				echo "Your file is too big!";
			}
		}
		else
		{
			echo "There was an error uploading your file!";
		}
	}
	else
	{
		echo "You cannot upload files of this type!";
	}
	
	// Redirection
	header("Location: index.php");
	
 }
 
?>

<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>

  #logo{
    width: 70%;
    height:40px;
    padding-left:10px;
  }
  #profilPic{
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
  }

  .infos{
    display: block;
    margin-left: auto;
    margin-right: auto;
    width:30%;
    margin-top: 2%;
  }

  #desc{
    height: 100px;
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

  .grid-template{
    display: grid;
    grid-template-columns: 25% 50% 25%;
  }
</style>
<head>
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
    </div>
  </div>
  <div class="grid-template">
    <div class="main">
    </div>
    <div>
		<form method="POST" action="ajouter.php" enctype="multipart/form-data">
		
		<input type="file" name="file" class="infos">
		<!-- <button type="submit" name="submit" class="infos">Upload photo</button> -->

		<input placeholder="Titre" class="infos" name="titre">
		
        <textarea class="infos" id="desc" placeholder="Decription" style="resize:none" name="description" ></textarea>
		
        <button class="infos" type ="submit" name="addpic">Ajouter la photo!</button> 
		</form>
		
    </div>
    <div class="main">
    </div>
  </div>
</body>
</html>
