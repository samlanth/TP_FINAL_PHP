<html>
<style>

  #searchBar{
  width:100%;
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
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
  <div class="grid-template">
    <div class="header">
    <img src="Images/Logo.png" id="logo">
    </div>
    <div class="header">
      <input value ="Rechercher.." id="searchBar">
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
      <div class="photos">
	  <h3> asd<h3/>
		<h3 align="middle">Photo de Samuel<h3/>
		<h3 align="middle">Titre de la photo<h3/>
        <img src="Images/img1.png" class="photosIMG">
		
		<h3 align="middle">Nombre de commentaires<h3/>
		<p id="date"></p><br>
		<h3 align="middle">Photo de Cedric<h3/>
		<h3 align="middle">Titre de la photo<h3/>
        <img src="Images/img1.png" class="photosIMG">
		
		<h3 align="middle">Nombre de commentaires<h3/>
		<p id="date2"></p><br>
		<h3 align="middle">Photo de Joe<h3/>
		<h3 align="middle">Titre de la photo<h3/>
        <img src="Images/img1.png" class="photosIMG">
		
		<h3 align="middle">Nombre de commentaires<h3/>
		<p id="date3"></p><br>
		<h3 align="middle">Photo de Sam<h3/>
		<h3 align="middle">Titre de la photo<h3/>
        <img src="Images/img1.png" class="photosIMG">
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
