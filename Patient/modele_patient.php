<?php

class ModelePatient {

    public function __construct () {}

    function recuperationCoordonnees() 
	{
		$selecPreparee=self::$bdd->query('SELECT * FROM utilPatient');
		$req = $selecPreparee->fetchAll();
		return $req;
	}
    
}

?>
