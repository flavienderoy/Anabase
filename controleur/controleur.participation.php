<?php

include_once "./modele/modele.congressiste.php";


class Controleur_participation{

		// --- champs de base du controleur
		public $vue = ""; //vue appelée par le controleur

		public $message = "";
		public $erreur = "";
	
		public $data; // le tableau des données de la vue
	
		public $modele; // nom du modele
	
		public $m; // objet modele
	
		public $post; // renseigné par index
		public $get;
	
	public function __construct(){
		// déclarer la vue
		$this->vue = "participation";
		$this->modele = new Modele_congressiste;

	}

	public function todo_initialiser(){
		$this->data["All"] = $this->modele->getAll();
        if(isset($this->get["idSupprC"]) && isset($this->get["idSupprA"])){
            $this->modele->supprparticipation($this->get["idSupprA"], $this->get["idSupprC"]);
            header("Location:index.php?controleur=participation");
		}
	}

	public function todo_Enregistrer(){
	}
}
	