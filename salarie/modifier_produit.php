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
		$idProd = $_REQUEST['idProduit'];
		$sql = 'SELECT * FROM produit WHERE idProduit="'. $idProd .'"';
		$req = mysqli_query($base, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());
		
		if (isset($_POST["modification"])) {
			include("../ado.php");
			$ado = new Info_Produit_ADO($idProd);
			if (isset($_REQUEST['idProduit'])) {
				$ado->modifierProduit_ADO($_POST);
			} else {
				$ado->ajouterProduit_ADO($_POST);
			}
		}
		
		
		$data = mysqli_fetch_assoc($req);
		print_r($data);
	?>
	<div class="container-fluide accueil">

		<?php include("../navigation_menu.php")?>


		<div class="container contenu_accueil">
			</br>
			<h2 class="display-3 text-center bg-info py-4 mb-3 d-none d-md-block">Modification</h2>
			</br>

			<form method="post" >
			  <div class="form-group">
    			<label >Nom Produit</label>
    			<input type="text" class="form-control" name="nomProduit" value="<?php echo $data['nomProduit']; ?>">
  			  </div>
  			  <div class="form-group">
    			<label >Auteur</label>
    			<input type="text" class="form-control" name="auteur" value="<?php echo $data['auteur']; ?>">
  			  </div>
			  <div class="form-group">
    			<label >Etat</label>
    			<input type="text" class="form-control" name="etat" value="<?php echo $data['etat']; ?>">
  			  </div>
			  <div class="form-group">
    			<label >Date de publication</label>
    			<input type="text" type="date" class="form-control" name="datePublic" value="<?php echo $data['datePublic']; ?>">
  			  </div>
			  <div class="form-group">
    			<label >Quantité</label>
    			<input type="text" class="form-control" name="quantite" value="<?php echo $data['quantite']; ?>">
  			  </div>
			  <div class="form-group">
    			<label >Note du document</label>
    			<input type="text" class="form-control" name="noteDocument" value="<?php echo $data['noteDocument']; ?>">
  			  </div>
			  <div class="form-group">
    			<label >Edition</label>
    			<input type="text" class="form-control" name="edition" value="<?php echo $data['edition']; ?>">
  			  </div>
			  <div class="form-group">
			    <label >Description</label>
			    <textarea class="form-control" rows="3" name="description" value="<?php echo $data['description']; ?>"></textarea>
			  </div>
			  	<button type="submit" class="btn btn-primary" name="modification">Modifier</button>
			</form>

		</div>

	</div>

</body>
</html>