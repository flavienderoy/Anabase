<?php
Class Modele_congressiste{


	public function __construct(){
		$login = "root";
		$mdp = "";
		$bd = "anabase";
		$serveur = "localhost";

		try {
			$this->conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, 
			array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			print "Erreur de connexion PDO ";
			die();
		}
	}



    public function getCongressiste(){
        $req = $this->conn->prepare("SELECT * FROM congressiste");
        $req->execute();

        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getActiviteInscription(){
		$req = $this->conn->prepare ("SELECT * FROM activite");	
		$req->execute();
		
		return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function insertRel1( $numC, $numA){
        $req = $this->conn->prepare ("INSERT INTO rel_1 VALUES(:param1, :param2)");	
        $req->bindValue('param1', $numC);
        $req->bindValue('param2', $numA);
		$req->execute();
    }

	public function getActivitesbyID($num){
		$req = $this->conn->prepare ("SELECT * FROM activite WHERE NUM_ACTIVITE NOT IN (SELECT NUM_ACTIVITE FROM rel_1 WHERE NUM_CONGRESSISTE = :num)");
		$req->bindValue('num', $num);	
		$req->execute();
		
		return $req->fetchAll(PDO::FETCH_OBJ);
	}

	public function getCongressisteID($num){
		$req = $this->conn->prepare ("SELECT * FROM congressiste WHERE NUM_CONGRESSISTE = :num");
		$req->bindValue('num', $num);	
		$req->execute();
		
		return $req->fetch(PDO::FETCH_OBJ);
	}

	public function getAll(){
		$req = $this->conn->prepare ("SELECT * FROM rel_1 r INNER JOIN congressiste c ON c.NUM_CONGRESSISTE = r.NUM_CONGRESSISTE INNER JOIN activite a ON r.NUM_ACTIVITE = a.NUM_ACTIVITE");
		$req->execute();

		return $req->fetchAll(PDO::FETCH_OBJ);
	}

	public function supprparticipation($ida, $idc){
		$req = $this->conn->prepare ("DELETE FROM rel_1 WHERE NUM_ACTIVITE=:ida AND NUM_CONGRESSISTE=:idc");
		$req->bindValue(':ida', $ida);
        $req->bindValue(':idc', $idc);  	
		$req->execute();
	}
}

?>