<!doctype html>
<?php session_start(); print_r($_SESSION); 

if (isset($_POST["deconnexion"])) {
	unset($_SESSION["usager"]);
}
?>
<html lang="fr">
	<head>
		<meta charset="utf-8">
	  	<title>Médiathèque Clichy la Garenne</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>

<body>

	<div class="container-fluide accueil">

		<div class="container menu">
			<ul class="nav">
		  	<article class="col-md-4">
		  		<li class="nav-item">
		  		  <a style="text-decoration:none" class="nav-link active" href="index.php"><div class="ecriture_menu">Accueil</div></a>
		  		</li>
		  	</article>
		  	<article class="col-md-4">
		  		<li class="nav-item">
		    	  <a style="text-decoration:none" class="nav-link" href="liste_produit.php"><div class="ecriture_menu">Produits</div></a>
		  		</li>
		  	</article>
		  	<article class="col-md-4">
				<?php
				if (!isset($_SESSION["usager"])) {
					
					echo "<li class=\"nav-item\">
					  <a style=\"text-decoration:none\" class=\"nav-link\" href=\"identification.php\"><div class=\"ecriture_menu\">S'identifier</div></a>
					</li>";
				} else if (!$_SESSION["usager"]["salarie"]) {
					echo "
		  		<li class=\"nav-item\">
		  		  <a style=\"text-decoration:none\" class=\"nav-link\" href=\"./client/mon_compte.php\"><div class=\"ecriture_menu\">Mon Compte</div></a>
		  		</li>
		  		<li class=\"nav-item\">
				<form action=\"#\" method=\"POST\">
		  		  <a style=\"text-decoration:none\" class=\"nav-link\"><input type=\"submit\" name = \"deconnexion\" value = \"\" class=\"btn btn-danger\">Deconnexion</input></a>
		  		</form>
				</li>
					";
				} else {
					echo "
		  		<li class=\"nav-item\">
		  		  <a style=\"text-decoration:none\" class=\"nav-link\" href=\"liste_salarie_salarie.php\"><div class=\"ecriture_menu_salarie\">Salariés</div></a>
		  		</li>
		  		<li class=\"nav-item\">
				<form action=\"#\" method=\"POST\">
		  		  <a style=\"text-decoration:none\" class=\"nav-link\"><input type=\"submit\" name = \"deconnexion\" value = \"\" class=\"btn btn-danger\">Deconnexion</input></a>
		  		</form>
				</li>
					";
				}
				
				?>
		  	</article>
			</ul>
		</div>


		<div class="container contenu_accueil">
			
			<a href="liste_produit.php" class="btn btn-primary btn_accueil" type="button"><img class="img_btn_accueil" src="image/icon_recherche.png"></a>

		</div>

	</div>

</body>
</html>