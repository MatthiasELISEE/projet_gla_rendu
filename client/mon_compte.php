<!doctype html>
<?php
session_start();
		// connexion base
		$base = mysqli_connect ('localhost', 'main', 'main', 'db');

?>
<html lang="fr">
	<head>
		<meta charset="utf-8">
	  	<title>Médiathèque Clichy la Garenne</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/style.css">
	</head>

<body>
	<?php
	print_r($_SESSION);
	$idClient = $_SESSION['usager']["idPersonne"];	
	$sql = 'SELECT * FROM client,personne WHERE personne.idPersonne='. $idClient .' AND personne.idPersonne=client.idPersonne' ;

	$req = mysqli_query($base, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());
 
	$data = mysqli_fetch_assoc($req);
	?>
	<div class="container-fluide accueil">

		<?php
		include("../navigation_menu.php");
		?>



		<div class="container contenu_accueil">
			<div class="info_compte">
			
			<div class="col-md-2"></div>
			<!-- Variable nom php -->
			<div class="col-md-2"><img class="img_btn_accueil" src="../image/photo_de_profil.png"></div>
				<div class="col-md-6 ">
				<ul class="list-group">
				  <li class="list-group-item disabled">Nom: <?php echo $data['nom'] ?></li>
				  <li class="list-group-item">Prénom: <?php echo $data['prenom'] ?></li>
				  <li class="list-group-item">email: <?php echo $data['email'] ?></li>
				  <li class="list-group-item">Solde: <?php echo $data['soldeClient'] ?></li>
				</ul>
				</div>

			<div class="col-md-3"></div>
			
			</div>
		</div>
		</div>

	</div>

</body>
</html>