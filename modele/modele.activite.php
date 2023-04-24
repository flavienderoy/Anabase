<?php

include_once "modele.connexion.php";

class Modele_activite
{

	public function __construct()
	{
		$login = "root";
		$mdp = "";
		$bd = "anabase";
		$serveur = "localhost";

		try {
			$this->conn = new PDO(
				"mysql:host=$serveur;dbname=$bd",
				$login,
				$mdp,
				array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')
			);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			print "Erreur de connexion PDO ";
			die();
		}
	}

	public function getActivites()
	{
		$req = $this->conn->prepare("SELECT NUM_ACTIVITE, NOM_ACTIVITE, DATE_ACTIVITE, HEURE_ACTIVITE, PRIX_ACTIVITE FROM activite ORDER BY NUM_ACTIVITE");
		$req->execute();

		return $req->fetchAll(PDO::FETCH_OBJ);
	}

	public function getActivitesbyID($num)
	{
		$req = $this->conn->prepare("SELECT NUM_ACTIVITE, NOM_ACTIVITE, DATE_ACTIVITE, HEURE_ACTIVITE, PRIX_ACTIVITE FROM activite WHERE NUM_ACTIVITE = :num");
		$req->bindValue('num', $num);
		$req->execute();

		return $req->fetch(PDO::FETCH_OBJ);
	}

	public function creerActivite($nom, $date, $heure, $prix)
	{
		$req = $this->conn->prepare("INSERT INTO activite VALUES(NULL, :param1 ,:param2, :param3 ,:param4)");
		$req->bindValue('param1', $nom);
		$req->bindValue('param2', $date);
		$req->bindValue('param3', $heure);
		$req->bindValue('param4', $prix);
		$req->execute();
	}

	public function modifActivites($numA, $nomA, $dateA, $heureA, $prixA)
	{
		$req = $this->conn->prepare("UPDATE activite SET NOM_ACTIVITE = :NomA, DATE_ACTIVITE = :DateA, HEURE_ACTIVITE = :HeureA, PRIX_ACTIVITE = :PrixA  WHERE NUM_ACTIVITE = :NumA");
		$req->bindValue(':NumA', $numA);
		$req->bindValue(':NomA', $nomA);
		$req->bindValue(':DateA', $dateA);             // ensemble de paramètres déjà paramétrés dans la requête  
		$req->bindValue(':HeureA', $heureA);       // que l'on relit à des variables qui vont nous servir pour listearbitre.php
		$req->bindValue(':PrixA', $prixA);
		$req->execute();
	}

	public function supprActivites($numA)
	{
		try {
			$req = $this->conn->prepare("DELETE FROM activite WHERE NUM_ACTIVITE=:NumA");
			$req->bindValue(':NumA', $numA);
			$req->execute();
		} catch (PDOException $e) {

			echo ' <div class="alert alert-primary" role="alert">
			Impossible de supprimer cette activité car des congressiste y participe! <a href="./?action=activite" class="alert-link">Cliquer sur le lien pour revenir a la page</a>.
		  </div>
			<br>
			</div>';
			die();
		}
	}
}
