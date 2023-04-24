<?php

include_once "./modele/modele.congressiste.php";


class Controleur_congressiste{

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
		$this->vue = "congressiste";
		$this->modele = new Modele_congressiste;

	}

	public function todo_initialiser(){
		$this->data["idC"] = $this->modele->getCongressiste();
		if(isset($this->get["idChoix"])){
			$this->data["idA"] = $this->modele->getActivitesbyID($this->get["idChoix"]);
			$this->data["nom"] = $this->modele->getCongressisteID($this->get["idChoix"]);
			;
		}
	}

	public function todo_Enregistrer(){
		{
			if (!isset($this->get["idChoix"]) || empty($this->post["chkl"])) {
				echo "impossible";
				$this->post["selectC"] = "";
				header("Location:index.php?controleur=participation");
			} else {
				foreach($this->post["chkl"] as $chkl){
				$this->modele->insertRel1($this->get["idChoix"], $chkl);
				echo "insertion réussi";
				header("Location:index.php?controleur=participation");
			}
		}
		}
	}

	}
	

	

