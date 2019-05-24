<?php 
session_start();
$bdd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe13;charset=utf8', 'equipe13', 'u2ea2e47');
$infos = $bdd->prepare("CALL GetPhoto(?)",array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY)); 
$commenter = $bdd->prepare("CALL AjouterCommentaires(?,?,?,?)");

// Get le id de la photo
$url = $_SERVER['REQUEST_URI'];
preg_match("/[^\/]+$/",$url, $match);
$id = $match[0]; 

$infos->bindParam(1,$id);
$infos->execute();

// Get les infos sur la photo
while($i = $infos->fetch())
{
	$num = $i[0];
	$titre = $i[1];
	$desc = $i[2];
	$nom = $i[3];
	$owner = $i[4];
	$date = $i[5];
}

// Get les comments de la photo
$getcomments = $bdd->prepare("CALL GetAllComments(?)",array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));
$getcomments->bindParam(1,$num);

// Ecrire un comment pour la photo
  if(isset($_POST['commentbtn']))
  {
	$commentaire = $_POST['comment'];
	echo $commentaire;
	  if($commentaire != " "){
	  
	  $commenter->bindParam(1,$commentaire);
	  $commenter->bindParam(2,$num);
	  $commenter->bindParam(3,$owner);
	  $commenter->bindParam(4,$currentUser);
	  $currentUser = $_SESSION['username'];  
	  }
  }
?>


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
          <p style="color:white;font-size:25px; padding-left:50px; float:left">Login</p>
          <p style="color:white;font-size:25px; padding-left:50px; float:left">S'inscire</p>
        </div>
      </div>
      <div class="grid-template">
        <div class="main">
        </div>
        <div>
          <div>
		  <h3 class="infos" align="middle">Photo de <?php echo $owner ?></h3>
		  <h3 class="infos" align="middle"><?php echo $titre ?></h3>
		  <img src="Images/ <?php echo $nom ?>" class="photosIMG" align="middle">
		  <textarea name="comment" placeholder="Belle photo de Canard" cols="40" rows="6" ></textarea><br>
		  <form> 
		  <input type="submit" value="comment" name="commentbtn">
		  <h3 class="infos">Commentaire de Joe</h3>
		  <h3 class="infos">Belle photo de Canard</h3>
		  <p id="date"></p><br>
		  <h3 class="infos">Commentaire de Sam</h3>
		  <h3 class="infos">Belle photo</h3>
		  <p id="date2"></p><br>
		  <h3 class="infos">Commentaire de Ced</h3>
		  <h3 class="infos">Belle image</h3>
		  <p id="date3"></p><br>
        <?php
            // Afficher les commentaires
            $getcomments->execute();
            while($c = $getcomments->fetch())
            {
             echo '<h3 class="infos"> Commentaire de ' . $c[4] . '</h3>';
             echo '<h3 class="infos"> $c[0]</h3>';
             echo '<h3 class="infos"> Publie le ' . $c[5] . '</h3>';
           }
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
