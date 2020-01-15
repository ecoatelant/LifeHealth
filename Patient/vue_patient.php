<?php

class VuePatient {

    public function __construct () {}

    public function afficherCorpsSoins(){
        //TO-DO
        echo "";
    }

    public function afficherSoins($soins){
        $req=null;
        if(!empty($soins)){
            foreach ($soins as $donnees) {
            echo $donnees['nom'];
            echo "<br/>";
            echo $donnees['ageDebut'];
            echo "<br/>";
            echo $donnees['ageEcheance'];
            echo "<br/>";
            echo $donnees['nbRappel'];
            echo "<br/>";
            echo $donnees['numRappel'];
            echo "<br/>";
            echo $donnees['obligatoire'];
            echo "<br/>";
            }
        }
    }
       
    public function afficherCoordonnees($patient){
        $coordonnees=null;
        if(isset($patient)){
            $coordonnees='
            Identifiant : '.$patient['idPatient'].'</br>';
        }
    }

}

?>