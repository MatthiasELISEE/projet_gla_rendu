<?php
session_start();
$servername = "localhost";
$username = "main";
$password = "main";

class Personne {
	private $idPersonne;
	private $email;
	private $prenom;
	private $nom;
	private $mdp;
	
	function __construct($data) {
		print_r($data);
		$this->idPersonne = $data["idPersonne"];
		$this->email = $data["email"];
		$this->prenom = $data["prenom"];
		$this->nom = $data["nom"];
		$this->mdp = $data["mdp"];
	}
	
	function getIdPersonne(){
		return $this->idPersonne;
	}
	function getEmail(){
		return $email;
	}
	function setEmail($login){
		$this->email = $login;
	}
	function getNom(){
		return $this->nom;
	}
	function setNom($nom) {
		$this->nom = $nom;
	}
	function getMdp(){
		return $this->mdp;
	}
	function setMdp($mdp){
		$this->mdp = $mdp;
	}
	function getPrenom(){
		return $this->nom;
	}
	function setPrenom($nom){
		$this->prenom = $nom;  
	}
}

class Salarie extends Personne {
	private $estManager;
	
	function __construct($data) {
		parent::__construct($data);
		$this->estManager = $data["estManager"];
	}
	
	function getDroitManager(){
		return $this->estManager;   
	}
	function setDroitManager($manager){
		$this->estManager = $manager;
	}
}

class Client extends Personne {
	private $adresseClient;
	private $soldeClient;
	private $compteValide;
	
	function __construct($data) {
		parent::__construct($data);
		$this->adresseClient = $data["adresseClient"];
		$this->soldeClient = $data["soldeClient"];
		$this->compteValide = $data["compteValide"];
	}
	
	function getAdresse(){
		return $this->adresseClient;   
	}
	function setAdresse($adresse){
		$this->adresseClient= $adresse;
	}
	function getSolde() {
		return $this->soldeClient;
	}
	function setSolde($solde) {
		return $this->soldeClient;
	}
	function getCompteValide() {
		return $this->compteValide;
	}
	function setCompteValide($validation) {
		$this->compteValide = $validation;
	}
}

class Action {
	public $idAction;
    public $descriptionGeneree;
    public $validee;
    public $sqlPourAnnulerAction;
    
	function __construct($data) {
		$this->idAction = $data["idAction"];
		$this->descriptionGeneree = $data["descriptionGeneree"];
		$this->validee = $data["validee"];
		$this->sqlPourAnnulerAction = $data["sqlPourAnnulerAction"];
	}
	
    function getId(){
    	return $this->idAction;
    }
    function getDescription(){
    	return $this->descriptionGeneree;
    }
    function setDescription($description){
    	$this->descriptionGeneree = $description;
    }
    function valider($validation){
		$validee = (int)$validation;
    }
    function getSql(){
    	return $this->sqlPourAnnulerAction;
    }
    function setSql($sql){
    	$this->sqlPourAnnulerAction = $sql;
    }
}

class Produit {
    private $idProduit;
    private $nomProduit;
    private $auteur;
    private $etat;
    private $categorie;
    private $edition;
    private $datePublic;
    private $quantite;
    private $noteDocument;
    private $description;
	
    private $emprunts;
    private $reservations;
	
	function __construct($data) {
		print_r($data);
		$this->idProduit = $data["idProduit"];
		$this->nomProduit = $data["nomProduit"];
		$this->auteur = $data["auteur"];
		$this->etat = $data["etat"];
		
		if ($data["edition"] === null) {
			$this->edition = "";
		} else {
			$this->edition = $data["edition"];
		}
		$this->datePublic = $data["datePublic"];
		$this->quantite = $data["quantite"];
		
		if ($data["noteDocument"] == -1) {
			$this->noteDocument = "Aucune note pour l'instant";
		} else {
			$this->noteDocument = $data["noteDocument"];
		}
		if ($data["description"] === null) {
			$this->description = "";
		} else {
			$this->description = $data["description"];
		}
	}
	
    function getIdProduit(){
    	return $this->idProduit;
    }
    function setIdProduit($idProduit){
		$this->idProduit = $idProduit;
    }
    function getNomProduit(){
		return $this->nomProduit;
    }
    function setNomProduit($nom){
    	$this->nomProduit = $nom;
    }
    function getAuteur(){
		return $this->auteur;
    }
    function setAuteur($auteur){
    	$this->auteur = $auteur;
    }
    function getEtat(){
    	return $this->etat;
    }
    function setEtat($etat){
    	$this->etat = $etat;
    }
    function getEdition(){
		return $this->edition;
    }
    function setEdition($edition){
    	$this->edition = $edition;
    }
    function getDatePublic(){
    	return $this->datePublic;
    }
    function setDatePublic(){
		$this->datePublic = $datePublic;
    }
    function getQuantite(){
		return $this->quantite;
    }
    function setQuantite($quantite){
    	$this->quantite = $quantite;
    }
    function getNoteProduit(){
    	return $this->noteDocument;
    }
    function setNoteProduit($noteDocument){
    	$this->noteDocument = $noteDocument;
    }
    function getDescription(){
    	return $this->description;
    }
    function setDescription($description){
    	$this->description = $description;
    }
	
	// NOT TESTED FUNCTION
	function setEmprunts($data) {
		/*$this->emprunts = array();
		foreach ($data as $row) {
			array_push($this->emprunts, new Emprunt($row));
		}*/
	}
	
	function setReservations($data) {
		/*$this->reservations = array();
		foreach ($data as $row) {
			array_push($this->reservations, new Reservation($row));
		}*/	
	}
	
    function getEmprunts(){
    	return $this->emprunts;	
    }
    function getReservations(){
		return $this->reservations;
    }
}

class Emprunt {
    private $idEmprunt;
    private $idClient;
    private $idProduit;
    private $date_emprunt;
    private $date_retour;
    public $produit;
	
	function __construct($data) {
		print_r($data);
		$this->idEmprunt = $data["idEmprunt"];
		$this->idClient = $data["idClient"];
		$this->idProduit = $data["idProduit"];
		$this->date_emprunt = $data["date_emprunt"];
		$this->date_retour = $data["date_retour"];
	}
	
	function setProduit($produit) {
		$this->produit = $produit;
	}
	
    function getIdEmprunt(){
    	return $this->idEmprunt;
    }
    function getIdClient(){
    	return $this->idClient;
    }
    function getIdProduit(){
    	return $this->idProduit;
    }
    function setIdProduit($idProduit){
    	$this->idProduit = $idProduit; 
    }
    function getDate_emprunt(){
    	return $this->date_emprunt;	
    }
    function getDate_retour(){
    	return $this->date_retour;
    }
    function setDate_retour($date){
    	$this->date_retour = $date;
    }
}

class Reservation {
    private $idReservation;
    private $idClient;
    private $idProduit;
    private $date_reserve;
    private $date_retour;
    public $produit;
	
	function __construct($data) {
		print_r($data);
		$this->idReservation = $data["idReservation"];
		$this->idClient = $data["idClient"];
		$this->idProduit = $data["idProduit"];
		$this->date_reserve = $data["date_reserve"];
		$this->date_retour = $data["date_retour"];
	}
	
	function setProduit($produit) {
		$this->produit = $produit;
	}
	
    function getIdReservation(){
    	return $this->idReservation;
    }
    function getIdClient(){
    	return $this->idClient;
    }
    function getIdProduit(){
    	return $this->idProduit;
    }
    function setIdProduit($idProduit){
    	$this->idProduit = $idProduit; 
    }
    function getDate_reserve(){
    	return $this->date_reserve;	
    }
    function getDate_retour(){
    	return $this->date_retour;
    }
    function setDate_retour($date){
    	$this->date_retour = $date;
    }
}

class Actions_ADO {
	static function createAction($connection, $description, $sqlPourAnnuler) {
		$sqlPourAnnuler = $connection->real_escape_string($sqlPourAnnuler);
		$result = $connection->query("INSERT INTO db.Action (descriptionGeneree, sqlPourAnnulerAction) VALUES ('$description',\"$sqlPourAnnuler\")");
		echo "INSERT INTO db.Action (descriptionGeneree, sqlPourAnnulerAction) VALUES ('$description','$sqlPourAnnuler')";
		if (!$result) {
			print_r($connection->error_list);
		}
	}
}

class Info_Salarié_ADO {
	public $vue;
	public $salarie;
	public $connection;
	
	function __construct($id) {
		$this->connection = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"]);
		if ($this->connection->connect_error) {
			die("Connection failed: " . $this->connection->connect_error);
		}
		echo "SELECT * FROM db.Personne, db.Salarie WHERE db.Salarie.idPersonne=$id AND db.Salarie.idPersonne = db.Personne.idPersonne";
		$result = $this->connection->query("SELECT * FROM db.Personne, db.Salarie WHERE db.Salarie.idPersonne=$id AND db.Salarie.idPersonne = db.Personne.idPersonne");
		if (!$result or $result->num_rows == 0) {
			print_r($this->connection->error_list);
			die("Etes vous sur que ce salarié existe");
		}
		
		$this->salarie = new Salarie($result->fetch_assoc());
	}
	
	function supprimerSalarie_ADO(){
		$id = $this->salarie->getIdPersonne();
		
		$result = $this->connection->query("DELETE FROM db.Personne WHERE idPersonne=$id");
		// Supprimer la personne supprime aussi dans la table salarie.
		if (!$result) {
			print_r($this->connection->error_list);
			echo "Echec de la suppression.";
		}
		
		// Création de l'action correspondante.
		$nom = $this->salarie->getNom();
		$description = "Suppression du salarie $nom. Cette action ne peut pas etre annulée.";
		$sqlPourAnnuler = "";
		
		Actions_ADO::createAction($this->connection, $description, $sqlPourAnnuler);
	}
	
	function affiche_ListeSalarie_ADO(){
		// TODO
	}
}

class Info_Produit_ADO {
    public $vue;
    public $produit;
	
	function __construct($id) {
		$this->connection = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"]);
		if ($this->connection->connect_error) {
			die("Connection failed: " . $this->connection->connect_error);
		}
		
		if (isset($id)) {
			echo "SELECT * FROM db.Produit WHERE db.Produit.idProduit=$id";
			$result = $this->connection->query("SELECT * FROM db.Produit WHERE db.Produit.idProduit=$id");
			if (!$result or $result->num_rows == 0) {
				print_r($this->connection->error_list);
				die("Etes vous sur que ce produit existe");
			}
			
			$this->produit = new Produit($result->fetch_assoc());
			
			echo "SELECT * FROM db.Emprunt WHERE Emprunt.idProduit=$id";
			$result = $this->connection->query("SELECT * FROM db.Emprunt WHERE Emprunt.idProduit=$id");
			if (!$result) {
				print_r($this->connection->error_list);
				die("Etes vous sur que ce produit existe");
			}
			
			echo "SELECT * FROM db.Reservation WHERE Reservation.idProduit=$id";
			$result = $this->connection->query("SELECT * FROM db.Reservation WHERE Reservation.idProduit=$id");
			if (!$result) {
				print_r($this->connection->error_list);
				die("Etes vous sur que ce produit existe");
			}
			
			$this->produit->setEmprunts($result->fetch_all(MYSQLI_ASSOC));
			$this->produit->setReservations($result->fetch_all(MYSQLI_ASSOC));
		}
	}
	
	function quantiteDisponible() {
		$q = $this->produit->getQuantite();
		$id = $this->produit->getIdProduit();
		$idClient = $_SESSION["usager"]["idPersonne"];
		echo "SELECT * FROM db.Emprunt WHERE Emprunt.idProduit=$id AND Emprunt.idClient!=$idClient";
		$result = $this->connection->query("SELECT * FROM db.Emprunt WHERE Emprunt.idProduit=$id AND Emprunt.idClient!=$idClient");
		if (!$result) {
			print_r($this->connection->error_list);
			die("Etes vous sur que ce produit existe");
		}
		
		$q -= $result->num_rows;
		
		echo "SELECT * FROM db.Reservation WHERE Reservation.idProduit=$id AND Reservation.idClient!=$idClient";
		$result = $this->connection->query("SELECT * FROM db.Reservation WHERE Reservation.idProduit=$id AND Reservation.idClient!=$idClient");
		if (!$result) {
			print_r($this->connection->error_list);
			die("Etes vous sur que ce produit existe");
		}
		$q -= $result->num_rows;

		return $q;
	}
	
	function produitEtClient_ADO() {
		$id = $this->produit->getIdProduit();
		$idClient = $_SESSION["usager"]["idPersonne"];
		$result = $this->connection->query("SELECT * FROM db.Emprunt WHERE Emprunt.idProduit=$id AND Emprunt.idClient=$idClient");
		if (!$result) {
			print_r($this->connection->error_list);
			die("Etes vous sur que ce produit existe");
		}
		if ($result->num_rows > 0) {
			return "Vous avez déjà emprunté ce livre.";
		}
		
		$result = $this->connection->query("SELECT * FROM db.Reservation WHERE Reservation.idProduit=$id AND Reservation.idClient=$idClient");
		if (!$result) {
			print_r($this->connection->error_list);
			die("Etes vous sur que ce produit existe");
		}
		if ($result->num_rows > 0) {
			return "Vous avez déjà réservé ce produit. Vous pouvez venir l'emprunter.";
		}
		return "";
	}
	
    function modifierProduit_ADO($data){
    	$id = $this->produit->getIdProduit();
		print_r($data);
		$result = $this->connection->query("UPDATE db.Produit
		SET "
		."nomProduit='".$data["nomProduit"]
		."', auteur='".$data["auteur"]
		."', etat='".$data["etat"]
		."', edition='".$data["edition"]
		."', datePublic='".$data["datePublic"]
		."', quantite='".$data["quantite"]
		."', noteDocument='".$data["noteDocument"]
		."', description='".$data["description"]
		."' WHERE idProduit=$id");
		if (!$result) {
			print_r($this->connection->error_list);
			echo "Echec de la suppression.";
		}
		
		// Création de l'action correspondante.
		$nom = $this->produit->getNomProduit();
		$p = $this->produit;
		$description = "Suppression du produit $nom. ";
		$sqlPourAnnuler = "INSERT INTO db.Produit (idProduit, nomProduit, auteur, etat, edition, datePublic, quantite, noteDocument, description) VALUES (".$p->getIdProduit().",'".$p->getNomProduit()."','".$p->getEtat()."','".$p->getDatePublic()."','".$p->getQuantite()."','".$p->getNoteProduit()."','".$p->getDescription()."')";
		
		Actions_ADO::createAction($this->connection, $description, $sqlPourAnnuler);
    }
    function supprimerProduit_ADO(){
    	$id = $this->produit->getIdProduit();
		
		$result = $this->connection->query("DELETE FROM db.Produit WHERE idProduit=$id");
		if (!$result) {
			print_r($this->connection->error_list);
			echo "Echec de la suppression.";
		}
		
		// Création de l'action correspondante.
		$nom = $this->produit->getNom();
		$p = $this->produit;
		$description = "Suppression du produit $nom. ";
		$sqlPourAnnuler = $sql = "INSERT INTO db.Produit (idProduit, nomProduit, auteur, etat, edition, datePublic, quantite, noteDocument, description) VALUES (".$p->getIdProduit()."','".$p->getNomProduit()."','".$p->getAuteur()."','".$p->getEtat()."','"."','".$p->getEdition().$p->getDatePublic()."','".$p->getQuantite()."','".$p->getNoteProduit()."','".$p->getDescription()."')";
		
		Actions_ADO::createAction($this->connection, $description, $sqlPourAnnuler);
    }
    function emprunterProduit_ADO(){
		if ($this->quantiteDisponible() <=0) {
			$idClient = $_SESSION["usager"]["idPersonne"];
			$idProduit = $this->produit->getIdProduit();
			$sql = "INSERT INTO db.Emprunt (idClient, idProduit, date_emprunt) VALUES ('$idClient', '$idProduit', CURRENT_TIMESTAMP)";
			
			$result = $this->connection->query($sql);
			if (!$result) {
				print_r($this->connection->error_list);
				echo "Echec de la suppression.";
			} else {
				die("Emprunt effectué !");
			}
		}
    }
	function reserverProduit_ADO(){
		if ($this->quantiteDisponible() <=0) {
			$idClient = $_SESSION["usager"]["idPersonne"];
			$idProduit = $this->produit->getIdProduit();
			$sql = "INSERT INTO db.Reservation (idClient, idProduit, date_reserve) VALUES ('$idClient', '$idProduit', CURRENT_TIMESTAMP)";
			
			$result = $this->connection->query($sql);
			if (!$result) {
				print_r($this->connection->error_list);
				echo "Echec de la suppression.";
			} else {
				die("Emprunt effectué !");
			}
		}
    }
    function ajouterProduit_ADO($data){
    	$this->produit = new Produit($data);
		$p = $this->produit;
		$sql = "INSERT INTO db.Produit (nomProduit, auteur, etat, edition, datePublic, quantite, noteDocument, description) VALUES ('".$p->getNomProduit()."','".$p->getAuteur()."','".$p->getEtat()."','"."','".$p->getEdition().$p->getDatePublic()."','".$p->getQuantite()."','".$p->getNoteProduit()."','".$p->getDescription()."')";
		echo $sql;
		$result = $this->connection->query($sql);
		if (!$result) {
			print_r($this->connection->error_list);
			echo "Echec de l'ajout.";
		}
    }
    function prolongerEmprunt_ADO(){
    	// TODO	
    }
}

class Action_ADO {
    public $vue;
    public $actions;
	
	function __construct() {
		$this->connection = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"]);
		if ($this->connection->connect_error) {
			die("Connection failed: " . $this->connection->connect_error);
		}
		
		$result = $this->connection->query("SELECT * FROM db.Action");
		if (!$result or $result->num_rows == 0) {
			print_r($this->connection->error_list);
			die("Pas d'actions !");
		}
		$this->actions = $result->fetch_all(MYSQLI_ASSOC);
	}
	
    function valider_action_ADO($id){
    	$this->actions[$id]["validee"] = 1;
		$result = $this->connection->query("UPDATE db.Action SET validee=1 WHERE idAction=$id");
		if (!$result) {
			print_r($this->connection->error_list);
			echo "Echec de la validation.";
		}
    }
    function annuler_action_ADO($id){
    	$this->actions[$id]["validee"] = -1;
		$result = $this->connection->query("UPDATE db.Action SET validee=1 WHERE idAction=$id");
		if (!$result) {
			print_r($this->connection->error_list);
			echo "Echec de l'annulation.";
		}
		
		print_r ($this->actions[$id]);
		if ($this->actions[$id]["sqlPourAnnulerAction"] == "") {
			echo "Malheureusement cette action précise ne peut pas réellement etre annulée. Les données ont déjà été perdues.";
		} else {
			$result = $this->connection->query($this->actions[$id]["sqlPourAnnulerAction"]);
			if (!$result) {
				print_r($this->connection->error_list);
				echo "Echec de l'annulation.";
			} else {
				$result = $this->connection->query("DELETE FROM db.Action WHERE idAction=$id");
				if (!$result) {
					print_r($this->connection->error_list);
					echo "Echec de l'annulation.";
				}
				unset($actions[$id]);
			}
		}
    }
}


class Connexion_ADO {
    public $vue;
	public $connection;
	
	function __construct() {
		$this->connection = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"]);
		if ($this->connection->connect_error) {
			die("Connection failed: " . $this->connection->connect_error);
		}
	}
	
    function identification($email,$mdp){
	    $result = $this->connection->query("SELECT * FROM db.Personne where Personne.email='$email'");
		if (!$result) {
			print_r($this->connection->error_list);
			die("Echec de la connexion.");
		}
		
		$personne = new Personne($result->fetch_assoc());
		
	    if ($personne->getMdp() == trim($mdp)) {
			$usager["email"] = trim($email);
			$usager["prenom"] = $personne->getPrenom();
			$usager["nom"] = $personne->getNom();
			$usager["idPersonne"] = $personne->getIdPersonne();
			
			$id = $personne->getIdPersonne();
			$salarie = $this->connection->query("SELECT * FROM db.Salarie where Salarie.idPersonne = $id");
			if (!$salarie) {
				print_r($this->connection->error_list);
				echo "Echec de la requête SQL.";
			}
			
			if ($salarie->num_rows > 0) {
				$usager["salarie"] = 1;
				$usager["estManager"] = $salarie->fetch_assoc()["estManager"];
			} else {
				$usager["salarie"] = 0;
			}
			
			$_SESSION["usager"] = $usager;
			return true;
		 //   return VueAccueil; faut dire que la personne accéde a l'accueil du site 
	    }
	    else {
			echo "Connexion échouée, merci de vérifier vos identifiants !";
		    // echo "Connexion échoué, merci de vérifier vous identifiants !";
			return false;
		    // return VueConnexion ; renvoie la personne vers l'interface connexion pour qu'il réessaye.
	    }
    }
}

$connexion = new Connexion_ADO();
$connexion->identification("test","b");


class Inscription_ADO {
	public $vue;
	public $client;
	
	function __construct() {
		$this->connection = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"]);
		if ($this->connection->connect_error) {
			die("Connection failed: " . $this->connection->connect_error);
		}
	}
	
	function inscription($data){
		$email = $data["emailClient"];
		$nom = $data["nomClient"];
		$prenom = $data["prenomClient"];
		$mdp = $data["mdpClient"];
		$adresseClient = $data["addrClient"];
		
		$result = $this->connection->query("INSERT INTO db.Personne (email, prenom, nom, mdp) VALUES('$email','$prenom','$nom','$mdp')");
		if (!$result) {
			print_r($this->connection->error_list);
			die("Echec de l'inscription.");
		}
		
		$result = $this->connection->query("INSERT INTO db.Client (adresseClient) VALUES ('$adresseClient')");
		if (!$result) {
			print_r($this->connection->error_list);
			die("Echec de l'inscription.");
		} else {
			echo "Compte créé";
		}
	}
}

class Liste_Salarié_ADO {
    public $salaries;
    public $recherche;
    public $vue;
	
	function __construct() {
		$this->connection = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"]);
		if ($this->connection->connect_error) {
			die("Connection failed: " . $this->connection->connect_error);
		}
	}
    function affiche_infoSalarie_ADO($id){
			$result = $this->connection->query("SELECT * FROM db.Personne WHERE idPersonne=$id");
			if (!$result) {
				print_r($this->connection->error_list);
				echo "Cette personne est introuvable.";
			}
    }
    function recherche(){
    	// TODO	
    }
}
class Mon_Compte_ADO {
    public $vue;
    public $client;
	function __construct($id) {
		
		$this->connection = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"]);
		if ($this->connection->connect_error) {
			die("Connection failed: " . $this->connection->connect_error);
		}
		
		$result = $this->connection->query("SELECT * FROM db.Personne, db.Client WHERE Personne.idPersonne='$id' AND Client.idPersonne = Personne.idPersonne");
		if (!$result or $result->num_rows == 0) {
			print_r($this->connection->error_list);
			echo "Personne introuvable.";
		}
		
		$this->client = new Client($result->fetch_assoc());
	}
	
    function affiche_Accueil_ADO(){
    	// TODO
    }
}
class Liste_Produit_ADO {
    public $vue;
    public $produits;
	
	function __construct() {
		$this->connection = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"]);
		if ($this->connection->connect_error) {
			die("Connection failed: " . $this->connection->connect_error);
		}
	}
	
    function affiche_Accueil_ADO(){
    	// TODO	
    }
    function supprimerProduit($id){
		$result = $this->connection->query("DELETE FROM PRODUIT WHERE idProduit='$id'");
		if (!$result) {
			print_r($this->connection->error_list);
			echo "Erreur lors de la suppression du produit.";
		}
    }
}
		
class Liste_Client_ADO {
    public $affiche_NouveauClient_ADO;
    public $vue;
    public $clients;
	    
	function __construct() {
		$this->connection = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"]);
		if ($this->connection->connect_error) {
				die("Connection failed: " . $this->connection->connect_error);
		}
	}
    function ajouterClient_ADO($email, $mdp, $nom, $prenom){
    	$result = $this->connection->query("INSERT INTO Client VALUES (seq_client.nextval,'$email', '$prenom', '$nom', '$mdp'");
			if (!$result) {
			print_r($this->connection->error_list);
			echo "Erreur lors de l'ajout du client.";}
    }
    function supprimerClient_ADO($id){
    	$result = $this->connection->query("DELETE FROM Personne WHERE idPersonne='$id'");
		if (!$result) {
			print_r($this->connection->error_list);
			echo "Erreur lors de la supression du client.";
		}
    }
    function affiche_InfoClient_ADO($id){
		$vue->affiche_InfoClient($id);
    	// $result = $this->connection->query("SELECT * FROM Client WHERE id=$id");
		// if (!$result) {
			// print_r($this->connection->error_list);
			// echo "Client Introuvable";
		// }
    }
    function affiche_Accueil_ADO(){
    	// TODO	
    }
}
		
		
class Nouveaux_Clients_ADO {
    public $vue;
    public $clients;
	function __construct() {
		$this->connection = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"]);
		if ($this->connection->connect_error) {
			die("Connection failed: " . $this->connection->connect_error);
		}
	}
	
    function valider_Compte_ADO($id){
    	$result = $this->connection->query("UPDATE Client SET CompteValide=1 WHERE id='$id'");
			if (!$result) {
			print_r($this->connection->error_list);
			echo "Erreur lors de la modification d'un client.";}
    }
    function affiche_InfoClient_ADO(){
    	// TODO	
    }
}