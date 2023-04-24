<?php

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["activite"] = "controleur.activite.php";
    $lesActions["congressiste"] = "controleur.congressiste.php";
    $lesActions["participation"] = "controleur.participation.php";
    $lesActions["defaut"] = "controleur.activite.php";

    
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}

?>