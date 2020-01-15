<?php

require_once 'modele_connexion.php';
require_once 'vue_connexion.php';
class ContConnexion {
    private $vueCo;
    private $modCo;

    public function __construct () {
        $this->vueCo = new VueConnexion();
        $this->modCo = new ModeleConnexion();
    }

    public function form_connexion(){
        $this->vueCo->form_connexion();
    }
    public function form_inscription(){//formulaire d'inscription
        $this->vueCo->form_inscription();
    }

    public function seConnecter(){
        //Vérification si les champs sont non-vides.
        if (isset($_POST['connexionPatient']) && $_POST['connexionPatient'] == 'Connexion') {
	        if ((isset($_POST['id']) && !empty($_POST['id'])) && (isset($_POST['mdp']) && !empty($_POST['mdp']))) {
                //Récupération des identifiants compatibles avec les données passées. Si $data n'est pas vide, cela veut dire que l'utilisateur est un membre.
                $data=ModeleConnexion::connexionPatient($_POST['id']);
                if($_POST['mdp']==$data['mdp']){
                    $_SESSION['idPatient']=$data['idPatient'];
                    $_GET['module']=null;
                    $_GET['action']=null;
                    echo  
                    exit();
                }
                //Si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son identifiant ou dans son mot de passe.
                else if($data == 0){
                    $erreur = 'Le compte nest pas reconnu.';
                }
            }
            else {
                $erreur = 'Au moins un des champs est vide.';
            }
        }
        if (isset($erreur)){
            echo '<br />',$erreur;
        }
    }
    

    public function validationInscription(){
        self::verifierJeton();
        if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
            if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['mdp']) && !empty($_POST['mdp'])) && (isset($_POST['mdpConfirme']) && !empty($_POST['mdpConfirme']))) {
            if ($_POST['mdp'] != $_POST['mdpConfirme']) {
                $erreur = 'Les deux mots de passe sont différents.';
            }
            else {

                $data=$this->modCo->selection_membre($_POST["login"]);

                if ($data[0] == 0) {
                    $this->modCo->insertion_membre($_POST["login"]);
                    $m_p=$this->modCo->connexion($_POST["login"],($_POST['mdp']));
                   
                    $_SESSION['login'] = $_POST['login'];
                    $_SESSION['monid']=$m_p['idmembre'];
                    $_GET['module']=null;
                    $_GET['action']=null;
                   require('index.php');
                exit();
                }
                else {
                    $erreur = 'Un membre possède déjà ce login.';
            }
            }
        }
            else {
                $erreur = 'Au moins un des champs est vide.';
            }
        }
    }

    public  function se_deconnecter(){
        session_unset();
        session_destroy();

        $_GET['action']=null;
        $_GET['module']=null;
        require('index.php'); 
        exit();
    }
}


?>