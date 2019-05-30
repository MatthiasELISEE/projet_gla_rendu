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
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/style.css">
	</head>

<body>
<?php
$sql = 'SELECT * FROM action WHERE validee != 1 ORDER BY idAction DESC';
$req = mysqli_query($base, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($base));

if (!empty($_GET)) {
	require("../ado.php");
	$ado = new Action_ADO();
	if ($_GET["validation"]=="valider") {
		$ado->valider_action_ADO($_GET["valider"]);
	} else {
		$ado->annuler_action_ADO($_GET["valider"]);
	}
}
	?>
	<div class="container-fluide accueil">

		<?php
		include("../navigation_menu.php");
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
 							<?php echo $data['descriptionGeneree'] . ' | ' . $data['validee']; ?> 
 							</label>
							
							<form method="GET">
							<a href="liste_action.php?valider=<?php echo $data['idAction']; ?>&validation=valider" class="btn btn-primary" type="button"> Valider</a>
							<a href="liste_action.php?valider=<?php echo $data['idAction']; ?>&validation=annuler" class="btn btn-primary" type="button"> Annuler</a>
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