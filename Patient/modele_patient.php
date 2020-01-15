<?php

require_once 'mod_generique.php';

class ModelePatient extends ModGenerique {

    public function __construct () {}

    function recupererSoins(){
    	$requete=ModeleConnexion::$bdd->query('SELECT * FROM vaccin');
    	return $requete;
    	$requete->closeCursor();
    }

    function recuperationCoordonnees() 
	{
		$selecPreparee=ModeleConnexion::$bdd->query('SELECT * FROM utilPatient');
		$req = $selecPreparee->fetchAll();
		return $req;
	}
    
}

?>
