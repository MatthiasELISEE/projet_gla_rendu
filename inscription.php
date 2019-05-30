<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
	  	<title>Médiathèque Clichy la Garenne</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/style.css">
	</head>

<body>
<?php
	require("vue.php"); 
	$vue = new VueInscription();
	if (isset($_POST["inscrire"])) {
		$vue->inscription($_POST);
	}
?>
	<div class="container-fluide accueil">

		<div class="container menu">

			<!-- MENU -->
			<ul class="nav">
			<div class="col-md-1"></div>
		  	<article class="col-md-2">
		  		<li class="nav-item">
		  		  <a style="text-decoration:none" class="nav-link active" href="index_salarie.php"><div class="ecriture_menu_salarie">Accueil</div></a>
		  		</li>
		  	</article>
		  	<article class="col-md-2">
		  		<li class="nav-item">
		    	  <a style="text-decoration:none" class="nav-link" href="liste_produit_salarie.php"><div class="ecriture_menu_salarie">Produits</div></a>
		  		</li>
		  	</article>
		  	<article class="col-md-2">
		  		<li class="nav-item">
		  		  <a style="text-decoration:none" class="nav-link" href="liste_client_salarie.php"><div class="ecriture_menu_salarie">Clients</div></a>
		  		</li>
		  	</article>
		  	<article class="col-md-2">
		  		<li class="nav-item">
		  		  <a style="text-decoration:none" class="nav-link" href="liste_salarie_salarie.php"><div class="ecriture_menu_salarie">Salariés</div></a>
		  		</li>
		  	</article>
		  	<article class="col-md-2">
		  		<li class="nav-item">
		  		  <a style="text-decoration:none" class="nav-link"><div class="btn btn-danger">Deconnexion</div></a>
		  		</li>
		  	</article>
			</ul>
		</div>


		<div class="container contenu_accueil">
			</br>
				<h2 class="display-3 text-center bg-info py-4 mb-3 d-none d-md-block">Ajouter</h2>
			</br>
			
			<!-- Formulaire d'AJOUT -->
			<form method="POST" action="">
			  <div class="form-group">
    			<label for="formGroupExampleInput">Nom</label>
    			<input type="text" class="form-control" id="formGroupExampleInput" name="nomClient">
  			  </div>

  			  <div class="form-group">
    			<label for="formGroupExampleInput">Prénom</label>
    			<input type="text" class="form-control" id="formGroupExampleInput" name="prenomClient">
  			  </div>
  			  
  			  <div class="form-group">
    			<label for="formGroupExampleInput">email</label>
    			<input type="text" class="form-control" id="formGroupExampleInput" name="emailClient">
  			  </div>
			  
  			  <div class="form-group">
    			<label for="formGroupExampleInput">Mots de passe</label>
    			<input type="text" class="form-control" id="formGroupExampleInput" name="mdpClient">
  			  </div>

			  <div class="form-group">
			    <label for="exampleFormControlTextarea1">Adresse</label>
			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="addrClient"></textarea>
			  </div>
			  <button type="submit" class="btn btn-primary" name="inscrire">S'inscrire</button>
			</form>

		</div>

	</div>

</body>
</html>