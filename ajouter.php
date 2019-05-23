<?php 
  session_start();

 $bdd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe13;charset=utf8', 'equipe13', 'u2ea2e47');
 $add = $bdd->prepare("CALL AjouterPhotos(?,?,?,?)");
  
	
 if(isset($_POST['addpic'])){
	 
	$title = $_POST['title'];
	$desc = $_POST['desc'];
	$file_name = $_FILES['filetoupload']['name'];
	$alias = $_SESSION['username']; 
	// Paramètre pour ajouter la photo
	$add->bindParam(1,$title);
	$add->bindParam(2,$desc);
	$add->bindParam(3,$file_name);
	$add->bindParam(4,$alias);
	
	$add->execute();
	echo $title;
	echo $desc;
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
        <img src="Images/Add.jpg" id="profilPic">
		<form action="" method="POST" enctype="multipart/form-data"> 
		<input type="file" name="filetoupload" class="infos">
		</form>
		<form method="POST" action="ajouter.php">
		<input placeholder="Titre" class="infos" name="title">
        <textarea class="infos" id="desc" placeholder="Decription" style="resize:none" name="desc" ></textarea>
        <button class="infos" type ="submit" name="addpic">Ajouter la photo!</button> 
		</form>
		
    </div>
    <div class="main">
    </div>
  </div>
</body>
</html>
