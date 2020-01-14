<?php

require_once 'modele_globale.php';

class ModelePatient extends ModeleGlobale{

    public function __construct () {}

    function recuperationCoordonnees() 
	{
		$selecPreparee=self::$bdd->query('SELECT * FROM utilPatient');
		$req = $selecPreparee->fetchAll();
		return $req;
	}
    
}

?>
