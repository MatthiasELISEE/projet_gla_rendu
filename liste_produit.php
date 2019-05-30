<!doctype html>
<?php
session_start();
// connexion base
$base = mysqli_connect ('localhost', 'main', 'main', 'db');
?>
<html lang="fr">
	<head>
		<meta charset="utf-8">
	  	<title>Liste Produit</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>

<body>
<?php
$sql = 'SELECT * FROM produit';
$req = mysqli_query($base, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($base));
	?>
	<div class="container-fluide accueil">

		<?php
		include("navigation_menu.php");
		?>

		<div class="col-md-1"></div>
		<div class="container contenu_liste_produit">
			<?php
			if (isset($_SESSION["usager"])) {
			if ($_SESSION["usager"]["salarie"]) { echo "<a href='./salarie/modifier_produit.php'> <button class='btn btn-primary'>Nouveau produit</button> </a>"; } 
			}?>
			<!-- Search form -->
			</br>
			<div class="col-md-1"></div>
			<div class="col-md-7">
				<form class="form-inline md-form mr-auto mb-4">
				<!-- Bouton de recherche -->
			  <input class="form-control mr-sm-2" type="text" placeholder="Recherche Produit" aria-label="Search">
			  <button class="btn btn-elegant btn-rounded btn-sm my-0" type="submit">Rechercher</button>
			</form>
			</div>

			</br>

			<form>
			<div class="form-group">
				
				</br>

				<div class="col-md-6"></div>
				<ul class="list-group col-md-11">
					<?php
					while ($data = mysqli_fetch_array($req))
					{
					?>
					<li class="list-group-item">
						<div class="form-check"> <input type="radio" class="form-check-input" id="materialUnchecked" name="materialExampleRadios">
  						<!-- Affichage liste produit-->
 							<label class="form-check-label" for="materialUnchecked">
 							<?php echo $data['nomProduit'] . ' | ' . $data['auteur'] . ' | ' . $data['edition']. ' | ' .$data['quantite']; ?> 
 							</label>
							<form method="GET">
							<a href="fiche_produit.php?idProduit=<?php echo $data['idProduit']; ?>" class="btn btn-primary" type="button" name="idProduit" value="<?php echo $data['idProduit']; ?>" >Info</a>
							</form>
						</div>
					</li>
					<?php 
					}
					mysqli_free_result ($req);
					mysqli_close ($base);
					?>
				</ul>

			</div>
			</form>
		</div>

	</div>

</body>
</html>