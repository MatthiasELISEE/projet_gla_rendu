<div class="container menu">
	<ul class="nav">
	<article class="col-md-4">
		<li class="nav-item">
		  <a style="text-decoration:none" class="nav-link active" href="/projet_gla/index.php"><div class="ecriture_menu">Accueil</div></a>
		</li>
	</article>
	<article class="col-md-4">
		<li class="nav-item">
		  <a style="text-decoration:none" class="nav-link" href="/projet_gla/liste_produit.php"><div class="ecriture_menu">Produits</div></a>
		</li>
	</article>
	<article class="col-md-4">
		<?php
		
		if (isset($_POST["deconnexion"])) {
			unset($_SESSION["usager"]);
		}
		
		if (!isset($_SESSION["usager"])) {
			
			echo "<li class=\"nav-item\">
			  <a style=\"text-decoration:none\" class=\"nav-link\" href=\"/projet_gla/identification.php\"><div class=\"ecriture_menu\">S'identifier</div></a>
			</li>";
		} else /*if (!$_SESSION["usager"]["salarie"])*/ {
			echo "
		<li class=\"nav-item\">
		  <a style=\"text-decoration:none\" class=\"nav-link\" href=\"/projet_gla/client/mon_compte.php\"><div class=\"ecriture_menu\">Mon Compte</div></a>
		</li>
		<li class=\"nav-item\">
		<form action=\"#\" method=\"POST\">
		  <a style=\"text-decoration:none\" class=\"nav-link\"><input type=\"submit\" name = \"deconnexion\" value = \"\" class=\"btn btn-danger\">Deconnexion</input></a>
		</form>
		</li>
			";
		} /*else {
			echo "
		<li class=\"nav-item\">
		  <a style=\"text-decoration:none\" class=\"nav-link\" href=\"/projet_gla/salarie/liste_salarie_salarie.php\"><div class=\"ecriture_menu_salarie\">Salariés</div></a>
		</li>
		<li class=\"nav-item\">
		<form action=\"#\" method=\"POST\">
		  <a style=\"text-decoration:none\" class=\"nav-link\"><input type=\"submit\" name = \"deconnexion\" value = \"\" class=\"btn btn-danger\">Deconnexion</input></a>
		</form>
		</li>
			";
		}*/
		
		?>
	</article>
	</ul>
</div>