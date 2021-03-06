<?php

class ModeleConnexion {

    static protected $bdd;

    public function __construct () {}

    static function initConnexion(){
        try{
            self::$bdd = new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201664;charset=utf8', 'dutinfopw201664', 'pegunate');
        }
        catch(Exception $e){
                die('Erreur : '.$e->getMessage());
                echo "Veuillez contacter l'administrateur de LifeHealth.";
        }
    }

    function connexionPatient($idPat){
        try{
            $req = self::$bdd->query('SELECT idPatient,mdp FROM utilPatient where idPatient="'.$idPat.'"');
            return $donnee = $req->fetch();  
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
            echo "Veuillez contacter l'administrateur de LifeHealth.";
        }
    }

    public function inscriptionPatient($idPatient){
        $mdp = password_hash($_POST['mdp'],PASSWORD_DEFAULT);
        try{
            $sth=self::$bdd->prepare('INSERT INTO utilPatient (idPatient,mdp,nom,prenom,dateDeNaiss,adresse,codePostal,email,num,numCarteVital,LieuNaiss,genre,codePostalNaiss) VALUES("'.$idPatient.'", "'.$mdp.'","'.$nom.'","'.$prenom.'","'.$dateNaiss.'","'.$adresse.'","'.$CP.'","'.$email.'","'.$num.'","'.$nbCV.'","'.$lieuNaiss.'","'.$genre.'","'.$codePostalNaiss.'")');
            $sth->execute(array( $idPatient,$mdp));
        }
        catch(Exception $e){
            die('problème à l\'insertion');
        }
    }

    public function inscriptionDocteur($idPatient){
        $mp = password_hash($_POST['mp'],PASSWORD_DEFAULT);
        try{
            $sth=self::$bdd->prepare('INSERT INTO membre (idPatient,mdp) VALUES("'.$idPatient.'", "'.$mp.'")');
            $sth->execute(array( $idPatient,$mp));
        }
        catch(Exception $e){
            die('problème à l\'insertion');
        }
    }

}

?>
