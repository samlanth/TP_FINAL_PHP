<?php
	session_start();
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
	<h1>Home</h1>
</div>
	<div><h4>Welcome  <?php echo $_SESSION['username']; ?></h4></div>

</body>
</html>
 