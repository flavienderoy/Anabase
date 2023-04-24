<?php 
include "./controleur/controleurPrincipal.php";

//--- controleur
if (isset($_REQUEST["controleur"])){
    $controleur = $_REQUEST["controleur"];
}
else{   
    $controleur = "defaut";
}

$fichier = controleurPrincipal($controleur);
include "./controleur/$fichier";

$pos1 = strpos($fichier,".");
$pos2 = strpos($fichier,".",$pos1+1);
$controleur = substr($fichier,$pos1+1, $pos2-$pos1-1);

// -- instanciation du controleur 
//    (par exemple : $class = "Controleur_hello" )
$class = "Controleur_".$controleur;
$c=new $class();

// -- renseigne le champ post du controleur instancié	
$c->post = $_POST;
$c->get = $_GET;

		
//--- todo : callback
if (isset($_REQUEST["todo"])){  //chercher
    $todo = $_REQUEST["todo"];
}
else{
    
    $todo = "initialiser";
}

$callback="todo_".$todo;
$call=call_user_func_array(array($c,$callback), array()); 

include_once "./vue/entete.html.php";
include ("./vue/vue." . $c->vue . ".php");
include_once "./vue/pied.html.php";
?>
     