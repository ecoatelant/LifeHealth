<?php

class VuePatient {

    public function __construct () {}

    public function afficherCorpsSoins(){
        //TO-DO
        echo "";
    }

    public function afficherSoins($soins){
        //public function affiche_informationMembre($membre,$nbA,$rep,$cand){
        $info = null ;
        if(isset($membre)){
            $info = ' 
            idmembre : '.$membre['idmembre'].'</br> login : '.$membre['login'].'</br>';
            $info = $info.' nombre annonce : '.$nbA.' </br> nobre de reponses reçu : '.$rep.' </br> nombre de candidature deposé :'.$cand.'</br></br>';

        }

        echo '<aside class =param> <h2> Information du Compte </h2> </br>'.$info.'</aside>';
    }
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
            //$req = $req.'<option value="'.$donnees['idType'].'">'.$donnees['nomType'].'</option>';
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