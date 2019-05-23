<?php
	session_start();
	
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
	<?php if ($_SESSION['Connecter'] == "true") : ?>
      <input value ="Rechercher.." id="searchBar">
	  <p style="color:white;font-size:25px; padding-left:50px; float:right"> <a class="active" href="ajouter.php">Ajouter</p></a>
	  <p style="color:white;font-size:25px; padding-left:50px; float:right"> <a class="active" href="profil.php"><?php echo $_SESSION['username']; ?></p></a>
	  <?php endif; ?>
	  <?php if ($_SESSION['Connecter'] == "false") : ?>
      <input value ="Rechercher.." id="searchBar">
	  <?php endif; ?>
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
		<h3 align="middle">Photo de Samuel<h3/>
		<h3 align="middle">Titre de la photo<h3/>
        <img src="Images/img1.png" height="150" width="200" class="photosIMG">
		<h3 align="middle">Nombre de commentaires<h3/>
		<p id="date"></p><br>
		<h3 align="middle">Photo de Cedric<h3/>
		<h3 align="middle">Titre de la photo<h3/>
        <img src="Images/img1.png" height="150" width="200" class="photosIMG">
		
		<h3 align="middle">Nombre de commentaires<h3/>
		<p id="date2"></p><br>
		<h3 align="middle">Photo de Joe<h3/>
		<h3 align="middle">Titre de la photo<h3/>
        <img src="Images/img1.png" height="150" width="200" class="photosIMG">
		
		<h3 align="middle">Nombre de commentaires<h3/>
		<p id="date3"></p><br>
		<h3 align="middle">Photo de Sam<h3/>
		<h3 align="middle">Titre de la photo<h3/>
        <img src="Images/img1.png" height="150" width="200" class="photosIMG">
		<h3 align="middle">Nombre de commentaires<h3/>
		<p id="date4"></p><br>
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
