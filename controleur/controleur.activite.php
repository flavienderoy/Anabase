<?php

include_once "./modele/modele.activite.php";


class Controleur_activite
{
	// --- champs de base du controleur
	public $vue = ""; //vue appelée par le controleur

	public $message = "";
	public $erreur = "";

	public $data; // le tableau des données de la vue

	public $modele; // nom du modele

	public $m; // objet modele

	public $post; // renseigné par index
	public $get;

	// --- Constructeur
	public function __construct()
	{
		// déclarer la vue
		$this->vue = "activite";
		$this->modele = new Modele_activite;

	}
	public function todo_initialiser()
	{
		$this->data["get"] = $this->modele->getActivites();
		if (isset($this->get["idSuppr"])) {
			$this->modele->supprActivites($this->get["idSuppr"]);
			header("Location:index.php?controleur=activite");
		}
		if(isset($this->get["idModif"])){
			$this->data["getby"] = $this->modele->getActivitesbyID($this->get["idModif"]);
		}
	}

	public function todo_Enregistrer()
	{
		if (empty($this->post["nomA"]) || empty($this->post["dateA"]) || empty($this->post["heureA"]) || empty($this->post["prixA"])) {
			echo "impossible";
			$this->post["nomA"] = "";
			$this->post["dateA"] = "";
			$this->post["heureA"] = "";
			$this->post["prixA"] = "";
		} else {
			$this->modele->creerActivite($this->post["nomA"], $this->post["dateA"], $this->post["heureA"], $this->post["prixA"]);
			echo "insertion réussi";
			$this->post["nomA"] = "";
			$this->post["dateA"] = "";
			$this->post["heureA"] = "";
			$this->post["prixA"] = "";
			header("Location:index.php?controleur=activite");
		}
	}
	public function todo_Modifier(){
		if (empty($this->post["nomAM"]) || empty($this->post["dateAM"]) || empty($this->post["heureAM"]) || empty($this->post["prixAM"])) {
			echo "impossible";
			$this->post["nomAM"] = "";
			$this->post["dateAM"] = "";
			$this->post["heureAM"] = "";
			$this->post["prixAM"] = "";
		} else {
			$this->modele->modifActivites($this->get["idModif"],$this->post["nomAM"], $this->post["dateAM"], $this->post["heureAM"], $this->post["prixAM"]);
			header("Location:index.php?controleur=activite");
		}
	}
}
