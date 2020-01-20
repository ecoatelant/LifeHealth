<?php

require_once 'mod_generique.php';

class ModelePatient extends ModGenerique {

    public function __construct () {}

    function recupererSoins(){
    	$requete=ModeleConnexion::$bdd->query('SELECT *,dateVaccination FROM vaccin NATURAL JOIN aFaire WHERE idPatient = '.$_SESSION['idPatient'].' AND fait = true');
    	return $requete;
    	$requete->closeCursor();
    }

    function recuperationCoordonnees(){
		$selecPreparee=ModeleConnexion::$bdd->query('SELECT * FROM utilPatient WHERE idPatient = '.$_SESSION['idPatient']);
		$req = $selecPreparee->fetchAll();
		return $req;
	}

    function recuperationExamens(){
       $requete=ModeleConnexion::$bdd->query('SELECT *,dateExamen FROM examen NATURAL JOIN avoir WHERE idPatient = '.$_SESSION['idPatient']);
        return $requete;
        $requete->closeCursor();
    }

    function recuperationMaladies(){
       $requete=ModeleConnexion::$bdd->query('SELECT * FROM maladie NATURAL JOIN avoir WHERE idPatient = '.$_SESSION['idPatient']);
        return $requete;
        $requete->closeCursor();
    }

    function ajoutSoins($nom,$numRappel,$nbRappel,$ageDeb,$ageFin,$obligatoire,$dateVaccin){
        $selecPreparee=ModeleConnexion::$bdd->prepare('INSERT into vaccin (DEFAULT,$nbRappel,$numRappel,$ageDeb,$ageFin,$obligatoire,$nom)');
        $selecPreparee->execute();
        //$selecPreparee2=ModeleConnexion::$bdd->query('INSERT INTO aFaire VALUES($dateVaccin,1,$_SESSION[\'idPatient\'],$selecPreparee)');
        //$selecPreparee2->execute();
        //var_dump($selecPreparee);
    }
    
}

?>
