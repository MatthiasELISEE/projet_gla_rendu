<?php
require("ado.php");
$ado = new Connexion_ADO();
if (isset($_POST["identification"])) {
	if ($ado->identification($_POST['email'], $_POST['mdp'])) {
		header('Location: index.php');
	}
}
?>
<!doctype html>
<html lang="fr">
	<head>
  		<meta charset="utf-8">
  		<title>Identification</title>
  		<link rel="stylesheet" href="css/bootstrap.min.css">
	    <link rel="stylesheet" href="css/style.css">
	</head>
<body>


	<div class="container connexion">
		
		<!-- Formlaire de connexion -->
		<form method="POST">
		  <div class="form-group">
	    		<label for="exampleInputEmail1">@email</label>
	    		<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
	  	  </div>
	  		
	  	  <div class="form-group">
	    		<label for="exampleInputPassword1">Mot de passe</label>
	    		<input type="password" class="form-control" id="exampleInputPassword1" name="mdp">
	  	  </div>
	  	  <button type="submit" class="btn btn-primary" name="identification" >Login</button>
		</form>
		
	</div>
</body>
</html>